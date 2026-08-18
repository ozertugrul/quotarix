@extends('admin.layouts.app')

@section('title', 'Sayfa Düzenle')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.pages.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; Sayfalar Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Sayfa Düzenle: {{ $page->title }}</h2>
</div>

<form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Sayfa & Rota Bilgisi</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Sayfa / Rota Başlığı <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">URL Slug <span class="text-danger">*</span></label>
                    
                    <div class="alert alert-warning p-3 mb-2 small d-flex align-items-center" style="border-radius: 10px;">
                        <i class="bi bi-exclamation-triangle-fill fs-5 me-2 text-warning"></i>
                        <div><strong>Dikkat:</strong> Canlı sitede URL slug değiştirmek mevcut indexlenmiş linklerin kırılmasına yol açabilir. Zorunlu olmadıkça değiştirmeyiniz.</div>
                    </div>

                    <input type="text" name="slug" class="form-control font-monospace" value="{{ old('slug', $page->slug) }}" required style="border-radius: 10px; padding: 11px 14px;">
                </div>

                @if(!is_null($page->body))
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-navy">Yasal Metin Gövdesi (HTML / Zengin İçerik)</label>
                        <textarea name="body" class="form-control font-monospace" rows="16" style="border-radius: 10px; padding: 11px 14px;">{{ old('body', $page->body) }}</textarea>
                    </div>
                @endif
            </div>

            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">SEO Meta Bilgileri</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Meta Başlık (Tarayıcı & Google Başlığı)</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Meta Açıklama (Google Arama Özeti)</label>
                    <textarea name="meta_description" class="form-control" rows="3" style="border-radius: 10px; padding: 11px 14px;">{{ old('meta_description', $page->meta_description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Sosyal Medya & Durum</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Özel OG Görseli (1200×630)</label>
                    @if($page->og_image)
                        <div class="mb-2">
                            <img src="{{ asset($page->og_image) }}" alt="OG Image" class="img-thumbnail" style="max-height: 80px;">
                        </div>
                    @endif
                    <input type="file" name="og_image_file" class="form-control mb-2" style="border-radius: 10px; padding: 9px 14px;">
                    <input type="text" name="og_image" class="form-control font-monospace small" value="{{ old('og_image', $page->og_image) }}" placeholder="veya dosya yolu girin">
                </div>

                <div class="form-check form-switch mb-4 fs-5">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" {{ old('is_active', $page->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fs-6 fw-bold text-navy ms-2" for="isActive">Yayında</label>
                </div>

                <button type="submit" class="btn btn-teal w-100 py-3 fw-bold">
                    <i class="bi bi-check-lg me-1"></i> Sayfayı Kaydet
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
