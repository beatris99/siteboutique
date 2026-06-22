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
            'hero' => trans('home.hero'),
            'templateGallery' => trans('home.template_gallery'),
            'packagesSection' => trans('home.packages_section'),
            'configurator' => trans('home.configurator'),
            'priceSummary' => trans('home.price_summary'),
            'whatYouGet' => trans('home.what_you_get'),
            'whyWorkWithMe' => trans('home.why_work_with_me'),
            'projectProcess' => trans('home.project_process'),
            'floatingDock' => trans('home.floating_dock'),
        ],
        'builder' => trans('site_builder'),
        'config' => [
            'contact' => config('sitego.contact'),
        ],
    ];
@endphp
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('home.meta.home_title') }}</title>
    <meta name="description" content="{{ __('home.meta.home_description') }}">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="{{ __('home.meta.og_title') }}">
    <meta property="og:description" content="{{ __('home.meta.og_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('home.meta.og_title') }}">
    <meta name="twitter:description" content="{{ __('home.meta.twitter_description') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/sitego-icon.svg') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('images/sitego-icon.svg') }}?v=1">
    <meta name="theme-color" content="#f7f4ef">
    <link rel="canonical" href="{{ config('app.url') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <meta name="google-site-verification" content="8Wp3PXaLXhT25xkld277MiKuu-PrIKrYvT6HKMXNeD4">
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-20JGBZL604"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ window.dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-20JGBZL604');
    </script>
</head>
<body>
<script id="sitego-app-data" type="application/json">@json($sitegoAppData)</script>
<div id="app"></div>

<!-- SITEGO SEO INTERNAL LINKS START -->
<section style="max-width:1120px;margin:0 auto 56px;padding:0 20px;font-family:Arial,sans-serif;">
    <div style="background:#f7f4ef;border:1px solid rgba(22,32,51,.10);border-radius:28px;padding:28px;box-shadow:0 18px 60px rgba(22,32,51,.06);">
        <p style="margin:0 0 8px;font-size:13px;font-weight:700;letter-spacing:.02em;color:#6f5f4f;text-transform:uppercase;">Servicii populare</p>
        <h2 style="margin:0 0 18px;font-size:28px;line-height:1.15;color:#162033;">Alege tipul de site potrivit pentru afacerea ta</h2>
        <div style="display:flex;flex-wrap:wrap;gap:10px;">
            <a href="https://sitego.ro/creare-site-de-prezentare-brasov" style="text-decoration:none;background:#fff;border:1px solid rgba(22,32,51,.12);border-radius:999px;padding:12px 16px;color:#162033;font-weight:700;">Creare site de prezentare Brașov</a>
            <a href="https://sitego.ro/web-design-brasov" style="text-decoration:none;background:#fff;border:1px solid rgba(22,32,51,.12);border-radius:999px;padding:12px 16px;color:#162033;font-weight:700;">Web design Brașov</a>
            <a href="https://sitego.ro/realizare-website-brasov" style="text-decoration:none;background:#fff;border:1px solid rgba(22,32,51,.12);border-radius:999px;padding:12px 16px;color:#162033;font-weight:700;">Realizare website Brașov</a>
            <a href="https://sitego.ro/landing-page-afaceri" style="text-decoration:none;background:#fff;border:1px solid rgba(22,32,51,.12);border-radius:999px;padding:12px 16px;color:#162033;font-weight:700;">Landing page pentru afaceri</a>
            <a href="https://sitego.ro/site-salon-beauty" style="text-decoration:none;background:#fff;border:1px solid rgba(22,32,51,.12);border-radius:999px;padding:12px 16px;color:#162033;font-weight:700;">Site pentru salon beauty</a>
            <a href="https://sitego.ro/cat-costa-un-site-de-prezentare-2026" style="text-decoration:none;background:#fff;border:1px solid rgba(22,32,51,.12);border-radius:999px;padding:12px 16px;color:#162033;font-weight:700;">Cât costă un site de prezentare în 2026</a>
        </div>
    </div>
</section>
<!-- SITEGO SEO INTERNAL LINKS END -->

</body>
</html>


