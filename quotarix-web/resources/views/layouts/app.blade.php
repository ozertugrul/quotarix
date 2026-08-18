<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('partials.seo')

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 & Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Quotarix Custom Styles -->
    <link href="{{ asset('assets/css/quotarix.css') }}" rel="stylesheet">

    <style>
        .text-teal { color: var(--teal) !important; }
        .text-navy { color: var(--navy) !important; }
        .bg-navy-dark { background-color: var(--navy) !important; }
        .border-teal { border-color: var(--teal) !important; }
    </style>

    @stack('styles')
</head>
<body>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 shadow-lg" role="alert" style="z-index: 1080; border-radius: 12px;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 shadow-lg" role="alert" style="z-index: 1080; border-radius: 12px;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
        </div>
    @endif

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.cookie-consent')
    @include('partials.demo-modal')

    <!-- Bootstrap 5.3.3 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Client-Side Hash / Anchor Redirects -->
    <script src="{{ asset('assets/js/qx-redirects.js') }}"></script>

    <!-- Global App Interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Navbar scroll styling
            const mainNav = document.getElementById('mainNav');
            if (mainNav) {
                window.addEventListener('scroll', () => {
                    mainNav.classList.toggle('scrolled', window.scrollY > 40);
                });
                if (window.scrollY > 40) mainNav.classList.add('scrolled');
            }

            // Fade-up scroll observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.08 });

            document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

            // Stat Counter Animation
            const counters = document.querySelectorAll('.stat-value[data-count]');
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const target = parseInt(el.dataset.count, 10);
                        let current = 0;
                        const step = Math.max(1, target / 35);
                        const timer = setInterval(() => {
                            current += step;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                            }
                            el.textContent = Math.floor(current);
                        }, 25);
                        counterObserver.unobserve(el);
                    }
                });
            }, { threshold: 0.4 });

            counters.forEach(c => counterObserver.observe(c));
        });
    </script>

    @stack('scripts')
</body>
</html>
