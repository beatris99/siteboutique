<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Lead #{{ $lead->id }} - SiteBoutique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f7f4ef] text-[#171717]">
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

<main class="min-h-screen px-6 py-10">
    <div class="mx-auto max-w-6xl">
        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <a
                    href="{{ route('admin.leads.index') }}"
                    class="text-sm text-black/50 hover:text-black"
                >
                    ← Înapoi la cereri
                </a>

                <h1 class="mt-4 text-4xl font-semibold tracking-tight">
                    Lead #{{ $lead->id }} — {{ $lead->name }}
                </h1>

                <p class="mt-3 text-black/60">
                    Cerere primită la {{ $lead->created_at?->format('d.m.Y H:i') }}.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                @if($lead->email_url)
                    <a
                        href="{{ $lead->email_url }}"
                        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
                    >
                        Trimite email
                    </a>
                @endif

                @if($lead->whatsapp_url)
                    <a
                        href="{{ $lead->whatsapp_url }}"
                        target="_blank"
                        class="rounded-full bg-green-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-green-700"
                    >
                        WhatsApp
                    </a>
                @endif

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
                    >
                        Dashboard
                    </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-green-100 px-5 py-4 text-sm font-medium text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
            <section class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    Client
                </p>

                <div class="mt-6 space-y-5">
                    <div>
                        <p class="text-sm text-black/50">Nume</p>
                        <p class="mt-1 text-xl font-semibold">
                            {{ $lead->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-black/50">Status</p>

                        <div class="mt-2">
                            @include('admin.leads.partials.status-dropdown', [
                                'lead' => $lead,
                                'statuses' => $statuses,
                            ])
                        </div>
                    </div>

                    <div>
                        <p class="text-sm text-black/50">Email</p>

                        @if($lead->email)
                            <a
                                href="{{ $lead->email_url }}"
                                class="mt-1 inline-block text-[#8b6f47] hover:underline"
                            >
                                {{ $lead->email }}
                            </a>
                        @else
                            <p class="mt-1 text-black/40">-</p>
                        @endif
                    </div>

                    <div>
                        <p class="text-sm text-black/50">Telefon</p>

                        @if($lead->phone)
                            <a
                                href="{{ $lead->whatsapp_url ?: 'tel:' . $lead->phone }}"
                                target="{{ $lead->whatsapp_url ? '_blank' : '_self' }}"
                                class="mt-1 inline-block text-[#8b6f47] hover:underline"
                            >
                                {{ $lead->phone }}
                            </a>
                        @else
                            <p class="mt-1 text-black/40">-</p>
                        @endif
                    </div>
                </div>
            </section>

            <section class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    Configurație proiect
                </p>

                <div class="mt-6 grid gap-5">
                    <div>
                        <p class="text-sm text-black/50">Template</p>
                        <p class="mt-1 text-2xl font-semibold">
                            {{ $lead->selected_template }}
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @if($lead->selected_category_label)
                            <span class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60">
                                {{ $lead->selected_category_label }}
                            </span>
                        @endif

                        @if($lead->selected_package_name)
                            <span class="rounded-full bg-black px-3 py-1 text-xs text-white">
                                Pachet {{ $lead->selected_package_name }}
                            </span>
                        @endif
                    </div>

                    <div>
                        <p class="text-sm text-black/50">Funcții extra</p>

                        @if(!empty($features))
                            <div class="mt-3 flex flex-wrap gap-2">
                                @foreach($features as $feature)
                                    <span class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60">
                                        {{ $feature }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="mt-2 text-black/40">Fără extra</p>
                        @endif
                    </div>

                    <div class="rounded-[1.5rem] bg-[#f7f4ef] p-5">
                        <p class="text-sm text-black/50">Total estimativ</p>

                        <p class="mt-2 text-4xl font-semibold">
                            {{ number_format($lead->total_price, 0, ',', '.') }} lei
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <section class="mt-6 rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Urmărire lead
            </p>

            <form
                method="POST"
                action="{{ route('admin.leads.update-follow-up', $lead) }}"
                class="mt-6 grid gap-4 md:grid-cols-[1fr_1fr_auto]"
            >
                @csrf
                @method('PATCH')

                <div>
                    <label class="text-sm text-black/50">
                        Data follow-up
                    </label>

                    <input
                        type="datetime-local"
                        name="follow_up_at"
                        value="{{ $lead->follow_up_at?->format('Y-m-d\TH:i') }}"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >

                    @error('follow_up_at')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="text-sm text-black/50">
                        Prioritate
                    </label>

                    <select
                        name="priority"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                        <option value="low" @selected($lead->priority === 'low')>Scăzută</option>
                        <option value="normal" @selected($lead->priority === 'normal')>Normală</option>
                        <option value="high" @selected($lead->priority === 'high')>Ridicată</option>
                    </select>

                    @error('priority')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="flex items-end">
                    <button
                        type="submit"
                        class="w-full rounded-full bg-black px-6 py-4 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
                    >
                        Salvează
                    </button>
                </div>
            </form>

            <div class="mt-6 flex flex-wrap gap-3">
                @if($lead->follow_up_at)
                    <span class="rounded-full bg-[#f7f4ef] px-4 py-2 text-sm text-black/60">
                        Follow-up: {{ $lead->follow_up_at->format('d.m.Y H:i') }}
                    </span>
                @else
                    <span class="rounded-full bg-[#f7f4ef] px-4 py-2 text-sm text-black/40">
                        Fără follow-up setat
                    </span>
                @endif

                <span class="rounded-full bg-black px-4 py-2 text-sm text-white">
                    Prioritate: {{ $priorityLabel }}
                </span>
            </div>
        </section>

        <section class="mt-6 rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Mesaj client
            </p>

            <div class="mt-5 rounded-[1.5rem] bg-[#f7f4ef] p-5 leading-7 text-black/70">
                @if($lead->message)
                    {!! nl2br(e($lead->message)) !!}
                @else
                    <span class="text-black/40">Clientul nu a lăsat mesaj.</span>
                @endif
            </div>
        </section>

        <section class="mt-6 rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Note interne
            </p>

            <form
                method="POST"
                action="{{ route('admin.leads.notes.store', $lead) }}"
                class="mt-6 grid gap-4"
            >
                @csrf

                <textarea
                    name="body"
                    rows="4"
                    placeholder="Adaugă o notă internă despre discuția cu clientul..."
                    class="w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none placeholder:text-black/40 focus:border-black/30"
                >{{ old('body') }}</textarea>

                @error('body')
                <p class="text-sm text-red-600">
                    {{ $message }}
                </p>
                @enderror

                <button
                    type="submit"
                    class="w-fit rounded-full bg-black px-6 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
                >
                    Adaugă notă
                </button>
            </form>

            <div class="mt-8 grid gap-4">
                @forelse($lead->notes as $note)
                    <article class="rounded-2xl border border-black/10 bg-[#f7f4ef] p-5">
                        <div class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                            <p class="text-sm font-medium text-black/70">
                                Notă internă
                            </p>

                            <p class="text-xs text-black/40">
                                {{ $note->created_at?->format('d.m.Y H:i') }}
                            </p>
                        </div>

                        <div class="mt-3 leading-7 text-black/70">
                            {!! nl2br(e($note->body)) !!}
                        </div>
                    </article>
                @empty
                    <div class="rounded-2xl border border-dashed border-black/10 bg-[#f7f4ef] p-6 text-center text-sm text-black/50">
                        Nu ai adăugat încă note pentru acest lead.
                    </div>
                @endforelse
            </div>
        </section>

        <section class="mt-6 rounded-[2rem] border border-red-200 bg-red-50 p-6">
            <p class="text-sm uppercase tracking-[0.25em] text-red-700">
                Zonă periculoasă
            </p>

            <h2 class="mt-4 text-2xl font-semibold text-red-900">
                Șterge lead-ul
            </h2>

            <p class="mt-3 max-w-2xl text-sm leading-6 text-red-700">
                Această acțiune va șterge definitiv lead-ul și notele asociate. Nu poate fi anulată.
            </p>

            <form
                method="POST"
                action="{{ route('admin.leads.destroy', $lead) }}"
                class="mt-5"
                onsubmit="return confirm('Sigur vrei să ștergi acest lead? Acțiunea nu poate fi anulată.')"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-full bg-red-700 px-6 py-3 text-sm font-medium text-white transition hover:bg-red-800"
                >
                    Șterge lead
                </button>
            </form>
        </section>
    </div>
</main>
</body>
</html>
