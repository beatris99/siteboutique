@extends('pages.layout')

@section('title', $page['title'])
@section('description', $page['description'])
@section('page-title', $page['page_title'])
@section('page-intro', $page['intro'])

@section('content')
    <section>
        <h2 class="text-3xl font-semibold">Ce include</h2>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            @foreach($page['sections'] as [$title, $description])
                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <h3 class="text-2xl font-semibold">{{ $title }}</h3>
                    <p class="mt-3 text-black/60">{{ $description }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-semibold">Avantaje</h2>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            @foreach($page['benefits'] as $benefit)
                <div class="flex gap-3 rounded-2xl bg-[#f7f4ef] p-5">
                    <span class="text-[#8b6f47]">✓</span>
                    <span>{{ $benefit }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-12 rounded-[2rem] bg-black p-8 text-white">
        <h2 class="text-3xl font-semibold">
            Template recomandat: {{ $page['template_name'] }}
        </h2>

        <p class="mt-4 text-white/60">
            Poți porni de la acest demo real și îl adaptăm pentru afacerea ta.
        </p>

        <a
            href="/templates/{{ $page['template_slug'] }}"
            class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black"
        >
            Vezi demo-ul
        </a>
    </section>

    <section class="mt-12">
        <h2 class="text-3xl font-semibold">Întrebări frecvente</h2>

        <div class="mt-6 grid gap-4">
            @foreach($page['faq'] as [$question, $answer])
                <details class="rounded-2xl bg-[#f7f4ef] p-5">
                    <summary class="cursor-pointer font-semibold">
                        {{ $question }}
                    </summary>

                    <p class="mt-4 text-black/60">
                        {{ $answer }}
                    </p>
                </details>
            @endforeach
        </div>
    </section>
@endsection
