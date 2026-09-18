@extends('pages.layout')

@section('title', __('pages.websites.title'))
@section('description', __('pages.websites.description'))
@section('page-title', __('pages.websites.page_title'))
@section('page-intro', __('pages.websites.page_intro'))

@section('content')
<section>
    <h2 class="font-serif text-3xl font-medium sm:text-4xl">{{ __('pages.websites.audience_title') }}</h2>
    <div class="mt-6 grid gap-4 md:grid-cols-2">
        @foreach(__('pages.websites.audience') as $item)
            <div class="rounded-[1.35rem] border border-black/8 bg-[#f7f4ef] p-5 text-black/70">{{ $item }}</div>
        @endforeach
    </div>
</section>

<section class="mt-14">
    <h2 class="font-serif text-3xl font-medium sm:text-4xl">{{ __('pages.websites.types_title') }}</h2>
    <div class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach(__('pages.websites.types') as $item)
            <article class="rounded-[1.5rem] border border-black/8 bg-white p-6 shadow-[0_12px_35px_rgba(0,0,0,0.035)]">
                <h3 class="text-xl font-semibold">{{ $item['title'] }}</h3>
                <p class="mt-3 text-sm leading-7 text-black/58">{{ $item['description'] }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="mt-14 rounded-[2rem] bg-[#f4eee4] p-7 sm:p-9">
    <h2 class="font-serif text-3xl font-medium sm:text-4xl">{{ __('pages.websites.approach_title') }}</h2>
    <div class="mt-7 grid gap-4 md:grid-cols-2">
        @foreach(__('pages.websites.approach') as $item)
            <div class="flex gap-3 rounded-[1.2rem] bg-white/80 p-5">
                <span class="text-[#805d2c]">◆</span>
                <span class="text-black/70">{{ $item }}</span>
            </div>
        @endforeach
    </div>
</section>

<section class="mt-14 rounded-[2rem] bg-black p-7 text-white sm:p-9">
    <h2 class="font-serif text-3xl font-medium sm:text-4xl">{{ __('pages.websites.cta_title') }}</h2>
    <p class="mt-4 max-w-2xl leading-8 text-white/60">{{ __('pages.websites.cta_text') }}</p>
    <a href="{{ __('pages.websites.cta_href') }}" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]">{{ __('pages.websites.cta_label') }}</a>
</section>
@endsection
