@extends('admin.layouts.app')

@section('title', 'Fiyatlandırma Paketleri')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Fiyatlandırma Paketleri</h2>
        <p class="text-secondary small mb-0">Fiyat planları, özellik maddeleri ve öne çıkan etiketleri.</p>
    </div>
    <a href="{{ route('admin.plans.create') }}" class="btn btn-teal">
        <i class="bi bi-plus-lg me-1"></i> Yeni Plan Ekle
    </a>
</div>

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background: #fff;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th>PLAN ADI</th>
                    <th>FİYAT / DÖNEM</th>
                    <th>ÖNE ÇIKAN</th>
                    <th>ÖZELLİK SAYISI</th>
                    <th>DURUM</th>
                    <th class="text-end">İŞLEM</th>
                </tr>
            </thead>
            <tbody>
                @forelse($plans as $plan)
                    <tr>
                        <td>
                            <div class="fw-bold text-navy fs-6">{{ $plan->name }}</div>
                        </td>
                        <td>
                            @if($plan->price !== null)
                                <span class="fw-bold text-teal">${{ number_format($plan->price, 0) }}</span> {{ $plan->currency }} / <small class="text-muted">{{ $plan->period }}</small>
                            @else
                                <span class="badge bg-light text-navy border">Özel Teklif</span>
                            @endif
                        </td>
                        <td>
                            @if($plan->is_featured)
                                <span class="badge bg-success px-2 py-1"><i class="bi bi-star-fill me-1"></i> Popüler Seçim</span>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td class="small text-secondary">
                            {{ is_array($plan->features_list) ? count($plan->features_list) : 0 }} Madde
                        </td>
                        <td>
                            @if($plan->is_active)
                                <span class="badge bg-light text-success border">Yayında</span>
                            @else
                                <span class="badge bg-light text-muted border">Pasif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.plans.edit', $plan->id) }}" class="btn btn-sm btn-outline-dark me-1" style="border-radius: 8px;">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu fiyat planını silmek istediğinize emin misiniz?');">
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
                        <td colspan="6" class="text-center py-4 text-muted">Kayıtlı plan bulunamadı.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
