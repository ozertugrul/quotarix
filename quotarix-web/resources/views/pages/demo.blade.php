@extends('layouts.app')

@php
    $title = $meta->title ?? 'Ücretsiz Demo Talep Edin';
    $metaTitle = $meta->meta_title ?? 'Ücretsiz Demo Talep Edin — Quotarix';
    $metaDescription = $meta->meta_description ?? '15 dakikalık canlı demo ile Quotarix\'in satış süreçlerinizi nasıl hızlandıracağını keşfedin.';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Demo Talebi</li>
            </ol>
        </nav>
        <div class="text-center max-w-700 mx-auto">
            <span class="section-badge">15 Dakikada Canlı Tanışın</span>
            <h1 class="fw-extrabold text-navy display-5 mb-3">Quotarix'i Birlikte İnceleyelim</h1>
            <p class="text-secondary fs-5">Forwarder ekibinizin iş akışına özel hazırlanmış canlı demo oturumu ile sorularınızı yanıtlayalım.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h3 class="fw-bold text-navy mb-4">Demo Oturumunda Neler Göreceksiniz?</h3>
                <div class="d-flex align-items-start mb-4">
                    <div class="feature-icon me-3 flex-shrink-0" style="width: 48px; height: 48px; font-size: 20px;">
                        <i class="bi bi-file-earmark-check"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-navy mb-1">30 Saniyede FCL/LCL Teklifi</h5>
                        <p class="text-secondary mb-0">Excel yerine çoklu dövizli sektörel şablonlarla nasıl anında profesyonel PDF teklif üretildiğini görün.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <div class="feature-icon me-3 flex-shrink-0" style="width: 48px; height: 48px; font-size: 20px;">
                        <i class="bi bi-camera"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-navy mb-1">Yapay Zeka Kartvizit Okuma</h5>
                        <p class="text-secondary mb-0">Fuardan gelen kartvizitlerin mobilde fotoğraflanarak saniyede sisteme nasıl aktarıldığını test edin.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <div class="feature-icon me-3 flex-shrink-0" style="width: 48px; height: 48px; font-size: 20px;">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-navy mb-1">Yönetici Paneli ve Gelir Tahmini</h5>
                        <p class="text-secondary mb-0">Hangi temsilcinin kaç teklif verdiğini ve takipsiz kalan fırsatları nasıl anında yakalayacağınızı görün.</p>
                    </div>
                </div>

                <div class="p-4 mt-4" style="border-radius: 16px; background: var(--light-teal); border: 1px solid rgba(14,165,165,0.2);">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-whatsapp text-teal fs-1"></i>
                        <div>
                            <h6 class="fw-bold text-navy mb-1">Form doldurmak istemiyor musunuz?</h6>
                            <p class="text-secondary small mb-2">WhatsApp üzerinden doğrudan uzmanımızla görüşün.</p>
                            <a href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-cta">
                                WhatsApp'tan Yazın
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card p-4 p-md-5 border-0 shadow-lg" style="border-radius: 24px; background: #fff;">
                    <h4 class="fw-bold text-navy mb-2">Ücretsiz Demo Formu</h4>
                    <p class="text-secondary small mb-4">Formu iletin, 24 saat içinde demo takviminizi birlikte belirleyelim.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger p-3 mb-4" style="border-radius: 12px;">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('demo.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="source" value="demo">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-navy">Ad Soyad <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Adınız Soyadınız" required style="border-radius: 10px; padding: 12px 16px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-navy">Şirket Adı <span class="text-danger">*</span></label>
                            <input type="text" name="company" class="form-control" value="{{ old('company') }}" placeholder="Lojistik / Forwarder Şirketiniz" required style="border-radius: 10px; padding: 12px 16px;">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Kurumsal E-posta <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="ornek@sirket.com" required style="border-radius: 10px; padding: 12px 16px;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Telefon Numarası <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="05XX XXX XX XX" required style="border-radius: 10px; padding: 12px 16px;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-navy">Satış Ekibi Büyüklüğü</label>
                            <select name="message" class="form-select" style="border-radius: 10px; padding: 12px 16px;">
                                <option value="Satış Ekibi: 1-3 kişi">1 - 3 kişi</option>
                                <option value="Satış Ekibi: 4-10 kişi">4 - 10 kişi</option>
                                <option value="Satış Ekibi: 11-25 kişi">11 - 25 kişi</option>
                                <option value="Satış Ekibi: 25+ kişi">25+ kişi</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-cta w-100 py-3 fw-bold mt-3" style="border-radius: 12px; font-size: 16px;">
                            <i class="bi bi-rocket-takeoff me-2"></i> Demo Talep Et
                        </button>
                        <p class="text-center mt-3 mb-0 small text-muted">
                            <i class="bi bi-shield-check text-teal me-1"></i> Verileriniz KVKK standartlarında güvendedir.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
