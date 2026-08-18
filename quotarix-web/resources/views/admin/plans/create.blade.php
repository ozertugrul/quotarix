@extends('admin.layouts.app')

@section('title', 'Yeni Fiyat Planı')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.plans.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; Planlar Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Yeni Fiyat Planı Ekle</h2>
</div>

<form action="{{ route('admin.plans.store') }}" method="POST">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Plan Bilgileri</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Plan Adı <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="Örn: Pro (Kullanıcı Başı)" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy">Fiyat (Özel teklif ise boş bırakın)</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" placeholder="50.00" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy">Para Birimi</label>
                        <input type="text" name="currency" class="form-control" value="{{ old('currency', 'USD') }}" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy">Fatura Dönemi</label>
                        <input type="text" name="period" class="form-control" value="{{ old('period', 'ay / kullanıcı') }}" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Özellikler (Her satıra bir özellik yazınız)</label>
                    <textarea name="features_raw" class="form-control" rows="8" placeholder="Sınırsız teklif oluşturma&#10;FCL, LCL ve Hava modu&#10;Yapay zeka OCR kartvizit okuyucu&#10;Yönetici performans dashboard&#10;Canlı destek" style="border-radius: 10px; padding: 11px 14px;">{{ old('features_raw') }}</textarea>
                    <small class="text-muted">Her yeni satır planda bir onay işareti (✓) olarak listelenir.</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Seçenekler</h5>

                <div class="form-check form-switch mb-3 fs-5">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="isFeatured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                    <label class="form-check-label fs-6 fw-bold text-navy ms-2" for="isFeatured">Popüler Seçim (Vurgula)</label>
                </div>

                <div class="form-check form-switch mb-4 fs-5">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label fs-6 fw-bold text-navy ms-2" for="isActive">Yayında</label>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-navy">Sıralama</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <button type="submit" class="btn btn-teal w-100 py-3 fw-bold">
                    <i class="bi bi-check-lg me-1"></i> Planı Kaydet
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
