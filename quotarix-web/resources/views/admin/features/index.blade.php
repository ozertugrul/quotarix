@extends('admin.layouts.app')

@section('title', 'Özellikler & Yol Haritası')

@section('content')
<div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Özellikler & Yol Haritası</h2>
        <p class="text-secondary small mb-0">Platform modülleri ve "Yakında" etiketli yol haritası özellikleri.</p>
    </div>
    <a href="{{ route('admin.features.create') }}" class="btn btn-teal white-space-nowrap">
        <i class="bi bi-plus-lg me-1"></i> Yeni Özellik Ekle
    </a>
</div>

<div class="card border-0 shadow-sm p-3 p-md-4" style="border-radius: 20px; background: #fff;">
    <!-- Desktop Table View (>= 768px) -->
    <div class="desktop-only-table table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th style="width: 50px;">İKON</th>
                    <th>BAŞLIK & SLUG</th>
                    <th>TİP / ROZET</th>
                    <th>ÖZET</th>
                    <th style="width: 100px;">DURUM</th>
                    <th style="width: 140px;" class="text-end">İŞLEM</th>
                </tr>
            </thead>
            <tbody>
                @forelse($features as $feature)
                    <tr>
                        <td>
                            <div class="rounded-circle p-2 bg-light text-teal text-center" style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                                <i class="bi {{ $feature->icon ?: 'bi-stars' }}"></i>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-navy">{{ $feature->title }}</div>
                            <small class="text-muted"><code>/ozellikler/{{ $feature->slug }}</code></small>
                        </td>
                        <td>
                            @if($feature->badge)
                                <span class="badge bg-warning text-dark px-2 py-1 font-monospace">YOL HARİTASI ({{ $feature->badge }})</span>
                            @else
                                <span class="badge bg-success px-2 py-1">AKTİF MODÜL</span>
                            @endif
                        </td>
                        <td class="small text-secondary" style="max-width: 320px;">
                            {{ \Illuminate\Support\Str::limit($feature->summary, 80) }}
                        </td>
                        <td>
                            @if($feature->is_active)
                                <span class="badge bg-light text-success border">Yayında</span>
                            @else
                                <span class="badge bg-light text-muted border">Pasif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-sm btn-outline-dark me-1" style="border-radius: 8px;" title="Düzenle">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu özelliği silmek istediğinize emin misiniz?');">
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
                        <td colspan="6" class="text-center py-4 text-muted">Kayıtlı özellik bulunamadı.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Mobile Cards View (< 768px) - 100% Readable, Zero Horizontal Scroll -->
    <div class="mobile-only-cards">
        @forelse($features as $feature)
            <div class="card border border-light-subtle rounded-3 p-3 mb-3 shadow-none bg-light bg-opacity-25">
                <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle p-2 bg-light text-teal text-center" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                            <i class="bi {{ $feature->icon ?: 'bi-stars' }}"></i>
                        </div>
                        <div class="fw-bold text-navy fs-6">{{ $feature->title }}</div>
                    </div>
                    @if($feature->is_active)
                        <span class="badge bg-light text-success border">Yayında</span>
                    @else
                        <span class="badge bg-light text-muted border">Pasif</span>
                    @endif
                </div>

                <div class="mb-2">
                    @if($feature->badge)
                        <span class="badge bg-warning text-dark px-2 py-1 font-monospace small">YOL HARİTASI ({{ $feature->badge }})</span>
                    @else
                        <span class="badge bg-success px-2 py-1 small">AKTİF MODÜL</span>
                    @endif
                    <small class="text-muted d-block mt-1"><code>/ozellikler/{{ $feature->slug }}</code></small>
                </div>

                <p class="text-secondary small mb-3">
                    {{ $feature->summary }}
                </p>

                <div class="d-flex justify-content-end gap-2 border-top pt-2">
                    <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-sm btn-outline-dark px-3" style="border-radius: 8px;">
                        <i class="bi bi-pencil me-1"></i> Düzenle
                    </a>
                    <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu özelliği silmek istediğinize emin misiniz?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger px-3" style="border-radius: 8px;">
                            <i class="bi bi-trash me-1"></i> Sil
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-4 text-muted">Kayıtlı özellik bulunamadı.</div>
        @endforelse
    </div>
</div>
@endsection
