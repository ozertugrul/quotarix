@extends('admin.layouts.app')

@section('title', 'Tanıtım Videoları')

@section('content')
<div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Tanıtım Videoları</h2>
        <p class="text-secondary small mb-0">YouTube / Vimeo video yerleşimleri ve kapak yönetimi.</p>
    </div>
    <a href="{{ route('admin.videos.create') }}" class="btn btn-teal white-space-nowrap">
        <i class="bi bi-plus-lg me-1"></i> Yeni Video Ekle
    </a>
</div>

<div class="card border-0 shadow-sm p-3 p-md-4" style="border-radius: 20px; background: #fff;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th style="width: 140px;">KAPAK</th>
                    <th>BAŞLIK & URL</th>
                    <th>YERLEŞİM</th>
                    <th>DURUM</th>
                    <th class="text-end" style="width: 140px;">İŞLEM</th>
                </tr>
            </thead>
            <tbody>
                @forelse($videos as $v)
                    <tr>
                        <td>
                            @if($v->thumb)
                                <img src="{{ $v->thumb }}" alt="{{ $v->title }}" class="rounded shadow-sm" style="width: 120px; height: 68px; object-fit: cover;">
                            @else
                                <div class="rounded bg-light text-muted d-flex align-items-center justify-content-center" style="width: 120px; height: 68px;">
                                    <i class="bi bi-play-circle fs-3"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-navy">{{ $v->title }}</div>
                            <small class="text-muted"><a href="{{ $v->video_url }}" target="_blank" class="text-teal text-decoration-none">{{ $v->video_url }} <i class="bi bi-box-arrow-up-right small"></i></a></small>
                        </td>
                        <td>
                            <span class="badge bg-light text-secondary border px-2 py-1 font-monospace">
                                @if($v->placement === 'home') Ana Sayfa
                                @elseif($v->placement === 'features') Özellikler
                                @elseif($v->placement === 'why') Neden Quotarix
                                @else {{ $v->placement }} @endif
                            </span>
                        </td>
                        <td>
                            @if($v->is_active)
                                <span class="badge bg-light text-success border">Yayında</span>
                            @else
                                <span class="badge bg-light text-muted border">Pasif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.videos.edit', $v->id) }}" class="btn btn-sm btn-outline-dark me-1" style="border-radius: 8px;">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.videos.destroy', $v->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu videoyu silmek istediğinize emin misiniz?');">
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
                        <td colspan="5" class="text-center py-4 text-muted">Kayıtlı video bulunamadı.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
