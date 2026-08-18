<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['key' => 'hero', 'is_active' => true, 'sort_order' => 1],
            ['key' => 'problem', 'is_active' => true, 'sort_order' => 2],
            ['key' => 'features', 'is_active' => true, 'sort_order' => 3],
            ['key' => 'ocr', 'is_active' => true, 'sort_order' => 4],
            ['key' => 'steps', 'is_active' => true, 'sort_order' => 5],
            ['key' => 'manager', 'is_active' => true, 'sort_order' => 6],
            ['key' => 'why', 'is_active' => true, 'sort_order' => 7],
            ['key' => 'roadmap', 'is_active' => true, 'sort_order' => 8],
            ['key' => 'pricing', 'is_active' => false, 'sort_order' => 9],
            ['key' => 'testimonials', 'is_active' => false, 'sort_order' => 10],
            ['key' => 'video', 'is_active' => false, 'sort_order' => 11],
            ['key' => 'blog', 'is_active' => true, 'sort_order' => 12],
            ['key' => 'band', 'is_active' => true, 'sort_order' => 13],
            ['key' => 'faq', 'is_active' => true, 'sort_order' => 14],
            ['key' => 'cta', 'is_active' => true, 'sort_order' => 15],
        ];

        foreach ($sections as $section) {
            Section::updateOrCreate(
                ['key' => $section['key']],
                $section
            );
        }
    }
}
