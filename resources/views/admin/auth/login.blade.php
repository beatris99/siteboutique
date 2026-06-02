@extends('admin.layouts.app')

@section('title', 'Admin Login - SiteBoutique')
@section('page-title', 'Autentificare')
@section('page-description', 'Introdu parola de admin pentru a vedea cererile primite.')

@section('actions')
    <a
        href="/"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        Înapoi la site
    </a>
@endsection

@section('content')
    <div class="mx-auto max-w-md">
        <div class="rounded-[2rem] border border-black/10 bg-white p-8 shadow-xl">
            <form method="POST" action="{{ route('admin.login.store') }}" class="grid gap-4">
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
        </div>
    </div>
@endsection
