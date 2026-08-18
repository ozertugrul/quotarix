@extends('layouts.app')

@php
    $title = $meta->title ?? 'Blog';
    $metaTitle = $meta->meta_title ?? 'Blog — Quotarix Forwarder CRM';
    $metaDescription = $meta->meta_description ?? 'Freight forwarder ve lojistik satış ekipleri için verimlilik, satış stratejisi ve teknoloji makaleleri.';
@endphp

@section('content')
<div class="py-5 bg-light-teal" style="padding-top: 140px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
        <div class="text-center max-w-700 mx-auto">
            <span class="section-badge">Bilgi Merkezi</span>
            <h1 class="fw-extrabold text-navy display-5 mb-3">Lojistik ve Satış Rehberi</h1>
            <p class="text-secondary fs-5">Forwarder satış ekiplerinin dönüşüm oranlarını artıran stratejiler, sektör trendleri ve teknoloji incelemeleri.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row g-4">
            @forelse($posts as $post)
                <div class="col-lg-4 col-md-6 fade-up">
                    <div class="card h-100 p-4 border-0 shadow-sm d-flex flex-column justify-content-between" style="border-radius: 20px; background: #fff;">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-teal text-white px-3 py-2 fw-semibold" style="background:var(--teal); border-radius:100px; font-size:12px;">
                                    {{ $post->category ?: 'Lojistik' }}
                                </span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : '2026' }}</small>
                            </div>
                            <h4 class="fw-bold mb-3 text-navy" style="font-size: 20px; line-height: 1.4;">
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-navy hover-teal">
                                    {{ $post->title }}
                                </a>
                            </h4>
                            <p class="text-secondary mb-4" style="font-size: 15px; line-height: 1.6;">
                                {{ $post->summary }}
                            </p>
                        </div>
                        <div class="pt-3 border-top border-light d-flex align-items-center justify-content-between">
                            <span class="small text-muted"><i class="bi bi-person me-1"></i> {{ $post->author ?: 'Fatih PEK' }}</span>
                            <a href="{{ route('blog.show', $post->slug) }}" class="fw-bold text-teal text-decoration-none d-inline-flex align-items-center">
                                Oku <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Henüz yayınlanmış bir blog yazısı bulunmamaktadır.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
