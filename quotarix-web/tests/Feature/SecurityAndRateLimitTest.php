<?php

namespace Tests\Feature;

use App\Models\Lead;
use Database\Seeders\AdminSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityAndRateLimitTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        \Illuminate\Support\Facades\RateLimiter::clear('lead_submission|127.0.0.1');
        $this->seed(AdminSeeder::class);
        $this->seed(SectionSeeder::class);
        $this->seed(SettingSeeder::class);
    }

    public function test_lead_form_rate_limiting_blocks_after_three_attempts(): void
    {
        // 1st attempt: success
        $response1 = $this->post('/demo', [
            'name' => 'Test User',
            'email' => 'test1@example.com',
            'phone' => '05550000001',
            'source' => 'demo',
        ]);
        $response1->assertSessionHas('success');
        $this->assertDatabaseHas('leads', ['email' => 'test1@example.com']);

        // 2nd attempt: success
        $response2 = $this->post('/demo', [
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'phone' => '05550000002',
            'source' => 'demo',
        ]);
        $response2->assertSessionHas('success');

        // 3rd attempt: success
        $response3 = $this->post('/demo', [
            'name' => 'Test User 3',
            'email' => 'test3@example.com',
            'phone' => '05550000003',
            'source' => 'demo',
        ]);
        $response3->assertSessionHas('success');

        // 4th attempt: blocked by rate limiter!
        $response4 = $this->post('/demo', [
            'name' => 'Spammer User',
            'email' => 'spam@example.com',
            'phone' => '05550000004',
            'source' => 'demo',
        ]);
        $response4->assertSessionHasErrors('rate_limit');
        $this->assertDatabaseMissing('leads', ['email' => 'spam@example.com']);
    }

    public function test_lead_form_sanitizes_xss_script_tags(): void
    {
        \Illuminate\Support\Facades\RateLimiter::clear('lead_submission|127.0.0.1');

        $response = $this->post('/iletisim', [
            'name' => '<script>alert("xss")</script>John Doe',
            'company' => '<b>Pekvera</b>',
            'email' => 'JOHN.XSS@EXAMPLE.COM',
            'phone' => '05559998877',
            'message' => '<iframe src="evil.com"></iframe>Hello security!',
            'source' => 'contact',
        ]);

        $response->assertSessionHas('success');

        $lead = Lead::where('email', 'john.xss@example.com')->first();
        $this->assertNotNull($lead);
        $this->assertEquals('John Doe', $lead->name);
        $this->assertEquals('Pekvera', $lead->company);
        $this->assertEquals('Hello security!', $lead->message);
    }
}
