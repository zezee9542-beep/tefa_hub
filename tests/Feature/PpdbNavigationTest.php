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
