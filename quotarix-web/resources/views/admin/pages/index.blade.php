@extends('admin.layouts.app')

@section('title', 'Sayfalar & Meta Yönetimi')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-navy mb-1">Sayfalar & Meta Yönetimi</h2>
    <p class="text-secondary small mb-0">7 Yasal sayfa metni ve statik rotaların SEO meta etiketleri.</p>
</div>

<!-- Legal Pages -->
<div class="card border-0 shadow-sm p-4 mb-5" style="border-radius: 20px; background: #fff;">
    <h5 class="fw-bold text-navy mb-3"><i class="bi bi-shield-check text-teal me-2"></i> Yasal Metin Sayfaları</h5>
    <div class="table-responsive">
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
                            <span class="badge bg-light text-navy border font-monospace">/{{ $page->slug }}</span>
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
</div>

<!-- Meta Records for Static Routes -->
<div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
    <h5 class="fw-bold text-navy mb-3"><i class="bi bi-search text-teal me-2"></i> Statik Rota SEO Meta Kayıtları</h5>
    <p class="text-secondary small mb-3">Ana sayfa, özellikler, blog, fiyatlandırma vb. rotaların arama motoru başlık ve açıklamaları.</p>
    <div class="table-responsive">
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
</div>
@endsection
