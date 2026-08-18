<section class="section" id="pricing">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="section-badge">Fiyatlandırma</span>
            <h2 class="section-title">Şeffaf ve Esnek Paketler</h2>
            <p class="section-subtitle mx-auto">Gizli maliyet veya sürpriz fatura yok. Satış ekibinizin büyüklüğüne göre ölçekleyin.</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($plans as $plan)
                <div class="col-lg-5 col-md-6 fade-up">
                    <div class="pricing-card h-100 d-flex flex-column {{ $plan->is_featured ? 'featured' : '' }}" style="border-radius: 20px; padding: 36px; background: #fff; border: {{ $plan->is_featured ? '2px solid var(--teal)' : '1px solid var(--border)' }}; box-shadow: {{ $plan->is_featured ? '0 15px 40px rgba(14,165,165,0.12)' : 'none' }}; position: relative;">
                        @if($plan->is_featured)
                            <div class="position-absolute top-0 end-0 mt-3 me-3">
                                <span class="badge bg-teal text-white px-3 py-2 fw-bold" style="background: var(--teal); border-radius: 100px; font-size: 12px;">En Çok Tercih Edilen</span>
                            </div>
                        @endif
                        <h4 class="fw-bold mb-2">{{ $plan->name }}</h4>
                        <div class="my-3">
                            @if($plan->price)
                                <span style="font-size: 42px; font-weight: 800; color: var(--navy);">${{ number_format($plan->price, 0) }}</span>
                                <span class="text-muted" style="font-size: 14px;">/ {{ $plan->period }}</span>
                            @else
                                <span style="font-size: 32px; font-weight: 800; color: var(--navy);">Özel Teklif</span>
                                <span class="text-muted d-block" style="font-size: 14px;">10+ kullanıcı için</span>
                            @endif
                        </div>
                        <ul class="list-unstyled my-4 flex-grow-1">
                            @if(is_array($plan->features_list))
                                @foreach($plan->features_list as $feat)
                                    <li class="d-flex align-items-center mb-3 text-secondary" style="font-size: 15px;">
                                        <i class="bi bi-check-circle-fill text-teal me-2 fs-5"></i>
                                        <span>{{ $feat }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="pt-3 border-top border-light">
                            <a href="{{ route('demo') }}" class="btn {{ $plan->is_featured ? 'btn-cta' : 'btn-outline-dark' }} w-100 py-3 fw-bold" style="border-radius: 12px;">
                                {{ $plan->price ? 'Hemen Başlayın' : 'Teklif İsteyin' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
