@extends('admin.layout')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">
                {{ __('site.admin.vehicles.title') }}
            </h1>
            <p class="mt-1 text-slate-600">
                {{ __('site.admin.vehicles.subtitle') }}
            </p>
        </div>

        <a href="{{ route('admin.vehicles.create') }}" class="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-3 font-semibold text-white hover:bg-sky-700">
            {{ __('site.admin.vehicles.add') }}
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="md:hidden space-y-4">
        @forelse($vehicles as $vehicle)
            <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="flex gap-4">
                    <img src="{{ $vehicle->primary_image_url }}" alt="{{ $vehicle->name }}" class="h-24 w-28 shrink-0 rounded-2xl object-cover">

                    <div class="min-w-0 flex-1">
                        <h2 class="font-bold text-slate-900">{{ $vehicle->name }}</h2>
                        <p class="mt-1 truncate text-sm text-slate-500">{{ $vehicle->slug }}</p>

                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                {{ __('site.admin.vehicle_types.' . $vehicle->type) }}
                            </span>

                            <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">
                                {{ $vehicle->weekly_price ? number_format((float) $vehicle->weekly_price, 0) . ' lei' : '-' }}
                            </span>

                            <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $vehicle->is_available ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                                {{ $vehicle->is_available ? __('site.admin.common.yes') : __('site.admin.common.no') }}
                            </span>
                        </div>

                        @if($vehicle->rentalPlans->isNotEmpty())
                            <div class="mt-3 text-xs text-slate-500">
                                {{ $vehicle->rentalPlans->count() }} {{ __('site.admin.pricing.short_count') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-3 gap-2">
                    <a href="{{ route('vehicle.show', $vehicle->slug) }}" target="_blank" class="rounded-full border border-slate-300 px-3 py-2 text-center text-sm font-medium text-slate-700">
                        {{ __('site.admin.actions.view') }}
                    </a>

                    <a href="{{ route('admin.vehicles.edit', $vehicle) }}" class="rounded-full bg-slate-100 px-3 py-2 text-center text-sm font-medium text-slate-700">
                        {{ __('site.admin.actions.edit') }}
                    </a>

                    <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle) }}" onsubmit="return confirm('{{ __('site.admin.vehicles.confirm_delete') }}')">
                        @csrf
                        @method('DELETE')
                        <button class="w-full rounded-full bg-red-50 px-3 py-2 text-sm font-medium text-red-700">
                            {{ __('site.admin.actions.delete') }}
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="rounded-3xl border border-slate-200 bg-white p-6 text-slate-600">
                {{ __('site.admin.vehicles.empty') }}
            </div>
        @endforelse
    </div>

    <div class="hidden md:block overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
            <tr>
                <th class="text-left p-4">{{ __('site.admin.fields.image') }}</th>
                <th class="text-left p-4">{{ __('site.admin.fields.name') }}</th>
                <th class="text-left p-4">{{ __('site.admin.fields.type') }}</th>
                <th class="text-left p-4">{{ __('site.admin.fields.weekly_price') }}</th>
                <th class="text-left p-4">{{ __('site.admin.pricing.title') }}</th>
                <th class="text-left p-4">{{ __('site.admin.fields.available') }}</th>
                <th class="text-left p-4">{{ __('site.admin.fields.active') }}</th>
                <th class="text-right p-4">{{ __('site.admin.fields.actions') }}</th>
            </tr>
            </thead>

            <tbody>
            @forelse($vehicles as $vehicle)
                <tr class="border-t border-slate-100">
                    <td class="p-4">
                        <img src="{{ $vehicle->primary_image_url }}" alt="{{ $vehicle->name }}" class="h-16 w-24 rounded-xl object-cover">
                    </td>

                    <td class="p-4">
                        <div class="font-bold text-slate-900">{{ $vehicle->name }}</div>
                        <div class="text-slate-500">{{ $vehicle->slug }}</div>
                    </td>

                    <td class="p-4">
                        {{ __('site.admin.vehicle_types.' . $vehicle->type) }}
                    </td>

                    <td class="p-4">
                        {{ $vehicle->weekly_price ? number_format((float) $vehicle->weekly_price, 0) . ' lei' : '-' }}
                    </td>

                    <td class="p-4">
                        @if($vehicle->rentalPlans->isNotEmpty())
                            <div class="space-y-1">
                                @foreach($vehicle->rentalPlans->take(3) as $plan)
                                    <div class="text-xs text-slate-600">
                                        <span class="font-semibold">{{ $plan->title }}</span>
                                        —
                                        {{ $plan->formattedPrice() }}
                                    </div>
                                @endforeach

                                @if($vehicle->rentalPlans->count() > 3)
                                    <div class="text-xs text-slate-400">
                                        +{{ $vehicle->rentalPlans->count() - 3 }}
                                    </div>
                                @endif
                            </div>
                        @else
                            <span class="text-slate-400">-</span>
                        @endif
                    </td>

                    <td class="p-4">
                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $vehicle->is_available ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                            {{ $vehicle->is_available ? __('site.admin.common.yes') : __('site.admin.common.no') }}
                        </span>
                    </td>

                    <td class="p-4">
                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $vehicle->is_active ? 'bg-sky-50 text-sky-700' : 'bg-slate-100 text-slate-600' }}">
                            {{ $vehicle->is_active ? __('site.admin.common.yes') : __('site.admin.common.no') }}
                        </span>
                    </td>

                    <td class="p-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('vehicle.show', $vehicle->slug) }}" target="_blank" class="rounded-full border border-slate-300 px-3 py-2 font-medium text-slate-700 hover:border-sky-300 hover:text-sky-700">
                                {{ __('site.admin.actions.view') }}
                            </a>

                            <a href="{{ route('admin.vehicles.edit', $vehicle) }}" class="rounded-full bg-slate-100 px-3 py-2 font-medium text-slate-700 hover:bg-slate-200">
                                {{ __('site.admin.actions.edit') }}
                            </a>

                            <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle) }}" onsubmit="return confirm('{{ __('site.admin.vehicles.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-full bg-red-50 px-3 py-2 font-medium text-red-700 hover:bg-red-100">
                                    {{ __('site.admin.actions.delete') }}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="p-6 text-slate-600">
                        {{ __('site.admin.vehicles.empty') }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $vehicles->links() }}
    </div>

@endsection
