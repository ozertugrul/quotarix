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

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            min-height: 100vh;
        }

        #adminSidebar {
            width: var(--sidebar-width);
            background: var(--navy);
            color: #fff;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            transition: all 0.3s ease;
            box-shadow: 2px 0 16px rgba(10,22,40,0.15);
        }

        #adminMain {
            margin-left: var(--sidebar-width);
            padding-bottom: 60px;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
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

    <!-- Sidebar -->
    <aside id="adminSidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <div>QUOTA<span>RIX</span> <small class="text-white-50 ms-1 fw-normal" style="font-size: 11px;">Panel</small></div>
        </a>

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
            <div>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary" style="border-radius: 8px;">
                    <i class="bi bi-box-arrow-up-right me-1"></i> Siteyi Görüntüle
                </a>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px; background: var(--navy) !important;">
                        {{ mb_substr(auth('admin')->user()?->name ?? 'A', 0, 1) }}
                    </div>
                    <span class="fw-semibold small text-navy">{{ auth('admin')->user()?->name ?? 'Yönetici' }}</span>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" title="Çıkış Yap">
                        <i class="bi bi-box-arrow-right me-1"></i> Çıkış
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
    </script>

    @stack('scripts')
</body>
</html>
