@extends('presentation.layout')

@section('title', $vehicle->name . ' | RentRide')
@section('description', $vehicle->short_description ?? __('site.seo.offers_description'))

@section('content')

    <section class="bg-gradient-to-br from-sky-50 via-white to-cyan-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <a href="{{ route('offers') }}" class="inline-flex items-center text-sm font-medium text-sky-700 hover:text-sky-800">
                ← {{ __('site.common.back_to_offers') }}
            </a>

            <div class="mt-6 grid lg:grid-cols-2 gap-12 items-start">
                <div>
                    <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-4 shadow-sm">
                        <img
                            src="{{ $vehicle->primary_image_url }}"
                            alt="{{ $vehicle->name }}"
                            class="w-full rounded-[1.5rem] object-cover"
                        >
                    </div>
                </div>

                <div>
                    <div class="text-sm font-semibold uppercase tracking-wide text-sky-700">
                        {{ __('site.vehicle.city_label') }}
                    </div>

                    <h1 class="mt-3 text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                        {{ $vehicle->name }}
                    </h1>

                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        {{ $vehicle->short_description }}
                    </p>

                    <div class="mt-8 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="text-sm text-slate-500">{{ __('site.vehicle.price') }}</div>
                        <div class="mt-2 text-3xl font-extrabold text-sky-700">
                            {{ number_format((float) $vehicle->weekly_price, 0) }} {{ __('site.offers.per_week') }}
                        </div>

                        <div class="mt-4 text-slate-600">
                            @if($vehicle->deposit)
                                {{ __('site.vehicle.deposit') }}: {{ number_format((float) $vehicle->deposit, 0) }} lei
                            @else
                                {{ __('site.vehicle.deposit_fallback') }}
                            @endif
                        </div>
                    </div>

                    <div class="mt-8 grid sm:grid-cols-2 gap-4">
                        <div class="rounded-2xl border border-slate-200 bg-white p-5">
                            <div class="text-sm text-slate-500">{{ __('site.vehicle.brand') }}</div>
                            <div class="mt-1 font-semibold text-slate-900">{{ $vehicle->brand ?: '-' }}</div>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5">
                            <div class="text-sm text-slate-500">{{ __('site.vehicle.model') }}</div>
                            <div class="mt-1 font-semibold text-slate-900">{{ $vehicle->model ?: '-' }}</div>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5">
                            <div class="text-sm text-slate-500">{{ __('site.vehicle.fuel') }}</div>
                            <div class="mt-1 font-semibold text-slate-900">{{ $vehicle->fuel_type ?: '-' }}</div>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5">
                            <div class="text-sm text-slate-500">{{ __('site.vehicle.license') }}</div>
                            <div class="mt-1 font-semibold text-slate-900">{{ $vehicle->license_required ?: '-' }}</div>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a
                            href="https://wa.me/40753721818?text={{ urlencode('Hello! I am interested in ' . $vehicle->name) }}"
                            class="inline-flex items-center justify-center rounded-full bg-sky-600 px-6 py-3.5 font-semibold text-white hover:bg-sky-700"
                        >
                            {{ __('site.vehicle.whatsapp') }}
                        </a>

                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3.5 font-semibold text-slate-700 hover:border-sky-300 hover:text-sky-700"
                        >
                            {{ __('site.vehicle.contact_form') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-[1.3fr_0.7fr] gap-8">
                <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-2xl font-bold text-slate-900">{{ __('site.vehicle.description_title') }}</h2>
                    <p class="mt-4 leading-8 text-slate-600">
                        {{ $vehicle->description }}
                    </p>
                </div>

                <div class="space-y-6">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-900">{{ __('site.vehicle.feature_1_title') }}</h3>
                        <p class="mt-2 text-slate-600">{{ __('site.vehicle.feature_1_text') }}</p>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-900">{{ __('site.vehicle.feature_2_title') }}</h3>
                        <p class="mt-2 text-slate-600">{{ __('site.vehicle.feature_2_text') }}</p>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-900">{{ __('site.vehicle.feature_3_title') }}</h3>
                        <p class="mt-2 text-slate-600">{{ __('site.vehicle.feature_3_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
