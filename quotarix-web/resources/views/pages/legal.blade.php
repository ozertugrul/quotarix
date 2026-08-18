@extends('layouts.app')

@php
    $title = $page->title;
    $metaTitle = $page->meta_title ?: $page->title . ' | Quotarix';
    $metaDescription = $page->meta_description;
@endphp

@section('content')
<div class="legal-hero" style="background: linear-gradient(135deg, var(--navy), var(--navy-light)); color: #fff; padding: 130px 0 60px 0;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-teal-light text-decoration-none">Ana Sayfa</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $page->title }}</li>
            </ol>
        </nav>
        <h1 class="fw-extrabold text-white display-6 mb-2">{{ $page->title }}</h1>
        <p class="text-white-50 small mb-0">Son Güncelleme: {{ $page->updated_at ? $page->updated_at->translatedFormat('d F Y') : 'Nisan 2026' }}</p>
    </div>
</div>

<div class="legal-body">
    <div class="container">
        <div class="card border-0 shadow-sm p-4 p-md-5 my-5" style="border-radius: 20px; background: #fff; line-height: 1.8; color: #334155;">
            {!! $page->body !!}
        </div>
    </div>
</div>
@endsection
