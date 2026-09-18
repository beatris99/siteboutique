@extends('pages.layout')

@section('title', __('pages.work_process.title'))
@section('description', __('pages.work_process.description'))
@section('page-title', __('pages.work_process.page_title'))
@section('page-intro', __('pages.work_process.page_intro'))

@section('content')
<div class="grid gap-5 md:grid-cols-2">
    @foreach(__('pages.work_process.steps') as $step)
        <article class="rounded-[1.6rem] border border-black/8 bg-[#f7f4ef] p-6">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#805d2c]">{{ $step['number'] }}</p>
            <h2 class="mt-3 text-2xl font-semibold">{{ $step['title'] }}</h2>
            <p class="mt-3 leading-7 text-black/60">{{ $step['description'] }}</p>
        </article>
    @endforeach
</div>

<section class="mt-10 rounded-[2rem] bg-black p-7 text-white sm:p-9">
    <h2 class="font-serif text-3xl font-medium sm:text-4xl">{{ __('pages.work_process.cta_title') }}</h2>
    <p class="mt-4 max-w-2xl leading-8 text-white/60">{{ __('pages.work_process.cta_text') }}</p>
    <a href="{{ __('pages.work_process.cta_href') }}" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]">{{ __('pages.work_process.cta_label') }}</a>
</section>
@endsection
