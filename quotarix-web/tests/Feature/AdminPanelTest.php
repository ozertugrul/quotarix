<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Lead;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Video;
use Database\Seeders\AdminSeeder;
use Database\Seeders\ContentSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected Admin $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AdminSeeder::class);
        $this->seed(SectionSeeder::class);
        $this->seed(SettingSeeder::class);
        $this->seed(ContentSeeder::class);

        $this->admin = Admin::first();
    }

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');

        $response = $this->get('/admin/sections');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'fatih@pekvera.com',
            'password' => 'Pekvera2026!',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($this->admin, 'admin');
    }

    public function test_admin_login_rate_limiting_after_five_attempts(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/admin/login', [
                'email' => 'wrong@pekvera.com',
                'password' => 'wrongpassword',
            ]);
            $response->assertSessionHasErrors('email');
        }

        // 6th attempt should trigger throttle message
        $response = $this->post('/admin/login', [
            'email' => 'wrong@pekvera.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertTrue(str_contains(session('errors')->first('email'), 'Çok fazla hatalı giriş denemesi'));
    }

    public function test_admin_can_toggle_section_via_ajax(): void
    {
        $section = Section::where('key', 'pricing')->first();
        $initialState = $section->is_active;

        $response = $this->actingAs($this->admin, 'admin')
            ->postJson("/admin/sections/{$section->id}/toggle");

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'is_active' => !$initialState,
        ]);

        $this->assertDatabaseHas('sections', [
            'id' => $section->id,
            'is_active' => !$initialState,
        ]);
    }

    public function test_admin_can_toggle_single_testimonial(): void
    {
        $testimonial = Testimonial::first();
        $initialState = $testimonial->is_active;

        $response = $this->actingAs($this->admin, 'admin')
            ->postJson("/admin/testimonials/{$testimonial->id}/toggle");

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'is_active' => !$initialState,
        ]);

        $this->assertDatabaseHas('testimonials', [
            'id' => $testimonial->id,
            'is_active' => !$initialState,
        ]);
    }

    public function test_admin_can_crud_features(): void
    {
        // 1. Create Feature
        $createRes = $this->actingAs($this->admin, 'admin')
            ->post('/admin/features', [
                'title' => 'Test Özellik Başlığı',
                'slug' => 'test-ozellik-basligi',
                'icon' => 'bi-star',
                'summary' => 'Test özellik özeti',
                'body' => '<p>Test detay</p>',
                'badge' => 'yakinda',
                'is_active' => 1,
            ]);

        $createRes->assertRedirect('/admin/features');
        $this->assertDatabaseHas('features', [
            'slug' => 'test-ozellik-basligi',
            'badge' => 'yakinda',
        ]);

        $feature = Feature::where('slug', 'test-ozellik-basligi')->first();

        // 2. Update Feature
        $updateRes = $this->actingAs($this->admin, 'admin')
            ->put("/admin/features/{$feature->id}", [
                'title' => 'Güncellenmiş Özellik',
                'slug' => 'test-ozellik-basligi',
                'icon' => 'bi-check',
                'summary' => 'Güncel özet',
                'badge' => '', // Removing badge moves it to main features
                'is_active' => 1,
            ]);

        $updateRes->assertRedirect('/admin/features');
        $this->assertDatabaseHas('features', [
            'id' => $feature->id,
            'title' => 'Güncellenmiş Özellik',
            'badge' => null,
        ]);

        // 3. Delete Feature
        $deleteRes = $this->actingAs($this->admin, 'admin')
            ->delete("/admin/features/{$feature->id}");

        $deleteRes->assertRedirect('/admin/features');
        $this->assertDatabaseMissing('features', ['id' => $feature->id]);
    }

    public function test_admin_can_crud_plans(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->post('/admin/plans', [
                'name' => 'Kurumsal Özel Paket',
                'price' => 150.00,
                'currency' => 'EUR',
                'period' => 'yıl',
                'features_raw' => "Özellik 1\nÖzellik 2\nÖzellik 3",
                'is_featured' => 1,
                'is_active' => 1,
            ]);

        $response->assertRedirect('/admin/plans');
        $this->assertDatabaseHas('plans', [
            'name' => 'Kurumsal Özel Paket',
            'currency' => 'EUR',
        ]);

        $plan = Plan::where('name', 'Kurumsal Özel Paket')->first();
        $this->assertCount(3, $plan->features_list);
    }

    public function test_lead_csv_export_returns_utf8_bom(): void
    {
        Lead::create([
            'source' => 'demo',
            'name' => 'Şükrü Çelik Öztürk',
            'company' => 'İzmir Lojistik A.Ş.',
            'email' => 'sukru@izmirlojistik.com',
            'phone' => '05441234567',
            'message' => 'Hızlı teklif modülünü test etmek istiyoruz.',
            'ip' => '127.0.0.1',
        ]);

        $response = $this->actingAs($this->admin, 'admin')->get('/admin/leads/export');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');

        $content = $response->streamedContent();
        // Check for UTF-8 BOM (\xEF\xBB\xBF)
        $this->assertStringStartsWith(chr(0xEF) . chr(0xBB) . chr(0xBF), $content);
        $this->assertStringContainsString('Şükrü Çelik Öztürk', $content);
        $this->assertStringContainsString('İzmir Lojistik A.Ş.', $content);
    }

    public function test_admin_settings_update(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->post('/admin/settings', [
                'whatsapp' => '905551112233',
                'whatsapp_text' => 'Quotarix demo istiyorum.',
                'app_url' => 'https://app.quotarix.com',
                'contact_email' => 'destek@quotarix.com',
                'ga4_id' => 'G-ABC123XYZ',
            ]);

        $response->assertRedirect('/admin/settings');
        $this->assertEquals('905551112233', setting('whatsapp'));
        $this->assertEquals('G-ABC123XYZ', setting('ga4_id'));
    }
}
