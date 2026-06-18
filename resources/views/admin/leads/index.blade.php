@extends('admin.layouts.app')

@section('title', 'Cereri primite - SiteGo')
@section('page-title', 'Cereri primite')
@section('page-description', 'Aici vezi toate cererile trimise din configurator.')

@section('actions')
    <a
        href="{{ route('admin.dashboard') }}"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        Dashboard
    </a>

    <a
        href="/"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        Înapoi la site
    </a>

    <a
        href="{{ route('admin.leads.export', request()->query()) }}"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        Export CSV
    </a>
@endsection

@section('content')
    <div class="mb-6 grid gap-4 md:grid-cols-5">
        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Total cereri</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['total'] ?? 0 }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Cereri noi</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['new'] ?? 0 }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">În discuție</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['in_discussion'] ?? 0 }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">De urmărit</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ $stats['follow_up'] ?? 0 }}
            </p>
        </div>

        <div class="rounded-[1.5rem] border border-black/10 bg-white p-5">
            <p class="text-sm text-black/50">Valoare estimată</p>
            <p class="mt-2 text-3xl font-semibold">
                {{ number_format($stats['estimated_value'] ?? 0, 0, ',', '.') }} lei
            </p>
        </div>
    </div>

    <form
        method="GET"
        action="{{ route('admin.leads.index') }}"
        class="mb-6 grid gap-3 rounded-[1.5rem] border border-black/10 bg-white p-5 md:grid-cols-[1.4fr_1fr_1fr_1fr_auto_auto]"
    >
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Caută nume, email, telefon, template..."
            class="rounded-2xl border border-black/10 bg-[#f7f4ef] px-4 py-3 text-sm outline-none focus:border-black/30"
        >

        <select
            name="status"
            class="rounded-2xl border border-black/10 bg-[#f7f4ef] px-4 py-3 text-sm outline-none focus:border-black/30"
        >
            <option value="">Toate statusurile</option>

            @foreach($statuses as $status)
                <option value="{{ $status->value }}" @selected(request('status') === $status->value)>
                    {{ $status->label() }}
                </option>
            @endforeach
        </select>

        <select
            name="category"
            class="rounded-2xl border border-black/10 bg-[#f7f4ef] px-4 py-3 text-sm outline-none focus:border-black/30"
        >
            <option value="">Toate categoriile</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->selected_category_key }}"
                    @selected(request('category') === $category->selected_category_key)
                >
                    {{ $category->selected_category_label }}
                </option>
            @endforeach
        </select>

        <select
            name="package"
            class="rounded-2xl border border-black/10 bg-[#f7f4ef] px-4 py-3 text-sm outline-none focus:border-black/30"
        >
            <option value="">Toate pachetele</option>

            @foreach($packages as $package)
                <option
                    value="{{ $package->selected_package_key }}"
                    @selected(request('package') === $package->selected_package_key)
                >
                    {{ $package->selected_package_name }}
                </option>
            @endforeach
        </select>

        <label class="flex items-center gap-2 rounded-2xl border border-black/10 bg-[#f7f4ef] px-4 py-3 text-sm">
            <input
                type="checkbox"
                name="follow_up"
                value="1"
                @checked(request()->boolean('follow_up'))
                class="h-4 w-4"
            >

            <span>De urmărit</span>
        </label>

        <div class="flex gap-2">
            <button
                type="submit"
                class="rounded-full bg-black px-5 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
            >
                Filtrează
            </button>

            <a
                href="{{ route('admin.leads.index') }}"
                class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
            >
                Reset
            </a>
        </div>
    </form>

    <div class="overflow-hidden rounded-[2rem] border border-black/10 bg-white shadow-xl">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-black text-white">
                <tr>
                    <th class="px-5 py-4">#</th>
                    <th class="px-5 py-4">Client</th>
                    <th class="px-5 py-4">Contact</th>
                    <th class="px-5 py-4">Proiect</th>
                    <th class="px-5 py-4">Funcții extra</th>
                    <th class="px-5 py-4">Total</th>
                    <th class="px-5 py-4">Data</th>
                    <th class="px-5 py-4">Acțiuni</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-black/10">
                @forelse($leads as $lead)
                    @php
                        $features = is_array($lead->selected_features)
                            ? $lead->selected_features
                            : json_decode($lead->selected_features ?? '[]', true);

                        $priorityLabel = match($lead->priority) {
                            'low' => 'Scăzută',
                            'high' => 'Ridicată',
                            default => 'Normală',
                        };
                    @endphp

                    <tr class="align-top transition hover:bg-[#f7f4ef]">
                        <td class="px-5 py-4 font-medium">
                            {{ $lead->id }}
                        </td>

                        <td class="px-5 py-4">
                            <div class="font-semibold">
                                {{ $lead->name }}
                            </div>

                            <div class="mt-3">
                                @include('admin.leads.partials.status-dropdown', [
                                    'lead' => $lead,
                                    'statuses' => $statuses,
                                ])
                            </div>

                            @if($lead->priority === 'high')
                                <div class="mt-2 inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                                    Prioritate ridicată
                                </div>
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            @if($lead->email)
                                <div>
                                    <a
                                        href="{{ $lead->email_url }}"
                                        class="text-[#8b6f47] hover:underline"
                                    >
                                        {{ $lead->email }}
                                    </a>
                                </div>
                            @endif

                            @if($lead->phone)
                                <div class="mt-1">
                                    <a
                                        href="{{ $lead->whatsapp_url ?: 'tel:' . $lead->phone }}"
                                        target="{{ $lead->whatsapp_url ? '_blank' : '_self' }}"
                                        class="text-[#8b6f47] hover:underline"
                                    >
                                        {{ $lead->phone }}
                                    </a>
                                </div>
                            @endif

                            @if(!$lead->email && !$lead->phone)
                                <span class="text-black/40">Fără contact</span>
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            <div class="font-medium">
                                {{ $lead->selected_template }}
                            </div>

                            <div class="mt-2 flex flex-wrap gap-2">
                                @if($lead->selected_category_label)
                                    <span class="inline-flex rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60">
                                            {{ $lead->selected_category_label }}
                                        </span>
                                @endif

                                @if($lead->selected_package_name)
                                    <span class="inline-flex rounded-full bg-black px-3 py-1 text-xs text-white">
                                            Pachet {{ $lead->selected_package_name }}
                                        </span>
                                @endif
                            </div>
                        </td>

                        <td class="px-5 py-4">
                            @if(!empty($features))
                                <div class="flex max-w-xs flex-wrap gap-2">
                                    @foreach($features as $feature)
                                        <span class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60">
                                                {{ $feature }}
                                            </span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-black/40">Fără extra</span>
                            @endif
                        </td>

                        <td class="whitespace-nowrap px-5 py-4 font-semibold">
                            {{ number_format($lead->total_price, 0, ',', '.') }} lei
                        </td>

                        <td class="whitespace-nowrap px-5 py-4 text-black/50">
                            <div>
                                {{ $lead->created_at?->format('d.m.Y H:i') }}
                            </div>

                            @if($lead->follow_up_at)
                                <div class="mt-2 rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60">
                                    Follow-up: {{ $lead->follow_up_at->format('d.m H:i') }}
                                </div>
                            @endif

                            <div class="mt-2 rounded-full bg-white px-3 py-1 text-xs text-black/40">
                                Prioritate: {{ $priorityLabel }}
                            </div>
                        </td>

                        <td class="px-5 py-4">
                            <div class="flex flex-wrap gap-2">
                                <a
                                    href="{{ route('admin.leads.show', $lead) }}"
                                    class="rounded-full bg-black px-4 py-2 text-xs font-medium text-white transition hover:bg-[#8b6f47]"
                                >
                                    Detalii
                                </a>

                                <a
                                    href="{{ route('admin.leads.edit', $lead) }}"
                                    class="rounded-full border border-black/10 bg-white px-4 py-2 text-xs font-medium transition hover:border-black/30"
                                >
                                    Editează
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-5 py-12 text-center text-black/50">
                            Nu ai încă nicio cerere.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $leads->links() }}
    </div>
@endsection
