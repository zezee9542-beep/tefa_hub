<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiNavigatorController extends Controller
{
    /**
     * System prompt sent to Gemini to keep it on-topic and consistent.
     */
    private const SYSTEM_PROMPT = <<<'PROMPT'
        Kamu adalah asisten virtual Tefa-Hub, platform digital terpadu untuk Sekolah Menengah Kejuruan (SMK) di Indonesia.

        Tugasmu:
        1. Membantu pengguna memahami dan mengakses layanan Tefa-Hub:
           - PPDB (Penerimaan Peserta Didik Baru) — pendaftaran siswa baru online
           - BKK (Bursa Kerja Khusus) — lowongan kerja dan magang untuk siswa/alumni SMK
           - Portal Akademik — nilai, absensi, jadwal pelajaran, rapor
           - BLUD Teaching Factory — unit usaha sekolah berbasis kompetensi siswa
        2. Menjawab pertanyaan umum seputar sekolah dan layanan Tefa-Hub dengan ramah.
        3. Menggunakan Bahasa Indonesia yang sopan dan mudah dipahami.
        4. Menjawab secara singkat, padat, dan langsung ke poin (maksimal 3-4 kalimat).
        5. Jika pertanyaan tidak relevan dengan sekolah atau Tefa-Hub, arahkan kembali ke layanan yang tersedia.

        PENTING: Jangan menyebutkan dirimu sebagai Gemini atau produk Google. Kamu adalah asisten Tefa-Hub.
        PROMPT;

    /**
     * Curated local knowledge base — instant answers without calling Gemini.
     *
     * @var array<string, array{keywords: string[], answer: string, route: string|null, label: string|null}>
     */
    private array $topics = [
        'ppdb' => [
            'keywords' => ['ppdb', 'pendaftaran', 'daftar siswa', 'siswa baru', 'masuk sekolah', 'penerimaan peserta', 'mendaftar', 'registrasi'],
            'answer' => 'PPDB (Penerimaan Peserta Didik Baru) adalah jalur pendaftaran siswa baru secara online di Tefa-Hub. Anda dapat mengisi formulir, mengunggah dokumen seperti ijazah dan akta kelahiran, serta memantau status pendaftaran secara real-time.',
            'route' => '/ppdb',
            'label' => 'Daftar via PPDB',
        ],
        'bkk' => [
            'keywords' => ['bkk', 'bursa kerja', 'lowongan', 'kerja', 'pekerjaan', 'rekrutmen', 'hiring', 'karir', 'career'],
            'answer' => 'BKK (Bursa Kerja Khusus) Tefa-Hub menghubungkan siswa dan alumni SMK dengan peluang kerja di perusahaan mitra. Tersedia ratusan lowongan yang sesuai dengan kompetensi kejuruan Anda.',
            'route' => '/bkk',
            'label' => 'Lihat Lowongan Kerja',
        ],
        'magang' => [
            'keywords' => ['magang', 'pkl', 'prakerin', 'praktek kerja', 'praktik kerja', 'internship'],
            'answer' => 'Program magang (PKL/Prakerin) dikelola melalui BKK Tefa-Hub. Temukan perusahaan mitra yang sesuai dengan jurusan Anda dan ajukan permohonan magang langsung melalui platform.',
            'route' => '/bkk',
            'label' => 'Cari Tempat Magang',
        ],
        'nilai' => [
            'keywords' => ['nilai', 'rapor', 'raport', 'hasil belajar', 'ulangan', 'ujian', 'uts', 'uas', 'pts', 'pas'],
            'answer' => 'Nilai dan rapor siswa dapat dilihat secara online melalui portal akademik Tefa-Hub. Data diperbarui langsung oleh guru setelah penilaian selesai.',
            'route' => '/akademik',
            'label' => 'Cek Nilai Saya',
        ],
        'absensi' => [
            'keywords' => ['absen', 'absensi', 'kehadiran', 'hadir', 'alfa', 'izin', 'sakit', 'ketidakhadiran'],
            'answer' => 'Rekap absensi dan kehadiran tersedia di portal akademik. Orang tua juga bisa memantau kehadiran anak secara real-time, termasuk keterangan izin dan sakit.',
            'route' => '/akademik',
            'label' => 'Lihat Data Absensi',
        ],
        'jadwal' => [
            'keywords' => ['jadwal', 'pelajaran', 'mata pelajaran', 'mapel', 'schedule', 'jam pelajaran'],
            'answer' => 'Jadwal pelajaran per kelas tersedia di portal akademik Tefa-Hub dan selalu diperbarui secara otomatis apabila ada perubahan.',
            'route' => '/akademik',
            'label' => 'Lihat Jadwal',
        ],
        'blud' => [
            'keywords' => ['blud', 'teaching factory', 'tefa', 'produk sekolah', 'unit usaha', 'produksi'],
            'answer' => 'BLUD Teaching Factory adalah unit usaha sekolah berbasis kompetensi siswa. Melalui Tefa-Hub, pengelolaan pesanan, produksi, dan pemasaran dilakukan secara digital.',
            'route' => '/blud',
            'label' => 'Info Teaching Factory',
        ],
        'login' => [
            'keywords' => ['login', 'masuk', 'log in', 'sign in', 'akun', 'password', 'lupa password', 'reset'],
            'answer' => 'Untuk login ke Tefa-Hub, gunakan akun yang diberikan oleh admin sekolah. Jika lupa password, gunakan fitur reset password atau hubungi admin.',
            'route' => '/login',
            'label' => 'Login Sekarang',
        ],
    ];

    /**
     * Handle an incoming chat message.
     */
    public function chat(Request $request): JsonResponse
    {
        $request->validate([
            'message' => ['required', 'string', 'max:500'],
        ]);

        $userMessage = trim($request->input('message'));
        $cacheKey = 'ai_nav_'.md5(mb_strtolower($userMessage));

        // Serve cached response instantly for repeated questions (FAQ caching)
        if (Cache::has($cacheKey)) {
            return response()->json(Cache::get($cacheKey));
        }

        // Fast-path: serve from local knowledge base (no API latency)
        $local = $this->matchTopic($userMessage);

        if ($local !== null) {
            $result = array_merge($local, ['source' => 'kb']);
            Cache::put($cacheKey, $result, now()->addHours(24));

            return response()->json($result);
        }

        // Fallback: call Gemini for complex / open-ended questions
        try {
            $geminiAnswer = $this->askGemini($userMessage);
            $result = [
                'answer' => $geminiAnswer,
                'route' => null,
                'label' => null,
                'source' => 'gemini',
            ];
            Cache::put($cacheKey, $result, now()->addHours(6));

            return response()->json($result);
        } catch (\Throwable $e) {
            Log::warning('Gemini API error', ['error' => $e->getMessage()]);

            return response()->json([
                'answer' => 'Maaf, saya kesulitan memproses pertanyaan Anda saat ini. Silakan coba lagi atau hubungi admin sekolah untuk bantuan langsung.',
                'route' => null,
                'label' => null,
                'source' => 'error',
            ]);
        }
    }

    /**
     * Return the greeting message with quick-action suggestions.
     */
    public function greet(): JsonResponse
    {
        return response()->json([
            'answer' => 'Halo! Ada yang bisa kami bantu hari ini? Pilih topik di bawah atau ketik pertanyaan Anda.',
            'suggestions' => [
                'Daftar PPDB siswa baru',
                'Cari lowongan / magang',
                'Cek nilai & absensi',
                'Info Teaching Factory',
            ],
        ]);
    }

    /**
     * Match user message against the local knowledge base.
     *
     * @return array{answer: string, route: string|null, label: string|null}|null
     */
    private function matchTopic(string $message): ?array
    {
        $lower = mb_strtolower($message);

        foreach ($this->topics as $topic) {
            foreach ($topic['keywords'] as $keyword) {
                if (str_contains($lower, $keyword)) {
                    return [
                        'answer' => $topic['answer'],
                        'route' => $topic['route'],
                        'label' => $topic['label'],
                    ];
                }
            }
        }

        return null;
    }

    /**
     * Call the Gemini API and return the generated text.
     *
     * Uses the REST endpoint: POST /v1beta/models/{model}:generateContent?key={apiKey}
     */
    private function askGemini(string $userMessage): string
    {
        $apiKey = config('services.ai_navigator.key');
        $baseUrl = rtrim((string) config('services.ai_navigator.url'), '/');
        $model = config('services.ai_navigator.model', 'gemini-1.5-flash');

        // Gemini REST endpoint — key passed as query param (standard AI Studio auth)
        $url = "{$baseUrl}/{$model}:generateContent?key={$apiKey}";

        $response = Http::timeout(20)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post($url, [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => self::SYSTEM_PROMPT."\n\nPertanyaan pengguna: ".$userMessage],
                        ],
                    ],
                ],
                'generationConfig' => [
                    'temperature' => 0.6,
                    'maxOutputTokens' => 300,
                    'topP' => 0.9,
                ],
                'safetySettings' => [
                    ['category' => 'HARM_CATEGORY_HARASSMENT', 'threshold' => 'BLOCK_NONE'],
                    ['category' => 'HARM_CATEGORY_HATE_SPEECH', 'threshold' => 'BLOCK_NONE'],
                ],
            ]);

        if ($response->failed()) {
            $status = $response->status();
            $body = $response->body();
            Log::warning("Gemini API returned HTTP {$status}", ['body' => $body]);

            throw new \RuntimeException("Gemini API error HTTP {$status}: {$body}");
        }

        $data = $response->json();

        return $data['candidates'][0]['content']['parts'][0]['text']
            ?? 'Maaf, saya tidak dapat memahami pertanyaan Anda. Coba tanyakan tentang PPDB, BKK, akademik, atau BLUD Tefa.';
    }
}
