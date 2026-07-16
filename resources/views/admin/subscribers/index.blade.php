@extends('admin.layouts.app')

@section('title', __('admin.subscribers.browser_title'))
@section('page-title', __('admin.subscribers.page_title'))
@section('page-description', __('admin.subscribers.description'))

@section('actions')
    <a
        href="{{ route('admin.dashboard') }}"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        {{ __('admin.subscribers.dashboard') }}
    </a>

    <a
        href="{{ route('admin.leads.index') }}"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        {{ __('admin.subscribers.leads') }}
    </a>

    <a
        href="{{ route('admin.subscribers.export', request()->query()) }}"
        class="rounded-full bg-black px-5 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
    >
        {{ __('admin.subscribers.export') }}
    </a>
@endsection

@section('content')
    <div class="mb-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
        @foreach([
            'total' => $stats['total'],
            'valid' => $stats['valid'],
            'used' => $stats['used'],
            'expired' => $stats['expired'],
            'unsubscribed' => $stats['unsubscribed'],
        ] as $key => $value)
            <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
                <p class="text-sm text-black/50">
                    {{ __('admin.subscribers.stats.' . $key) }}
                </p>
                <p class="mt-2 text-3xl font-semibold">
                    {{ $value }}
                </p>
            </div>
        @endforeach
    </div>

    <section class="rounded-[2rem] border border-black/10 bg-white p-5 shadow-xl sm:p-6">
        <form
            method="GET"
            action="{{ route('admin.subscribers.index') }}"
            class="grid gap-3 md:grid-cols-[1fr_220px_auto_auto]"
        >
            <input
                type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="{{ __('admin.subscribers.filters.search_placeholder') }}"
                class="rounded-2xl border border-black/10 bg-[#f7f4ef] px-4 py-3 text-sm outline-none focus:border-[#8b6f47]"
            >

            <select
                name="status"
                class="rounded-2xl border border-black/10 bg-[#f7f4ef] px-4 py-3 text-sm outline-none focus:border-[#8b6f47]"
            >
                <option value="all" @selected(request('status', 'all') === 'all')>
                    {{ __('admin.subscribers.filters.all') }}
                </option>
                <option value="valid" @selected(request('status') === 'valid')>
                    {{ __('admin.subscribers.filters.valid') }}
                </option>
                <option value="used" @selected(request('status') === 'used')>
                    {{ __('admin.subscribers.filters.used') }}
                </option>
                <option value="expired" @selected(request('status') === 'expired')>
                    {{ __('admin.subscribers.filters.expired') }}
                </option>
                <option value="unsubscribed" @selected(request('status') === 'unsubscribed')>
                    {{ __('admin.subscribers.filters.unsubscribed') }}
                </option>
            </select>

            <button
                type="submit"
                class="rounded-full bg-black px-5 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
            >
                {{ __('admin.subscribers.filters.apply') }}
            </button>

            <a
                href="{{ route('admin.subscribers.index') }}"
                class="rounded-full border border-black/10 bg-white px-5 py-3 text-center text-sm font-medium transition hover:border-black/30"
            >
                {{ __('admin.subscribers.filters.reset') }}
            </a>
        </form>

        <div class="mt-6 overflow-x-auto">
            <table class="min-w-[1350px] w-full text-left text-sm">
                <thead>
                <tr class="border-b border-black/10 text-black/50">
                    <th class="py-3 pr-4">{{ __('admin.subscribers.table.email') }}</th>
                    <th class="py-3 pr-4">{{ __('admin.subscribers.table.code') }}</th>
                    <th class="py-3 pr-4">{{ __('admin.subscribers.table.status') }}</th>
                    <th class="py-3 pr-4">{{ __('admin.subscribers.table.requests') }}</th>
                    <th class="py-3 pr-4">{{ __('admin.subscribers.table.expires_at') }}</th>
                    <th class="py-3 pr-4">{{ __('admin.subscribers.table.source_page') }}</th>
                    <th class="py-3 pr-4">{{ __('admin.subscribers.table.consent_at') }}</th>
                    <th class="py-3 pr-4">{{ __('admin.subscribers.table.last_sent_at') }}</th>
                    <th class="py-3 text-right">{{ __('admin.subscribers.table.actions') }}</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-black/10">
                @forelse($subscribers as $subscriber)
                    @php($status = $subscriber->campaignStatus())

                    <tr class="align-top">
                        <td class="py-4 pr-4">
                            <a
                                href="mailto:{{ $subscriber->email }}"
                                class="font-semibold text-[#171717] hover:text-[#8b6f47] hover:underline"
                            >
                                {{ $subscriber->email }}
                            </a>
                        </td>

                        <td class="py-4 pr-4">
                            <span class="rounded-lg bg-[#171717] px-3 py-2 font-mono text-sm font-semibold tracking-wider text-white">
                                {{ $subscriber->discount_code ?: '—' }}
                            </span>
                            <p class="mt-2 text-xs text-black/45">
                                −{{ $subscriber->discount_percent ?? 10 }}%
                            </p>
                        </td>

                        <td class="py-4 pr-4">
                            <span @class([
                                'inline-flex rounded-full px-3 py-1 text-xs font-semibold',
                                'bg-green-100 text-green-800' => $status === 'valid',
                                'bg-blue-100 text-blue-800' => $status === 'used',
                                'bg-amber-100 text-amber-800' => $status === 'expired',
                                'bg-gray-200 text-gray-700' => $status === 'unsubscribed',
                            ])>
                                {{ __('admin.subscribers.status.' . $status) }}
                            </span>

                            @if($subscriber->used_at)
                                <p class="mt-2 text-xs text-black/45">
                                    {{ $subscriber->used_at->format('d.m.Y H:i') }}
                                </p>
                            @endif
                        </td>

                        <td class="py-4 pr-4 text-black/65">
                            <p class="font-semibold">
                                {{ $subscriber->request_count ?: 1 }}
                            </p>
                            <p class="mt-1 text-xs text-black/45">
                                {{ __('admin.subscribers.table.last') }}:
                                {{ ($subscriber->last_requested_at ?? $subscriber->created_at)?->format('d.m.Y H:i') ?? '—' }}
                            </p>
                        </td>

                        <td class="py-4 pr-4 text-black/65">
                            {{ $subscriber->discount_expires_at?->format('d.m.Y H:i') ?? __('admin.subscribers.table.no_expiry') }}
                        </td>

                        <td class="max-w-[250px] break-all py-4 pr-4 text-black/55">
                            {{ $subscriber->source_page ?: '—' }}
                        </td>

                        <td class="py-4 pr-4 text-black/55">
                            {{ $subscriber->privacy_accepted_at?->format('d.m.Y H:i') ?? '—' }}
                        </td>

                        <td class="py-4 pr-4 text-black/55">
                            {{ $subscriber->last_sent_at?->format('d.m.Y H:i') ?? __('admin.subscribers.table.not_sent') }}
                        </td>

                        <td class="py-4 text-right">
                            <div class="flex justify-end gap-2">
                                @if($subscriber->hasValidDiscountCode())
                                    <form method="POST" action="{{ route('admin.subscribers.resend', $subscriber) }}">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="rounded-full border border-black/10 bg-white px-3 py-2 text-xs font-semibold transition hover:border-black/30"
                                        >
                                            {{ __('admin.subscribers.actions.resend') }}
                                        </button>
                                    </form>
                                @endif

                                @if($subscriber->used_at)
                                    <form method="POST" action="{{ route('admin.subscribers.mark-unused', $subscriber) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            type="submit"
                                            class="rounded-full border border-black/10 bg-white px-3 py-2 text-xs font-semibold transition hover:border-black/30"
                                        >
                                            {{ __('admin.subscribers.actions.mark_unused') }}
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('admin.subscribers.mark-used', $subscriber) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            type="submit"
                                            class="rounded-full bg-black px-3 py-2 text-xs font-semibold text-white transition hover:bg-[#8b6f47]"
                                        >
                                            {{ __('admin.subscribers.actions.mark_used') }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="py-12 text-center text-black/50">
                            {{ __('admin.subscribers.table.empty') }}
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $subscribers->links() }}
        </div>
    </section>
@endsection