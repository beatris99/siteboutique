@extends('presentation.layout')

@section('title', __('site.seo.delivery_title'))
@section('description', __('site.seo.delivery_description'))

@section('content')

    <section id="delivery-offers" class="bg-gradient-to-br from-sky-50 via-white to-cyan-50 py-8 sm:py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center">
                <div class="inline-flex rounded-full border border-sky-200 bg-white px-3 py-1.5 text-xs sm:text-sm font-medium text-sky-700 shadow-sm">
                    {{ __('site.delivery.badge') }}
                </div>

                <h1 class="mt-4 text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                    {{ __('site.delivery.available_title') }}
                </h1>

                <p class="mt-3 mx-auto max-w-3xl text-base sm:text-lg leading-7 text-slate-600">
                    {{ __('site.delivery.subtitle') }}
                </p>

                <div class="mt-6 flex flex-col items-center justify-center gap-3 sm:flex-row">
                    <a href="{{ route('contact') }}" class="inline-flex w-full items-center justify-center rounded-full bg-sky-600 px-6 py-3.5 font-semibold text-white hover:bg-sky-700 sm:w-auto">
                        {{ __('site.common.ask_availability') }}
                    </a>
                </div>
            </div>

            <div class="mt-7 sm:mt-10 grid md:grid-cols-3 gap-5 sm:gap-6">
                @forelse($vehicles as $vehicle)
                    @include('presentation.partials.vehicle-card', ['vehicle' => $vehicle])
                @empty
                    <div class="md:col-span-3 rounded-3xl border border-slate-200 bg-white p-8 text-slate-600">
                        {{ __('site.offers.empty') }}
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-10 sm:py-14 md:py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-900">
                {{ __('site.delivery.benefits_title') }}
            </h2>

            <div class="mt-6 grid md:grid-cols-3 gap-4 sm:gap-6">
                @foreach(__('site.delivery.benefits') as $benefit)
                    <div class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-8 shadow-sm">
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900">
                            {{ $benefit['title'] }}
                        </h3>

                        <p class="mt-3 leading-7 text-slate-600">
                            {{ $benefit['text'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
