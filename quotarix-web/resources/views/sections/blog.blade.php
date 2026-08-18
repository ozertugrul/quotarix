<section class="section bg-light-teal" id="blog">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="section-badge">Blog & Rehber</span>
            <h2 class="section-title">Lojistik Satışında Başarı İpuçları</h2>
            <p class="section-subtitle mx-auto">Freight forwarder firmalar için satış stratejileri, teklif dönüşüm oranları ve teknoloji analizleri.</p>
        </div>
        <div class="row g-4">
            @foreach($latestPosts as $post)
                <div class="col-lg-4 col-md-6 fade-up">
                    <div class="blog-card h-100 d-flex flex-column" style="background:#fff; border-radius:20px; padding:28px; border:1px solid var(--border);">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge bg-teal text-white px-3 py-2 fw-semibold" style="background:var(--teal); border-radius:100px; font-size:12px;">
                                {{ $post->category ?: 'Lojistik' }}
                            </span>
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : 'Nisan 2026' }}</small>
                        </div>
                        <h4 class="fw-bold mb-3" style="font-size:20px; line-height:1.4;">
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-dark text-decoration-none hover-teal">
                                {{ $post->title }}
                            </a>
                        </h4>
                        <p class="text-secondary mb-4 flex-grow-1" style="font-size:15px; line-height:1.6;">
                            {{ \Illuminate\Support\Str::limit($post->summary, 110) }}
                        </p>
                        <div class="pt-3 border-top border-light">
                            <a href="{{ route('blog.show', $post->slug) }}" class="fw-bold text-teal text-decoration-none d-inline-flex align-items-center">
                                Devamını Oku <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5 fade-up">
            <a href="{{ route('blog') }}" class="btn btn-outline-dark px-4 py-3 fw-bold" style="border-radius: 12px; font-size: 15px;">
                Tüm Blog Yazılarını Gör <i class="bi bi-arrow-right ms-2 text-teal"></i>
            </a>
        </div>
    </div>
</section>
