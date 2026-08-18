<section class="section" id="features">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="section-badge">Özellikler</span>
            <h2 class="section-title">Her Şey Tek Platformda</h2>
            <p class="section-subtitle mx-auto">Satıştan operasyona giden yolda hiçbir bilgi kaybolmasın. Tekliflerinizi, müşterilerinizi ve ekip performansınızı tek yerden yönetin.</p>
        </div>
        <div class="row g-4">
            @foreach($features as $feature)
                <div class="col-lg-4 fade-up">
                    <div class="feature-card d-flex flex-column">
                        <div class="feature-icon">
                            <i class="bi {{ $feature->icon ?: 'bi-stars' }}"></i>
                        </div>
                        <h4>{{ $feature->title }}</h4>
                        <p class="text-secondary flex-grow-1" style="font-size: 15px; line-height: 1.6;">
                            {{ \Illuminate\Support\Str::limit($feature->summary, 90) }}
                        </p>
                        <div class="mt-4 pt-3 border-top border-light">
                            <a href="{{ route('features.show', $feature->slug) }}" class="fw-bold text-teal text-decoration-none d-inline-flex align-items-center">
                                Detayları İncele <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5 fade-up">
            <a href="{{ route('features') }}" class="btn btn-outline-dark px-4 py-3 fw-bold" style="border-radius: 12px; font-size: 15px;">
                Tüm Özellikleri İncele <i class="bi bi-arrow-right ms-2 text-teal"></i>
            </a>
        </div>
    </div>
</section>
