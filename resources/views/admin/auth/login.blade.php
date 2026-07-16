@extends('admin.layouts.app')

@section(
    'title',
    __('admin_auth.meta.title')
)

@section(
    'page-title',
    __('admin_auth.page.title')
)

@section(
    'page-description',
    __('admin_auth.page.description')
)

@section('actions')
    <a
        href="{{ route('home') }}"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        {{ __('admin_auth.page.back_to_site') }}
    </a>
@endsection

@section('content')
    <div class="mx-auto max-w-md">
        <div
            class="rounded-[2rem] border border-black/10 bg-white p-8 shadow-xl"
        >
            <form
                method="POST"
                action="{{ route('admin.login.store') }}"
                class="grid gap-5"
            >
                @csrf

                <div>
                    <label
                        for="admin-email"
                        class="mb-2 block text-sm font-semibold"
                    >
                        {{ __('admin_auth.fields.email') }}
                    </label>

                    <input
                        id="admin-email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="{{ __('admin_auth.fields.email_placeholder') }}"
                        autocomplete="username"
                        autocapitalize="none"
                        spellcheck="false"
                        maxlength="254"
                        required
                        autofocus
                        class="w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none transition placeholder:text-black/40 focus:border-black/30"
                    >

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label
                        for="admin-password"
                        class="mb-2 block text-sm font-semibold"
                    >
                        {{ __('admin_auth.fields.password') }}
                    </label>

                    <input
                        id="admin-password"
                        type="password"
                        name="password"
                        placeholder="{{ __('admin_auth.fields.password_placeholder') }}"
                        autocomplete="current-password"
                        maxlength="255"
                        required
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
                    {{ __('admin_auth.fields.submit') }}
                </button>
            </form>
        </div>
    </div>
@endsection