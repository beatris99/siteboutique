@extends('admin.layout')

@section('content')

    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 mb-8">
        {{ __('site.admin_dashboard.title') }}
    </h1>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-10">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-slate-500">{{ __('site.admin_dashboard.total_vehicles') }}</p>
            <p class="mt-2 text-4xl font-extrabold text-slate-900">{{ $vehiclesCount }}</p>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-slate-500">{{ __('site.admin_dashboard.available') }}</p>
            <p class="mt-2 text-4xl font-extrabold text-emerald-600">{{ $availableVehiclesCount }}</p>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:col-span-2 lg:col-span-1">
            <p class="text-slate-500">{{ __('site.admin_dashboard.contact_requests') }}</p>
            <p class="mt-2 text-4xl font-extrabold text-sky-700">{{ $contactRequestsCount }}</p>
        </div>
    </div>

    <div class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
            <h2 class="text-xl font-bold text-slate-900">{{ __('site.admin_dashboard.latest_requests') }}</h2>

            <a href="{{ route('admin.contact_requests.index') }}" class="font-semibold text-sky-700 hover:text-sky-800">
                {{ __('site.admin_dashboard.view_all') }}
            </a>
        </div>

        <div class="space-y-4">
            @forelse($latestRequests as $request)
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                    <p class="font-bold text-slate-900">
                        {{ $request->name }} - {{ $request->phone }}
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ $request->vehicle_type ?: '-' }}
                    </p>

                    <p class="mt-2 text-slate-600">
                        {{ $request->message ?: '-' }}
                    </p>
                </div>
            @empty
                <p class="text-slate-500">{{ __('site.admin_dashboard.no_requests') }}</p>
            @endforelse
        </div>
    </div>

@endsection
