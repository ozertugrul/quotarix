@extends('admin.layouts.app')

@section('title', 'Yeni Blog Yazısı')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.posts.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; Blog Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Yeni Blog Yazısı Ekle</h2>
</div>

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">İçerik</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Başlık <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required placeholder="Blog Başlığı" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">URL Slug (Boşsa otomatik üretilir)</label>
                    <input type="text" name="slug" class="form-control font-monospace" value="{{ old('slug') }}" placeholder="blog-yazisi-slug" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Özet</label>
                    <textarea name="summary" class="form-control" rows="3" placeholder="Yazı kartında gösterilecek kısa özet..." style="border-radius: 10px; padding: 11px 14px;">{{ old('summary') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Makale Gövdesi (HTML / Zengin Metin)</label>
                    <textarea name="body" class="form-control font-monospace" rows="12" placeholder="<p>Makale metni...</p>" style="border-radius: 10px; padding: 11px 14px;">{{ old('body') }}</textarea>
                </div>
            </div>

            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">SEO Meta Bilgileri</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Meta Başlık</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" placeholder="Makale Başlığı | Quotarix Blog" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Meta Açıklama</label>
                    <textarea name="meta_description" class="form-control" rows="2" placeholder="Google arama sonuçlarında görünecek açıklama..." style="border-radius: 10px; padding: 11px 14px;">{{ old('meta_description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Yayın Ayarları</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Kategori</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category', 'Verimlilik') }}" placeholder="Örn: Verimlilik, Satış, Teknoloji" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Yazar</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', 'Fatih PEK') }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Yayın Tarihi</label>
                    <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Kapak Görseli</label>
                    <input type="file" name="image" class="form-control" style="border-radius: 10px; padding: 9px 14px;">
                </div>

                <div class="form-check form-switch mb-4 fs-5">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label fs-6 fw-bold text-navy ms-2" for="isActive">Yayında</label>
                </div>

                <button type="submit" class="btn btn-teal w-100 py-3 fw-bold">
                    <i class="bi bi-check-lg me-1"></i> Yazıyı Yayınla
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
