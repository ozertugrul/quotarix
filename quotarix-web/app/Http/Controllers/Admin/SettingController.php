<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $fields = [
            'site_title',
            'site_tagline',
            'whatsapp',
            'whatsapp_text',
            'app_url',
            'contact_email',
            'contact_phone',
            'contact_address',
            'company_title',
            'tax_info',
            'ga4_id',
            'social_linkedin',
            'social_instagram',
            'social_twitter',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $request->input($field)]
                );
            }
        }

        Cache::forget('site_settings');

        return redirect()->route('admin.settings.index')->with('success', 'Site ayarları başarıyla güncellendi.');
    }
}
