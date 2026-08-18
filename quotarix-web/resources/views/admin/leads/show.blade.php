@extends('admin.layouts.app')

@section('title', 'Talep Detayı')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.leads.index') }}" class="text-teal small fw-bold text-decoration-none">
        &larr; Talepler Listesine Dön
    </a>
    <h2 class="fw-bold text-navy mt-1">Talep Detayı #{{ $lead->id }}</h2>
</div>

<div class="row g-4">
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm p-3 p-md-4 mb-4" style="border-radius: 20px; background: #fff;">
            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 mb-4 pb-3 border-bottom">
                <div>
                    <span class="badge {{ $lead->source === 'demo' ? 'bg-primary' : 'bg-info text-dark' }} fs-6 px-3 py-2">
                        {{ strtoupper($lead->source) }} TALEBİ
                    </span>
                </div>
                <div class="text-muted small">
                    <i class="bi bi-clock me-1"></i> {{ $lead->created_at ? $lead->created_at->format('d.m.Y H:i:s') : '' }}
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-12 col-md-6">
                    <label class="text-muted small fw-bold d-block">AD SOYAD</label>
                    <div class="fs-5 fw-bold text-navy word-break-all">{{ $lead->name }}</div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="text-muted small fw-bold d-block">FİRMA ADI</label>
                    <div class="fs-5 fw-bold text-navy word-break-all">{{ $lead->company ?: 'Belirtilmedi' }}</div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="text-muted small fw-bold d-block">E-POSTA</label>
                    <div><a href="mailto:{{ $lead->email }}" class="text-teal fw-bold text-decoration-none fs-6 word-break-all">{{ $lead->email }}</a></div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="text-muted small fw-bold d-block">TELEFON</label>
                    <div><a href="tel:{{ $lead->phone }}" class="text-navy fw-bold text-decoration-none fs-6 word-break-all">{{ $lead->phone ?: 'Belirtilmedi' }}</a></div>
                </div>
            </div>

            <div class="mb-3">
                <label class="text-muted small fw-bold d-block mb-2">MESAJ / NOT</label>
                <div class="p-3 bg-light rounded-3 text-secondary word-break-all" style="line-height: 1.7; min-height: 120px; white-space: pre-wrap;">{{ $lead->message ?: 'Herhangi bir ek not veya mesaj girilmedi.' }}</div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card border-0 shadow-sm p-3 p-md-4" style="border-radius: 20px; background: #fff;">
            <h5 class="fw-bold text-navy mb-3">İşlemler</h5>

            <div class="mb-3">
                <label class="text-muted small fw-bold d-block">IP ADRESİ</label>
                <code>{{ $lead->ip ?: 'Bilinmiyor' }}</code>
            </div>

            <div class="mb-4">
                <label class="text-muted small fw-bold d-block">OKUNMA BİLGİSİ</label>
                <span class="small">{{ $lead->read_at ? $lead->read_at->format('d.m.Y H:i') : 'Henüz Okunmadı' }}</span>
            </div>

            <form action="{{ route('admin.leads.toggle-read', $lead->id) }}" method="POST" class="mb-2">
                @csrf
                <button type="submit" class="btn btn-outline-secondary w-100 py-2" style="border-radius: 10px;">
                    <i class="bi bi-envelope me-1"></i> {{ $lead->read_at ? 'Okunmadı Olarak İşaretle' : 'Okundu Olarak İşaretle' }}
                </button>
            </form>

            <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Bu talebi kalıcı olarak silmek istediğinize emin misiniz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100 py-2" style="border-radius: 10px;">
                    <i class="bi bi-trash me-1"></i> Talebi Sil
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
