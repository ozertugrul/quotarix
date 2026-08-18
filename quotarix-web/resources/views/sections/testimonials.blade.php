@if(isset($testimonials) && $testimonials->isNotEmpty())
    <section class="section bg-light-teal" id="testimonials">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-badge">Müşteri Yorumları</span>
                <h2 class="section-title">Forwarder Liderleri Ne Diyor?</h2>
                <p class="section-subtitle mx-auto">Quotarix ile satış süreçlerini hızlandıran ve müşteri hafızasını koruyan lojistik ekipleri.</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($testimonials as $item)
                    <div class="col-lg-4 col-md-6 fade-up">
                        <div class="card h-100 p-4 border-0 shadow-sm" style="border-radius: 20px; background: #fff;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="text-warning me-2">
                                    @for($i = 0; $i < ($item->rating ?: 5); $i++)
                                        <i class="bi bi-star-fill text-amber"></i>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-secondary fst-italic mb-4 flex-grow-1" style="font-size: 15px; line-height: 1.7;">
                                "{{ $item->quote }}"
                            </p>
                            <div class="d-flex align-items-center pt-3 border-top border-light">
                                <div class="avatar-circle me-3" style="width: 46px; height: 46px; border-radius: 50%; background: var(--teal-light); color: var(--navy); display: flex; align-items: center; justify-content: center; font-weight: 700;">
                                    {{ mb_substr($item->name, 0, 1) }}
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-navy">{{ $item->name }}</h6>
                                    <small class="text-muted">{{ $item->role ? $item->role . ' — ' : '' }}{{ $item->company }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
