<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class OpenGraphMetaTest extends TestCase
{
    /**
     * Test physical Open Graph logo asset exists and meets crawler specifications.
     */
    public function test_og_logo_asset_exists_and_meets_crawler_specifications(): void
    {
        $assetPath = public_path('assets/logo-og.png');

        $this->assertFileExists($assetPath);
        $this->assertTrue(is_readable($assetPath), 'Asset logo-og.png must be readable.');

        $fileSizeBytes = filesize($assetPath);
        $this->assertLessThan(
            150 * 1024,
            $fileSizeBytes,
            'Asset logo-og.png must be smaller than 150 KB for crawler compatibility.'
        );

        $imageInfo = getimagesize($assetPath);
        $this->assertIsArray($imageInfo, 'Asset logo-og.png must be a valid image file.');
        $this->assertSame(512, $imageInfo[0], 'Asset logo-og.png width must be exactly 512px.');
        $this->assertSame(512, $imageInfo[1], 'Asset logo-og.png height must be exactly 512px.');
        $this->assertSame('image/png', $imageInfo['mime'], 'Asset logo-og.png MIME type must be image/png.');
    }

    /**
     * Data provider for all 8 public routes requiring Open Graph & Twitter Card metadata.
     *
     * @return array<string, array{string, string}>
     */
    public static function publicRoutesProvider(): array
    {
        return [
            'home' => ['home', '/'],
            'ppdb' => ['ppdb', '/ppdb'],
            'ppdb.daftar' => ['ppdb.daftar', '/ppdb/daftar'],
            'pkl' => ['pkl', '/pkl'],
            'bkk' => ['bkk', '/bkk'],
            'profil' => ['profil', '/profil'],
            'kontak' => ['kontak', '/kontak'],
            'ppdb.kuis' => ['ppdb.kuis', '/ppdb/kuis'],
        ];
    }

    /**
     * Test that each public page renders valid Open Graph and Twitter Card tags.
     */
    #[DataProvider('publicRoutesProvider')]
    public function test_public_pages_render_valid_open_graph_and_twitter_meta_tags(string $routeName, string $uri): void
    {
        $response = $this->get(route($routeName));

        $response->assertOk();

        // Open Graph Image & Type Assertions
        $response->assertSee('<meta property="og:image"', false);
        $response->assertSee('assets/logo-og.png', false);
        $response->assertSee('<meta property="og:image:type" content="image/png">', false);
        $response->assertSee('<meta property="og:image:width" content="512">', false);
        $response->assertSee('<meta property="og:image:height" content="512">', false);

        // Twitter Card Assertions (must be summary for square logo, not summary_large_image)
        $response->assertSee('<meta name="twitter:card" content="summary">', false);
        $response->assertDontSee('<meta name="twitter:card" content="summary_large_image">', false);
        $response->assertSee('<meta name="twitter:image"', false);
    }
}
