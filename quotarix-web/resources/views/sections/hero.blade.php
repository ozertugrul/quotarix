<section class="hero" id="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 fade-up">
                <div class="hero-badge">
                    <i class="bi bi-lightning-charge-fill"></i> Freight Forwarder'lar İçin Özel Tasarlandı
                </div>
                <h1>Satışçınız Gitti.<br><span>Müşterileriniz de mi</span> Gitti?</h1>
                <p class="lead">Satış temsilciniz 6 ay çalışır, tüm müşteri ilişkisini kendi ajandasında tutar. Ayrıldığında hepsi onunla gider. Quotarix ziyaretleri, notları ve teklifleri şirketinizde tutar.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn-hero" href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-rocket-takeoff me-1"></i> Ücretsiz Demo Talep Et
                    </a>
                    <a class="btn-hero-outline" href="{{ route('features') }}">
                        <i class="bi bi-arrow-right-circle me-1"></i> Özellikleri İncele
                    </a>
                </div>
                <div class="hero-trust">
                    <span><i class="bi bi-check-circle-fill"></i>Forwarder'a özel — genel CRM değil</span>
                    <span><i class="bi bi-check-circle-fill"></i>Türkçe, yerli, KVKK uyumlu</span>
                    <span><i class="bi bi-check-circle-fill"></i>Kurulum ve eğitim desteği</span>
                </div>
            </div>
            <div class="col-lg-6 text-center fade-up">
                <picture>
                    <source srcset="{{ asset('assets/img/hero.webp') }}" type="image/webp">
                    <img src="{{ asset('assets/img/hero.png') }}" alt="Quotarix Mobil ve Web Forwarder CRM Ekranı" class="hero-img" loading="eager" width="800" height="436">
                </picture>
            </div>
        </div>
    </div>
</section>
