<!DOCTYPE html>
@php
    $locale = app()->getLocale() === 'en' ? 'en' : 'ro';
    $brand = trans('brand');
    $header = trans('header');
    $navigation = trans('navigation');
    $footer = trans('footer');
    $contact = config('sitego.contact');
    $phoneDigits = preg_replace('/\D+/', '', $contact['phone'] ?? '');
    $phoneHref = $phoneDigits ? 'tel:+' . $phoneDigits : '#';
@endphp
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ $brand['name'] }}</title>
    <meta name="description" content="@yield('description', __('pages.layout.default_description'))">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/sitego-icon.svg') }}">
    <link rel="shortcut icon" href="{{ asset('images/sitego-icon.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>
<body class="bg-[#f7f4ef] text-[#171717] antialiased">
<header class="sticky top-0 z-50 border-b border-black/10 bg-[#f7f4ef]/95 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-4 sm:px-6">
        <a href="/" class="flex items-center gap-3">
            <img src="{{ asset('images/sitego-icon.svg') }}" alt="{{ $brand['logo_alt'] }}" class="h-10 w-10 rounded-xl">
            <div class="leading-none"><p class="text-xl font-bold tracking-tight text-black">{{ $brand['first_part'] }}<span class="text-[#a67c3a]">{{ $brand['second_part'] }}</span></p><p class="mt-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-[#a67c3a]">{{ $brand['tagline'] }}</p></div>
        </a>
        <nav class="hidden items-center gap-7 text-sm text-black/60 lg:flex">@foreach($navigation as $item)<a href="{{ $item['href'] }}" class="transition hover:text-black">{{ $item['label'] }}</a>@endforeach</nav>
        <div class="flex items-center gap-3"><div class="hidden rounded-full border border-black/10 bg-white p-1 text-xs font-semibold sm:flex"><a href="{{ route('language.switch', 'ro') }}" class="rounded-full px-3 py-2 {{ $locale === 'ro' ? 'bg-black text-white' : 'text-black/50' }}">{{ $header['language_ro'] }}</a><a href="{{ route('language.switch', 'en') }}" class="rounded-full px-3 py-2 {{ $locale === 'en' ? 'bg-black text-white' : 'text-black/50' }}">{{ $header['language_en'] }}</a></div><a href="/configurator" class="rounded-full bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#8b6f47]">{{ $header['cta'] }}</a></div>
    </div>
    <div class="border-t border-black/10 px-4 py-3 lg:hidden"><nav class="mx-auto flex max-w-7xl gap-4 overflow-x-auto text-sm text-black/60">@foreach($navigation as $item)<a href="{{ $item['href'] }}" class="shrink-0 transition hover:text-black">{{ $item['label'] }}</a>@endforeach</nav></div>
</header>
<main class="px-4 py-12 sm:px-6 sm:py-16">
    <div class="mx-auto max-w-7xl rounded-[2rem] border border-black/10 bg-white p-6 shadow-sm sm:p-10">
        <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">{{ $brand['name'] }}</p>
        <h1 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl">@yield('page-title')</h1>
        <p class="mt-5 max-w-4xl text-lg leading-8 text-black/60">@yield('page-intro')</p>
        <div class="mt-10">@yield('content')</div>
    </div>
</main>
<footer class="border-t border-black/10 bg-black text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr]">
        <div><div class="text-2xl font-semibold tracking-tight">{{ $brand['first_part'] }}<span class="italic text-[#d8c3a5]">{{ $brand['second_part'] }}</span></div><p class="mt-5 max-w-md leading-7 text-white/60">{{ $footer['description'] }}</p><p class="mt-6 text-sm text-white/40">{{ $footer['copyright'] }}</p></div>
        <div><h3 class="font-semibold">{{ $footer['navigation_title'] }}</h3><nav class="mt-5 grid gap-3 text-sm text-white/60">@foreach($navigation as $item)<a href="{{ $item['href'] }}" class="transition hover:text-white">{{ $item['label'] }}</a>@endforeach</nav></div>
        <div><h3 class="font-semibold">{{ $footer['legal_title'] }}</h3><nav class="mt-5 grid gap-3 text-sm text-white/60">@foreach($footer['legal_links'] as $item)<a href="{{ $item['href'] }}" class="transition hover:text-white">{{ $item['label'] }}</a>@endforeach</nav></div>
        <div><h3 class="font-semibold">{{ $footer['contact_title'] }}</h3><div class="mt-5 grid gap-3 text-sm text-white/60"><a href="mailto:{{ $contact['email'] }}" class="transition hover:text-white">{{ $contact['email'] }}</a><a href="{{ $phoneHref }}" class="transition hover:text-white">{{ $contact['phone'] }}</a><p>{{ $contact['location'] }}</p></div></div>
    </div>
</footer>
</body>
</html>

