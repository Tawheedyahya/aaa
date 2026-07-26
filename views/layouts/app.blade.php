<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('page_title', 'LED Board Maker') | LED Signage Solutions Across India</title>
    <meta name="description" content="@yield('meta_description', 'We are a trusted LED board maker in Coimbatore offering LED display boards, hospital signage, shop boards, and commercial signage solutions across India.')">
    <meta name="keywords" content="@yield('meta_keywords', 'LED board maker in Coimbatore, LED display board manufacturer, hospital LED board, shop LED board, commercial signage, LED sign board service India, LED board supplier India')">

    <meta name="robots" content="@yield('robots', 'index, follow')">

    <link rel="canonical" href="@yield('canonical', current_url())">

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'LED Board Maker | LED Signage Solutions Across India')">
    <meta property="og:description" content="@yield('og_description', 'We are a trusted LED board maker in Coimbatore offering LED display boards, hospital signage, shop boards, and commercial signage solutions across India.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/static_images/logo.jpeg'))">
    <meta property="og:url" content="@yield('canonical', current_url())">
    <meta property="og:site_name" content="LED Board Maker">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'LED Board Maker')">
    <meta name="twitter:description" content="@yield('meta_description')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/static_images/logo.jpeg'))">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="icon" href="{{ asset('assets/static_images/logo.jpeg') }}" type="image/jpeg">

    @hasSection('structured_data')
    @yield('structured_data')
@else
    <script type="application/ld+json">
    { ...default LocalBusiness... }
    </script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "AAA LED",
    "image": "https://yourdomain.com/public/assets/images/logo.png",
    "description": "High-quality LED display boards, signboards, and indoor-outdoor signage manufacturer for hospitals, clinics, shops, and commercial spaces across Coimbatore and all over India.",
    "@id": "https://yourdomain.com",
    "url": "https://yourdomain.com",
    "telephone": "+91-XXXXXXXXXX",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "Your Street Address",
        "addressLocality": "Coimbatore",
        "addressRegion": "Tamil Nadu",
        "postalCode": "641XXX",
        "addressCountry": "IN"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": 11.0168,
        "longitude": 76.9558
    },
    "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
        "opens": "09:00",
        "closes": "19:00"
    },
    "sameAs": [
        "https://www.facebook.com/yourpage",
        "https://www.instagram.com/yourpage"
    ]
}
</script>
@endif

    @stack('head')
</head>
<body>
    @include('layouts.header')

    <main class="page">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.querySelector('.menu-toggle');
            const closeBtn = document.querySelector('.menu-close');
            const menu = document.getElementById('mobileMenu');

            if (toggle && menu) {
                toggle.addEventListener('click', function () {
                    const isOpen = menu.classList.toggle('open');
                    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                });
            }

            if (closeBtn && menu) {
                closeBtn.addEventListener('click', function () {
                    menu.classList.remove('open');
                    if (toggle) {
                        toggle.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>