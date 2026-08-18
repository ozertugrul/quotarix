@extends('admin.layouts.app')

@section('title', 'Bölüm Yönetimi')

@section('content')
<div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Ana Sayfa Bölümleri</h2>
        <p class="text-secondary small mb-0">Ana sayfada yer alan 15 bölümün aktiflik durumunu ve görüntülenme sırasını yönetin.</p>
    </div>
    <div id="reorderStatus" class="badge bg-success px-3 py-2 d-none">
        <i class="bi bi-check-circle me-1"></i> Sıralama kaydedildi
    </div>
</div>

<div class="card border-0 shadow-sm p-3 p-md-4" style="border-radius: 20px; background: #fff;">
    @php
        $sectionTitles = [
            'hero' => 'Hero (Manşet, Başlık, CTA, Görsel)',
            'problem' => 'Problem / Tanıdık Geliyor mu? Kartları',
            'features' => 'Özellikler (3 Teaser Modül Kartı)',
            'ocr' => 'Yapay Zeka Kartvizit Okuma (OCR) Tanıtımı',
            'steps' => '3 Adımda Başlayın',
            'manager' => 'Yöneticiler İçin Ekip & Dashboard Vurgusu',
            'why' => 'Neden Quotarix / Forwarder Dili',
            'roadmap' => 'Yol Haritası (Geliştirilen Özellikler)',
            'pricing' => 'Fiyatlandırma Paketleri ($50 & Kurumsal)',
            'testimonials' => 'Müşteri Yorumları & Değerlendirmeleri',
            'video' => 'Tanıtım Videosu (Lazy-load Facade)',
            'blog' => 'Blog & Rehber (Son 3 Yazı)',
            'band' => 'İstatistik Şeridi (5 dk, %90, 30 sn)',
            'faq' => 'Sıkça Sorulan Sorular (İlk 3 Teaser Soru)',
            'cta' => 'Alt Demo CTA ve Hızlı Form',
        ];
    @endphp

    <!-- Desktop Table View (>= 768px) -->
    <div class="d-none d-md-block table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th style="width: 50px;">SIRA</th>
                    <th style="width: 220px;">BÖLÜM ANAHTARI</th>
                    <th>AÇIKLAMA</th>
                    <th style="width: 140px;" class="text-center">DURUM</th>
                </tr>
            </thead>
            <tbody id="sortableSections">
                @foreach($sections as $sec)
                    <tr data-id="{{ $sec->id }}" class="section-row">
                        <td>
                            <i class="bi bi-grip-vertical sort-handle fs-5 text-muted" style="cursor: grab;" title="Sıralamak için sürükleyin"></i>
                        </td>
                        <td>
                            <span class="badge bg-light text-secondary border font-monospace px-2 py-1 fs-6">
                                #{{ $sec->key }}
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold text-navy">{{ $sectionTitles[$sec->key] ?? ucfirst($sec->key) }}</div>
                            <small class="text-muted"><code>sections/{{ $sec->key }}.blade.php</code></small>
                        </td>
                        <td class="text-center">
                            <div class="form-check form-switch d-inline-block fs-4">
                                <input class="form-check-input section-toggle" type="checkbox" role="switch" data-url="{{ route('admin.sections.toggle', $sec->id) }}" {{ $sec->is_active ? 'checked' : '' }}>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Mobile Cards View (< 768px) -->
    <div class="d-block d-md-none">
        @foreach($sections as $sec)
            <div class="card border border-light-subtle rounded-3 p-3 mb-3 shadow-none bg-light bg-opacity-25">
                <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                    <div>
                        <span class="badge bg-light text-secondary border font-monospace small mb-1">#{{ $sec->key }}</span>
                        <div class="fw-bold text-navy fs-6">{{ $sectionTitles[$sec->key] ?? ucfirst($sec->key) }}</div>
                    </div>
                    <div class="form-check form-switch fs-4 ms-2">
                        <input class="form-check-input section-toggle" type="checkbox" role="switch" data-url="{{ route('admin.sections.toggle', $sec->id) }}" {{ $sec->is_active ? 'checked' : '' }}>
                    </div>
                </div>
                <small class="text-muted"><code>sections/{{ $sec->key }}.blade.php</code></small>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. AJAX Switch Toggles
        document.querySelectorAll('.section-toggle').forEach(sw => {
            sw.addEventListener('change', function () {
                const url = this.getAttribute('data-url');
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message);
                    }
                })
                .catch(err => {
                    alert('Hata oluştu.');
                    this.checked = !this.checked;
                });
            });
        });

        // 2. SortableJS Drag and Drop (Desktop)
        const el = document.getElementById('sortableSections');
        if (el) {
            new Sortable(el, {
                handle: '.sort-handle',
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function () {
                    const rows = el.querySelectorAll('.section-row');
                    const order = Array.from(rows).map(row => row.getAttribute('data-id'));

                    fetch('{{ route('admin.sections.reorder') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ order: order })
                    })
                    .then(res => res.json())
                    .then(data => {
                        const statusBadge = document.getElementById('reorderStatus');
                        statusBadge.textContent = 'Sıralama kaydedildi';
                        statusBadge.classList.remove('d-none');
                        setTimeout(() => statusBadge.classList.add('d-none'), 2500);
                    });
                }
            });
        }

        function showToast(msg) {
            const statusBadge = document.getElementById('reorderStatus');
            statusBadge.textContent = msg;
            statusBadge.classList.remove('d-none');
            setTimeout(() => statusBadge.classList.add('d-none'), 2500);
        }
    });
</script>
@endpush
@endsection
