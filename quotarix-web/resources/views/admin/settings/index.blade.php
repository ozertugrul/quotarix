@extends('admin.layouts.app')

@section('title', 'Site Ayarları')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-navy mb-1">Site Genel Ayarları</h2>
    <p class="text-secondary small mb-0">İletişim bilgileri, WhatsApp entegrasyonu, GA4 ID ve kurumsal bilgiler.</p>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    <div class="row g-4">
        <!-- WhatsApp & App URL -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3"><i class="bi bi-whatsapp text-success me-2"></i> WhatsApp & Giriş Rotaları</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">WhatsApp Numarası (Ülke kodu ile)</label>
                    <input type="text" name="whatsapp" class="form-control font-monospace" value="{{ old('whatsapp', $settings['whatsapp'] ?? '905469715249') }}" placeholder="905469715249" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">WhatsApp Varsayılan Ön Yazısı</label>
                    <textarea name="whatsapp_text" class="form-control" rows="3" style="border-radius: 10px; padding: 11px 14px;">{{ old('whatsapp_text', $settings['whatsapp_text'] ?? 'Merhaba, Quotarix hakkında bilgi almak istiyorum.') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">SaaS Giriş Butonu URL'i</label>
                    <input type="url" name="app_url" class="form-control font-monospace" value="{{ old('app_url', $settings['app_url'] ?? 'https://app.quotarix.com') }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Google Analytics 4 Measurement ID</label>
                    <input type="text" name="ga4_id" class="form-control font-monospace" value="{{ old('ga4_id', $settings['ga4_id'] ?? 'G-XXXXXXXXXX') }}" placeholder="G-XXXXXXXXXX" style="border-radius: 10px; padding: 11px 14px;">
                    <small class="text-muted">KVKK çerez onayından sonra aktifleşir.</small>
                </div>
            </div>
        </div>

        <!-- İletişim & Kurumsal -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3"><i class="bi bi-building text-teal me-2"></i> İletişim & Kurumsal Bilgiler</h5>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-navy">İletişim E-posta</label>
                        <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email'] ?? 'info@quotarix.com') }}" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-navy">Telefon Numarası</label>
                        <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings['contact_phone'] ?? '+90 546 971 52 49') }}" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Şirket Resmi Ünvanı</label>
                    <input type="text" name="company_title" class="form-control" value="{{ old('company_title', $settings['company_title'] ?? 'Pekvera Yazılım Teknoloji A.Ş.') }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Ofis / Teknokent Adresi</label>
                    <textarea name="contact_address" class="form-control" rows="2" style="border-radius: 10px; padding: 11px 14px;">{{ old('contact_address', $settings['contact_address'] ?? 'İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Vergi Dairesi / No</label>
                    <input type="text" name="tax_info" class="form-control" value="{{ old('tax_info', $settings['tax_info'] ?? 'Menderes V.D. / 7230872658') }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>
            </div>
        </div>

        <!-- Sosyal Medya -->
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3"><i class="bi bi-share text-teal me-2"></i> Sosyal Medya Profilleri</h5>
                
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy"><i class="bi bi-linkedin me-1 text-primary"></i> LinkedIn URL</label>
                        <input type="url" name="social_linkedin" class="form-control font-monospace" value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}" placeholder="https://linkedin.com/company/quotarix" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy"><i class="bi bi-instagram me-1 text-danger"></i> Instagram URL</label>
                        <input type="url" name="social_instagram" class="form-control font-monospace" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" placeholder="https://instagram.com/quotarix" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy"><i class="bi bi-twitter-x me-1 text-dark"></i> Twitter / X URL</label>
                        <input type="url" name="social_twitter" class="form-control font-monospace" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" placeholder="https://twitter.com/quotarix" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end">
                    <button type="submit" class="btn btn-teal px-5 py-3 fw-bold" style="border-radius: 12px;">
                        <i class="bi bi-check-lg me-1"></i> Tüm Ayarları Kaydet
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
