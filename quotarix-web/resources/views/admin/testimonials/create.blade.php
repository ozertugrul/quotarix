@extends('admin.layouts.app')

@section('title', 'Yeni Müşteri Yorumu')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.testimonials.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; Yorumlar Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Yeni Müşteri Yorumu Ekle</h2>
</div>

<form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy">Kişi Adı Soyadı <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="Örn: Ahmet Yılmaz" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy">Firma Adı</label>
                        <input type="text" name="company" class="form-control" value="{{ old('company') }}" placeholder="Örn: Ege Global Forwarding" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-navy">Ünvan / Pozisyon</label>
                        <input type="text" name="role" class="form-control" value="{{ old('role') }}" placeholder="Örn: Satış Direktörü" style="border-radius: 10px; padding: 11px 14px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Yorum / Alıntı Metni <span class="text-danger">*</span></label>
                    <textarea name="quote" class="form-control" rows="4" required placeholder="Quotarix sayesinde satış ekibimizin teklif hızını 3 katına çıkardık..." style="border-radius: 10px; padding: 11px 14px;">{{ old('quote') }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Değerlendirme Puanı (Yıldız)</label>
                    <select name="rating" class="form-select" style="border-radius: 10px; padding: 11px 14px;">
                        <option value="5" selected>⭐⭐⭐⭐⭐ (5 Yıldız)</option>
                        <option value="4">⭐⭐⭐⭐ (4 Yıldız)</option>
                        <option value="3">⭐⭐⭐ (3 Yıldız)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Profil Fotoğrafı / Avatar</label>
                    <input type="file" name="avatar" class="form-control" style="border-radius: 10px; padding: 9px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Sıralama</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="form-check form-switch mb-4 fs-5">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label fs-6 fw-bold text-navy ms-2" for="isActive">Yayında</label>
                </div>

                <button type="submit" class="btn btn-teal w-100 py-3 fw-bold">
                    <i class="bi bi-check-lg me-1"></i> Yorumu Kaydet
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
