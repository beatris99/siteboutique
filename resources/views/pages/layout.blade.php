<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - SiteGo</title>
    <meta name="description" content="@yield('description', 'Site-uri moderne pentru afaceri mici și locale.')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon-sitego.svg') }}?v=3">
    <link rel="shortcut icon" href="{{ asset('favicon-sitego.svg') }}?v=3">
    <meta name="theme-color" content="#f7f4ef">
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f7f4ef] text-[#171717]">
<main class="min-h-screen px-6 py-12">
    <div class="mx-auto max-w-5xl">
        <a href="/" class="text-sm text-black/50 transition hover:text-black">
            ← Înapoi la site
        </a>

        <div class="mt-8 rounded-[2rem] border border-black/10 bg-white p-8 shadow-xl md:p-12">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                SiteGo
            </p>

            <h1 class="mt-4 text-4xl font-semibold tracking-tight md:text-6xl">
                @yield('page-title')
            </h1>

            <p class="mt-5 max-w-3xl text-lg leading-8 text-black/60">
                @yield('page-intro')
            </p>

            <div class="mt-10 leading-8 text-black/70">
                @yield('content')
            </div>
        </div>
    </div>
</main>
</body>
</html>
