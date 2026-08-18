<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_title' => 'Quotarix',
            'site_tagline' => 'Forwarder Satış Ekibiniz İçin CRM — Müşteriniz Şirkette Kalsın',
            'whatsapp' => '+905469715249',
            'whatsapp_text' => 'Merhaba, Quotarix hakkında bilgi almak istiyorum.',
            'app_url' => 'https://app.quotarix.com',
            'contact_email' => 'info@quotarix.com',
            'contact_phone' => '+90 546 971 52 49',
            'contact_address' => 'İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent',
            'company_title' => 'Pekvera Yazılım Teknoloji A.Ş.',
            'tax_info' => 'Menderes V.D. – 7280891746',
            'ga4_id' => '',
            'social_linkedin' => '#',
            'social_instagram' => '#',
            'social_twitter' => '#',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
