<?php

namespace Tests\Feature;

use Database\Seeders\ContentSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(SectionSeeder::class);
        $this->seed(SettingSeeder::class);
        $this->seed(ContentSeeder::class);
    }

    public function test_legacy_html_redirects_to_new_url(): void
    {
        $response = $this->get('/kvkk.html');
        $response->assertStatus(301);
        $response->assertRedirect('/kvkk');

        $response2 = $this->get('/privacy-policy.html');
        $response2->assertStatus(301);
        $response2->assertRedirect('/gizlilik-politikasi');

        $response3 = $this->get('/terms-of-service.html');
        $response3->assertStatus(301);
        $response3->assertRedirect('/kullanim-kosullari');

        $response4 = $this->get('/mesafeli-satis-sozlesmesi.html');
        $response4->assertStatus(301);
        $response4->assertRedirect('/mesafeli-satis-sozlesmesi');

        $response5 = $this->get('/iptal-iade-politikasi.html');
        $response5->assertStatus(301);
        $response5->assertRedirect('/iptal-ve-iade-politikasi');

        $response6 = $this->get('/teslimat-bilgileri.html');
        $response6->assertStatus(301);
        $response6->assertRedirect('/teslimat-bilgileri');

        $response7 = $this->get('/on-bilgilendirme.html');
        $response7->assertStatus(301);
        $response7->assertRedirect('/on-bilgilendirme');
    }

    public function test_non_existing_slug_returns_404(): void
    {
        $response = $this->get('/olmayan-slug-12345');
        $response->assertStatus(404);
    }

    public function test_sitemap_returns_xml(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
    }
}
