<div class="modal fade" id="demoModal" tabindex="-1" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; overflow: hidden; box-shadow: 0 25px 80px rgba(10,22,40,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, var(--navy), var(--navy-light)); padding: 24px 32px; color: #fff;">
                <div>
                    <h5 class="modal-title fw-bold" id="demoModalLabel" style="color: #fff;">Ücretsiz Demo Talep Edin</h5>
                    <p class="mb-0 text-white-50 small mt-1">15 dakikada Quotarix farkını ekibinizle birlikte görün.</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <form action="{{ route('demo.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source" value="demo">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-navy">Ad Soyad <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required placeholder="Adınız ve Soyadınız" style="border-radius: 10px; padding: 12px 16px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-navy">Şirket Adı <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company" required placeholder="Lojistik / Forwarder Firmanız" style="border-radius: 10px; padding: 12px 16px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-navy">Kurumsal E-posta <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" required placeholder="ornek@sirket.com" style="border-radius: 10px; padding: 12px 16px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-navy">Telefon Numarası <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" name="phone" required placeholder="05XX XXX XX XX" style="border-radius: 10px; padding: 12px 16px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-navy">Satış Ekibi Büyüklüğü</label>
                        <select class="form-select" name="message" style="border-radius: 10px; padding: 12px 16px;">
                            <option value="Satış Ekibi: 1-3 kişi">1 - 3 kişi</option>
                            <option value="Satış Ekibi: 4-10 kişi">4 - 10 kişi</option>
                            <option value="Satış Ekibi: 11-25 kişi">11 - 25 kişi</option>
                            <option value="Satış Ekibi: 25+ kişi">25+ kişi</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-cta w-100 py-3 mt-3 fw-bold" style="font-size: 16px; border-radius: 12px;">
                        <i class="bi bi-rocket-takeoff me-2"></i> Demo Talep Et
                    </button>
                    <p class="text-center mt-3 mb-0 small text-muted">
                        <i class="bi bi-lock-fill text-teal me-1"></i> Bilgileriniz KVKK kapsamında korunur. Spam gönderilmez.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
