@extends('admin.layouts.app')

@section('title', 'Ofertă generată')
@section('eyebrow', 'Generator ofertă')
@section('page-title', 'Text ofertă pentru ' . $lead->name)
@section('page-description', 'Copiază textul de mai jos și trimite-l clientului pe email sau WhatsApp.')

@section('actions')
    <a href="{{ route('admin.leads.show', $lead) }}" class="rounded-full border border-black/10 px-5 py-3 text-sm font-semibold">
        Înapoi la lead
    </a>
@endsection

@section('content')
    <section class="rounded-[2rem] border border-black/10 bg-white p-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold">Text ofertă</h2>
                <p class="mt-2 text-sm text-black/50">
                    Poți ajusta textul înainte să îl trimiți.
                </p>
            </div>

            <button
                type="button"
                onclick="navigator.clipboard.writeText(document.getElementById('offer-text').value).then(() => alert('Textul a fost copiat.'))"
                class="rounded-full bg-black px-5 py-3 text-sm font-semibold text-white"
            >
                Copiază textul
            </button>
        </div>

        <textarea
            id="offer-text"
            rows="28"
            class="mt-6 w-full rounded-2xl border border-black/10 bg-[#f7f4ef] p-5 font-mono text-sm leading-7"
        >{{ $offerText }}</textarea>
    </section>
@endsection
