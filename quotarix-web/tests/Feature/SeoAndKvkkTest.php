<?php

namespace Tests\Feature;

use Database\Seeders\ContentSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoAndKvkkTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(SectionSeeder::class);
        $this->seed(SettingSeeder::class);
        $this->seed(ContentSeeder::class);
    }

    public function test_all_pages_have_unique_titles_and_descriptions(): void
    {
        $urls = [
            '/' => 'Quotarix | Forwarder Satış Ekibiniz İçin CRM — Müşteriniz Şirkette Kalsın',
            '/ozellikler' => 'Özellikler — Quotarix Forwarder CRM',
            '/ozellikler/hizli-teklif-yonetimi' => 'Hızlı Teklif Yönetimi | Quotarix Forwarder CRM',
            '/yol-haritasi' => 'Yol Haritası — Quotarix Gelecek Özellikler',
            '/neden-quotarix' => 'Neden Quotarix? — Forwarder Diliyle Konuşan CRM',
            '/fiyatlandirma' => 'Fiyatlandırma — Quotarix CRM',
            '/blog' => 'Blog — Quotarix Forwarder CRM',
            '/blog/excelde-teklif-yonetimi-neden-artik-surdurulemez' => 'Excel\'de Teklif Yönetimi Neden Artık Sürdürülemez? | Quotarix Blog',
            '/sss' => 'Sıkça Sorulan Sorular — Quotarix',
            '/demo' => 'Ücretsiz Demo Talep Edin — Quotarix',
            '/iletisim' => 'İletişim — Quotarix',
            '/kvkk' => 'KVKK Aydınlatma Metni | Quotarix',
            '/gizlilik-politikasi' => 'Gizlilik Politikası / Privacy Policy | Quotarix',
        ];

        $titles = [];
        $descriptions = [];

        foreach ($urls as $url => $expectedTitle) {
            $response = $this->get($url);
            $response->assertStatus(200);

            // Verify title tag exists
            $content = $response->getContent();
            preg_match('/<title>(.*?)<\/title>/is', $content, $tMatch);
            $this->assertNotEmpty($tMatch[1] ?? '', "Missing <title> on {$url}");
            $title = trim($tMatch[1]);

            // Verify meta description exists
            preg_match('/<meta name="description" content="(.*?)"/is', $content, $dMatch);
            $this->assertNotEmpty($dMatch[1] ?? '', "Missing meta description on {$url}");
            $description = trim($dMatch[1]);

            // Ensure titles and descriptions are distinct across main pages
            $titles[$url] = $title;
            $descriptions[$url] = $description;
        }

        // Check for duplicates across major pages
        $this->assertEquals(count($urls), count(array_unique($titles)), 'Found duplicate page titles');
        $this->assertEquals(count($urls), count(array_unique($descriptions)), 'Found duplicate meta descriptions');
    }

    public function test_paginated_blog_has_noindex_follow(): void
    {
        $response = $this->get('/blog?page=2');
        $response->assertStatus(200);
        $response->assertSee('<meta name="robots" content="noindex, follow">', false);
    }

    public function test_sitemap_contains_all_routes_and_features(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');

        $content = $response->getContent();
        $this->assertStringContainsString('<loc>' . url('/') . '</loc>', $content);
        $this->assertStringContainsString('<loc>' . route('features') . '</loc>', $content);
        $this->assertStringContainsString('<loc>' . route('roadmap') . '</loc>', $content);
        $this->assertStringContainsString('<loc>' . route('features.show', 'whatsapptan-teklif') . '</loc>', $content);
        $this->assertStringContainsString('<loc>' . route('page', 'kvkk') . '</loc>', $content);
    }

    public function test_robots_txt_contains_sitemap_and_disallow_admin(): void
    {
        $robotsContent = file_get_contents(public_path('robots.txt'));
        $this->assertStringContainsString('Disallow: /admin', $robotsContent);
        $this->assertStringContainsString('Sitemap: https://quotarix.com/sitemap.xml', $robotsContent);
    }

    public function test_json_ld_schemas(): void
    {
        // 1. Organization schema on home
        $homeRes = $this->get('/');
        $homeRes->assertStatus(200);
        $homeRes->assertSee('"@type": "Organization"', false);
        $homeRes->assertSee('"@type": "SoftwareApplication"', false);

        // 2. FAQPage schema on /sss
        $faqRes = $this->get('/sss');
        $faqRes->assertStatus(200);
        $faqRes->assertSee('"@type": "FAQPage"', false);

        // 3. BlogPosting schema on blog detail
        $blogRes = $this->get('/blog/excelde-teklif-yonetimi-neden-artik-surdurulemez');
        $blogRes->assertStatus(200);
        $blogRes->assertSee('"@type": "BlogPosting"', false);
        $blogRes->assertSee('"@type": "BreadcrumbList"', false);
    }

    public function test_cookie_consent_banner_is_present(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('id="cookieConsentBanner"', false);
        $response->assertSee('id="btnAcceptCookie"', false);
        $response->assertSee('id="btnRejectCookie"', false);
        $response->assertSee('qx_consent', false);
    }
}
