@extends('layouts.app')

@php
    $title = $meta->title ?? 'Fiyatlandırma';
    $metaTitle = $meta->meta_title ?? 'Fiyatlandırma — Quotarix Forwarder CRM';
    $metaDescription = $meta->meta_description ?? 'Şeffaf ve esnek fiyatlandırma paketleri. Satış ekibinizin büyüklüğüne göre ölçekleyin.';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fiyatlandırma</li>
            </ol>
        </nav>
        <div class="text-center max-w-700 mx-auto">
            <span class="section-badge">Şeffaf Fiyatlar</span>
            <h1 class="fw-extrabold text-navy display-5 mb-3">İhtiyacınıza Uygun Esnek Paketler</h1>
            <p class="text-secondary fs-5">Kurulum ücreti yok, gizli maliyet yok. 14 gün boyunca tüm özellikleri ücretsiz test edin.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row g-4 justify-content-center mb-5">
            @foreach($plans as $plan)
                <div class="col-lg-5 col-md-6 fade-up">
                    <div class="pricing-card h-100 d-flex flex-column {{ $plan->is_featured ? 'featured' : '' }}" style="border-radius: 24px; padding: 40px; background: #fff; border: {{ $plan->is_featured ? '2px solid var(--teal)' : '1px solid var(--border)' }}; box-shadow: {{ $plan->is_featured ? '0 20px 50px rgba(14,165,165,0.15)' : '0 10px 30px rgba(0,0,0,0.03)' }}; position: relative;">
                        @if($plan->is_featured)
                            <div class="position-absolute top-0 end-0 mt-4 me-4">
                                <span class="badge bg-teal text-white px-3 py-2 fw-bold" style="background: var(--teal); border-radius: 100px; font-size: 12px;">En Popüler</span>
                            </div>
                        @endif
                        <h3 class="fw-bold mb-2 text-navy">{{ $plan->name }}</h3>
                        <div class="my-4">
                            @if($plan->price)
                                <span style="font-size: 48px; font-weight: 800; color: var(--navy);">${{ number_format($plan->price, 0) }}</span>
                                <span class="text-muted" style="font-size: 15px;">/ {{ $plan->period }}</span>
                            @else
                                <span style="font-size: 38px; font-weight: 800; color: var(--navy);">Özel Çözüm</span>
                                <span class="text-muted d-block" style="font-size: 14px;">10+ kullanıcı & kurumsal entegrasyon</span>
                            @endif
                        </div>
                        <ul class="list-unstyled my-4 flex-grow-1">
                            @if(is_array($plan->features_list))
                                @foreach($plan->features_list as $feat)
                                    <li class="d-flex align-items-center mb-3 text-secondary" style="font-size: 15px;">
                                        <i class="bi bi-check-circle-fill text-teal me-3 fs-5 flex-shrink-0"></i>
                                        <span>{{ $feat }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="pt-4 border-top border-light">
                            <a href="{{ route('demo') }}" class="btn {{ $plan->is_featured ? 'btn-cta' : 'btn-outline-dark' }} w-100 py-3 fw-bold" style="border-radius: 12px; font-size: 16px;">
                                {{ $plan->price ? '14 Gün Ücretsiz Deneyin' : 'Kurumsal Teklif İsteyin' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($faqs->isNotEmpty())
            <div class="max-w-800 mx-auto mt-5 pt-4">
                <h4 class="fw-bold text-navy text-center mb-4">Fiyatlandırma Hakkında Merak Edilenler</h4>
                <div class="accordion" id="pricingFaqAccordion">
                    @foreach($faqs as $i => $faq)
                        <div class="accordion-item mb-3" style="border:1px solid var(--border); border-radius:14px; overflow:hidden;">
                            <h2 class="accordion-header" id="headingPricing{{ $faq->id }}">
                                <button class="accordion-button {{ $i !== 0 ? 'collapsed' : '' }} fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePricing{{ $faq->id }}" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="collapsePricing{{ $faq->id }}" style="font-size:16px; padding:18px 22px; color:var(--navy);">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapsePricing{{ $faq->id }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" aria-labelledby="headingPricing{{ $faq->id }}" data-bs-parent="#pricingFaqAccordion">
                                <div class="accordion-body text-secondary" style="padding:0 22px 18px 22px; font-size:15px; line-height:1.7;">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
