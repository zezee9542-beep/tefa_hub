<?php

namespace Tests\Feature;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AiNavigatorChatTest extends TestCase
{
    public function test_it_uses_the_configured_ai_model_for_general_questions(): void
    {
        config()->set('services.ai_navigator.key', 'test-key');
        config()->set('services.ai_navigator.url', 'https://ai.example.test/v1beta/models');
        config()->set('services.ai_navigator.model', 'gemini-test-model');

        Http::fake([
            'https://ai.example.test/*' => Http::response([
                'candidates' => [[
                    'content' => [
                        'parts' => [[
                            'text' => 'Jakarta adalah ibu kota Indonesia.',
                            'thoughtSignature' => 'provider-metadata',
                        ]],
                    ],
                ]],
            ]),
        ]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Apa ibu kota Indonesia?',
        ]);

        $response->assertOk()
            ->assertJsonPath('answer', 'Jakarta adalah ibu kota Indonesia.')
            ->assertJsonPath('source', 'gemini');

        Http::assertSent(function (Request $request): bool {
            return str_contains($request->url(), '/gemini-test-model:generateContent')
                && $request->hasHeader('X-goog-api-key', 'test-key')
                && str_contains($request->data()['contents'][0]['parts'][0]['text'], 'Jawab semua pertanyaan umum');
        });
    }

    public function test_it_keeps_an_instant_answer_for_a_known_tefa_question(): void
    {
        Http::fake();

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Saya bingung cara mempublikasikan sebuah project saya, bagaimana caranya?',
        ]);

        $response->assertOk()
            ->assertJsonPath('source', 'kb')
            ->assertJsonPath('category', 'BLUD')
            ->assertJsonPath('route', '/#blud');

        Http::assertNothingSent();
    }

    public function test_it_gives_a_specific_major_recommendation_for_a_visitor_interest(): void
    {
        Http::fake();

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Saya suka robotika dan ingin tahu jurusan yang cocok.',
        ]);

        $response->assertOk()
            ->assertJsonPath('source', 'advisor')
            ->assertJsonPath('route', '/ppdb/kuis')
            ->assertJsonPath('label', 'Coba AI Temukan Jurusanmu')
            ->assertJsonPath('category', 'PPDB');

        $this->assertStringContainsString('TEI', (string) $response->json('answer'));

        Http::assertNothingSent();
    }

    public function test_it_sends_a_question_that_is_not_in_the_school_knowledge_base_to_the_ai_provider(): void
    {
        config()->set('services.ai_navigator.key', 'test-key');
        config()->set('services.ai_navigator.url', 'https://ai.example.test/v1beta/models');
        config()->set('services.ai_navigator.model', 'gemini-test-model');

        Http::fake([
            'https://ai.example.test/*' => Http::response([
                'candidates' => [[
                    'content' => [
                        'parts' => [['text' => 'RPL berfokus pada perangkat lunak, sedangkan TEI berfokus pada elektronika industri.']],
                    ],
                ]],
            ]),
        ]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Apakah jurusan RPL dan TEI memiliki perbedaan?',
        ]);

        $response->assertOk()
            ->assertJsonPath('source', 'gemini')
            ->assertJsonPath('answer', 'RPL berfokus pada perangkat lunak, sedangkan TEI berfokus pada elektronika industri.');

        Http::assertSentCount(1);
    }

    public function test_it_does_not_cache_a_response_when_the_ai_provider_is_unavailable(): void
    {
        config()->set('services.ai_navigator.key', null);

        $firstResponse = $this->postJson(route('ai.chat'), [
            'message' => 'Apa arti quantum computing?',
        ]);

        $firstResponse->assertOk()->assertJsonPath('source', 'unavailable');

        config()->set('services.ai_navigator.key', 'test-key');
        config()->set('services.ai_navigator.url', 'https://ai.example.test/v1beta/models');
        config()->set('services.ai_navigator.model', 'gemini-test-model');

        Http::fake([
            'https://ai.example.test/*' => Http::response([
                'candidates' => [[
                    'content' => [
                        'parts' => [['text' => 'Quantum computing adalah pendekatan komputasi yang memanfaatkan prinsip mekanika kuantum.']],
                    ],
                ]],
            ]),
        ]);

        $secondResponse = $this->postJson(route('ai.chat'), [
            'message' => 'Apa arti quantum computing?',
        ]);

        $secondResponse->assertOk()
            ->assertJsonPath('source', 'gemini')
            ->assertJsonPath('answer', 'Quantum computing adalah pendekatan komputasi yang memanfaatkan prinsip mekanika kuantum.');
    }

    public function test_it_uses_the_fallback_model_when_the_primary_model_is_busy(): void
    {
        config()->set('services.ai_navigator.key', 'test-key');
        config()->set('services.ai_navigator.url', 'https://ai.example.test/v1beta/models');
        config()->set('services.ai_navigator.model', 'primary-model');
        config()->set('services.ai_navigator.fallback_model', 'fallback-model');

        Http::fake([
            'https://ai.example.test/v1beta/models/primary-model:generateContent' => Http::response([], 503),
            'https://ai.example.test/v1beta/models/fallback-model:generateContent' => Http::response([
                'candidates' => [[
                    'content' => [
                        'parts' => [['text' => 'Jawaban dari model cadangan.']],
                    ],
                ]],
            ]),
        ]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Sebutkan planet terdekat dengan Matahari.',
        ]);

        $response->assertOk()
            ->assertJsonPath('answer', 'Jawaban dari model cadangan.')
            ->assertJsonPath('source', 'gemini');

        Http::assertSentCount(2);
    }
}
