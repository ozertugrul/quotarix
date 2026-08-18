<?php

use App\Models\Section;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('active_sections')) {
    /**
     * Get active section keys ordered by sort_order with cache.
     *
     * @return array<string>
     */
    function active_sections(): array
    {
        return Cache::rememberForever('site_active_sections', function () {
            return Section::active()->pluck('key')->toArray();
        });
    }
}

if (!function_exists('is_section_active')) {
    /**
     * Check if a section is active.
     */
    function is_section_active(string $key): bool
    {
        return in_array($key, active_sections(), true);
    }
}

if (!function_exists('setting')) {
    /**
     * Get site setting value by key with cache.
     */
    function setting(string $key, ?string $default = null): ?string
    {
        $settings = Cache::rememberForever('site_settings', function () {
            return Setting::pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }
}

if (!function_exists('whatsapp_link')) {
    /**
     * Generate dynamic WhatsApp chat link from settings.
     */
    function whatsapp_link(?string $customText = null): string
    {
        $number = preg_replace('/[^0-9]/', '', setting('whatsapp', '905469715249'));
        $text = $customText ?: setting('whatsapp_text', 'Merhaba, Quotarix hakkında bilgi almak istiyorum.');
        return 'https://wa.me/' . $number . '?text=' . urlencode($text);
    }
}
