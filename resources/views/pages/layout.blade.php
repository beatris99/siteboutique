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
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="icon" type="image/svg+xml" href="{{ asset('images/sitego-icon.svg') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('images/sitego-icon.svg') }}?v=1">

    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|source-serif-4:400,500,600,700"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f7f4ef] text-[#171717] antialiased">
<header class="sticky top-0 z-50 border-b border-black/10 bg-[#f7f4ef]/95 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6">
        <a href="/" class="flex shrink-0 items-center gap-3">
            <img src="{{ asset('images/sitego-icon.svg') }}?v=1" alt="{{ $brand['logo_alt'] }}" class="h-10 w-10 object-contain">

            <div class="leading-none">
                <p class="text-xl font-bold tracking-tight text-black">
                    {{ $brand['first_part'] }}<span class="text-[#a67c3a]">{{ $brand['second_part'] }}</span>
                </p>
                <p class="mt-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-[#a67c3a]">
                    {{ $brand['tagline'] }}
                </p>
            </div>
        </a>

        <nav class="hidden items-center gap-6 text-sm text-black/60 lg:flex">
            @foreach($navigation as $item)
                <a href="{{ $item['href'] }}" class="transition hover:text-black">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-3">
            <div class="hidden rounded-full border border-black/10 bg-white p-1 text-xs font-semibold sm:flex">
                <a href="{{ route('language.switch', 'ro') }}" class="rounded-full px-3 py-2 {{ $locale === 'ro' ? 'bg-black text-white' : 'text-black/50' }}">
                    {{ $header['language_ro'] }}
                </a>
                <a href="{{ route('language.switch', 'en') }}" class="rounded-full px-3 py-2 {{ $locale === 'en' ? 'bg-black text-white' : 'text-black/50' }}">
                    {{ $header['language_en'] }}
                </a>
            </div>

            <a href="/contact" class="hidden rounded-full bg-black px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#8b6f47] sm:inline-flex">
                {{ $header['cta'] }}
            </a>

            <button
                type="button"
                id="mobile-menu-toggle"
                class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-black/10 bg-white/70 text-black transition hover:bg-white lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="{{ $header['menu_open_label'] }}"
            >
                <svg id="mobile-menu-open-icon" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M4 7h16M4 12h16M4 17h16" />
                </svg>

                <svg id="mobile-menu-close-icon" viewBox="0 0 24 24" class="hidden h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-black/10 bg-[#f7f4ef]/95 backdrop-blur lg:hidden">
        <nav class="mx-auto flex max-w-7xl flex-col gap-1 px-4 py-4 sm:px-6">
            @foreach($navigation as $item)
                <a href="{{ $item['href'] }}" class="rounded-2xl px-4 py-3 text-base font-medium text-black/70 transition hover:bg-white hover:text-black">
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="mt-3 flex gap-2 sm:hidden">
                <a href="{{ route('language.switch', 'ro') }}" class="rounded-full px-4 py-2 text-sm font-semibold {{ $locale === 'ro' ? 'bg-black text-white' : 'bg-white text-black/50' }}">
                    {{ $header['language_ro'] }}
                </a>
                <a href="{{ route('language.switch', 'en') }}" class="rounded-full px-4 py-2 text-sm font-semibold {{ $locale === 'en' ? 'bg-black text-white' : 'bg-white text-black/50' }}">
                    {{ $header['language_en'] }}
                </a>
            </div>

            <a href="/contact" class="mt-2 rounded-full bg-black px-5 py-3 text-center text-base font-semibold text-white transition hover:bg-[#8b6f47]">
                {{ $header['cta'] }}
            </a>
        </nav>
    </div>
</header>

<main class="px-4 py-12 sm:px-6 sm:py-16">
    <div class="mx-auto max-w-7xl rounded-[2rem] border border-black/10 bg-white p-6 shadow-sm sm:p-10">
        <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
            {{ $brand['name'] }}
        </p>

        <h1 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl">
            @yield('page-title')
        </h1>

        <p class="mt-5 max-w-4xl text-lg leading-8 text-black/60">
            @yield('page-intro')
        </p>

        <div class="mt-10">
            @yield('content')
        </div>
    </div>
</main>

<footer class="border-t border-black/10 bg-black text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr]">
        <div>
            <div class="text-2xl font-semibold tracking-tight">
                {{ $brand['first_part'] }}<span class="italic text-[#d8c3a5]">{{ $brand['second_part'] }}</span>
            </div>

            <p class="mt-5 max-w-md leading-7 text-white/60">
                {{ $footer['description'] }}
            </p>

            <p class="mt-6 text-sm text-white/40">
                {{ $footer['copyright'] }}
            </p>
        </div>

        <div>
            <h3 class="font-semibold">{{ $footer['navigation_title'] }}</h3>

            <nav class="mt-5 grid gap-3 text-sm text-white/60">
                @foreach($navigation as $item)
                    <a href="{{ $item['href'] }}" class="transition hover:text-white">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>

        <div>
            <h3 class="font-semibold">{{ $footer['legal_title'] }}</h3>

            <nav class="mt-5 grid gap-3 text-sm text-white/60">
                @foreach($footer['legal_links'] as $item)
                    <a href="{{ $item['href'] }}" class="transition hover:text-white">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>

        <div>
            <h3 class="font-semibold">{{ $footer['contact_title'] }}</h3>

            <div class="mt-5 grid gap-3 text-sm text-white/60">
                <a href="mailto:{{ $contact['email'] }}" class="transition hover:text-white">
                    {{ $contact['email'] }}
                </a>

                <a href="{{ $phoneHref }}" class="transition hover:text-white">
                    {{ $contact['phone'] }}
                </a>

                <p>{{ $contact['location'] }}</p>
            </div>
        </div>
    </div>
</footer>

<script>
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('mobile-menu-open-icon');
    const closeIcon = document.getElementById('mobile-menu-close-icon');

    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', () => {
            const isOpen = !mobileMenu.classList.contains('hidden');

            if (isOpen) {
                mobileMenu.classList.add('hidden');
                openIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                mobileToggle.setAttribute('aria-expanded', 'false');
            } else {
                mobileMenu.classList.remove('hidden');
                openIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                mobileToggle.setAttribute('aria-expanded', 'true');
            }
        });
    }
</script>

@include('partials.cookie-consent')
</body>
</html>
