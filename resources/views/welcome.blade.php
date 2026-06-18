<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('site.meta.home_title') }}</title>

    <meta
        name="description"
        content="{{ __('site.meta.home_description') }}"
    >

    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="{{ __('site.meta.og_title') }}">
    <meta
        property="og:description"
        content="{{ __('site.meta.og_description') }}"
    >
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('site.meta.og_title') }}">
    <meta
        name="twitter:description"
        content="{{ __('site.meta.twitter_description') }}"
    >

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon-sitego.svg') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('favicon-sitego.svg') }}?v=1">
    <meta name="theme-color" content="#f7f4ef">

    <link rel="canonical" href="{{ config('app.url') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app" data-locale="{{ app()->getLocale() }}"></div>
</body>
</html>
