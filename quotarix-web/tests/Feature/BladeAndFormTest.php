<?php

namespace Tests\Feature;

use App\Models\Lead;
use Database\Seeders\ContentSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BladeAndFormTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(SectionSeeder::class);
        $this->seed(SettingSeeder::class);
        $this->seed(ContentSeeder::class);
    }

    public function test_all_pages_render_successfully(): void
    {
        $pages = [
            '/',
            '/ozellikler',
            '/ozellikler/hizli-teklif-yonetimi',
            '/yol-haritasi',
            '/neden-quotarix',
            '/fiyatlandirma',
            '/blog',
            '/blog/excelde-teklif-yonetimi-neden-artik-surdurulemez',
            '/sss',
            '/demo',
            '/iletisim',
            '/kvkk',
            '/gizlilik-politikasi',
            '/kullanim-kosullari',
            '/mesafeli-satis-sozlesmesi',
            '/iptal-ve-iade-politikasi',
            '/teslimat-bilgileri',
            '/on-bilgilendirme',
        ];

        foreach ($pages as $url) {
            $response = $this->get($url);
            $response->assertStatus(200, "Page {$url} failed to load with status 200");
        }
    }

    public function test_pricing_page_is_accessible_when_section_is_inactive(): void
    {
        // Pricing section is disabled on home page
        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);

        // But dedicated pricing page is accessible
        $pricingResponse = $this->get('/fiyatlandirma');
        $pricingResponse->assertStatus(200);
        $pricingResponse->assertSee('Standart Plan');
        $pricingResponse->assertSee('$50');
    }

    public function test_demo_form_stores_lead_and_redirects_back(): void
    {
        $response = $this->post('/demo', [
            'name' => 'Ahmet Yılmaz',
            'company' => 'Lojistik A.Ş.',
            'email' => 'ahmet@lojistik.com',
            'phone' => '05469715249',
            'message' => 'Satış Ekibi: 4-10 kişi',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('leads', [
            'name' => 'Ahmet Yılmaz',
            'email' => 'ahmet@lojistik.com',
            'company' => 'Lojistik A.Ş.',
            'source' => 'demo',
        ]);
    }

    public function test_invalid_email_is_rejected(): void
    {
        $response = $this->post('/demo', [
            'name' => 'Geçersiz Kullanıcı',
            'email' => 'not-an-email',
            'phone' => '12345',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertEquals(0, Lead::where('name', 'Geçersiz Kullanıcı')->count());
    }
}
