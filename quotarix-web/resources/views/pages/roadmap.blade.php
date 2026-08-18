@extends('layouts.app')

@php
    $title = $meta->title ?? 'Yol Haritası';
    $metaTitle = $meta->meta_title ?? 'Yol Haritası — Quotarix Gelecek Özellikler';
    $metaDescription = $meta->meta_description ?? 'Quotarix gelecek vizyonu, geliştirilmekte olan yapay zeka özellikleri ve ürün yol haritası.';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Yol Haritası</li>
            </ol>
        </nav>
        <div class="text-center max-w-700 mx-auto">
            <span class="section-badge">Gelecek Vizyonu</span>
            <h1 class="fw-extrabold text-navy display-5 mb-3">Ürün Yol Haritamız</h1>
            <p class="text-secondary fs-5">Freight forwarder sektörünün değişen ihtiyaçlarına göre Quotarix'i sürekli geliştiriyoruz. İşte üzerinde çalıştığımız en yeni özellikler.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row g-4 mb-5">
            @foreach($roadmapFeatures as $rf)
                <div class="col-lg-6">
                    <div class="card p-4 p-md-5 border-0 shadow-sm h-100 d-flex flex-column justify-content-between" style="border-radius: 24px; background: #fff;">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="feature-icon mb-0" style="width: 56px; height: 56px; font-size: 24px;">
                                    <i class="bi {{ $rf->icon ?: 'bi-stars' }}"></i>
                                </div>
                                <span class="badge bg-amber text-dark px-3 py-2 fw-bold" style="background: rgba(245,158,11,0.15) !important; color: #b45309 !important; border-radius: 100px; font-size: 13px;">
                                    <i class="bi bi-clock-history me-1"></i> Geliştiriliyor
                                </span>
                            </div>
                            <h3 class="fw-bold text-navy mb-3">{{ $rf->title }}</h3>
                            <p class="text-secondary fs-6 mb-4" style="line-height: 1.7;">
                                {{ $rf->summary }}
                            </p>
                        </div>
                        <div class="pt-3 border-top border-light">
                            <span class="text-teal fw-bold small"><i class="bi bi-check2-all me-1"></i> 2026 Q3 - Q4 Planlanan Yayın</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card p-4 p-md-5 border-0 shadow-sm text-center" style="border-radius: 24px; background: linear-gradient(135deg, var(--navy), var(--navy-light)); color: #fff;">
            <div class="max-w-600 mx-auto">
                <i class="bi bi-lightbulb-fill text-amber fs-1 mb-3"></i>
                <h3 class="fw-bold text-white mb-3">Bir Özellik mi Öneriyorsunuz?</h3>
                <p class="text-white-50 mb-4">Lojistik iş akışınızda görmeyi istediğiniz özel bir rapor veya entegrasyon varsa ekibimize iletin, yol haritamıza ekleyelim.</p>
                <a href="{{ route('contact') }}" class="btn btn-hero">
                    <i class="bi bi-chat-left-text me-2"></i> Özellik Önerisinde Bulun
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
