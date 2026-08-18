@extends('admin.layouts.app')

@section('title', 'Demo & İletişim Talepleri')

@section('content')
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Demo & İletişim Talepleri</h2>
        <p class="text-secondary small mb-0">Web sitesi üzerinden gelen demo talepleri ve iletişim mesajları.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.leads.export') }}" class="btn btn-outline-success fw-bold" style="border-radius: 10px;">
            <i class="bi bi-file-earmark-excel me-1"></i> Excel / CSV Dışa Aktar
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card border-0 shadow-sm p-3 p-md-4 mb-4" style="border-radius: 16px; background: #fff;">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
        <div class="d-flex flex-wrap gap-2" role="group">
            <a href="{{ route('admin.leads.index') }}" class="btn btn-sm {{ !request('source') && !request('status') ? 'btn-dark' : 'btn-outline-secondary' }}" style="border-radius: 8px;">Tüm Talepler</a>
            <a href="{{ route('admin.leads.index', ['status' => 'unread']) }}" class="btn btn-sm {{ request('status') === 'unread' ? 'btn-danger' : 'btn-outline-secondary' }}" style="border-radius: 8px;">
                Okunmamış @if($unreadCount > 0) <span class="badge bg-white text-danger ms-1">{{ $unreadCount }}</span> @endif
            </a>
            <a href="{{ route('admin.leads.index', ['source' => 'demo']) }}" class="btn btn-sm {{ request('source') === 'demo' ? 'btn-primary' : 'btn-outline-secondary' }}" style="border-radius: 8px;">Sadece Demo</a>
            <a href="{{ route('admin.leads.index', ['source' => 'contact']) }}" class="btn btn-sm {{ request('source') === 'contact' ? 'btn-info text-dark' : 'btn-outline-secondary' }}" style="border-radius: 8px;">Sadece İletişim</a>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm p-3 p-md-4" style="border-radius: 20px; background: #fff;">
    <!-- Desktop Table View (>= 768px) -->
    <div class="d-none d-md-block table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th>AD SOYAD & FİRMA</th>
                    <th>İLETİŞİM</th>
                    <th>KAYNAK</th>
                    <th>TARİH</th>
                    <th>DURUM</th>
                    <th class="text-end">İŞLEM</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                    <tr class="{{ is_null($lead->read_at) ? 'table-warning bg-opacity-25' : '' }}">
                        <td>
                            <div class="fw-bold text-navy">{{ $lead->name }}</div>
                            <small class="text-muted">{{ $lead->company ?: 'Firma Belirtilmedi' }}</small>
                        </td>
                        <td>
                            <div><a href="mailto:{{ $lead->email }}" class="text-decoration-none text-navy small">{{ $lead->email }}</a></div>
                            <small class="text-muted"><a href="tel:{{ $lead->phone }}" class="text-decoration-none text-muted">{{ $lead->phone ?: '—' }}</a></small>
                        </td>
                        <td>
                            <span class="badge {{ $lead->source === 'demo' ? 'bg-primary' : 'bg-info text-dark' }} px-2 py-1">
                                {{ strtoupper($lead->source) }}
                            </span>
                        </td>
                        <td class="small text-muted">
                            {{ $lead->created_at ? $lead->created_at->format('d.m.Y H:i') : '' }}
                        </td>
                        <td>
                            @if($lead->read_at)
                                <span class="badge bg-light text-secondary border">Okundu</span>
                            @else
                                <span class="badge bg-danger">Yeni Talep</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="btn btn-sm btn-outline-dark me-1" style="border-radius: 8px;">
                                İncele
                            </a>
                            <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu talebi silmek istediğinize emin misiniz?');">
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
                        <td colspan="6" class="text-center py-4 text-muted">Filtreye uygun talep bulunamadı.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Mobile Cards View (< 768px) -->
    <div class="d-block d-md-none">
        @forelse($leads as $lead)
            <div class="card border rounded-3 p-3 mb-3 shadow-none {{ is_null($lead->read_at) ? 'border-warning bg-warning bg-opacity-10' : 'border-light-subtle bg-light bg-opacity-25' }}">
                <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                    <div>
                        <div class="fw-bold text-navy fs-6">{{ $lead->name }}</div>
                        <small class="text-muted">{{ $lead->company ?: 'Firma Belirtilmedi' }}</small>
                    </div>
                    <div>
                        <span class="badge {{ $lead->source === 'demo' ? 'bg-primary' : 'bg-info text-dark' }} px-2 py-1 small">
                            {{ strtoupper($lead->source) }}
                        </span>
                        @if(!$lead->read_at)
                            <span class="badge bg-danger d-block mt-1">Yeni</span>
                        @endif
                    </div>
                </div>

                <div class="border-top border-bottom py-2 my-2 small">
                    <div class="text-truncate mb-1">
                        <i class="bi bi-envelope text-muted me-1"></i> <a href="mailto:{{ $lead->email }}" class="text-teal text-decoration-none">{{ $lead->email }}</a>
                    </div>
                    @if($lead->phone)
                        <div>
                            <i class="bi bi-telephone text-muted me-1"></i> <a href="tel:{{ $lead->phone }}" class="text-navy text-decoration-none">{{ $lead->phone }}</a>
                        </div>
                    @endif
                    <div class="text-muted mt-1" style="font-size: 11px;">
                        <i class="bi bi-clock me-1"></i> {{ $lead->created_at ? $lead->created_at->format('d.m.Y H:i') : '' }}
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-2">
                    <a href="{{ route('admin.leads.show', $lead->id) }}" class="btn btn-sm btn-outline-dark px-3" style="border-radius: 8px;">
                        <i class="bi bi-eye me-1"></i> İncele
                    </a>
                    <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu talebi silmek istediğinize emin misiniz?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger px-3" style="border-radius: 8px;">
                            <i class="bi bi-trash me-1"></i> Sil
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-4 text-muted">Filtreye uygun talep bulunamadı.</div>
        @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $leads->links() }}
    </div>
</div>
@endsection
