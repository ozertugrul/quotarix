@extends('layouts.app')

@php
    $title = $meta->title ?? 'İletişim';
    $metaTitle = $meta->meta_title ?? 'İletişim — Quotarix';
    $metaDescription = $meta->meta_description ?? 'Quotarix ekibiyle iletişime geçin. Ofis adresi, telefon, e-posta ve destek kanalları.';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">İletişim</li>
            </ol>
        </nav>
        <div class="text-center max-w-700 mx-auto">
            <span class="section-badge">Bize Ulaşın</span>
            <h1 class="fw-extrabold text-navy display-5 mb-3">Bizimle İletişime Geçin</h1>
            <p class="text-secondary fs-5">Quotarix ile ilgili her türlü soru, demo talebi veya kurumsal entegrasyon için buradayız.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="card p-4 p-md-5 border-0 shadow-sm h-100" style="border-radius: 24px; background: #fff;">
                    <h3 class="fw-bold text-navy mb-4">İletişim Bilgileri</h3>

                    <div class="d-flex align-items-start mb-4">
                        <div class="feature-icon me-3 flex-shrink-0" style="width: 48px; height: 48px; font-size: 20px;">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-navy mb-1">Genel Merkez & Ar-Ge</h6>
                            <p class="text-secondary small mb-0">{{ setting('contact_address', 'İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent') }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="feature-icon me-3 flex-shrink-0" style="width: 48px; height: 48px; font-size: 20px;">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-navy mb-1">E-posta</h6>
                            <p class="text-secondary small mb-0">
                                <a href="mailto:{{ setting('contact_email', 'info@quotarix.com') }}" class="text-navy text-decoration-none hover-teal">
                                    {{ setting('contact_email', 'info@quotarix.com') }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="feature-icon me-3 flex-shrink-0" style="width: 48px; height: 48px; font-size: 20px;">
                            <i class="bi bi-phone"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-navy mb-1">Telefon</h6>
                            <p class="text-secondary small mb-0">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+905469715249')) }}" class="text-navy text-decoration-none hover-teal">
                                    {{ setting('contact_phone', '+90 546 971 52 49') }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="feature-icon me-3 flex-shrink-0" style="width: 48px; height: 48px; font-size: 20px;">
                            <i class="bi bi-building"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-navy mb-1">Şirket Ünvanı</h6>
                            <p class="text-secondary small mb-0">{{ setting('company_title', 'Pekvera Yazılım Teknoloji A.Ş.') }}</p>
                            <small class="text-muted">{{ setting('tax_info', 'Menderes V.D. – 7280891746') }}</small>
                        </div>
                    </div>

                    <div class="pt-3 border-top border-light mt-auto">
                        <a href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer" class="btn btn-cta w-100 py-3">
                            <i class="bi bi-whatsapp me-2"></i> WhatsApp'tan Canlı Yazın
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card p-4 p-md-5 border-0 shadow-sm" style="border-radius: 24px; background: #fff;">
                    <h4 class="fw-bold text-navy mb-2">Bize Mesaj Gönderin</h4>
                    <p class="text-secondary small mb-4">Mesajınızı iletin, ekibimiz en kısa sürede sizinle iletişime geçsin.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger p-3 mb-4" style="border-radius: 12px;">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="source" value="contact">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Ad Soyad <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Adınız Soyadınız" required style="border-radius: 10px; padding: 12px 16px;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Şirket Adı</label>
                                <input type="text" name="company" class="form-control" value="{{ old('company') }}" placeholder="Firma Adı" style="border-radius: 10px; padding: 12px 16px;">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">E-posta <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="ornek@sirket.com" required style="border-radius: 10px; padding: 12px 16px;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Telefon Numarası</label>
                                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="05XX XXX XX XX" style="border-radius: 10px; padding: 12px 16px;">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-navy">Mesajınız <span class="text-danger">*</span></label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Quotarix hakkında bilgi almak istediğiniz konular..." required style="border-radius: 10px; padding: 12px 16px;">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-hero w-100 py-3 fw-bold" style="border-radius: 12px; font-size: 16px;">
                            <i class="bi bi-send me-2"></i> Mesajı Gönder
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
