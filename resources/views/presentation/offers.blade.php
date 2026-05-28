@extends('presentation.layout')

@section('title', __('site.seo.offers_title'))
@section('description', __('site.seo.offers_description'))

@section('content')

    <section class="bg-gradient-to-br from-sky-50 via-white to-cyan-50 py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                {{ __('site.offers.title') }}
            </h1>
            <p class="mt-4 mx-auto max-w-3xl text-lg text-slate-600">
                {{ __('site.offers.subtitle') }}
            </p>

            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-3">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-sky-600 px-6 py-3 font-semibold text-white hover:bg-sky-700">
                    {{ __('site.common.ask_availability') }}
                </a>
            </div>
        </div>
    </section>

    <section id="offers-list" class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-6">
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

@endsection
