@extends('admin.layout')

@section('content')

    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 mb-8">
        {{ __('site.admin_requests.title') }}
    </h1>

    <div class="md:hidden space-y-4">
        @forelse($contactRequests as $request)
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="font-bold text-slate-900">{{ $request->name }}</h2>
                        <p class="mt-1 text-sm text-slate-500">{{ $request->created_at->format('d.m.Y H:i') }}</p>
                    </div>

                    <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">
                    {{ $request->vehicle_type ?: '-' }}
                </span>
                </div>

                <div class="mt-4 space-y-2 text-sm text-slate-600">
                    <p>
                        <span class="font-semibold text-slate-800">Telefon:</span>
                        <a href="tel:{{ $request->phone }}" class="text-sky-700 font-semibold">
                            {{ $request->phone }}
                        </a>
                    </p>

                    <p>
                        <span class="font-semibold text-slate-800">Email:</span>
                        {{ $request->email ?: '-' }}
                    </p>

                    <p>
                        <span class="font-semibold text-slate-800">Mesaj:</span>
                        {{ $request->message ?: '-' }}
                    </p>
                </div>

                <form
                    method="POST"
                    action="{{ route('admin.contact_requests.destroy', $request) }}"
                    onsubmit="return confirm('Ștergi această cerere?')"
                    class="mt-4"
                >
                    @csrf
                    @method('DELETE')

                    <button class="w-full rounded-full bg-red-50 px-4 py-2 font-semibold text-red-700 hover:bg-red-100">
                        Șterge
                    </button>
                </form>
            </div>
        @empty
            <div class="rounded-3xl border border-slate-200 bg-white p-6 text-slate-500">
                {{ __('site.admin_dashboard.no_requests') }}
            </div>
        @endforelse
    </div>

    <div class="hidden md:block overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
            <tr>
                <th class="text-left p-4">{{ __('site.admin_requests.date') }}</th>
                <th class="text-left p-4">{{ __('site.admin_requests.name') }}</th>
                <th class="text-left p-4">{{ __('site.admin_requests.phone') }}</th>
                <th class="text-left p-4">{{ __('site.admin_requests.email') }}</th>
                <th class="text-left p-4">{{ __('site.admin_requests.interest') }}</th>
                <th class="text-left p-4">{{ __('site.admin_requests.message') }}</th>
                <th class="text-right p-4">{{ __('site.admin_requests.actions') }}</th>
            </tr>
            </thead>

            <tbody>
            @forelse($contactRequests as $request)
                <tr class="border-t border-slate-100 align-top">
                    <td class="p-4 text-slate-500">
                        {{ $request->created_at->format('d.m.Y H:i') }}
                    </td>

                    <td class="p-4 font-bold text-slate-900">
                        {{ $request->name }}
                    </td>

                    <td class="p-4">
                        <a href="tel:{{ $request->phone }}" class="font-semibold text-sky-700 hover:text-sky-800">
                            {{ $request->phone }}
                        </a>
                    </td>

                    <td class="p-4 text-slate-600">
                        {{ $request->email ?: '-' }}
                    </td>

                    <td class="p-4 text-slate-600">
                        {{ $request->vehicle_type ?: '-' }}
                    </td>

                    <td class="p-4 max-w-md text-slate-600">
                        {{ $request->message ?: '-' }}
                    </td>

                    <td class="p-4 text-right">
                        <form
                            method="POST"
                            action="{{ route('admin.contact_requests.destroy', $request) }}"
                            onsubmit="return confirm('Ștergi această cerere?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button class="rounded-full bg-red-50 px-4 py-2 font-semibold text-red-700 hover:bg-red-100">
                                Șterge
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-6 text-slate-500">
                        {{ __('site.admin_dashboard.no_requests') }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $contactRequests->links() }}
    </div>

@endsection
