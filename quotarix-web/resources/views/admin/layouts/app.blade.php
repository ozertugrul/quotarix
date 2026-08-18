<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') | Quotarix Yönetim</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 & Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #0a1628;
            --navy-light: #112240;
            --teal: #0ea5a5;
            --teal-light: #2dd4bf;
            --sidebar-width: 260px;
        }

        html, body {
            max-width: 100vw !important;
            overflow-x: hidden !important;
            position: relative;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            min-height: 100vh;
        }

        .text-navy {
            color: var(--navy) !important;
        }

        .text-teal {
            color: var(--teal) !important;
        }

        /* Badge Contrast Fixes */
        .badge.bg-light {
            background-color: #f8fafc !important;
            color: #475569 !important;
            border: 1px solid #cbd5e1 !important;
        }

        .badge.bg-light.text-navy {
            color: var(--navy) !important;
        }

        .badge.bg-light.text-secondary {
            color: #475569 !important;
        }

        .badge.bg-light.text-success {
            color: #16a34a !important;
            border-color: #bbf7d0 !important;
        }

        .badge.bg-light.text-muted {
            color: #64748b !important;
        }

        #adminSidebar {
            width: var(--sidebar-width);
            background: var(--navy);
            color: #fff;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 2px 0 16px rgba(10,22,40,0.15);
        }

        #adminMain {
            margin-left: var(--sidebar-width);
            padding-bottom: 60px;
            min-width: 0;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Mobile Sidebar Offcanvas & Responsive Rules */
        @media (max-width: 991.98px) {
            #adminSidebar {
                transform: translateX(-100%);
            }

            #adminSidebar.show {
                transform: translateX(0);
            }

            #adminMain {
                margin-left: 0 !important;
                width: 100% !important;
            }

            .admin-topbar {
                padding: 0 16px !important;
            }

            .admin-content {
                padding: 16px !important;
            }
        }

        .sidebar-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(10, 22, 40, 0.5);
            backdrop-filter: blur(2px);
            z-index: 1045;
            transition: opacity 0.3s ease;
        }

        .sidebar-backdrop.show {
            display: block;
        }

        .sidebar-brand {
            padding: 20px;
            background: rgba(0,0,0,0.15);
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .sidebar-brand span { color: var(--teal-light); }

        .sidebar-menu {
            list-style: none;
            padding: 12px 10px;
            margin: 0;
        }

        .sidebar-item {
            margin-bottom: 4px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 11px 16px;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
        }

        .sidebar-link i {
            font-size: 18px;
            margin-right: 12px;
            width: 24px;
            text-align: center;
        }

        .sidebar-link:hover, .sidebar-link.active {
            color: #fff;
            background: rgba(14, 165, 165, 0.2);
            border-left: 3px solid var(--teal-light);
        }

        .sidebar-link.active i {
            color: var(--teal-light);
        }

        .admin-topbar {
            background: #fff;
            height: 68px;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .admin-content {
            padding: 32px;
            width: 100%;
            max-width: 100% !important;
            overflow-x: hidden !important;
            box-sizing: border-box !important;
        }

        .admin-content .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .admin-content h1,
        .admin-content h2,
        .admin-content h3,
        .admin-content h4,
        .admin-content h5,
        .admin-content h6,
        .admin-content p {
            overflow-wrap: break-word;
            word-break: normal;
        }

        .admin-content code,
        .admin-content pre {
            word-break: break-all !important;
            white-space: pre-wrap !important;
            max-width: 100% !important;
        }

        .admin-content .card {
            max-width: 100% !important;
            overflow: hidden !important;
            box-sizing: border-box !important;
        }

        /* Dual Responsive Mode: Desktop Table vs Mobile Cards */
        @media (max-width: 767.98px) {
            .desktop-only-table {
                display: none !important;
            }
            .mobile-only-cards {
                display: block !important;
            }
        }

        @media (min-width: 768px) {
            .desktop-only-table {
                display: block !important;
            }
            .mobile-only-cards {
                display: none !important;
            }
        }

        .table-responsive {
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 12px;
        }

        .table-responsive table {
            width: 100%;
            margin-bottom: 0;
        }

        .table-responsive th {
            white-space: nowrap;
        }

        .table-responsive td {
            white-space: normal;
        }

        .card-dashboard {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: transform 0.2s;
        }
        .card-dashboard:hover {
            transform: translateY(-2px);
        }

        .badge-unread {
            background: #ef4444;
            color: #fff;
            font-size: 11px;
            border-radius: 50rem;
            padding: 2px 7px;
            margin-left: auto;
        }

        .btn-teal {
            background: var(--teal);
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            border: none;
        }
        .btn-teal:hover {
            background: #0d9488;
            color: #fff;
        }

        /* Responsive Table & Text Overflow Utilities */
        .table-responsive {
            -webkit-overflow-scrolling: touch;
            border-radius: 12px;
        }

        .word-break-all {
            word-break: break-word !important;
            overflow-wrap: anywhere !important;
        }

        .white-space-nowrap {
            white-space: nowrap !important;
        }

        /* SortableJS drag styling */
        .sortable-ghost {
            opacity: 0.4;
            background: #e2e8f0 !important;
        }
        .sort-handle {
            cursor: grab;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Backdrop for Mobile Sidebar -->
    <div id="sidebarBackdrop" class="sidebar-backdrop"></div>

    <!-- Sidebar -->
    <aside id="adminSidebar">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none d-flex align-items-center">
                <div>QUOTA<span>RIX</span> <small class="text-white-50 ms-1 fw-normal" style="font-size: 11px;">Panel</small></div>
            </a>
            <button id="sidebarCloseBtn" class="btn text-white-50 p-0 border-0 d-lg-none fs-4" aria-label="Menüyü Kapat">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        @php
            $unreadCount = \App\Models\Lead::unread()->count();
        @endphp

        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.sections.index') }}" class="sidebar-link {{ request()->routeIs('admin.sections*') ? 'active' : '' }}">
                    <i class="bi bi-layout-text-window-reverse"></i> Bölüm Yönetimi
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.features.index') }}" class="sidebar-link {{ request()->routeIs('admin.features*') ? 'active' : '' }}">
                    <i class="bi bi-stars"></i> Özellikler & Yol Haritası
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.posts.index') }}" class="sidebar-link {{ request()->routeIs('admin.posts*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Blog Yazıları
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.faqs.index') }}" class="sidebar-link {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}">
                    <i class="bi bi-question-circle"></i> Sıkça Sorulan Sorular
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.plans.index') }}" class="sidebar-link {{ request()->routeIs('admin.plans*') ? 'active' : '' }}">
                    <i class="bi bi-tag"></i> Fiyatlandırma Paketleri
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                    <i class="bi bi-chat-quote"></i> Müşteri Yorumları
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.videos.index') }}" class="sidebar-link {{ request()->routeIs('admin.videos*') ? 'active' : '' }}">
                    <i class="bi bi-camera-video"></i> Tanıtım Videoları
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.leads.index') }}" class="sidebar-link {{ request()->routeIs('admin.leads*') ? 'active' : '' }}">
                    <i class="bi bi-inbox"></i> Demo & Talepler
                    @if($unreadCount > 0)
                        <span class="badge-unread">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.pages.index') }}" class="sidebar-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i> Sayfalar & Meta
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="bi bi-gear"></i> Site Ayarları
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Wrapper -->
    <div id="adminMain">
        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-2">
                <button id="sidebarToggle" class="btn btn-sm btn-light border d-lg-none px-2 py-1" type="button" aria-label="Menüyü Aç">
                    <i class="bi bi-list fs-4 text-navy"></i>
                </button>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary" style="border-radius: 8px;">
                    <i class="bi bi-box-arrow-up-right me-1"></i> <span class="d-none d-sm-inline">Siteyi Görüntüle</span><span class="d-inline d-sm-none">Site</span>
                </a>
            </div>
            <div class="d-flex align-items-center gap-2 gap-sm-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 34px; height: 34px; background: var(--navy) !important; font-size: 14px;">
                        {{ mb_substr(auth('admin')->user()?->name ?? 'A', 0, 1) }}
                    </div>
                    <span class="fw-semibold small text-navy d-none d-sm-inline">{{ auth('admin')->user()?->name ?? 'Yönetici' }}</span>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" title="Çıkış Yap">
                        <i class="bi bi-box-arrow-right me-1"></i> <span class="d-none d-sm-inline">Çıkış</span>
                    </button>
                </form>
            </div>
        </header>

        <main class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert" style="border-radius: 12px;">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4 shadow-sm" role="alert" style="border-radius: 12px;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5.3.3 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SortableJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>

    <script>
        // Setup CSRF token for all AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        // Sidebar Toggle & Mobile Backdrop Logic
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('adminSidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            const closeBtn = document.getElementById('sidebarCloseBtn');
            const backdrop = document.getElementById('sidebarBackdrop');

            function openSidebar() {
                if (sidebar) sidebar.classList.add('show');
                if (backdrop) backdrop.classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                if (sidebar) sidebar.classList.remove('show');
                if (backdrop) backdrop.classList.remove('show');
                document.body.style.overflow = '';
            }

            if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (backdrop) backdrop.addEventListener('click', closeSidebar);

            // Auto-close sidebar on link click on mobile
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 992) {
                        closeSidebar();
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
