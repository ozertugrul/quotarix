@extends('admin.layouts.app')

@section('title', 'Müşteri Yorumları')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Müşteri Yorumları</h2>
        <p class="text-secondary small mb-0">Ana sayfa değerlendirme karuselinde yer alan müşteri geri bildirimleri.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <div id="reorderStatusTestimonial" class="badge bg-success px-3 py-2 d-none">
            <i class="bi bi-check-circle me-1"></i> Durum güncellendi
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-teal">
            <i class="bi bi-plus-lg me-1"></i> Yeni Yorum Ekle
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th>KİŞİ & FİRMA</th>
                    <th>YILDIZ</th>
                    <th>ALINTI</th>
                    <th class="text-center" style="width: 120px;">DURUM (YAYIN)</th>
                    <th class="text-end" style="width: 140px;">İŞLEM</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $t)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($t->avatar)
                                    <img src="{{ asset($t->avatar) }}" alt="{{ $t->name }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-light text-navy fw-bold d-flex align-items-center justify-content-center border" style="width: 40px; height: 40px;">
                                        {{ mb_substr($t->name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="fw-bold text-navy">{{ $t->name }}</div>
                                    <small class="text-muted">{{ $t->company }} &bull; {{ $t->role }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-warning small">
                                @for($i = 0; $i < ($t->rating ?: 5); $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                            </div>
                        </td>
                        <td class="small text-secondary" style="max-width: 320px;">
                            "{{ \Illuminate\Support\Str::limit($t->quote, 90) }}"
                        </td>
                        <td class="text-center">
                            <div class="form-check form-switch d-inline-block fs-5">
                                <input class="form-check-input testimonial-toggle" type="checkbox" role="switch" data-url="{{ route('admin.testimonials.toggle', $t->id) }}" {{ $t->is_active ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="btn btn-sm btn-outline-dark me-1" style="border-radius: 8px;">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu yorumu silmek istediğinize emin misiniz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Kayıtlı müşteri yorumu bulunamadı.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.testimonial-toggle').forEach(sw => {
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
                        const statusBadge = document.getElementById('reorderStatusTestimonial');
                        statusBadge.textContent = data.message;
                        statusBadge.classList.remove('d-none');
                        setTimeout(() => statusBadge.classList.add('d-none'), 2500);
                    }
                })
                .catch(err => {
                    alert('Hata oluştu.');
                    this.checked = !this.checked;
                });
            });
        });
    });
</script>
@endpush
@endsection
