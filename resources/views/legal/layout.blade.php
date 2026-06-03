<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - SiteBoutique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f7f4ef] text-[#171717]">
<main class="min-h-screen px-6 py-12">
    <div class="mx-auto max-w-4xl">
        <a
            href="/"
            class="text-sm text-black/50 transition hover:text-black"
        >
            ← Înapoi la site
        </a>

        <div class="mt-8 rounded-[2rem] border border-black/10 bg-white p-8 shadow-xl md:p-12">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                SiteBoutique
            </p>

            <h1 class="mt-4 text-4xl font-semibold tracking-tight">
                @yield('page-title')
            </h1>

            <div class="prose prose-neutral mt-8 max-w-none leading-7 text-black/70">
                @yield('content')
            </div>
        </div>
    </div>
</main>
</body>
</html>
