@extends('layouts.app')

@php
    $title = $meta->title ?? 'Özellikler';
    $metaTitle = $meta->meta_title ?? 'Özellikler — Quotarix Forwarder CRM';
    $metaDescription = $meta->meta_description ?? 'Freight forwarder ve lojistik satış ekipleri için Quotarix özelliklerini keşfedin.';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Özellikler</li>
            </ol>
        </nav>
        <div class="text-center max-w-700 mx-auto">
            <span class="section-badge">Tüm Modüller</span>
            <h1 class="fw-extrabold text-navy display-5 mb-3">Freight Forwarder Satışına Özel Tasarlanmış Güçlü Araçlar</h1>
            <p class="text-secondary fs-5">Teklif hazırlamadan müşteri ilişkilerine, yapay zeka kartvizit taramadan yönetici dashboard'una kadar tüm ihtiyaçlarınız tek çatıda.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row g-4">
            @foreach($features as $feature)
                <div class="col-lg-6 fade-up">
                    <div class="card h-100 p-4 p-md-5 border-0 shadow-sm d-flex flex-column justify-content-between" style="border-radius: 24px; background: #fff;">
                        <div>
                            <div class="feature-icon mb-4" style="width: 60px; height: 60px; font-size: 26px;">
                                <i class="bi {{ $feature->icon ?: 'bi-check2-circle' }}"></i>
                            </div>
                            <h3 class="fw-bold mb-3 text-navy">{{ $feature->title }}</h3>
                            <p class="text-secondary mb-4" style="font-size: 16px; line-height: 1.7;">
                                {{ $feature->summary }}
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('features.show', $feature->slug) }}" class="btn btn-outline-dark px-4 py-2 fw-semibold" style="border-radius: 10px;">
                                Detayları ve Özellikleri İncele <i class="bi bi-arrow-right ms-2 text-teal"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($roadmapFeatures->isNotEmpty())
            <div class="mt-5 pt-5 text-center">
                <span class="section-badge">Gelecek Vizyonu</span>
                <h3 class="fw-bold text-navy mb-4">Geliştirme Aşamasındaki Özellikler</h3>
                <div class="row g-4 text-start">
                    @foreach($roadmapFeatures as $rf)
                        <div class="col-md-6">
                            <div class="card p-4 border-0 shadow-sm h-100" style="border-radius: 20px; background: #fff;">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="fw-bold mb-0 text-navy">{{ $rf->title }}</h5>
                                    <span class="badge bg-amber text-dark px-3 py-2 fw-bold" style="background: rgba(245,158,11,0.15) !important; color: #b45309 !important; border-radius: 100px;">
                                        Yakında
                                    </span>
                                </div>
                                <p class="text-secondary mb-3">{{ $rf->summary }}</p>
                                <a href="{{ route('roadmap') }}" class="text-teal fw-bold text-decoration-none small">
                                    Yol Haritasında Gör <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-5 p-5 text-center fade-up" style="background: linear-gradient(135deg, var(--navy), var(--navy-light)); border-radius: 24px; color: #fff;">
            <h3 class="fw-bold text-white mb-3">Quotarix'i Kendi Ekibinizde Deneyin</h3>
            <p class="text-white-50 max-w-600 mx-auto mb-4">15 dakikalık canlı demo ile satış süreçlerinizin nasıl hızlanacağını birlikte görelim.</p>
            <a href="{{ route('demo') }}" class="btn btn-hero">
                <i class="bi bi-rocket-takeoff me-2"></i> Ücretsiz Demo İste
            </a>
        </div>
    </div>
</div>
@endsection
