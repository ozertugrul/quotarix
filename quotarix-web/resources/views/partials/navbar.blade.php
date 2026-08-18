<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            QUOTA<span>RIX</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Menüyü Aç">
            <i class="bi bi-list fs-4"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('features*') ? 'text-teal fw-bold' : '' }}" href="{{ route('features') }}">Özellikler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('why') ? 'text-teal fw-bold' : '' }}" href="{{ route('why') }}">Neden Quotarix?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('roadmap') ? 'text-teal fw-bold' : '' }}" href="{{ route('roadmap') }}">Yol Haritası</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pricing') ? 'text-teal fw-bold' : '' }}" href="{{ route('pricing') }}">Fiyatlandırma</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blog*') ? 'text-teal fw-bold' : '' }}" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('faq') ? 'text-teal fw-bold' : '' }}" href="{{ route('faq') }}">SSS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'text-teal fw-bold' : '' }}" href="{{ route('contact') }}">İletişim</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2 flex-wrap mt-3 mt-lg-0">
                <a class="btn btn-cta" href="{{ whatsapp_link() }}" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-whatsapp me-1"></i> Ücretsiz Deneyin
                </a>
                <a class="btn btn-outline-dark" style="border-radius: 10px; padding: 9px 18px; font-weight: 600; font-size: 14px;" href="{{ setting('app_url', 'https://app.quotarix.com') }}" target="_blank" rel="noopener noreferrer">
                    Giriş
                </a>
            </div>
        </div>
    </div>
</nav>
