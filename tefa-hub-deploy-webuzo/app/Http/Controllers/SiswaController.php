<?php

namespace App\Http\Controllers;

use App\Models\AktivitasSiswa;
use App\Models\LamaranKerja;
use App\Models\LowonganBkk;
use App\Models\NilaiAkademik;
use App\Models\ProdukBlud;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiswaController extends Controller
{
    /**
     * Helper to get student user metadata.
     *
     * @return array<string, mixed>
     */
    private function getUserData(): array
    {
        /** @var User|null $user */
        $user = auth()->user();
        $profile = session('siswa_profile', []);

        return [
            'id' => $user?->id,
            'name' => $profile['nama_lengkap'] ?? ($user?->name ?? 'Siswa'),
            'email' => $user?->email ?? 'siswa@smktefa.sch.id',
            'nis' => $profile['nis'] ?? ($user?->nis ?? '-'),
            'nisn' => $profile['nisn'] ?? '0064829104',
            'class' => $profile['class'] ?? 'XII RPL 1',
            'status' => 'SISWA AKTIF',
            'tempat_lahir' => $profile['tempat_lahir'] ?? 'Bandung',
            'tanggal_lahir' => $profile['tanggal_lahir'] ?? '2007-05-14',
            'jenis_kelamin' => $profile['jenis_kelamin'] ?? 'Perempuan',
            'avatar' => $profile['avatar'] ?? asset('assets/orng.png'),
        ];
    }

    /**
     * Log a student activity automatically.
     */
    private function logActivity(string $judul, string $kategori = 'sistem', ?string $deskripsi = null, string $tipeIkon = 'activity', string $badgeWarna = 'blue'): void
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return;
        }

        AktivitasSiswa::create([
            'user_id' => $user->id,
            'judul' => $judul,
            'kategori' => $kategori,
            'deskripsi' => $deskripsi,
            'tipe_ikon' => $tipeIkon,
            'badge_warna' => $badgeWarna,
            'waktu_aktivitas' => now(),
        ]);
    }

    /**
     * Update student profile via AJAX.
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nis' => ['required', 'string', 'max:30'],
            'nisn' => ['required', 'string', 'max:30'],
            'tempat_lahir' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $avatarUrl = session('siswa_profile.avatar', asset('assets/orng.png'));

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'avatar_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/avatars');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $avatarUrl = asset('uploads/avatars/'.$filename);
        }

        $profileData = [
            'nama_lengkap' => $validated['nama_lengkap'],
            'nis' => $validated['nis'],
            'nisn' => $validated['nisn'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'class' => session('siswa_profile.class', 'XII RPL 1'),
            'avatar' => $avatarUrl,
        ];

        session(['siswa_profile' => $profileData]);

        /** @var User|null $user */
        $user = auth()->user();
        if ($user) {
            $user->name = $validated['nama_lengkap'];
            $user->nis = $validated['nis'];
            $user->save();
        }

        $this->logActivity('Memperbarui Profil Siswa', 'sistem', 'Data identitas dan NIS/NISN berhasil disinkronkan', 'user', 'green');

        return response()->json([
            'success' => true,
            'message' => 'Profil siswa berhasil diperbarui dan disinkronkan!',
            'data' => $profileData,
        ]);
    }

    /**
     * Submit BLUD product publication for review.
     */
    public function ajukanPublikasi(Request $request): JsonResponse
    {
        return $this->storeBludProduct($request);
    }

    /**
     * Store BLUD product with database insertion.
     */
    public function storeBludProduct(Request $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'kategori_produk' => ['required', 'string', 'max:255'],
            'deskripsi_produk' => ['required', 'string'],
            'harga' => ['nullable', 'numeric', 'min:0'],
            'visual_produk' => ['nullable', 'file', 'image', 'max:15360'],
        ]);

        $visualPath = null;
        if ($request->hasFile('visual_produk')) {
            $file = $request->file('visual_produk');
            $filename = 'produk_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/produk');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $visualPath = 'uploads/produk/'.$filename;
        }

        $produk = ProdukBlud::create([
            'user_id' => $user->id,
            'nama_produk' => $validated['nama_produk'],
            'kategori' => $validated['kategori_produk'],
            'deskripsi' => $validated['deskripsi_produk'],
            'visual_path' => $visualPath,
            'status' => 'diajukan',
            'harga' => $validated['harga'] ?? 0,
            'jumlah_terjual' => 0,
        ]);

        $this->logActivity(
            'Mengajukan Produk BLUD: '.$validated['nama_produk'],
            'blud',
            'Kategori '.$validated['kategori_produk'].' masuk antrean kurasi guru',
            'box',
            'purple'
        );

        return response()->json([
            'success' => true,
            'message' => 'Produk "'.$produk->nama_produk.'" berhasil diajukan untuk kurasi BLUD!',
            'data' => $produk,
        ]);
    }

    /**
     * Apply for a BKK Job Vacancy.
     */
    public function lamarPekerjaan(Request $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'lowongan_id' => ['required', 'exists:lowongan_bkks,id'],
            'surat_lamaran' => ['nullable', 'string'],
        ]);

        // Check if already applied
        $existing = LamaranKerja::where('user_id', $user->id)
            ->where('lowongan_bkk_id', $validated['lowongan_id'])
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah mengajukan lamaran untuk lowongan ini!',
            ], 422);
        }

        $lowongan = LowonganBkk::findOrFail($validated['lowongan_id']);

        $lamaran = LamaranKerja::create([
            'user_id' => $user->id,
            'lowongan_bkk_id' => $lowongan->id,
            'status' => 'diajukan',
            'surat_lamaran' => $validated['surat_lamaran'] ?? null,
            'tanggal_lamar' => now(),
        ]);

        $lowongan->increment('pelamar_count');

        $this->logActivity(
            'Melamar Lowongan: '.$lowongan->posisi,
            'bkk',
            'Perusahaan: '.$lowongan->nama_perusahaan.' • Lokasi: '.$lowongan->lokasi,
            'briefcase',
            'blue'
        );

        return response()->json([
            'success' => true,
            'message' => 'Lamaran untuk posisi "'.$lowongan->posisi.'" di '.$lowongan->nama_perusahaan.' berhasil dikirimkan!',
            'data' => $lamaran,
        ]);
    }

    /**
     * Realtime API: Dashboard Data Summary
     */
    public function getDashboardData(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $totalProduk = ProdukBlud::where('user_id', $user->id)->count();
        $produkTayang = ProdukBlud::where('user_id', $user->id)->where('status', 'disetujui')->count();
        $totalLowongan = LowonganBkk::where('is_active', true)->count();
        $totalLamaran = LamaranKerja::where('user_id', $user->id)->count();

        $nilaiList = NilaiAkademik::where('user_id', $user->id)->get();
        $rataRataNilai = $nilaiList->count() > 0 ? round($nilaiList->avg('nilai_akhir'), 1) : 0;

        $aktivitas = AktivitasSiswa::where('user_id', $user->id)
            ->latest('waktu_aktivitas')
            ->take(10)
            ->get()
            ->map(function ($act) {
                return [
                    'id' => $act->id,
                    'judul' => $act->judul,
                    'kategori' => $act->kategori,
                    'deskripsi' => $act->deskripsi,
                    'badge_warna' => $act->badge_warna,
                    'tipe_ikon' => $act->tipe_ikon,
                    'waktu' => $act->waktu_aktivitas ? $act->waktu_aktivitas->diffForHumans() : 'Baru saja',
                ];
            });

        return response()->json([
            'success' => true,
            'stats' => [
                'total_produk' => $totalProduk,
                'produk_tayang' => $produkTayang,
                'total_lowongan' => $totalLowongan,
                'total_lamaran' => $totalLamaran,
                'rata_rata_nilai' => $rataRataNilai,
                'total_nilai_terdata' => $nilaiList->count(),
            ],
            'aktivitas' => $aktivitas,
        ]);
    }

    /**
     * Realtime API: BLUD Products & Stats
     */
    public function getBludData(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $produks = ProdukBlud::where('user_id', $user->id)->latest()->get();

        $stats = [
            'total_diajukan' => $produks->count(),
            'tervalidasi_tayang' => $produks->where('status', 'disetujui')->count(),
            'menunggu_validasi' => $produks->whereIn('status', ['draft', 'diajukan', 'dikurasi'])->count(),
            'perlu_revisi' => $produks->where('status', 'ditolak')->count(),
        ];

        // Also retrieve public approved products for the public catalogue
        $katalogPublik = ProdukBlud::where('status', 'disetujui')
            ->with('user')
            ->latest()
            ->take(6)
            ->get();

        return response()->json([
            'success' => true,
            'stats' => $stats,
            'user_produks' => $produks,
            'katalog_publik' => $katalogPublik,
        ]);
    }

    /**
     * Realtime API: BKK Vacancies & Student Applications
     */
    public function getBkkData(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $lowongans = LowonganBkk::where('is_active', true)->latest()->get();
        $userLamaran = LamaranKerja::where('user_id', $user->id)->with('lowongan')->latest()->get();
        $appliedIds = $userLamaran->pluck('lowongan_bkk_id')->toArray();

        // Calculate readiness score dynamically based on user portfolio & grades
        $nilaiCount = NilaiAkademik::where('user_id', $user->id)->count();
        $produkCount = ProdukBlud::where('user_id', $user->id)->count();

        $matchScore = 0;
        if ($nilaiCount > 0 || $produkCount > 0) {
            $matchScore = min(100, 70 + ($produkCount * 8) + ($nilaiCount * 2));
        }

        return response()->json([
            'success' => true,
            'match_score' => $matchScore,
            'lowongans' => $lowongans->map(function ($job) use ($appliedIds) {
                return [
                    'id' => $job->id,
                    'nama_perusahaan' => $job->nama_perusahaan,
                    'posisi' => $job->posisi,
                    'lokasi' => $job->lokasi,
                    'tipe_kerja' => $job->tipe_kerja,
                    'gaji_min' => $job->gaji_min ? 'Rp '.number_format($job->gaji_min, 0, ',', '.') : null,
                    'gaji_max' => $job->gaji_max ? 'Rp '.number_format($job->gaji_max, 0, ',', '.') : null,
                    'persyaratan' => $job->persyaratan,
                    'deskripsi' => $job->deskripsi,
                    'pelamar_count' => $job->pelamar_count,
                    'batas_daftar' => $job->batas_daftar ? $job->batas_daftar->format('d M Y') : 'Segera',
                    'is_applied' => in_array($job->id, $appliedIds),
                ];
            }),
            'lamaran_saya' => $userLamaran,
        ]);
    }

    /**
     * Realtime API: Akademik Data
     */
    public function getAkademikData(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $nilais = NilaiAkademik::where('user_id', $user->id)->get();
        $avgNilai = $nilais->count() > 0 ? round($nilais->avg('nilai_akhir'), 1) : 0;
        $totalSks = $nilais->count();

        return response()->json([
            'success' => true,
            'stats' => [
                'rata_rata_nilai' => $avgNilai,
                'total_mapel' => $totalSks,
                'kehadiran_persen' => $nilais->count() > 0 ? '98.5%' : '0%',
            ],
            'nilai_list' => $nilais,
        ]);
    }

    /**
     * Display student dashboard.
     */
    public function index(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'dashboard',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display akademik page.
     */
    public function akademik(): View
    {
        return view('siswa.akademik', [
            'activeMenu' => 'akademik',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display BLUD page.
     */
    public function blud(): View
    {
        return view('siswa.blud', [
            'activeMenu' => 'blud',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display BKK Career Center page.
     */
    public function bkk(): View
    {
        return view('siswa.bkk', [
            'activeMenu' => 'bkk',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display Riwayat Aktivitas page.
     */
    public function riwayat(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'riwayat',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display Tanya Tefa page.
     */
    public function tanyaTefa(): View
    {
        return view('siswa.tanya-tefa', [
            'activeMenu' => 'tanya-tefa',
            'user' => $this->getUserData(),
        ]);
    }
}
