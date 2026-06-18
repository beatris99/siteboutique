<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SiteGo Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f7f4ef] text-[#171717]">
<main class="min-h-screen px-6 py-10">
    <div class="mx-auto max-w-7xl">
        <div class="mb-10 flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    @yield('eyebrow', 'SiteGo Admin')
                </p>

                <h1 class="mt-3 text-4xl font-semibold tracking-tight">
                    @yield('page-title')
                </h1>

                @hasSection('page-description')
                    <p class="mt-3 text-black/60">
                        @yield('page-description')
                    </p>
                @endif
            </div>

            <div class="flex flex-wrap gap-3">
                @hasSection('actions')
                    @yield('actions')
                @else
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
                    >
                        Dashboard
                    </a>

                    <a
                        href="{{ route('admin.leads.index') }}"
                        class="rounded-full bg-black px-5 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
                    >
                        Lead-uri
                    </a>

                    <a
                        href="/"
                        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
                    >
                        Site public
                    </a>
                @endif

                @if(session()->get('admin_authenticated'))
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
                        >
                            Logout
                        </button>
                    </form>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-green-100 px-5 py-4 text-sm font-medium text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-2xl bg-red-100 px-5 py-4 text-sm font-medium text-red-800">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-2xl bg-red-100 px-5 py-4 text-sm text-red-800">
                <p class="font-semibold">Verifică datele introduse.</p>

                <ul class="mt-2 list-inside list-disc">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</main>
</body>
</html>
