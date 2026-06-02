<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - SiteBoutique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f7f4ef] text-[#171717]">
<main class="flex min-h-screen items-center justify-center px-6 py-10">
    <div class="w-full max-w-md rounded-[2rem] border border-black/10 bg-white p-8 shadow-xl">
        <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
            SiteBoutique Admin
        </p>

        <h1 class="mt-4 text-4xl font-semibold tracking-tight">
            Autentificare
        </h1>

        <p class="mt-3 text-sm leading-6 text-black/60">
            Introdu parola de admin pentru a vedea cererile primite.
        </p>

        <form method="POST" action="{{ route('admin.login.store') }}" class="mt-8 grid gap-4">
            @csrf

            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Parola admin"
                    class="w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none transition placeholder:text-black/40 focus:border-black/30"
                >

                @error('password')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <button
                type="submit"
                class="rounded-full bg-black px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
            >
                Intră în admin
            </button>
        </form>

        <a href="/" class="mt-6 inline-block text-sm text-black/50 hover:text-black">
            Înapoi la site
        </a>
    </div>
</main>
</body>
</html>
