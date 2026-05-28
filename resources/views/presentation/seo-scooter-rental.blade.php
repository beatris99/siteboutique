@extends('presentation.layout')

@section('title', __('site.seo_local.title'))
@section('description', __('site.seo_local.description'))

@section('content')

    <section class="bg-gradient-to-br from-sky-50 via-white to-cyan-50 py-16">
        <div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex rounded-full border border-sky-200 bg-white px-4 py-2 text-sm font-medium text-sky-700 shadow-sm">
                    {{ __('site.seo_local.badge') }}
                </div>

                <h1 class="mt-6 text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                    {{ __('site.seo_local.headline') }}
                </h1>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    {{ __('site.seo_local.subtitle') }}
                </p>

                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('offers') }}" class="inline-flex items-center justify-center rounded-full bg-sky-600 px-6 py-3.5 font-semibold text-white hover:bg-sky-700">
                        {{ __('site.common.view_offers') }}
                    </a>

                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3.5 font-semibold text-slate-700 hover:border-sky-300 hover:text-sky-700">
                        {{ __('site.common.ask_availability') }}
                    </a>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white bg-white p-4 shadow-xl">
                <img src="{{ asset('images/brand/rentride-brand.png') }}"
                     alt="{{ __('site.brand.logo_alt') }}"
                     class="w-full rounded-[1.5rem] object-cover">
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-6">
                <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900">{{ __('site.seo_local.block_1_title') }}</h2>
                    <p class="mt-3 leading-7 text-slate-600">{{ __('site.seo_local.block_1_text') }}</p>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900">{{ __('site.seo_local.block_2_title') }}</h2>
                    <p class="mt-3 leading-7 text-slate-600">{{ __('site.seo_local.block_2_text') }}</p>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900">{{ __('site.seo_local.block_3_title') }}</h2>
                    <p class="mt-3 leading-7 text-slate-600">{{ __('site.seo_local.block_3_text') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                {{ __('site.seo_local.available_title') }}
            </h2>

            <div class="mt-8 grid md:grid-cols-3 gap-6">
                @forelse($vehicles as $vehicle)
                    <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                        <img src="{{ $vehicle->primary_image_url }}"
                             alt="{{ $vehicle->name }}"
                             class="h-56 w-full rounded-2xl object-cover">

                        <h3 class="mt-5 text-xl font-bold text-slate-900">{{ $vehicle->name }}</h3>
                        <p class="mt-2 text-slate-600">{{ $vehicle->short_description }}</p>

                        <a href="{{ route('vehicle.show', $vehicle->slug) }}"
                           class="mt-5 inline-flex w-full items-center justify-center rounded-full bg-sky-600 px-4 py-3 font-semibold text-white hover:bg-sky-700">
                            {{ __('site.common.see_details') }}
                        </a>
                    </div>
                @empty
                    <div class="md:col-span-3 rounded-3xl border border-slate-200 bg-slate-50 p-8 text-slate-600">
                        {{ __('site.offers.empty') }}
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
