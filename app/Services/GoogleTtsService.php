<?php

namespace App\Services;

use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\Client\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\SynthesizeSpeechRequest;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GoogleTtsService
{
    /**
     * Resolve the absolute path to the Google service account JSON credentials.
     */
    public function resolveCredentialsPath(): ?string
    {
        $path = config('services.google_tts.credentials');

        if (! $path) {
            $path = env('GOOGLE_APPLICATION_CREDENTIALS', storage_path('app/google/google-tts.json'));
        }

        if (empty($path)) {
            return null;
        }

        // If path is relative to the project root, resolve it to absolute path
        if (! file_exists($path) && file_exists(base_path($path))) {
            $path = base_path($path);
        }

        return file_exists($path) && is_readable($path) ? $path : null;
    }

    /**
     * Check if Google Cloud TTS credentials are configured and valid.
     */
    public function isConfigured(): bool
    {
        $path = $this->resolveCredentialsPath();

        if (! $path) {
            return false;
        }

        $json = @file_get_contents($path);
        if ($json === false) {
            return false;
        }

        $data = json_decode($json, true);

        return is_array($data) && ! empty($data['client_email']) && ! empty($data['private_key']);
    }

    /**
     * Sanitize input text by stripping HTML, markdown, URLs, and excess whitespace
     * to produce clean, natural spoken speech.
     */
    public function sanitizeText(string $text): string
    {
        // Remove code blocks
        $clean = preg_replace('/```[\s\S]*?```/', '', $text) ?? $text;
        $clean = preg_replace('/`[^`]+`/', '', $clean) ?? $clean;

        // Replace markdown links [label](url) with just the label
        $clean = preg_replace('/\[([^\]]+)\]\([^)]+\)/', '$1', $clean) ?? $clean;

        // Strip HTML tags
        $clean = strip_tags($clean);

        // Remove markdown symbols: headings, bold, italic, blockquotes, bullets
        $clean = preg_replace('/^[#\->\*\+]\s+/m', '', $clean) ?? $clean;
        $clean = preg_replace('/[\*\_~]/', '', $clean) ?? $clean;

        // Normalize multiple spaces and linebreaks
        $clean = preg_replace('/\s+/', ' ', $clean) ?? $clean;
        $clean = trim($clean);

        // Limit to 4500 characters to safely respect Google TTS API request limit (5000 chars)
        if (mb_strlen($clean) > 4500) {
            $clean = mb_substr($clean, 0, 4500);
        }

        return $clean;
    }

    /**
     * Synthesize text to MP3 audio binary.
     */
    public function synthesize(
        string $text,
        ?string $voice = null,
        ?float $speakingRate = null,
        ?float $pitch = null
    ): ?string {
        $cleanText = $this->sanitizeText($text);

        if ($cleanText === '') {
            return null;
        }

        $credentialsPath = $this->resolveCredentialsPath();
        if (! $credentialsPath) {
            Log::warning('Google TTS: Credentials file not found or unreadable.');

            return null;
        }

        $languageCode = config('services.google_tts.language_code', 'id-ID');
        $voiceName = $voice ?: config('services.google_tts.voice_name', 'id-ID-Wavenet-A');
        $rate = $speakingRate ?? (float) config('services.google_tts.speaking_rate', 1.0);
        $pitchVal = $pitch ?? (float) config('services.google_tts.pitch', 0.0);

        try {
            putenv("GOOGLE_APPLICATION_CREDENTIALS={$credentialsPath}");

            $client = new TextToSpeechClient([
                'credentials' => $credentialsPath,
            ]);

            $input = (new SynthesisInput)->setText($cleanText);

            $voiceParams = (new VoiceSelectionParams)
                ->setLanguageCode($languageCode)
                ->setName($voiceName);

            $audioConfig = (new AudioConfig)
                ->setAudioEncoding(AudioEncoding::MP3)
                ->setSpeakingRate($rate)
                ->setPitch($pitchVal);

            $request = SynthesizeSpeechRequest::build($input, $voiceParams, $audioConfig);

            $response = $client->synthesizeSpeech($request);
            $client->close();

            return $response->getAudioContent();
        } catch (\Throwable $e) {
            Log::warning('Google Cloud TTS synthesis failed: '.$e->getMessage(), [
                'text_sample' => mb_substr($cleanText, 0, 100),
                'voice' => $voiceName,
            ]);

            return null;
        }
    }

    /**
     * Synthesize text to a data URI (data:audio/mp3;base64,...), with caching support.
     *
     * @return array{audio: string, cached: bool}|null
     */
    public function synthesizeDataUri(
        string $text,
        ?string $voice = null,
        ?float $speakingRate = null,
        ?float $pitch = null
    ): ?array {
        $cleanText = $this->sanitizeText($text);

        if ($cleanText === '') {
            return null;
        }

        $voiceName = $voice ?: config('services.google_tts.voice_name', 'id-ID-Wavenet-A');
        $rate = $speakingRate ?? (float) config('services.google_tts.speaking_rate', 1.0);
        $pitchVal = $pitch ?? (float) config('services.google_tts.pitch', 0.0);

        $cacheKey = 'tts_'.sha1("{$cleanText}|{$voiceName}|{$rate}|{$pitchVal}");
        $cachedAudio = Cache::get($cacheKey);

        if ($cachedAudio !== null && is_string($cachedAudio)) {
            return [
                'audio' => $cachedAudio,
                'cached' => true,
            ];
        }

        $binary = $this->synthesize($cleanText, $voiceName, $rate, $pitchVal);

        if ($binary === null || $binary === '') {
            return null;
        }

        $dataUri = 'data:audio/mp3;base64,'.base64_encode($binary);
        $ttl = (int) config('services.google_tts.cache_ttl', 604800);

        Cache::put($cacheKey, $dataUri, $ttl);

        return [
            'audio' => $dataUri,
            'cached' => false,
        ];
    }
}
