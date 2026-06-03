@extends('admin.layouts.app')

@section('title', 'Detalii cerere')
@section('eyebrow', 'Lead')
@section('page-title', $lead->name)
@section('page-description', 'Detalii complete despre cererea primită.')

@section('actions')
    <a href="{{ route('admin.leads.index') }}" class="rounded-full border border-black/10 px-5 py-3 text-sm font-semibold">
        Înapoi la cereri
    </a>

    <a href="{{ route('admin.leads.edit', $lead) }}" class="rounded-full bg-black px-5 py-3 text-sm font-semibold text-white">
        Editează
    </a>
@endsection

@section('content')
    @php
        $yesNo = function ($value) {
            if (is_null($value)) {
                return 'Nespecificat';
            }

            return $value ? 'Da' : 'Nu';
        };
    @endphp

    <div class="grid gap-6 lg:grid-cols-[1fr_0.8fr]">
        <div class="grid gap-6">
            <section class="rounded-[2rem] border border-black/10 bg-white p-6">
                <h2 class="text-2xl font-semibold">Client</h2>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div>
                        <p class="text-sm text-black/40">Nume</p>
                        <p class="mt-1 font-semibold">{{ $lead->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Status</p>
                        <p class="mt-1 font-semibold">{{ $lead->status }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Email</p>
                        <p class="mt-1 font-semibold">
                            @if($lead->email)
                                <a href="{{ $lead->email_url }}" class="text-[#8b6f47]">{{ $lead->email }}</a>
                            @else
                                -
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Telefon</p>
                        <p class="mt-1 font-semibold">
                            @if($lead->phone)
                                <a href="{{ $lead->whatsapp_url }}" target="_blank" class="text-[#8b6f47]">{{ $lead->phone }}</a>
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </section>

            <section class="rounded-[2rem] border border-black/10 bg-white p-6">
                <h2 class="text-2xl font-semibold">Detalii business</h2>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div>
                        <p class="text-sm text-black/40">Tip business</p>
                        <p class="mt-1 font-semibold">{{ $lead->business_type ?: 'Nespecificat' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Pagina sursă</p>
                        <p class="mt-1 font-semibold">{{ $lead->source_page ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Are logo?</p>
                        <p class="mt-1 font-semibold">{{ $yesNo($lead->has_logo) }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Are poze?</p>
                        <p class="mt-1 font-semibold">{{ $yesNo($lead->has_photos) }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Are domeniu?</p>
                        <p class="mt-1 font-semibold">{{ $yesNo($lead->has_domain) }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Buget aproximativ</p>
                        <p class="mt-1 font-semibold">{{ $lead->budget_range ?: 'Nespecificat' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Urgent</p>
                        <p class="mt-1 font-semibold">{{ $lead->urgency ?: 'Nespecificat' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Deadline dorit</p>
                        <p class="mt-1 font-semibold">
                            {{ $lead->launch_deadline ? $lead->launch_deadline->format('d.m.Y') : 'Nespecificat' }}
                        </p>
                    </div>
                </div>
            </section>

            <section class="rounded-[2rem] border border-black/10 bg-white p-6">
                <h2 class="text-2xl font-semibold">Configurație aleasă</h2>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div>
                        <p class="text-sm text-black/40">Template</p>
                        <p class="mt-1 font-semibold">{{ $lead->selected_template ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Categorie</p>
                        <p class="mt-1 font-semibold">{{ $lead->selected_category_label ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Pachet</p>
                        <p class="mt-1 font-semibold">{{ $lead->selected_package_name ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-black/40">Preț estimativ</p>
                        <p class="mt-1 text-2xl font-semibold">{{ $lead->total_price }} lei</p>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-sm text-black/40">Extra-uri</p>

                    <div class="mt-3 flex flex-wrap gap-2">
                        @forelse($lead->selected_features ?? [] as $feature)
                            <span class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60">
                                {{ $feature }}
                            </span>
                        @empty
                            <span class="text-sm text-black/40">Fără extra-uri.</span>
                        @endforelse
                    </div>
                </div>
            </section>

            <section class="rounded-[2rem] border border-black/10 bg-white p-6">
                <h2 class="text-2xl font-semibold">Mesaj client</h2>

                <p class="mt-4 whitespace-pre-line leading-7 text-black/60">
                    {{ $lead->message ?: 'Nu a lăsat mesaj.' }}
                </p>
            </section>
        </div>

        <aside class="grid gap-6 self-start">
            <section class="rounded-[2rem] border border-black/10 bg-white p-6">
                <h2 class="text-2xl font-semibold">Actualizare rapidă</h2>

                <form method="POST" action="{{ route('admin.leads.update-status', $lead) }}" class="mt-6 grid gap-4">
                    @csrf
                    @method('PATCH')

                    <select name="status" class="rounded-2xl border border-black/10 px-4 py-3">
                        @foreach($statuses as $status)
                            <option value="{{ $status->value }}" @selected($lead->status === $status->value)>
                                {{ method_exists($status, 'label') ? $status->label() : $status->value }}
                            </option>
                        @endforeach
                    </select>

                    <button class="rounded-full bg-black px-5 py-3 text-sm font-semibold text-white">
                        Salvează status
                    </button>
                </form>
            </section>

            <section class="rounded-[2rem] border border-black/10 bg-white p-6">
                <h2 class="text-2xl font-semibold">Follow-up</h2>

                <form method="POST" action="{{ route('admin.leads.update-follow-up', $lead) }}" class="mt-6 grid gap-4">
                    @csrf
                    @method('PATCH')

                    <input
                        type="datetime-local"
                        name="follow_up_at"
                        value="{{ $lead->follow_up_at ? $lead->follow_up_at->format('Y-m-d\TH:i') : '' }}"
                        class="rounded-2xl border border-black/10 px-4 py-3"
                    >

                    <select name="priority" class="rounded-2xl border border-black/10 px-4 py-3">
                        <option value="normal" @selected($lead->priority === 'normal')>Normal</option>
                        <option value="high" @selected($lead->priority === 'high')>Prioritar</option>
                        <option value="low" @selected($lead->priority === 'low')>Scăzut</option>
                    </select>

                    <button class="rounded-full bg-black px-5 py-3 text-sm font-semibold text-white">
                        Salvează follow-up
                    </button>
                </form>
            </section>

            <section class="rounded-[2rem] border border-black/10 bg-white p-6">
                <h2 class="text-2xl font-semibold">Notițe</h2>

                <form method="POST" action="{{ route('admin.leads.notes.store', $lead) }}" class="mt-6 grid gap-4">
                    @csrf

                    <textarea
                        name="body"
                        rows="4"
                        placeholder="Adaugă o notiță internă..."
                        class="rounded-2xl border border-black/10 px-4 py-3"
                    ></textarea>

                    <button class="rounded-full bg-black px-5 py-3 text-sm font-semibold text-white">
                        Adaugă notiță
                    </button>
                </form>

                <div class="mt-6 grid gap-3">
                    @forelse($lead->notes as $note)
                        <div class="rounded-2xl bg-[#f7f4ef] p-4">
                            <p class="text-sm leading-6 text-black/60">{{ $note->body }}</p>
                            <p class="mt-2 text-xs text-black/30">{{ $note->created_at->format('d.m.Y H:i') }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-black/40">Nu există notițe.</p>
                    @endforelse
                </div>
            </section>

            <section class="rounded-[2rem] border border-red-200 bg-red-50 p-6">
                <h2 class="text-2xl font-semibold text-red-700">Ștergere</h2>

                <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" class="mt-6" onsubmit="return confirm('Sigur vrei să ștergi această cerere?')">
                    @csrf
                    @method('DELETE')

                    <button class="rounded-full bg-red-600 px-5 py-3 text-sm font-semibold text-white">
                        Șterge cererea
                    </button>
                </form>
            </section>
        </aside>
    </div>
@endsection
