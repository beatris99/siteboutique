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
</head>
<body>
<script id="sitego-app-data" type="application/json">@json($sitegoAppData)</script>
<div id="app"></div>
</body>
</html>

