@php
    $siteName = config('app.name', 'Quotarix');
    $defaultTitle = $siteName . ' | Forwarder Satış Ekibiniz İçin CRM — Müşteriniz Şirkette Kalsın';
    $defaultDesc = 'Freight forwarder firmalar için satış yönetimi. Satışçı ayrılsa bile müşteri ilişkisi, ziyaretler ve teklifler şirketinizde kalır. Ekip performansını anlık görün.';

    // Meta title formatting
    if (isset($metaTitle) && !empty($metaTitle)) {
        $finalTitle = $metaTitle;
    } elseif (isset($title) && !empty($title)) {
        $finalTitle = $title . ' | ' . $siteName;
    } else {
        $finalTitle = $defaultTitle;
    }

    $finalDesc = $metaDescription ?? $defaultDesc;
    $canonicalUrl = url()->current();
    $ogImage = isset($ogImage) && !empty($ogImage) ? $ogImage : asset('assets/img/hero.png');
@endphp

<title>{{ $finalTitle }}</title>
<meta name="description" content="{{ $finalDesc }}">
<link rel="canonical" href="{{ $canonicalUrl }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $ogType ?? 'website' }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:title" content="{{ $finalTitle }}">
<meta property="og:description" content="{{ $finalDesc }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="tr_TR">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $canonicalUrl }}">
<meta name="twitter:title" content="{{ $finalTitle }}">
<meta name="twitter:description" content="{{ $finalDesc }}">
<meta name="twitter:image" content="{{ $ogImage }}">
