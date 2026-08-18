@extends('admin.layouts.app')

@section('title', 'Sıkça Sorulan Sorular')

@section('content')
<div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Sıkça Sorulan Sorular (SSS)</h2>
        <p class="text-secondary small mb-0">Google Rich Snippets (FAQPage) için optimize edilmiş soru ve cevaplar.</p>
    </div>
    <div class="d-flex align-items-center gap-2 flex-wrap">
        <div id="reorderStatusFaq" class="badge bg-success px-3 py-2 d-none">
            <i class="bi bi-check-circle me-1"></i> Sıralama kaydedildi
        </div>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-teal white-space-nowrap">
            <i class="bi bi-plus-lg me-1"></i> Yeni Soru Ekle
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm p-3 p-md-4" style="border-radius: 20px; background: #fff;">
    <!-- Desktop Table View (>= 768px) -->
    <div class="desktop-only-table table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th style="width: 50px;">SIRA</th>
                    <th>SORU</th>
                    <th>CEVAP ÖZETİ</th>
                    <th style="width: 100px;">DURUM</th>
                    <th style="width: 140px;" class="text-end">İŞLEM</th>
                </tr>
            </thead>
            <tbody id="sortableFaqs">
                @forelse($faqs as $faq)
                    <tr data-id="{{ $faq->id }}" class="faq-row">
                        <td>
                            <i class="bi bi-grip-vertical sort-handle fs-5 text-muted" style="cursor: grab;" title="Sıralamak için sürükleyin"></i>
                        </td>
                        <td>
                            <div class="fw-bold text-navy">{{ $faq->question }}</div>
                        </td>
                        <td class="small text-secondary" style="max-width: 400px;">
                            {{ \Illuminate\Support\Str::limit($faq->answer, 100) }}
                        </td>
                        <td>
                            @if($faq->is_active)
                                <span class="badge bg-light text-success border">Yayında</span>
                            @else
                                <span class="badge bg-light text-muted border">Pasif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-outline-dark me-1" style="border-radius: 8px;" title="Düzenle">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu soruyu silmek istediğinize emin misiniz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" title="Sil">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Kayıtlı SSS bulunamadı.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Mobile Cards View (< 768px) -->
    <div class="mobile-only-cards">
        @forelse($faqs as $faq)
            <div class="card border border-light-subtle rounded-3 p-3 mb-3 shadow-none bg-light bg-opacity-25">
                <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                    <div class="fw-bold text-navy fs-6">{{ $faq->question }}</div>
                    @if($faq->is_active)
                        <span class="badge bg-light text-success border flex-shrink-0">Yayında</span>
                    @else
                        <span class="badge bg-light text-muted border flex-shrink-0">Pasif</span>
                    @endif
                </div>

                <p class="text-secondary small mb-3">
                    {{ \Illuminate\Support\Str::limit($faq->answer, 120) }}
                </p>

                <div class="d-flex justify-content-end gap-2 border-top pt-2">
                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-outline-dark px-3" style="border-radius: 8px;">
                        <i class="bi bi-pencil me-1"></i> Düzenle
                    </a>
                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu soruyu silmek istediğinize emin misiniz?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger px-3" style="border-radius: 8px;">
                            <i class="bi bi-trash me-1"></i> Sil
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-4 text-muted">Kayıtlı SSS bulunamadı.</div>
        @endforelse
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const el = document.getElementById('sortableFaqs');
        if (el) {
            new Sortable(el, {
                handle: '.sort-handle',
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function () {
                    const rows = el.querySelectorAll('.faq-row');
                    const order = Array.from(rows).map(row => row.getAttribute('data-id'));

                    fetch('{{ route('admin.faqs.reorder') }}', {
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
                        const statusBadge = document.getElementById('reorderStatusFaq');
                        statusBadge.textContent = 'Sıralama kaydedildi';
                        statusBadge.classList.remove('d-none');
                        setTimeout(() => statusBadge.classList.add('d-none'), 2500);
                    });
                }
            });
        }
    });
</script>
@endpush
@endsection
