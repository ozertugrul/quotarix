@extends('layouts.app')

@php
    $title = $meta->title ?? 'Sıkça Sorulan Sorular';
    $metaTitle = $meta->meta_title ?? 'Sıkça Sorulan Sorular — Quotarix';
    $metaDescription = $meta->meta_description ?? 'Quotarix hakkında en çok merak edilen sorular ve detaylı yanıtları.';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sıkça Sorulan Sorular</li>
            </ol>
        </nav>
        <div class="text-center max-w-700 mx-auto">
            <span class="section-badge">Yardım & Destek</span>
            <h1 class="fw-extrabold text-navy display-5 mb-3">Sıkça Sorulan Sorular</h1>
            <p class="text-secondary fs-5">Quotarix özellikleri, kurulum süreci, veri güvenliği ve abonelik şartları hakkında tüm yanıtlar.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion" id="faqAccordionPage">
                    @foreach($faqs as $idx => $faq)
                        <div class="accordion-item mb-3" style="border:1px solid var(--border); border-radius:16px; overflow:hidden;">
                            <h2 class="accordion-header" id="headingPage{{ $faq->id }}">
                                <button class="accordion-button {{ $idx !== 0 ? 'collapsed' : '' }} fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePage{{ $faq->id }}" aria-expanded="{{ $idx === 0 ? 'true' : 'false' }}" aria-controls="collapsePage{{ $faq->id }}" style="font-size:17px; padding:22px 28px; color:var(--navy);">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapsePage{{ $faq->id }}" class="accordion-collapse collapse {{ $idx === 0 ? 'show' : '' }}" aria-labelledby="headingPage{{ $faq->id }}" data-bs-parent="#faqAccordionPage">
                                <div class="accordion-body text-secondary" style="padding:0 28px 24px 28px; font-size:16px; line-height:1.8;">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 p-5 text-center" style="background: linear-gradient(135deg, var(--navy), var(--navy-light)); border-radius: 24px; color: #fff;">
                    <h4 class="fw-bold text-white mb-2">Başka Bir Sorunuz mu Var?</h4>
                    <p class="text-white-50 mb-4">Destek ekibimiz tüm sektörel sorularınızı yanıtlamaktan memnuniyet duyar.</p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="{{ route('contact') }}" class="btn btn-hero">
                            <i class="bi bi-envelope me-2"></i> İletişime Geçin
                        </a>
                        <a href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light px-4 py-3 fw-bold" style="border-radius: 12px;">
                            <i class="bi bi-whatsapp text-teal-light me-2"></i> WhatsApp Canlı Destek
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    @foreach($faqs as $i => $faq)
    {
      "@type": "Question",
      "name": "{{ addslashes($faq->question) }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ addslashes($faq->answer) }}"
      }
    }{{ $i < count($faqs) - 1 ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endpush
