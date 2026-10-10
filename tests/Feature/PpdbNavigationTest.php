<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PpdbNavigationTest extends TestCase
{
    public function test_the_homepage_ppdb_card_links_to_the_ppdb_page(): void
    {
        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee(route('ppdb'));
    }

    public function test_visitors_can_start_the_ai_major_discovery_from_the_homepage(): void
    {
        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee(route('ppdb.kuis'))
            ->assertSee('Coba AI Temukan Jurusanmu');
    }

    public function test_the_public_major_discovery_shows_an_actionable_ai_result(): void
    {
        $response = $this->get(route('ppdb.kuis'));

        $response
            ->assertOk()
            ->assertSee('TEFA AI CAREER DISCOVERY')
            ->assertSee('AI MENEMUKAN POLA INI DARI PILIHANMU')
            ->assertSee('Tanya AI tentang Jurusan Ini');
    }

    public function test_the_ai_ppdb_response_links_to_the_ppdb_page(): void
    {
        Http::fake();

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Cara Daftar PPDB Online',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('category', 'PPDB')
            ->assertJsonPath('route', '/ppdb')
            ->assertJsonPath('label', 'Buka Pendaftaran PPDB');

        Http::assertNothingSent();
    }
}
