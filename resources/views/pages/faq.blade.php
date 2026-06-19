@extends('pages.layout')
@section('title', __('pages.faq.title'))
@section('description', __('pages.faq.description'))
@section('page-title', __('pages.faq.page_title'))
@section('page-intro', __('pages.faq.page_intro'))
@section('content')
<section class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]"><div><p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">{{ __('pages.faq.eyebrow') }}</p><h2 class="mt-4 text-4xl font-semibold leading-tight">{{ __('pages.faq.section_title') }}</h2><p class="mt-5 leading-8 text-black/60">{{ __('pages.faq.section_text') }}</p><a href="/modele-site" class="mt-8 inline-flex rounded-full bg-black px-7 py-4 text-sm font-semibold text-white">{{ __('pages.faq.button') }}</a></div><div class="grid gap-4">@foreach(__('pages.faq.items') as $item)<details class="group rounded-2xl border border-black/10 bg-white p-5"><summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold"><span>{{ $item['question'] }}</span><span class="transition group-open:rotate-45">+</span></summary><p class="mt-4 leading-7 text-black/60">{{ $item['answer'] }}</p></details>@endforeach</div></section>
@endsection
