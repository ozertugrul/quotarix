@extends('layouts.app')

@php
    $title = 'Sayfa Bulunamadı (404)';
    $metaTitle = '404 — Sayfa Bulunamadı | Quotarix';
    $metaDescription = 'Aradığınız sayfa taşınmış, silinmiş veya adı değişmiş olabilir.';
@endphp

@section('content')
<div class="d-flex align-items-center justify-content-center text-center py-5" style="min-height: 75vh; padding-top: 150px !important;">
    <div class="container">
        <div class="max-w-600 mx-auto">
            <span class="badge px-3 py-2 mb-3" style="background: rgba(239,68,68,0.1); color: var(--red); border-radius: 100px; font-size: 14px; font-weight: 700;">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> Hata 404
            </span>
            <h1 class="fw-extrabold text-navy display-1 mb-2" style="font-size: 96px; letter-spacing: -2px;">404</h1>
            <h2 class="fw-bold text-navy mb-3">Aradığınız Sayfa Bulunamadı</h2>
            <p class="text-secondary fs-5 mb-5">
                Ulaşmaya çalıştığınız sayfa taşınmış, silinmiş veya yanlış bir bağlantı üzerinden gelmiş olabilirsiniz.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('home') }}" class="btn btn-hero">
                    <i class="bi bi-house-door me-2"></i> Ana Sayfaya Dön
                </a>
                <a href="{{ route('features') }}" class="btn btn-outline-dark px-4 py-3 fw-bold" style="border-radius: 12px;">
                    Özellikleri İncele
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
