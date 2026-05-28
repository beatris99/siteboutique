<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZEVB8HKWMP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-ZEVB8HKWMP');
    </script>

    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "wx3dlhi6po");
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('site.seo.home_title'))</title>
    <meta name="description" content="@yield('description', __('site.seo.home_description'))">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=4">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}?v=4">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}?v=4">

    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-50 text-slate-800">

<header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 py-3 sm:py-4">
        <div class="flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-0">
                <div class="h-10 w-10 sm:h-11 sm:w-11 shrink-0 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100">
                    <img
                        src="{{ asset('images/brand/rentride-brand.png') }}"
                        alt="{{ __('site.brand.logo_alt') }}"
                        class="h-full w-full object-cover"
                    >
                </div>

                <div class="min-w-0">
                    <div class="text-lg sm:text-xl font-bold tracking-tight truncate">
                        {{ __('site.brand.name') }}
                    </div>
                    <div class="text-xs text-slate-500">
                        {{ __('site.brand.city') }}
                    </div>
                </div>
            </a>

            <nav class="hidden md:flex gap-6 text-sm text-slate-600">
                <a href="{{ route('home') }}" class="hover:text-sky-700">{{ __('site.nav.home') }}</a>
                <a href="{{ route('offers') }}" class="hover:text-sky-700">{{ __('site.nav.offers') }}</a>
                <a href="{{ route('city_rides') }}" class="hover:text-sky-700">{{ __('site.nav.city_rides') }}</a>
                <a href="{{ route('delivery') }}" class="hover:text-sky-700">{{ __('site.nav.delivery') }}</a>
                <a href="{{ route('contact') }}" class="hover:text-sky-700">{{ __('site.nav.contact') }}</a>
            </nav>

            <div class="hidden md:flex items-center gap-3">
                <div class="flex items-center rounded-full border border-slate-200 bg-slate-50 p-1">
                    <a
                        href="{{ route('language.switch', 'ro') }}"
                        class="px-3 py-1.5 rounded-full text-sm {{ app()->getLocale() === 'ro' ? 'bg-sky-600 text-white' : 'text-slate-600 hover:text-slate-900' }}"
                    >
                        RO
                    </a>
                    <a
                        href="{{ route('language.switch', 'en') }}"
                        class="px-3 py-1.5 rounded-full text-sm {{ app()->getLocale() === 'en' ? 'bg-sky-600 text-white' : 'text-slate-600 hover:text-slate-900' }}"
                    >
                        EN
                    </a>
                </div>
            </div>

            <details class="relative md:hidden">
                <summary class="list-none cursor-pointer rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm">
                    {{ __('site.menu.mobile') }}
                </summary>

                <div class="absolute right-0 mt-3 w-72 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">
                    <nav class="flex flex-col p-3 text-sm text-slate-700">
                        <a href="{{ route('home') }}" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.nav.home') }}
                        </a>
                        <a href="{{ route('offers') }}" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.nav.offers') }}
                        </a>
                        <a href="{{ route('city_rides') }}" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.nav.city_rides') }}
                        </a>
                        <a href="{{ route('delivery') }}" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.nav.delivery') }}
                        </a>
                        <a href="{{ route('contact') }}" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.nav.contact') }}
                        </a>

                        <div class="my-2 border-t border-slate-100"></div>

                        <div class="flex gap-2 px-2 py-2">
                            <a
                                href="{{ route('language.switch', 'ro') }}"
                                class="flex-1 rounded-full px-4 py-2 text-center text-sm font-semibold {{ app()->getLocale() === 'ro' ? 'bg-sky-600 text-white' : 'bg-slate-50 text-slate-700' }}"
                            >
                                RO
                            </a>
                            <a
                                href="{{ route('language.switch', 'en') }}"
                                class="flex-1 rounded-full px-4 py-2 text-center text-sm font-semibold {{ app()->getLocale() === 'en' ? 'bg-sky-600 text-white' : 'bg-slate-50 text-slate-700' }}"
                            >
                                EN
                            </a>
                        </div>
                    </nav>
                </div>
            </details>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="border-t border-slate-200 bg-white">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col gap-6 md:flex-row md:items-start md:justify-between">
            <div class="text-center md:text-left">
                <p class="text-sm text-slate-500">
                    © {{ date('Y') }} {{ __('site.brand.name') }} {{ __('site.brand.city') }}.
                    {{ __('site.footer.rights') }}
                </p>

                <p class="mt-2 text-sm text-slate-500">
                    {{ __('site.footer.line') }}
                </p>

                <p class="mt-3 text-xs leading-6 text-slate-400">
                    {{ config('rentride.pfa.name') }} · CUI: {{ config('rentride.pfa.cui') }} ·
                    {{ config('rentride.pfa.city') }}, {{ config('rentride.pfa.country') }}
                </p>
            </div>

            <nav class="flex flex-col items-center gap-3 text-sm text-slate-500 sm:flex-row sm:flex-wrap sm:justify-center md:justify-end">
                <a href="{{ route('legal.terms') }}" class="hover:text-sky-700">
                    Termeni și condiții
                </a>

                <a href="{{ route('legal.privacy') }}" class="hover:text-sky-700">
                    Politica de confidențialitate
                </a>

                <a href="{{ route('legal.cookies') }}" class="hover:text-sky-700">
                    Politica cookies
                </a>

                <a href="{{ route('contact') }}" class="hover:text-sky-700">
                    Contact
                </a>
            </nav>
        </div>
    </div>
</footer>

<a
    href="https://wa.me/{{ config('rentride.phone_whatsapp') }}"
    aria-label="Deschide WhatsApp"
    class="fixed bottom-5 right-5 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500 text-white shadow-lg ring-4 ring-emerald-100 transition hover:scale-105 hover:bg-emerald-600"
>
    <svg viewBox="0 0 32 32" class="h-8 w-8 fill-current" aria-hidden="true">
        <path d="M16.04 3C8.86 3 3.02 8.84 3.02 16.02c0 2.3.6 4.54 1.75 6.52L3 29l6.62-1.73a12.96 12.96 0 0 0 6.42 1.68h.01c7.18 0 13.02-5.84 13.02-13.02C29.07 8.84 23.23 3 16.04 3Zm0 23.75h-.01a10.8 10.8 0 0 1-5.5-1.5l-.4-.24-3.93 1.03 1.05-3.83-.26-.39a10.76 10.76 0 0 1-1.65-5.8c0-5.92 4.82-10.74 10.75-10.74 2.87 0 5.57 1.12 7.6 3.15a10.68 10.68 0 0 1 3.14 7.6c0 5.92-4.82 10.73-10.78 10.73Zm5.9-8.04c-.32-.16-1.9-.94-2.2-1.04-.3-.11-.52-.16-.73.16-.22.32-.84 1.04-1.03 1.25-.19.22-.38.24-.7.08-.32-.16-1.36-.5-2.59-1.6-.96-.85-1.6-1.9-1.79-2.23-.19-.32-.02-.5.14-.66.15-.14.32-.38.49-.57.16-.19.22-.32.32-.54.11-.22.05-.4-.03-.57-.08-.16-.73-1.76-1-2.41-.26-.63-.53-.54-.73-.55h-.62c-.22 0-.57.08-.86.4-.3.32-1.14 1.11-1.14 2.7 0 1.6 1.17 3.14 1.33 3.36.16.22 2.3 3.5 5.57 4.9.78.34 1.38.54 1.85.69.78.25 1.49.22 2.05.13.63-.1 1.9-.78 2.17-1.52.27-.74.27-1.38.19-1.52-.08-.14-.3-.22-.62-.38Z"/>
    </svg>
</a>

</body>
</html>
