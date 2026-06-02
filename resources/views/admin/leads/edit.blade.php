@extends('admin.layouts.app')

@section('title', 'Editează lead #' . $lead->id . ' - SiteBoutique')
@section('page-title', 'Editează lead #' . $lead->id)
@section('page-description', 'Modifică datele clientului și configurația cererii.')

@section('actions')
    <a
        href="{{ route('admin.leads.show', $lead) }}"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        Înapoi la detalii
    </a>

    <a
        href="{{ route('admin.dashboard') }}"
        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-medium transition hover:border-black/30"
    >
        Dashboard
    </a>

    <a
        href="{{ route('admin.leads.index') }}"
        class="rounded-full bg-black px-5 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
    >
        Lead-uri
    </a>
@endsection

@section('content')
    @php
        $features = is_array($lead->selected_features)
            ? $lead->selected_features
            : json_decode($lead->selected_features ?? '[]', true);

        $featuresText = old('features_text', implode("\n", $features ?: []));
    @endphp

    <form
        method="POST"
        action="{{ route('admin.leads.update', $lead) }}"
        class="mx-auto grid max-w-5xl gap-6"
    >
        @csrf
        @method('PUT')

        <section class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Client
            </p>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div>
                    <label class="text-sm text-black/50">Nume</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $lead->name) }}"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>

                <div>
                    <label class="text-sm text-black/50">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $lead->email) }}"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>

                <div>
                    <label class="text-sm text-black/50">Telefon</label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $lead->phone) }}"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>
            </div>
        </section>

        <section class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Configurație proiect
            </p>

            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <div>
                    <label class="text-sm text-black/50">Categorie key</label>
                    <input
                        type="text"
                        name="selected_category_key"
                        value="{{ old('selected_category_key', $lead->selected_category_key) }}"
                        placeholder="ex: presentation"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>

                <div>
                    <label class="text-sm text-black/50">Categorie label</label>
                    <input
                        type="text"
                        name="selected_category_label"
                        value="{{ old('selected_category_label', $lead->selected_category_label) }}"
                        placeholder="ex: Prezentare"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>

                <div>
                    <label class="text-sm text-black/50">Template</label>
                    <input
                        type="text"
                        name="selected_template"
                        value="{{ old('selected_template', $lead->selected_template) }}"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>

                <div>
                    <label class="text-sm text-black/50">Total estimativ</label>
                    <input
                        type="number"
                        name="total_price"
                        value="{{ old('total_price', $lead->total_price) }}"
                        min="0"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>

                <div>
                    <label class="text-sm text-black/50">Pachet key</label>
                    <input
                        type="text"
                        name="selected_package_key"
                        value="{{ old('selected_package_key', $lead->selected_package_key) }}"
                        placeholder="ex: pro"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>

                <div>
                    <label class="text-sm text-black/50">Pachet name</label>
                    <input
                        type="text"
                        name="selected_package_name"
                        value="{{ old('selected_package_name', $lead->selected_package_name) }}"
                        placeholder="ex: Pro"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>
            </div>

            <div class="mt-4">
                <label class="text-sm text-black/50">
                    Funcții extra
                </label>

                <textarea
                    name="features_text"
                    rows="6"
                    placeholder="Scrie fiecare funcție pe rând separat sau cu virgulă."
                    class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none placeholder:text-black/40 focus:border-black/30"
                >{{ $featuresText }}</textarea>

                <p class="mt-2 text-xs text-black/40">
                    Poți scrie fiecare funcție pe linie nouă sau separat prin virgulă.
                </p>
            </div>
        </section>

        <section class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Status și urmărire
            </p>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div>
                    <label class="text-sm text-black/50">Status</label>
                    <select
                        name="status"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                        @foreach($statuses as $status)
                            <option value="{{ $status->value }}" @selected(old('status', $lead->status) === $status->value)>
                                {{ $status->label() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm text-black/50">Follow-up</label>
                    <input
                        type="datetime-local"
                        name="follow_up_at"
                        value="{{ old('follow_up_at', $lead->follow_up_at?->format('Y-m-d\TH:i')) }}"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                </div>

                <div>
                    <label class="text-sm text-black/50">Prioritate</label>
                    <select
                        name="priority"
                        class="mt-2 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none focus:border-black/30"
                    >
                        <option value="low" @selected(old('priority', $lead->priority) === 'low')>Scăzută</option>
                        <option value="normal" @selected(old('priority', $lead->priority) === 'normal')>Normală</option>
                        <option value="high" @selected(old('priority', $lead->priority) === 'high')>Ridicată</option>
                    </select>
                </div>
            </div>
        </section>

        <section class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                Mesaj client
            </p>

            <textarea
                name="message"
                rows="6"
                placeholder="Mesajul clientului..."
                class="mt-6 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 outline-none placeholder:text-black/40 focus:border-black/30"
            >{{ old('message', $lead->message) }}</textarea>
        </section>

        <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
            <a
                href="{{ route('admin.leads.show', $lead) }}"
                class="rounded-full border border-black/10 bg-white px-6 py-4 text-center text-sm font-medium transition hover:border-black/30"
            >
                Anulează
            </a>

            <button
                type="submit"
                class="rounded-full bg-black px-6 py-4 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
            >
                Salvează modificările
            </button>
        </div>
    </form>
@endsection
