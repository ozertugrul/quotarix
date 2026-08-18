<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi | Quotarix Admin</title>

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
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, var(--navy), var(--navy-light));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-card {
            background: #fff;
            border-radius: 24px;
            padding: 48px 40px;
            max-width: 440px;
            width: 100%;
            box-shadow: 0 25px 80px rgba(0,0,0,0.35);
        }

        .brand-logo {
            font-size: 26px;
            font-weight: 800;
            color: var(--navy);
            text-align: center;
            margin-bottom: 24px;
        }
        .brand-logo span { color: var(--teal); }

        .btn-login {
            background: var(--teal);
            color: #fff;
            font-weight: 700;
            border-radius: 12px;
            padding: 13px;
            width: 100%;
            border: none;
            transition: all 0.2s;
        }
        .btn-login:hover {
            background: #0d9488;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand-logo">
        QUOTA<span>RIX</span>
        <div class="text-muted fw-normal fs-6 mt-1">Yönetim Paneli Girişi</div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger p-3 mb-4 small" style="border-radius: 12px;">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold small text-secondary">E-posta Adresi</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0" style="border-radius: 12px 0 0 12px;"><i class="bi bi-envelope text-muted"></i></span>
                <input type="email" name="email" class="form-control bg-light border-start-0" value="{{ old('email', 'fatih@pekvera.com') }}" required autofocus placeholder="ornek@pekvera.com" style="border-radius: 0 12px 12px 0; padding: 12px 16px;">
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold small text-secondary">Şifre</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0" style="border-radius: 12px 0 0 12px;"><i class="bi bi-lock text-muted"></i></span>
                <input type="password" name="password" class="form-control bg-light border-start-0" required placeholder="••••••••" style="border-radius: 0 12px 12px 0; padding: 12px 16px;">
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                <label class="form-check-label small text-secondary" for="rememberMe">
                    Beni Hatırla
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-login">
            <i class="bi bi-box-arrow-in-right me-2"></i> Güvenli Giriş Yap
        </button>
    </form>

    <div class="text-center mt-4 pt-2">
        <a href="{{ route('home') }}" class="text-decoration-none small text-muted">
            <i class="bi bi-arrow-left me-1"></i> Tanıtım Sitesine Dön
        </a>
    </div>
</div>

</body>
</html>
