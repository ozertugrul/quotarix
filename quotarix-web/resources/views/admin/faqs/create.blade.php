@extends('admin.layouts.app')

@section('title', 'Yeni SSS Ekle')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.faqs.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; SSS Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Yeni Soru & Cevap Ekle</h2>
</div>

<form action="{{ route('admin.faqs.store') }}" method="POST">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Soru <span class="text-danger">*</span></label>
                    <input type="text" name="question" class="form-control" value="{{ old('question') }}" required placeholder="Örn: Quotarix sadece forwarder firmalar için mi?" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Cevap <span class="text-danger">*</span></label>
                    <textarea name="answer" class="form-control" rows="5" required placeholder="Sorunun ayrıntılı ve ikna edici cevabı..." style="border-radius: 10px; padding: 11px 14px;">{{ old('answer') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-navy">Sıralama</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" style="border-radius: 10px; padding: 11px 14px; max-width: 150px;">
                </div>

                <div class="form-check form-switch mb-4 fs-5">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label fs-6 fw-bold text-navy ms-2" for="isActive">Yayında</label>
                </div>

                <button type="submit" class="btn btn-teal px-4 py-3 fw-bold" style="border-radius: 12px;">
                    <i class="bi bi-check-lg me-1"></i> Soruyu Kaydet
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
