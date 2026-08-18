@php
    $ga4Id = setting('ga4_id');
@endphp

<div id="cookieConsentBanner" class="position-fixed bottom-0 start-0 end-0 p-3 p-md-4 bg-dark text-white shadow-lg d-none" style="z-index: 1070; background: rgba(10, 22, 40, 0.98) !important; border-top: 1px solid rgba(14, 165, 165, 0.35); backdrop-filter: blur(12px);">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
        <div class="small" style="line-height: 1.6;">
            <i class="bi bi-shield-check text-teal fs-5 me-2 align-middle"></i>
            Web sitemizde en iyi deneyimi sunabilmek ve site trafiğimizi analiz edebilmek amacıyla 6698 sayılı KVKK kapsamında çerezler kullanmaktayız. Detaylı bilgi için 
            <a href="{{ route('page', 'kvkk') }}" class="text-teal text-decoration-underline fw-semibold" target="_blank">KVKK Aydınlatma Metni</a> ve 
            <a href="{{ route('page', 'gizlilik-politikasi') }}" class="text-teal text-decoration-underline fw-semibold" target="_blank">Gizlilik Politikamızı</a> inceleyebilirsiniz.
        </div>
        <div class="d-flex gap-2 flex-shrink-0">
            <button type="button" id="btnRejectCookie" class="btn btn-outline-light btn-sm px-3 py-2 fw-semibold" style="border-radius: 10px; font-size: 14px;">
                Reddet
            </button>
            <button type="button" id="btnAcceptCookie" class="btn btn-cta btn-sm px-4 py-2 fw-bold" style="border-radius: 10px; font-size: 14px;">
                Kabul Et
            </button>
        </div>
    </div>
</div>

<script>
    (function() {
        const ga4Id = @json($ga4Id);

        function qxLoadAnalytics() {
            if (!ga4Id || ga4Id.trim() === '') return;
            if (window.qxAnalyticsLoaded) return;
            window.qxAnalyticsLoaded = true;

            // Load Google Tag Manager / gtag.js asynchronously
            const script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(ga4Id);
            document.head.appendChild(script);

            window.dataLayer = window.dataLayer || [];
            function gtag(){ dataLayer.push(arguments); }
            window.gtag = gtag;

            gtag('js', new Date());
            gtag('config', ga4Id, {
                'anonymize_ip': true,
                'cookie_flags': 'SameSite=Lax;Secure'
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const consent = localStorage.getItem('qx_consent');
            const banner = document.getElementById('cookieConsentBanner');

            if (consent === 'accepted') {
                qxLoadAnalytics();
            } else if (consent === 'rejected') {
                // Do not load analytics
            } else {
                // Show banner if no consent decision recorded yet
                if (banner) {
                    banner.classList.remove('d-none');
                }
            }

            document.getElementById('btnAcceptCookie')?.addEventListener('click', function() {
                localStorage.setItem('qx_consent', 'accepted');
                if (banner) banner.classList.add('d-none');
                qxLoadAnalytics();
            });

            document.getElementById('btnRejectCookie')?.addEventListener('click', function() {
                localStorage.setItem('qx_consent', 'rejected');
                if (banner) banner.classList.add('d-none');
            });
        });
    })();
</script>
