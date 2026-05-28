<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin RentRide</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=4">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}?v=4">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}?v=4">

    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-50 text-slate-800">

<header class="border-b border-slate-200 bg-white/95 backdrop-blur sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex justify-between items-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 min-w-0">
                <div class="h-11 w-11 shrink-0 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200">
                    <img src="{{ asset('images/brand/rentride-brand.png') }}" alt="RentRide" class="h-full w-full object-cover">
                </div>

                <div class="min-w-0">
                    <div class="text-lg sm:text-xl font-bold tracking-tight truncate">Admin RentRide</div>
                    <div class="text-xs text-slate-500 truncate">{{ __('site.admin.subtitle') }}</div>
                </div>
            </a>

            <nav class="hidden md:flex gap-5 text-sm text-slate-600">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-sky-700">{{ __('site.admin.nav.dashboard') }}</a>
                <a href="{{ route('admin.vehicles.index') }}" class="hover:text-sky-700">{{ __('site.admin.nav.vehicles') }}</a>
                <a href="{{ route('admin.contact_requests.index') }}" class="hover:text-sky-700">{{ __('site.admin.nav.requests') }}</a>
                <a href="{{ route('home') }}" target="_blank" class="hover:text-sky-700">{{ __('site.admin.nav.public_site') }}</a>
            </nav>

            <details class="relative md:hidden">
                <summary class="list-none cursor-pointer rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm">
                    {{ __('site.menu.mobile') }}
                </summary>

                <div class="absolute right-0 mt-3 w-72 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">
                    <nav class="flex flex-col p-3 text-sm text-slate-700">
                        <a href="{{ route('admin.dashboard') }}" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.admin.nav.dashboard') }}
                        </a>
                        <a href="{{ route('admin.vehicles.index') }}" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.admin.nav.vehicles') }}
                        </a>
                        <a href="{{ route('admin.contact_requests.index') }}" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.admin.nav.requests') }}
                        </a>
                        <a href="{{ route('home') }}" target="_blank" class="rounded-2xl px-4 py-3 hover:bg-slate-50">
                            {{ __('site.admin.nav.public_site') }}
                        </a>
                    </nav>
                </div>
            </details>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 py-6 sm:py-8">
    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

</body>
</html>
