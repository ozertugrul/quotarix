<section class="section bg-light-teal" id="roadmap">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="section-badge">Gelecek Vizyonu</span>
            <h2 class="section-title">Daha Fazlası Yolda</h2>
            <p class="section-subtitle mx-auto">Sektörün ihtiyaçlarını dinliyor, Quotarix'i her ay yeni yapay zeka yetenekleriyle güçlendiriyoruz.</p>
        </div>
        <div class="row g-4">
            @foreach($roadmapFeatures as $rf)
                <div class="col-md-6 fade-up">
                    <div class="card h-100 p-4 border-0 shadow-sm" style="border-radius: 20px; background: #fff;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="feature-icon" style="width: 52px; height: 52px; font-size: 22px; margin-bottom: 0;">
                                <i class="bi {{ $rf->icon ?: 'bi-stars' }}"></i>
                            </div>
                            <span class="badge bg-amber text-dark px-3 py-2 fw-bold" style="background: rgba(245,158,11,0.15) !important; color: #b45309 !important; border-radius: 100px; font-size: 13px;">
                                <i class="bi bi-clock-history me-1"></i> Yakında
                            </span>
                        </div>
                        <h4 class="fw-bold mb-2">{{ $rf->title }}</h4>
                        <p class="text-secondary mb-0" style="font-size: 15px; line-height: 1.6;">
                            {{ $rf->summary }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5 fade-up">
            <a href="{{ route('roadmap') }}" class="btn btn-outline-dark px-4 py-3 fw-bold" style="border-radius: 12px; font-size: 15px;">
                Tüm Yol Haritasını ve Planlanan Özellikleri Gör <i class="bi bi-arrow-right ms-2 text-teal"></i>
            </a>
        </div>
    </div>
</section>
