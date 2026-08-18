@extends('admin.layouts.app')

@section('title', 'Yeni Özellik Ekle')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.features.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; Özellikler Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Yeni Özellik Ekle</h2>
</div>

<form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Temel Bilgiler</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Başlık <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="featureTitle" class="form-control" value="{{ old('title') }}" required placeholder="Örn: Hızlı Teklif Yönetimi" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">URL Slug (Boş bırakılırsa otomatik üretilir)</label>
                    <input type="text" name="slug" id="featureSlug" class="form-control font-monospace" value="{{ old('slug') }}" placeholder="hizli-teklif-yonetimi" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Özet (Teaser için maks 500 karakter)</label>
                    <textarea name="summary" class="form-control" rows="3" placeholder="Ana sayfa ve listeleme kartlarında gösterilecek kısa özet..." style="border-radius: 10px; padding: 11px 14px;">{{ old('summary') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Detay Sayfası İçeriği (HTML / Zengin Metin)</label>
                    <textarea name="body" class="form-control font-monospace" rows="10" placeholder="<h3>Özellik Detayı</h3><p>Açıklama...</p>" style="border-radius: 10px; padding: 11px 14px;">{{ old('body') }}</textarea>
                </div>
            </div>

            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">SEO Meta Bilgileri</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Meta Başlık</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" placeholder="Özellik Başlığı | Quotarix" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Meta Açıklama</label>
                    <textarea name="meta_description" class="form-control" rows="2" placeholder="Google arama sonuçlarında görünecek açıklama..." style="border-radius: 10px; padding: 11px 14px;">{{ old('meta_description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Yayın & Durum</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Modül Tipi / Rozet</label>
                    <select name="badge" class="form-select" style="border-radius: 10px; padding: 11px 14px;">
                        <option value="" {{ old('badge') == '' ? 'selected' : '' }}>Aktif Özellik (Rozetsiz)</option>
                        <option value="yakinda" {{ old('badge') == 'yakinda' ? 'selected' : '' }}>Yol Haritası (Yakında)</option>
                    </select>
                    <small class="text-muted">Yakında seçilirse ana sayfa yol haritasına ve /yol-haritasi sayfasına düşer.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Bootstrap İkon Sınıfı</label>
                    <input type="text" name="icon" class="form-control font-monospace" value="{{ old('icon', 'bi-stars') }}" placeholder="bi-file-earmark-text" style="border-radius: 10px; padding: 11px 14px;">
                    <small class="text-muted">Örn: <code>bi-file-earmark-text</code>, <code>bi-people</code>, <code>bi-robot</code></small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Sıralama</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Görsel (Opsiyonel)</label>
                    <input type="file" name="image" class="form-control" style="border-radius: 10px; padding: 9px 14px;">
                </div>

                <div class="form-check form-switch mb-4 fs-5">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label fs-6 fw-bold text-navy ms-2" for="isActive">Yayında</label>
                </div>

                <button type="submit" class="btn btn-teal w-100 py-3 fw-bold">
                    <i class="bi bi-check-lg me-1"></i> Özelliği Kaydet
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
