<?php

namespace Tests\Feature;

use Database\Seeders\ContentSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_is_accessible(): void
    {
        $this->seed(SectionSeeder::class);
        $this->seed(SettingSeeder::class);
        $this->seed(ContentSeeder::class);

        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
    }
}
