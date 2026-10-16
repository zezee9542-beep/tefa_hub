<?php

namespace Tests\Feature;

use App\Services\GoogleTtsService;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class GoogleTtsTest extends TestCase
{
    public function test_google_tts_service_resolves_and_validates_credentials(): void
    {
        $service = app(GoogleTtsService::class);

        $this->assertTrue($service->isConfigured());
        $this->assertNotNull($service->resolveCredentialsPath());
        $this->assertFileExists($service->resolveCredentialsPath());
    }

    public function test_google_tts_service_sanitizes_markdown_and_html_text(): void
    {
        $service = app(GoogleTtsService::class);

        $raw = "**Halo!** Kunjungi [PPDB SMK](https://example.com) untuk mendaftar.\n\n```code here```\n- Point 1\n# Title";
        $clean = $service->sanitizeText($raw);

        $this->assertStringNotContainsString('**', $clean);
        $this->assertStringNotContainsString('https://example.com', $clean);
        $this->assertStringNotContainsString('code here', $clean);
        $this->assertStringNotContainsString('#', $clean);
        $this->assertStringContainsString('Halo!', $clean);
        $this->assertStringContainsString('PPDB SMK', $clean);
    }

    public function test_tts_endpoint_validates_required_text(): void
    {
        $response = $this->postJson(route('ai.tts'), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['text']);
    }

    public function test_tts_endpoint_returns_synthesized_data_uri(): void
    {
        Cache::flush();

        $mockService = $this->createMock(GoogleTtsService::class);
        $mockService->expects($this->once())
            ->method('synthesizeDataUri')
            ->with('Halo, selamat datang di Tefa Hub.', null)
            ->willReturn([
                'audio' => 'data:audio/mp3;base64,SUQzBAAAAAAA...',
                'cached' => false,
            ]);

        $this->app->instance(GoogleTtsService::class, $mockService);

        $response = $this->postJson(route('ai.tts'), [
            'text' => 'Halo, selamat datang di Tefa Hub.',
        ]);

        $response->assertOk()
            ->assertJson([
                'success' => true,
                'audio' => 'data:audio/mp3;base64,SUQzBAAAAAAA...',
                'cached' => false,
            ]);
    }

    public function test_tts_endpoint_handles_synthesis_failure_gracefully(): void
    {
        $mockService = $this->createMock(GoogleTtsService::class);
        $mockService->expects($this->once())
            ->method('synthesizeDataUri')
            ->willReturn(null);

        $this->app->instance(GoogleTtsService::class, $mockService);

        $response = $this->postJson(route('ai.tts'), [
            'text' => 'Teks uji coba gagal.',
        ]);

        $response->assertStatus(503)
            ->assertJson([
                'success' => false,
                'audio' => null,
            ]);
    }
}
