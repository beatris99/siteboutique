<!DOCTYPE html>
@php
    $locale = app()->getLocale() === 'en' ? 'en' : 'ro';

    $sitegoAppData = [
        'locale' => $locale,
        'content' => [
            'brand' => trans('brand'),
            'header' => trans('header'),
            'navigation' => trans('navigation'),
            'footer' => trans('footer'),
            'contact' => trans('contact'),
            'common' => trans('home.common'),
            'hero' => trans('home_lite.hero'),
            'homeShowcase' => trans('home_lite.showcase'),
            'leadCapture' => trans('home_lite.lead_capture'),
            'templateGallery' => trans('home.template_gallery'),
            'floatingDock' => trans('home.floating_dock'),
        ],
        'builder' => trans('site_builder'),
        'config' => [
            'contact' => config('sitego.contact'),
        ],
    ];

    $appUrl = rtrim(config('app.url'), '/');
@endphp
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('home_lite.meta.home_title') }}</title>
    <meta name="description" content="{{ __('home_lite.meta.home_description') }}">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="{{ __('home_lite.meta.og_title') }}">
    <meta property="og:description" content="{{ __('home_lite.meta.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $appUrl }}">
    <meta property="og:image" content="{{ $appUrl }}/images/og-cover.jpg">
    <meta property="og:image:secure_url" content="{{ $appUrl }}/images/og-cover.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="SiteGo - site-uri, CRM-uri și soluții digitale pentru afaceri">
    <meta property="og:site_name" content="SiteGo">
    <meta property="og:locale" content="ro_RO">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('home_lite.meta.og_title') }}">
    <meta name="twitter:description" content="{{ __('home_lite.meta.twitter_description') }}">
    <meta name="twitter:image" content="{{ $appUrl }}/images/og-cover.jpg">

    <link rel="canonical" href="{{ $appUrl }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/sitego-icon.svg') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('images/sitego-icon.svg') }}?v=1">
    <meta name="theme-color" content="#f7f4ef">

    <meta name="google-site-verification" content="8Wp3PXaLXhT25xkld277MiKuu-PrIKrYvT6HKMXNeD4">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-20JGBZL604"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            window.dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-20JGBZL604');
    </script>
    <!-- End Google Analytics -->

    <!-- Meta Pixel -->
    <script>
        !function(f,b,e,v,n,t,s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = true;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = true;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s);
        }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '1721525405849532');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img
            height="1"
            width="1"
            style="display:none"
            src="https://www.facebook.com/tr?id=1721525405849532&ev=PageView&noscript=1"
            alt=""
        >
    </noscript>
    <!-- End Meta Pixel -->

    <!-- Microsoft Clarity -->
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments);
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = 'https://www.clarity.ms/tag/' + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, 'clarity', 'script', 'xbyogs1xur');
    </script>
    <!-- End Microsoft Clarity -->

    <!-- Structured data -->
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'SiteGo',
            'url' => $appUrl,
            'image' => $appUrl . '/images/og-cover.jpg',
            'email' => 'sitegobv@gmail.com',
            'telephone' => '+40747084861',
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Brașov',
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Brașov',
                'addressCountry' => 'RO',
            ],
            'sameAs' => [
                'https://www.facebook.com/share/1BQ9mzPgqy/',
            ],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
</head>
<body>
<script id="sitego-app-data" type="application/json">@json($sitegoAppData)</script>
<div id="app"></div>
</body>
</html>
