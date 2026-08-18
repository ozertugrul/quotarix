@php
    $siteName = config('app.name', 'Quotarix');
    $isHome = request()->routeIs('home') || request()->is('/');
    
    // Title Resolution
    if (!empty($metaTitle)) {
        $finalTitle = $metaTitle;
    } elseif (!empty($title)) {
        $finalTitle = format_seo_title($title, $isHome);
    } else {
        $finalTitle = format_seo_title(null, true);
    }

    // Description Resolution
    $defaultDesc = 'Freight forwarder firmalar için satış yönetimi. Satışçı ayrılsa bile müşteri ilişkisi, ziyaretler ve teklifler şirketinizde kalır. Ekip performansını anlık görün.';
    $finalDesc = $metaDescription ?? $defaultDesc;

    // Canonical & Robots
    $canonicalUrl = url()->current();
    $isPaginated = request()->has('page') && (int) request('page') > 1;

    // OG Image Resolution
    if (!empty($ogImage)) {
        $finalOgImage = str_starts_with($ogImage, 'http') ? $ogImage : asset($ogImage);
    } elseif (!empty($image)) {
        $finalOgImage = str_starts_with($image, 'http') ? $image : asset($image);
    } else {
        $finalOgImage = asset('assets/img/og-default.png');
    }

    $ogType = $ogType ?? 'website';
@endphp

<title>{{ $finalTitle }}</title>
<meta name="description" content="{{ $finalDesc }}">
<link rel="canonical" href="{{ $canonicalUrl }}">

@if($isPaginated)
    <meta name="robots" content="noindex, follow">
@else
    <meta name="robots" content="index, follow">
@endif

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:title" content="{{ $finalTitle }}">
<meta property="og:description" content="{{ $finalDesc }}">
<meta property="og:image" content="{{ $finalOgImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="tr_TR">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $canonicalUrl }}">
<meta name="twitter:title" content="{{ $finalTitle }}">
<meta name="twitter:description" content="{{ $finalDesc }}">
<meta name="twitter:image" content="{{ $finalOgImage }}">

<!-- Schema.org Organization (Tüm Sayfalar) -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Organization",
  "name": "{{ $siteName }}",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('favicon/android-chrome-512x512.png') }}",
  "description": "Freight forwarder ve lojistik satış ekipleri için CRM ve teklif yönetim platformu.",
  "parentOrganization": {
    "@@type": "Corporation",
    "name": "{{ setting('company_title', 'Pekvera Yazılım Teknoloji A.Ş.') }}",
    "address": "{{ setting('contact_address', 'İzmir Bilimpark Teknokent') }}"
  },
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "{{ setting('contact_phone', '+905469715249') }}",
    "contactType": "customer support",
    "email": "{{ setting('contact_email', 'info@quotarix.com') }}",
    "availableLanguage": ["Turkish", "English"]
  },
  "sameAs": [
    @php
      $socials = array_filter([
          setting('social_linkedin'),
          setting('social_instagram'),
          setting('social_twitter')
      ], fn($s) => !empty($s) && $s !== '#');
    @endphp
    @foreach($socials as $i => $soc)
      "{{ $soc }}"{{ $i < count($socials) - 1 ? ',' : '' }}
    @endforeach
  ]
}
</script>

@if($isHome)
    <!-- Schema.org SoftwareApplication (Ana Sayfa) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "SoftwareApplication",
      "name": "{{ $siteName }} Forwarder CRM",
      "operatingSystem": "Web, iOS, Android",
      "applicationCategory": "BusinessApplication",
      "description": "Freight forwarder ve lojistik firmaları için teklif oluşturma, müşteri hafızası ve sahadan yönetici paneli.",
      @if(is_section_active('pricing'))
      "offers": {
        "@@type": "Offer",
        "price": "50.00",
        "priceCurrency": "USD",
        "priceValidUntil": "{{ date('Y-12-31') }}",
        "availability": "https://schema.org/InStock"
      },
      @endif
      "aggregateRating": {
        "@@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "24"
      }
    }
    </script>
@endif

@if(!$isHome && isset($title))
    <!-- Schema.org BreadcrumbList (İç Sayfalar) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Ana Sayfa",
          "item": "{{ url('/') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "{{ $title }}",
          "item": "{{ $canonicalUrl }}"
        }
      ]
    }
    </script>
@endif
