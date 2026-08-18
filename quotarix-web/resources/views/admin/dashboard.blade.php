@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
    <div>
        <h2 class="fw-bold text-navy mb-1">Genel Bakış</h2>
        <p class="text-secondary small mb-0">Quotarix içerik, lead ve bölüm yönetimi kontrol merkezi.</p>
    </div>
    <a href="{{ route('admin.leads.index') }}" class="btn btn-teal white-space-nowrap">
        <i class="bi bi-inbox me-1"></i> Talepleri İncele
    </a>
</div>

<!-- Stats Row -->
<div class="row g-3 g-md-4 mb-4 mb-md-5">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-dashboard p-3 p-md-4 h-100 {{ $unreadLeads > 0 ? 'border border-danger border-2' : '' }}" style="background: #fff;">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-secondary small fw-bold">OKUNMAMIŞ TALEPLER</span>
                <div class="rounded-circle p-2 {{ $unreadLeads > 0 ? 'bg-danger text-white' : 'bg-light text-muted' }}" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="bi bi-bell-fill"></i>
                </div>
            </div>
            <h2 class="fw-extrabold mb-1 {{ $unreadLeads > 0 ? 'text-danger' : 'text-navy' }}">{{ $unreadLeads }}</h2>
            <small class="text-muted">Toplam {{ $totalLeads }} talepten</small>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-dashboard p-3 p-md-4 h-100" style="background: #fff;">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-secondary small fw-bold">AKTİF ÖZELLİKLER</span>
                <div class="rounded-circle p-2 bg-light text-teal" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="bi bi-stars"></i>
                </div>
            </div>
            <h2 class="fw-extrabold text-navy mb-1">{{ $featuresCount }}</h2>
            <small class="text-muted"><a href="{{ route('admin.features.index') }}" class="text-teal text-decoration-none">Özellikleri Yönet &rarr;</a></small>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-dashboard p-3 p-md-4 h-100" style="background: #fff;">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-secondary small fw-bold">BLOG YAZILARI</span>
                <div class="rounded-circle p-2 bg-light text-navy" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="bi bi-newspaper"></i>
                </div>
            </div>
            <h2 class="fw-extrabold text-navy mb-1">{{ $postsCount }}</h2>
            <small class="text-muted"><a href="{{ route('admin.posts.index') }}" class="text-teal text-decoration-none">Yazıları İncele &rarr;</a></small>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-dashboard p-3 p-md-4 h-100" style="background: #fff;">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-secondary small fw-bold">FİYAT PLANLARI</span>
                <div class="rounded-circle p-2 bg-light text-success" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="bi bi-tag"></i>
                </div>
            </div>
            <h2 class="fw-extrabold text-navy mb-1">{{ $plansCount }}</h2>
            <small class="text-muted"><a href="{{ route('admin.plans.index') }}" class="text-teal text-decoration-none">Paketleri Gör &rarr;</a></small>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Quick Section Toggles -->
    <div class="col-12 col-lg-5">
        <div class="card border-0 shadow-sm p-3 p-md-4 h-100" style="border-radius: 20px; background: #fff;">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="fw-bold text-navy mb-0">Hızlı Bölüm Yayını</h5>
                <a href="{{ route('admin.sections.index') }}" class="text-teal small fw-semibold text-decoration-none">Tüm Bölümler &rarr;</a>
            </div>
            <p class="text-secondary small mb-4">Fiyatlandırma, müşteri yorumları ve tanıtım videosunu ana sayfada tek tıkla yayına alın veya kaldırın.</p>

            <div class="list-group list-group-flush">
                @foreach($toggleableSections as $sec)
                    <div class="list-group-item d-flex align-items-center justify-content-between px-0 py-3 border-light">
                        <div>
                            <h6 class="mb-0 fw-bold text-navy">
                                @if($sec->key === 'pricing') Fiyatlandırma Bölümü
                                @elseif($sec->key === 'testimonials') Müşteri Yorumları Bölümü
                                @elseif($sec->key === 'video') Tanıtım Videosu Bölümü
                                @else {{ ucfirst($sec->key) }} @endif
                            </h6>
                            <small class="text-muted">Ana sayfa bölümü (<code>#{{ $sec->key }}</code>)</small>
                        </div>
                        <div class="form-check form-switch fs-4">
                            <input class="form-check-input section-toggle-switch" type="checkbox" role="switch" data-url="{{ route('admin.sections.toggle', $sec->id) }}" {{ $sec->is_active ? 'checked' : '' }}>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Recent Leads -->
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 20px; background: #fff;">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="fw-bold text-navy mb-0">Son Gelen Talepler</h5>
                <a href="{{ route('admin.leads.index') }}" class="text-teal small fw-semibold text-decoration-none">Tümünü Gör ({{ $totalLeads }}) &rarr;</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="text-secondary small border-bottom">
                            <th>AD / FİRMA</th>
                            <th>KAYNAK</th>
                            <th>TARİH</th>
                            <th>DURUM</th>
                            <th class="text-end">İŞLEM</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentLeads as $lead)
                            <tr>
                                <td>
                                    <div class="fw-bold text-navy">{{ $lead->name }}</div>
                                    <small class="text-muted">{{ $lead->company ?: $lead->email }}</small>
                                </td>
                                <td>
                                    <span class="badge {{ $lead->source === 'demo' ? 'bg-primary' : 'bg-info text-dark' }} px-2 py-1" style="font-size: 11px;">
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
                                        <span class="badge bg-danger">Yeni</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.leads.show', $lead->id) }}" class="btn btn-sm btn-outline-dark" style="border-radius: 8px;">
                                        İncele
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Henüz gelen bir talep bulunmamaktadır.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.section-toggle-switch').forEach(sw => {
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
                    console.log(data.message);
                }
            })
            .catch(err => {
                alert('Durum güncellenirken hata oluştu.');
                this.checked = !this.checked;
            });
        });
    });
</script>
@endpush
@endsection
