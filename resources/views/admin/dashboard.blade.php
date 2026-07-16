@extends('admin.layouts.app')

@section('title', 'Dashboard - SiteGo Admin')
@section('page-title', 'Dashboard')
@section('page-description', 'Privire rapidă peste cereri, vânzări estimate și lead-uri de urmărit.')

@section('actions')
    <a
        href="/"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        Înapoi la site
    </a>

    <a
        href="{{ route('admin.subscribers.index') }}"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        {{ __('admin.subscribers.navigation') }}
    </a>

    <a
        href="{{ route('admin.leads.index') }}"
        class="rounded-full bg-black px-5 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
    >
        Vezi lead-uri
    </a>
@endsection

@section('content')
    <div class="mb-6 grid gap-4 md:grid-cols-4">
        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Total lead-uri</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['total'] }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Lead-uri noi</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['new'] }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">De urmărit</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['follow_up'] }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Valoare estimată</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ number_format($stats['estimated_value'], 0, ',', '.') }} lei
            </p>
        </div>
    </div>

    <div class="mb-6 grid gap-4 md:grid-cols-4">
        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Contactate</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['contacted'] }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">În discuție</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['in_discussion'] }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Câștigate</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['won'] }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Valoare câștigată</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ number_format($stats['won_value'], 0, ',', '.') }} lei
            </p>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1fr_1fr]">
        <section class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Ultimele cereri
                    </p>

                    <h2 class="mt-3 text-2xl font-semibold">
                        Lead-uri recente
                    </h2>
                </div>

                <a
                    href="{{ route('admin.leads.index') }}"
                    class="text-sm text-[#8b6f47] hover:underline"
                >
                    Vezi toate
                </a>
            </div>

            <div class="mt-6 grid gap-3">
                @forelse($latestLeads as $lead)
                    <a
                        href="{{ route('admin.leads.show', $lead) }}"
                        class="block rounded-2xl border border-black/10 bg-[#f7f4ef] p-4 transition hover:border-black/30"
                    >
                        <div class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                            <div>
                                <p class="font-semibold">
                                    {{ $lead->name }}
                                </p>

                                <p class="mt-1 text-sm text-black/50">
                                    {{ $lead->selected_template }} · {{ number_format($lead->total_price, 0, ',', '.') }} lei
                                </p>
                            </div>

                            <p class="text-xs text-black/40">
                                {{ $lead->created_at?->format('d.m.Y H:i') }}
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="rounded-2xl border border-dashed border-black/10 bg-[#f7f4ef] p-6 text-center text-sm text-black/50">
                        Nu există încă lead-uri.
                    </div>
                @endforelse
            </div>
        </section>

        <section class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Follow-up
                    </p>

                    <h2 class="mt-3 text-2xl font-semibold">
                        Lead-uri de urmărit
                    </h2>
                </div>

                <a
                    href="{{ route('admin.leads.index', ['follow_up' => 1]) }}"
                    class="text-sm text-[#8b6f47] hover:underline"
                >
                    Vezi toate
                </a>
            </div>

            <div class="mt-6 grid gap-3">
                @forelse($followUpLeads as $lead)
                    <a
                        href="{{ route('admin.leads.show', $lead) }}"
                        class="block rounded-2xl border border-black/10 bg-[#f7f4ef] p-4 transition hover:border-black/30"
                    >
                        <div class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                            <div>
                                <p class="font-semibold">
                                    {{ $lead->name }}
                                </p>

                                <p class="mt-1 text-sm text-black/50">
                                    {{ $lead->selected_template }}
                                </p>
                            </div>

                            <div class="text-left md:text-right">
                                <p class="text-sm font-medium text-[#8b6f47]">
                                    {{ $lead->follow_up_at?->format('d.m.Y H:i') }}
                                </p>

                                <p class="mt-1 text-xs text-black/40">
                                    Prioritate: {{ match($lead->priority) {
                                        'low' => 'Scăzută',
                                        'high' => 'Ridicată',
                                        default => 'Normală',
                                    } }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="rounded-2xl border border-dashed border-black/10 bg-[#f7f4ef] p-6 text-center text-sm text-black/50">
                        Nu ai lead-uri setate pentru follow-up.
                    </div>
                @endforelse
            </div>
        </section>
    </div>

    <section class="mt-6 rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    Statusuri
                </p>

                <h2 class="mt-3 text-2xl font-semibold">
                    Valoare pe status
                </h2>
            </div>

            <a
                href="{{ route('admin.leads.export') }}"
                class="w-fit rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
            >
                Export CSV
            </a>
        </div>

        <div class="mt-6 overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead>
                <tr class="border-b border-black/10 text-black/50">
                    <th class="py-3 pr-4">Status</th>
                    <th class="py-3 pr-4">Număr lead-uri</th>
                    <th class="py-3 pr-4">Valoare estimată</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-black/10">
                @foreach($statusSummaries as $summary)
                    <tr>
                        <td class="py-4 pr-4 font-medium">
                            {{ $summary['label'] }}
                        </td>

                        <td class="py-4 pr-4">
                            {{ $summary['count'] }}
                        </td>

                        <td class="py-4 pr-4 font-semibold">
                            {{ number_format($summary['total'], 0, ',', '.') }} lei
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection