@extends('admin.layouts.app')

@section('title', 'Sayfalar & Meta Yönetimi')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-navy mb-1">Sayfalar & Meta Yönetimi</h2>
    <p class="text-secondary small mb-0">7 Yasal sayfa metni ve statik rotaların SEO meta etiketleri.</p>
</div>

<!-- Legal Pages -->
<div class="card border-0 shadow-sm p-3 p-md-4 mb-4 mb-md-5" style="border-radius: 20px; background: #fff;">
    <h5 class="fw-bold text-navy mb-3"><i class="bi bi-shield-check text-teal me-2"></i> Yasal Metin Sayfaları</h5>
    
    <!-- Desktop Table View (>= 768px) -->
    <div class="desktop-only-table table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th>SAYFA BAŞLIĞI</th>
                    <th>URL SLUG</th>
                    <th>META BAŞLIK</th>
                    <th>DURUM</th>
                    <th class="text-end" style="width: 120px;">İŞLEM</th>
                </tr>
            </thead>
            <tbody>
                @foreach($legalPages as $page)
                    <tr>
                        <td>
                            <div class="fw-bold text-navy">{{ $page->title }}</div>
                            <small class="text-muted"><code>/{{ $page->slug }}</code></small>
                        </td>
                        <td>
                            <span class="badge bg-light text-secondary border font-monospace">/{{ $page->slug }}</span>
                        </td>
                        <td class="small text-secondary">
                            {{ $page->meta_title ?: $page->title }}
                        </td>
                        <td>
                            @if($page->is_active)
                                <span class="badge bg-light text-success border">Yayında</span>
                            @else
                                <span class="badge bg-light text-muted border">Pasif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-outline-dark" style="border-radius: 8px;">
                                <i class="bi bi-pencil me-1"></i> Düzenle
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Mobile Cards View (< 768px) -->
    <div class="mobile-only-cards">
        @foreach($legalPages as $page)
            <div class="card border border-light-subtle rounded-3 p-3 mb-3 shadow-none bg-light bg-opacity-25">
                <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                    <div>
                        <div class="fw-bold text-navy fs-6">{{ $page->title }}</div>
                        <span class="badge bg-light text-secondary border font-monospace small mt-1">/{{ $page->slug }}</span>
                    </div>
                    @if($page->is_active)
                        <span class="badge bg-light text-success border">Yayında</span>
                    @else
                        <span class="badge bg-light text-muted border">Pasif</span>
                    @endif
                </div>

                <div class="d-flex justify-content-end mt-2 pt-2 border-top">
                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-outline-dark px-3" style="border-radius: 8px;">
                        <i class="bi bi-pencil me-1"></i> Düzenle
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Meta Records for Static Routes -->
<div class="card border-0 shadow-sm p-3 p-md-4" style="border-radius: 20px; background: #fff;">
    <h5 class="fw-bold text-navy mb-3"><i class="bi bi-search text-teal me-2"></i> Statik Rota SEO Meta Kayıtları</h5>
    <p class="text-secondary small mb-3">Ana sayfa, özellikler, blog, fiyatlandırma vb. rotaların arama motoru başlık ve açıklamaları.</p>
    
    <!-- Desktop Table View (>= 768px) -->
    <div class="desktop-only-table table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th>ROTA / SAYFA</th>
                    <th>ANAHTAR (KEY)</th>
                    <th>META BAŞLIK</th>
                    <th>META AÇIKLAMA</th>
                    <th class="text-end" style="width: 120px;">İŞLEM</th>
                </tr>
            </thead>
            <tbody>
                @foreach($metaPages as $page)
                    <tr>
                        <td>
                            <div class="fw-bold text-navy">{{ $page->title }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-secondary border font-monospace">{{ $page->key }}</span>
                        </td>
                        <td class="small text-navy fw-semibold">
                            {{ $page->meta_title ?: '—' }}
                        </td>
                        <td class="small text-secondary" style="max-width: 320px;">
                            {{ \Illuminate\Support\Str::limit($page->meta_description, 90) ?: '—' }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-outline-dark" style="border-radius: 8px;">
                                <i class="bi bi-pencil me-1"></i> Düzenle
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Mobile Cards View (< 768px) -->
    <div class="mobile-only-cards">
        @foreach($metaPages as $page)
            <div class="card border border-light-subtle rounded-3 p-3 mb-3 shadow-none bg-light bg-opacity-25">
                <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                    <div>
                        <div class="fw-bold text-navy fs-6">{{ $page->title }}</div>
                        <span class="badge bg-light text-secondary border font-monospace small mt-1">{{ $page->key }}</span>
                    </div>
                </div>

                <div class="small text-secondary mb-2">
                    <strong>Başlık:</strong> {{ $page->meta_title ?: '—' }}
                </div>

                <div class="d-flex justify-content-end mt-2 pt-2 border-top">
                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-outline-dark px-3" style="border-radius: 8px;">
                        <i class="bi bi-pencil me-1"></i> Düzenle
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
