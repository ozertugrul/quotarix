<div id="cookieConsentBanner" class="position-fixed bottom-0 start-0 end-0 p-3 bg-dark text-white shadow-lg d-none" style="z-index: 1060; background: rgba(10, 22, 40, 0.98) !important; border-top: 1px solid rgba(14, 165, 165, 0.3);">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
        <div class="small">
            <i class="bi bi-shield-check text-teal fs-5 me-2"></i>
            Deneyiminizi iyileştirmek ve sitemizin güvenliğini sağlamak için çerezler kullanıyoruz. Detaylı bilgi için 
            <a href="{{ route('page', 'kvkk') }}" class="text-teal text-decoration-underline" target="_blank">KVKK Aydınlatma Metni</a> ve 
            <a href="{{ route('page', 'gizlilik-politikasi') }}" class="text-teal text-decoration-underline" target="_blank">Gizlilik Politikamızı</a> inceleyebilirsiniz.
        </div>
        <div class="d-flex gap-2 flex-shrink-0">
            <button type="button" id="btnRejectCookie" class="btn btn-sm btn-outline-light px-3" style="border-radius: 8px;">Reddet</button>
            <button type="button" id="btnAcceptCookie" class="btn btn-sm btn-cta px-4" style="border-radius: 8px;">Kabul Et</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const consent = localStorage.getItem('qx_cookie_consent');
        const banner = document.getElementById('cookieConsentBanner');
        if (!consent && banner) {
            banner.classList.remove('d-none');
        }

        document.getElementById('btnAcceptCookie')?.addEventListener('click', function() {
            localStorage.setItem('qx_cookie_consent', 'accepted');
            banner?.classList.add('d-none');
        });

        document.getElementById('btnRejectCookie')?.addEventListener('click', function() {
            localStorage.setItem('qx_cookie_consent', 'rejected');
            banner?.classList.add('d-none');
        });
    });
</script>
