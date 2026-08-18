<section class="section pt-0" id="cta">
    <div class="container">
        <div class="cta-section fade-up text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, var(--navy), var(--navy-light)); border-radius: 28px; padding: 64px 32px; color: #fff;">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="badge px-3 py-2 mb-3" style="background: rgba(14,165,165,0.2); color: var(--teal-light); border-radius: 100px; font-size: 13px;">
                        <i class="bi bi-clock-history me-1"></i> 14 Gün Ücretsiz Deneyin
                    </span>
                    <h2 style="color: #fff; font-weight: 800; font-size: 36px; margin-bottom: 16px;">
                        Forwarder Satışınızı Bugün Hızlandırın
                    </h2>
                    <p style="color: rgba(255,255,255,0.7); font-size: 17px; line-height: 1.7; max-width: 600px; margin: 0 auto 36px auto;">
                        Kredi kartı gerekmez. 5 dakikada hesabınızı oluşturun, ekibinizi davet edin ve tekliflerinizi merkezi hafızaya alın.
                    </p>

                    <div class="card p-4 mx-auto text-start shadow-lg border-0" style="max-width: 540px; border-radius: 20px; background: #fff;">
                        <h5 class="fw-bold text-navy mb-3">Hızlı Demo Talebi</h5>
                        <form action="{{ route('demo.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="source" value="demo">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-navy">Ad Soyad <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Adınız Soyadınız" required style="border-radius: 10px; padding: 12px 14px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-navy">Kurumsal E-posta <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="ornek@sirket.com" required style="border-radius: 10px; padding: 12px 14px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-navy">Telefon Numarası <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control" placeholder="05XX XXX XX XX" required style="border-radius: 10px; padding: 12px 14px;">
                            </div>
                            <button type="submit" class="btn btn-cta w-100 py-3 fw-bold mt-2" style="border-radius: 12px; font-size: 16px;">
                                <i class="bi bi-rocket-takeoff me-2"></i> Ücretsiz Demo Başlat
                            </button>
                        </form>
                    </div>

                    <div class="d-flex align-items-center justify-content-center gap-3 mt-4 flex-wrap">
                        <span class="text-white-50 small">veya doğrudan bize ulaşın:</span>
                        <a href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light btn-sm px-3 py-2 fw-semibold" style="border-radius: 8px;">
                            <i class="bi bi-whatsapp text-teal-light me-1"></i> WhatsApp'tan Yazın
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
