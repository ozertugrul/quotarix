@extends('layouts.app')

@php
    $title = $post->title;
    $metaTitle = $post->meta_title ?: $post->title . ' | Quotarix Blog';
    $metaDescription = $post->meta_description ?: $post->summary;
    $ogType = 'article';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog') }}" class="text-teal text-decoration-none">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Str::limit($post->title, 40) }}</li>
            </ol>
        </nav>
        <div class="max-w-800">
            <div class="d-flex align-items-center gap-3 mb-3 flex-wrap">
                <span class="badge bg-teal text-white px-3 py-2 fw-semibold" style="background:var(--teal); border-radius:100px;">
                    {{ $post->category ?: 'Lojistik' }}
                </span>
                <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i> {{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : 'Nisan 2026' }}</span>
                <span class="text-muted small"><i class="bi bi-person me-1"></i> {{ $post->author ?: 'Fatih PEK' }}</span>
            </div>
            <h1 class="fw-extrabold text-navy display-6 mb-3">{{ $post->title }}</h1>
            <p class="text-secondary fs-5">{{ $post->summary }}</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <article class="content-body" style="font-size: 17px; line-height: 1.8; color: #334155;">
                    {!! $post->body !!}
                </article>

                <div class="mt-5 p-4 p-md-5" style="background: linear-gradient(135deg, var(--navy), var(--navy-light)); border-radius: 20px; color: #fff;">
                    <h4 class="fw-bold text-white mb-2">Forwarder Satışınızı Bir Üst Seviyeye Taşıyın</h4>
                    <p class="text-white-50 mb-4">Quotarix ile tekliflerinizi saniyeler içinde hazırlayın, müşterilerinizi şirket hafızasında tutun.</p>
                    <a href="{{ route('demo') }}" class="btn btn-hero">
                        <i class="bi bi-rocket-takeoff me-2"></i> Ücretsiz Demo Başlat
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    @if($relatedPosts->isNotEmpty())
                        <div class="card p-4 border-0 shadow-sm mb-4" style="border-radius: 20px; background: #fff;">
                            <h5 class="fw-bold text-navy mb-3">İlginizi Çekebilecek Diğer Yazılar</h5>
                            <ul class="list-unstyled mb-0">
                                @foreach($relatedPosts as $rp)
                                    <li class="mb-3 pb-3 border-bottom border-light">
                                        <a href="{{ route('blog.show', $rp->slug) }}" class="text-decoration-none text-dark fw-semibold hover-teal d-block">
                                            <span class="d-block mb-1">{{ $rp->title }}</span>
                                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $rp->published_at ? $rp->published_at->translatedFormat('d M Y') : '' }}</small>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card p-4 border-0 shadow-sm text-center" style="border-radius: 20px; background: var(--light-teal);">
                        <i class="bi bi-envelope-paper text-teal fs-1 mb-2"></i>
                        <h6 class="fw-bold text-navy">Satış Ekibinizi Güçlendirin</h6>
                        <p class="text-secondary small mb-3">Quotarix hakkında sorularınız için hemen ekibimizle görüşün.</p>
                        <a href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer" class="btn btn-cta w-100 py-2">
                            WhatsApp Canlı Destek
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
  "@@type": "BlogPosting",
  "headline": "{{ addslashes($post->title) }}",
  "description": "{{ addslashes($post->summary) }}",
  "author": {
    "@@type": "Person",
    "name": "{{ $post->author ?: 'Fatih PEK' }}"
  },
  "datePublished": "{{ $post->published_at ? $post->published_at->toIso8601String() : '' }}",
  "publisher": {
    "@@type": "Organization",
    "name": "{{ config('app.name', 'Quotarix') }}",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('assets/img/hero.png') }}"
    }
  }
}
</script>
@endpush
