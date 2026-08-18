@if(isset($video) && $video)
    <section class="section" id="video">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <span class="section-badge">Tanıtım</span>
                <h2 class="section-title">{{ $video->title ?: 'Quotarix Nasıl Çalışır?' }}</h2>
                <p class="section-subtitle mx-auto">1 dakikada Quotarix'in sunduğu akıllı teklif ve CRM deneyimini izleyin.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 fade-up">
                    <div class="video-facade-container position-relative overflow-hidden shadow-lg" id="videoFacade" data-embed-url="{{ $video->embed_url }}" style="border-radius: 24px; aspect-ratio: 16/9; background: #000; cursor: pointer;">
                        @if($video->thumb)
                            <img src="{{ $video->thumb }}" alt="{{ $video->title }}" class="w-100 h-100 object-fit-cover" style="opacity: 0.85;" loading="lazy">
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-navy">
                                <i class="bi bi-play-circle-fill text-teal" style="font-size: 80px;"></i>
                            </div>
                        @endif
                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                            <button type="button" class="btn btn-teal rounded-circle d-flex align-items-center justify-content-center shadow-lg play-btn-pulse" style="width: 84px; height: 84px; background: var(--teal); border: none; color: #fff;" aria-label="Videoyu Oynat">
                                <i class="bi bi-play-fill fs-1 ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const facade = document.getElementById('videoFacade');
            if (facade) {
                facade.addEventListener('click', function () {
                    const embedUrl = this.getAttribute('data-embed-url');
                    if (embedUrl) {
                        this.innerHTML = `<iframe src="${embedUrl}" class="w-100 h-100" style="border:0;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`;
                    }
                });
            }
        });
    </script>
    @endpush
@endif
