@extends('presentation.layout')

@section('title', __('site.seo.home_title'))
@section('description', __('site.seo.home_description'))

@section('content')

    <section class="relative overflow-hidden bg-gradient-to-br from-sky-50 via-white to-cyan-50">
        <div class="max-w-7xl mx-auto px-4 py-8 sm:py-12 md:py-20 grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div>
                <div class="inline-flex items-center rounded-full border border-sky-200 bg-white px-3 py-1.5 text-xs sm:text-sm text-sky-700 shadow-sm">
                    {{ __('site.home.badge') }}
                </div>

                <h1 class="mt-4 sm:mt-6 text-3xl sm:text-4xl md:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                    {{ __('site.home.headline1') }}
                    <br>
                    {{ __('site.home.headline2') }}
                </h1>

                <p class="mt-4 sm:mt-6 max-w-2xl text-base sm:text-lg leading-7 sm:leading-8 text-slate-600">
                    {{ __('site.home.subtitle') }}
                </p>
            </div>

            <div class="hidden lg:block lg:pl-8">
                <div class="rounded-[2rem] border border-white/70 bg-white p-4 shadow-xl">
                    <img src="{{ asset('images/brand/rentride-brand.png') }}" alt="{{ __('site.brand.logo_alt') }}" class="w-full rounded-[1.5rem] object-cover">

                    <div class="mt-4 rounded-3xl bg-slate-50 p-5">
                        <h2 class="text-lg font-bold text-slate-900">{{ __('site.home.card_title') }}</h2>
                        <p class="mt-2 text-slate-600">{{ __('site.home.card_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 sm:py-14 md:py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-center text-2xl sm:text-3xl font-bold tracking-tight text-slate-900">
                {{ __('site.home.choose_title') }}
            </h2>

            <div class="mt-5 sm:mt-8 grid md:grid-cols-2 gap-4 sm:gap-6">
                <a href="{{ route('city_rides') }}" class="group block rounded-3xl border border-slate-200 bg-white p-5 sm:p-8 text-center shadow-sm hover:border-sky-300 hover:shadow-md transition">
                    <div class="text-xs sm:text-sm font-semibold uppercase tracking-wide text-sky-700">
                        {{ __('site.home.fun_label') }}
                    </div>

                    <h3 class="mt-3 text-xl sm:text-2xl font-extrabold text-slate-900">
                        {{ __('site.home.fun_title') }}
                    </h3>

                    <p class="mt-3 leading-7 text-slate-600">
                        {{ __('site.home.fun_text') }}
                    </p>

                    <div class="mt-6 inline-flex items-center justify-center rounded-full bg-sky-600 px-6 py-3 font-semibold text-white group-hover:bg-sky-700">
                        {{ __('site.home.fun_cta_bottom') }}
                    </div>
                </a>

                <a href="{{ route('delivery') }}" class="group block rounded-3xl border border-slate-200 bg-white p-5 sm:p-8 text-center shadow-sm hover:border-sky-300 hover:shadow-md transition">
                    <div class="text-xs sm:text-sm font-semibold uppercase tracking-wide text-sky-700">
                        {{ __('site.home.delivery_label') }}
                    </div>

                    <h3 class="mt-3 text-xl sm:text-2xl font-extrabold text-slate-900">
                        {{ __('site.home.delivery_title') }}
                    </h3>

                    <p class="mt-3 leading-7 text-slate-600">
                        {{ __('site.home.delivery_text') }}
                    </p>

                    <div class="mt-6 inline-flex items-center justify-center rounded-full bg-sky-600 px-6 py-3 font-semibold text-white group-hover:bg-sky-700">
                        {{ __('site.home.delivery_cta_bottom') }}
                    </div>
                </a>
            </div>
        </div>
    </section>

{{--    <section class="bg-white py-10 sm:py-14 md:py-16">--}}
{{--        <div class="max-w-7xl mx-auto px-4">--}}
{{--            <div class="flex flex-col items-center gap-4 text-center">--}}
{{--                <div>--}}
{{--                    <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-900">--}}
{{--                        {{ __('site.home.offers_title') }}--}}
{{--                    </h2>--}}
{{--                    <p class="mt-2 text-slate-600">--}}
{{--                        {{ __('site.home.offers_text') }}--}}
{{--                    </p>--}}
{{--                </div>--}}

{{--                <div class="flex flex-col sm:flex-row gap-3">--}}
{{--                    <a href="{{ route('offers') }}" class="inline-flex items-center justify-center rounded-full bg-sky-600 px-6 py-3 font-semibold text-white hover:bg-sky-700">--}}
{{--                        {{ __('site.common.view_offers') }}--}}
{{--                    </a>--}}

{{--                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-sky-600 px-6 py-3 font-semibold text-white hover:bg-sky-700">--}}
{{--                        {{ __('site.common.ask_availability') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="py-10 sm:py-14 md:py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="rounded-[2rem] bg-gradient-to-r from-sky-600 to-cyan-500 px-6 sm:px-8 py-8 sm:py-10 text-white shadow-lg">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold">{{ __('site.home.cta_title') }}</h2>
                        <p class="mt-3 max-w-2xl text-sky-50">{{ __('site.home.cta_text') }}</p>
                    </div>

                    <a href="https://wa.me/{{ config('rentride.phone_whatsapp') }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3.5 font-semibold text-sky-700 hover:bg-slate-100">
                        {{ __('site.home.cta_button') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
