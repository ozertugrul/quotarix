@extends('admin.layouts.app')

@section('title', 'Blog Yazısı Düzenle')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.posts.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; Blog Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Yazı Düzenle: {{ $post->title }}</h2>
</div>

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">İçerik</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Başlık <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">URL Slug <span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control font-monospace" value="{{ old('slug', $post->slug) }}" required style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Özet</label>
                    <textarea name="summary" class="form-control" rows="3" style="border-radius: 10px; padding: 11px 14px;">{{ old('summary', $post->summary) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Makale Gövdesi (HTML / Zengin Metin)</label>
                    <textarea name="body" class="form-control font-monospace" rows="12" style="border-radius: 10px; padding: 11px 14px;">{{ old('body', $post->body) }}</textarea>
                </div>
            </div>

            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">SEO Meta Bilgileri</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Meta Başlık</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $post->meta_title) }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Meta Açıklama</label>
                    <textarea name="meta_description" class="form-control" rows="2" style="border-radius: 10px; padding: 11px 14px;">{{ old('meta_description', $post->meta_description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Yayın Ayarları</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Kategori</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category', $post->category) }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Yazar</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $post->author) }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Yayın Tarihi</label>
                    <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Kapak Görseli</label>
                    @if($post->image)
                        <div class="mb-2">
                            <img src="{{ asset($post->image) }}" alt="Kapak" class="img-thumbnail" style="max-height: 80px;">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control" style="border-radius: 10px; padding: 9px 14px;">
                </div>

                <div class="form-check form-switch mb-4 fs-5">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" {{ old('is_active', $post->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fs-6 fw-bold text-navy ms-2" for="isActive">Yayında</label>
                </div>

                <button type="submit" class="btn btn-teal w-100 py-3 fw-bold">
                    <i class="bi bi-check-lg me-1"></i> Değişiklikleri Kaydet
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
