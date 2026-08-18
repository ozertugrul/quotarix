<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <h4 style="color: #fff; font-weight: 800; font-size: 24px; margin-bottom: 16px;">
                        QUOTA<span style="color: var(--teal);">RIX</span>
                    </h4>
                </a>
                <p style="max-width: 320px;">Freight forwarder ve lojistik firmaları için CRM ve teklif yönetim platformu. Satışçınız ayrılsa bile müşteri hafızası şirketinizde kalır.</p>
                <div class="d-flex gap-3 mt-4">
                    @if(setting('social_linkedin'))
                        <a href="{{ setting('social_linkedin') }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" style="font-size: 20px;"><i class="bi bi-linkedin"></i></a>
                    @endif
                    @if(setting('social_instagram'))
                        <a href="{{ setting('social_instagram') }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram" style="font-size: 20px;"><i class="bi bi-instagram"></i></a>
                    @endif
                    @if(setting('social_twitter'))
                        <a href="{{ setting('social_twitter') }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter" style="font-size: 20px;"><i class="bi bi-twitter-x"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <h6>Hızlı Bağlantılar</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('features') }}">Özellikler</a></li>
                    <li class="mb-2"><a href="{{ route('why') }}">Neden Quotarix?</a></li>
                    <li class="mb-2"><a href="{{ route('roadmap') }}">Yol Haritası</a></li>
                    <li class="mb-2"><a href="{{ route('pricing') }}">Fiyatlandırma</a></li>
                    <li class="mb-2"><a href="{{ route('blog') }}">Blog & Rehber</a></li>
                    <li class="mb-2"><a href="{{ route('faq') }}">SSS</a></li>
                    <li class="mb-2"><a href="{{ route('demo') }}">Demo Talebi</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}">İletişim</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4 col-6">
                <h6>Yasal Bilgiler</h6>
                <ul class="list-unstyled">
                    @php
                        $legalPages = \App\Models\Page::active()->whereNotNull('body')->get();
                    @endphp
                    @foreach($legalPages as $lp)
                        <li class="mb-2">
                            <a href="{{ route('page', $lp->slug) }}">{{ $lp->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <h6>İletişim & Destek</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="mailto:{{ setting('contact_email', 'info@quotarix.com') }}">
                            <i class="bi bi-envelope me-2 text-teal"></i>{{ setting('contact_email', 'info@quotarix.com') }}
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+905469715249')) }}">
                            <i class="bi bi-phone me-2 text-teal"></i>{{ setting('contact_phone', '+90 546 971 52 49') }}
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-whatsapp me-2 text-teal"></i>WhatsApp Canlı Destek
                        </a>
                    </li>
                    <li class="mb-2 mt-3 text-secondary" style="font-size: 13px; line-height: 1.6;">
                        <i class="bi bi-geo-alt me-1 text-teal"></i>{{ setting('contact_address', 'İTOB Mah. 10032 Sk. No:2 İçkapı No:Z13 Menderes / İzmir — İzmir Bilimpark Teknokent') }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom text-center">
            <p class="mb-0">&copy; {{ date('Y') }} {{ setting('company_title', 'Pekvera Yazılım Teknoloji A.Ş.') }}. Tüm hakları saklıdır.</p>
        </div>
    </div>
</footer>
