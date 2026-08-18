@extends('layouts.app')

@php
    $title = $feature->title;
    $metaTitle = $feature->meta_title ?: $feature->title . ' | Quotarix Forwarder CRM';
    $metaDescription = $feature->meta_description ?: $feature->summary;
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="{{ route('features') }}" class="text-teal text-decoration-none">Özellikler</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $feature->title }}</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center gap-3 mb-2 flex-wrap">
            <div class="feature-icon mb-0" style="width: 52px; height: 52px; font-size: 24px;">
                <i class="bi {{ $feature->icon ?: 'bi-check2-circle' }}"></i>
            </div>
            <div>
                <h1 class="fw-extrabold text-navy display-6 mb-0">{{ $feature->title }}</h1>
            </div>
            @if($feature->badge)
                <span class="badge bg-amber text-dark px-3 py-2 fw-bold ms-auto" style="background: rgba(245,158,11,0.15) !important; color: #b45309 !important; border-radius: 100px; font-size: 14px;">
                    <i class="bi bi-clock-history me-1"></i> Yakında Eklenecek
                </span>
            @endif
        </div>
        <p class="text-secondary fs-5 mt-3 max-w-800">{{ $feature->summary }}</p>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                @if($feature->badge)
                    <div class="alert alert-warning p-4 mb-4" style="border-radius: 16px; background: rgba(245,158,11,0.08); border: 1px solid rgba(245,158,11,0.25);">
                        <h5 class="fw-bold text-dark"><i class="bi bi-info-circle-fill text-amber me-2"></i> Bu özellik geliştirme yol haritamızdadır</h5>
                        <p class="mb-0 text-secondary">Quotarix ekibi bu modülü çok yakında kullanıma sunmak üzere çalışmaktadır. Çıktığında ilk haberdar olmak için demo talebi oluşturabilirsiniz.</p>
                    </div>
                @endif

                <div class="content-body" style="font-size: 16px; line-height: 1.8; color: #334155;">
                    {!! $feature->body !!}
                </div>

                <div class="mt-5 p-4 p-md-5" style="background: linear-gradient(135deg, var(--navy), var(--navy-light)); border-radius: 20px; color: #fff;">
                    <h4 class="fw-bold text-white mb-2">Bu Özelliği Canlı Görün</h4>
                    <p class="text-white-50 mb-4">Ekibinizin iş akışına nasıl entegre olacağını 15 dakikalık ücretsiz online demoda gösterelim.</p>
                    <a href="{{ route('demo') }}" class="btn btn-hero">
                        <i class="bi bi-rocket-takeoff me-2"></i> Ücretsiz Demo Ayarla
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div class="card p-4 border-0 shadow-sm mb-4" style="border-radius: 20px; background: #fff;">
                        <h5 class="fw-bold text-navy mb-3">Diğer Özellikler</h5>
                        <ul class="list-unstyled mb-0">
                            @foreach($otherFeatures as $of)
                                <li class="mb-3 pb-3 border-bottom border-light">
                                    <a href="{{ route('features.show', $of->slug) }}" class="text-decoration-none d-flex align-items-center justify-content-between text-dark fw-semibold hover-teal">
                                        <span><i class="bi {{ $of->icon ?: 'bi-chevron-right' }} text-teal me-2"></i>{{ $of->title }}</span>
                                        <i class="bi bi-arrow-right text-muted small"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card p-4 border-0 shadow-sm text-center" style="border-radius: 20px; background: var(--light-teal);">
                        <i class="bi bi-whatsapp text-teal fs-1 mb-2"></i>
                        <h6 class="fw-bold text-navy">Hızlı Bilgi Alın</h6>
                        <p class="text-secondary small mb-3">Satış temsilcimizle WhatsApp üzerinden anında sohbet edin.</p>
                        <a href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer" class="btn btn-cta w-100 py-2">
                            WhatsApp ile Sorun
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
