@extends('presentation.layout')

@section('title', __('site.seo.contact_title'))
@section('description', __('site.seo.contact_description'))

@section('content')

    <section class="bg-gradient-to-br from-sky-50 via-white to-cyan-50 pt-14 pb-8 md:py-16">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                {{ __('site.contact.title') }}
            </h1>

            <p class="mt-4 text-lg text-slate-600">
                {{ __('site.contact.subtitle') }}
            </p>
        </div>
    </section>

    <section class="pt-8 pb-16 md:py-16">
        <div class="max-w-5xl mx-auto px-4">
            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                <div class="overflow-hidden rounded-3xl bg-slate-100">
                    <img
                        src="{{ asset('images/brand/rentride-brand.png') }}"
                        alt="{{ __('site.brand.logo_alt') }}"
                        class="w-full object-cover"
                    >
                </div>

                <h2 class="mt-6 text-2xl font-bold text-slate-900">
                    {{ __('site.contact.quick_details') }}
                </h2>

                <div class="mt-6 space-y-5 text-slate-600">
                    <div>
                        <div class="text-sm font-medium text-slate-500">
                            {{ __('site.contact.phone_whatsapp') }}
                        </div>

                        <a
                            href="https://wa.me/{{ config('rentride.phone_whatsapp') }}"
                            target="_blank"
                            rel="noopener"
                            class="mt-1 inline-block text-lg font-semibold text-sky-700 hover:text-sky-800"
                        >
                            {{ config('rentride.phone_display') }}
                        </a>
                    </div>

                    <div>
                        <div class="text-sm font-medium text-slate-500">
                            {{ __('site.contact.area') }}
                        </div>
                        <div class="mt-1">
                            {{ __('site.contact.area_text') }}
                        </div>
                    </div>

                    <div>
                        <div class="text-sm font-medium text-slate-500">
                            {{ __('site.contact.services') }}
                        </div>
                        <div class="mt-1">
                            {{ __('site.contact.services_text') }}
                        </div>
                    </div>
                </div>
            </div>
        <br>
            @if(session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-8">
                <form method="POST" action="{{ route('contact.send') }}" class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    @csrf

                    <input type="hidden" name="form_started_at" value="{{ now()->timestamp }}">

                    <div class="hidden">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <label class="block mb-5">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.contact.name') }}</span>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none focus:border-sky-400"
                        >
                        @error('name')
                        <span class="mt-1 block text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="block mb-5">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.contact.phone') }}</span>
                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            required
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none focus:border-sky-400"
                        >
                        @error('phone')
                        <span class="mt-1 block text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="block mb-5">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.contact.email') }}</span>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none focus:border-sky-400"
                        >
                        @error('email')
                        <span class="mt-1 block text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="block mb-5">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.contact.interest') }}</span>
                        <select
                            name="vehicle_type"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none focus:border-sky-400"
                        >
                            <option value="Scuter" @selected(old('vehicle_type') === 'Scuter')>
                                {{ __('site.contact.option_scooter') }}
                            </option>
                            <option value="Bicicletă electrică" @selected(old('vehicle_type') === 'Bicicletă electrică')>
                                {{ __('site.contact.option_ebike') }}
                            </option>
                            <option value="Altceva" @selected(old('vehicle_type') === 'Altceva')>
                                {{ __('site.contact.option_other') }}
                            </option>
                        </select>
                    </label>

                    <label class="block mb-6">
                        <span class="text-sm font-medium text-slate-600">{{ __('site.contact.message') }}</span>
                        <textarea
                            name="message"
                            rows="5"
                            class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none focus:border-sky-400"
                        >{{ old('message') }}</textarea>
                        @error('message')
                        <span class="mt-1 block text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="mb-6 flex items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <input
                            type="checkbox"
                            name="privacy_accepted"
                            value="1"
                            @checked(old('privacy_accepted'))
                            class="mt-1 h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500"
                        >

                        <span class="text-sm leading-6 text-slate-600">
        Confirm că am citit
        <a href="{{ route('legal.privacy') }}" target="_blank" class="font-semibold text-sky-700 hover:text-sky-800">
            Politica de confidențialitate
        </a>
        și sunt de acord să fiu contactat pentru solicitarea transmisă.
    </span>
                    </label>

                    @error('privacy_accepted')
                    <span class="-mt-4 mb-5 block text-sm text-red-600">{{ $message }}</span>
                    @enderror
                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-full bg-sky-600 px-6 py-3.5 font-semibold text-white hover:bg-sky-700"
                    >
                        {{ __('site.contact.send') }}
                    </button>
                </form>


            </div>
        </div>
    </section>

@endsection
