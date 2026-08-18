@extends('admin.layouts.app')

@section('title', 'Yeni Video Ekle')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.videos.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; Videolar Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Yeni Tanıtım Videosu Ekle</h2>
</div>

<form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Video Bilgileri</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Başlık <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required placeholder="Örn: Quotarix ile 30 Saniyede FCL Teklifi Nasıl Hazırlanır?" style="border-radius: 10px; padding: 11px 14px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Video URL (YouTube veya Vimeo) <span class="text-danger">*</span></label>
                    <input type="url" name="video_url" id="videoUrlInput" class="form-control font-monospace" value="{{ old('video_url') }}" required placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="border-radius: 10px; padding: 11px 14px;">
                    <small class="text-muted">YouTube linkini yapıştırdığınızda kapak görseli ve video ID otomatik algılanır.</small>
                </div>

                <!-- Live Preview Box -->
                <div class="mt-4 p-3 bg-light rounded-4 border">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="small fw-bold text-navy">CANLI ÖNİZLEME:</span>
                        <span id="detectedIdBadge" class="badge bg-secondary font-monospace">Video Algılanmadı</span>
                    </div>
                    <div id="videoPreviewContainer" class="ratio ratio-16x9 bg-dark rounded-3 overflow-hidden d-flex align-items-center justify-content-center text-white-50">
                        <div class="text-center p-4">
                            <i class="bi bi-play-btn fs-1 d-block mb-2"></i>
                            <span>Geçerli bir YouTube/Vimeo bağlantısı yapıştırın</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background: #fff;">
                <h5 class="fw-bold text-navy mb-3">Yerleşim & Ayarlar</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Yerleşim Sayfası</label>
                    <select name="placement" class="form-select" style="border-radius: 10px; padding: 11px 14px;">
                        <option value="home" {{ old('placement') == 'home' ? 'selected' : '' }}>Ana Sayfa (#video bölümü)</option>
                        <option value="features" {{ old('placement') == 'features' ? 'selected' : '' }}>Özellikler Sayfası</option>
                        <option value="why" {{ old('placement') == 'why' ? 'selected' : '' }}>Neden Quotarix Sayfası</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-navy">Özel Kapak Görseli (Opsiyonel)</label>
                    <input type="file" name="thumbnail" class="form-control" style="border-radius: 10px; padding: 9px 14px;">
                    <small class="text-muted">Boş bırakılırsa YouTube kapağı otomatik kullanılır.</small>
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
                    <i class="bi bi-check-lg me-1"></i> Videoyu Kaydet
                </button>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('videoUrlInput');
        const preview = document.getElementById('videoPreviewContainer');
        const badge = document.getElementById('detectedIdBadge');

        function updatePreview() {
            const url = input.value.trim();
            if (!url) return;

            // YouTube match
            const ytMatch = url.match(/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/);
            if (ytMatch && ytMatch[1]) {
                const id = ytMatch[1];
                badge.className = 'badge bg-danger font-monospace';
                badge.textContent = 'YouTube ID: ' + id;
                preview.innerHTML = `
                    <div class="position-relative w-100 h-100">
                        <img src="https://img.youtube.com/vi/${id}/hqdefault.jpg" class="w-100 h-100 object-fit-cover">
                        <div class="position-absolute top-50 start-50 translate-middle bg-danger text-white rounded-circle p-3 shadow-lg">
                            <i class="bi bi-play-fill fs-2"></i>
                        </div>
                    </div>
                `;
                return;
            }

            // Vimeo match
            const vimeoMatch = url.match(/vimeo\.com\/(\d+)/);
            if (vimeoMatch && vimeoMatch[1]) {
                const id = vimeoMatch[1];
                badge.className = 'badge bg-info font-monospace text-dark';
                badge.textContent = 'Vimeo ID: ' + id;
                preview.innerHTML = `
                    <div class="d-flex align-items-center justify-content-center w-100 h-100 text-white bg-dark">
                        <i class="bi bi-vimeo fs-1 me-2 text-info"></i>
                        <span class="fw-bold">Vimeo Video ID: ${id}</span>
                    </div>
                `;
                return;
            }

            badge.className = 'badge bg-secondary font-monospace';
            badge.textContent = 'Geçersiz Video URL';
        }

        input.addEventListener('input', updatePreview);
        input.addEventListener('paste', () => setTimeout(updatePreview, 50));
        updatePreview();
    });
</script>
@endpush
@endsection
