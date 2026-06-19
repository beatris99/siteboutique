@extends('pages.layout')
@section('title', __('pages.done_for_you.title'))
@section('description', __('pages.done_for_you.description'))
@section('page-title', __('pages.done_for_you.page_title'))
@section('page-intro', __('pages.done_for_you.page_intro'))
@section('content')
<section class="grid gap-6">
    @foreach(__('pages.done_for_you.steps') as $step)
        <article class="rounded-[2rem] bg-[#f7f4ef] p-6"><p class="text-sm font-semibold text-[#8b6f47]">{{ $step['number'] }}</p><h2 class="mt-3 text-2xl font-semibold">{{ $step['title'] }}</h2><p class="mt-3 text-black/60">{{ $step['description'] }}</p></article>
    @endforeach
</section>
<section class="mt-12 rounded-[2rem] bg-black p-8 text-white"><h2 class="text-3xl font-semibold">{{ __('pages.done_for_you.cta_title') }}</h2><p class="mt-4 text-white/60">{{ __('pages.done_for_you.cta_text') }}</p><a href="/modele-site" class="mt-6 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black">{{ __('pages.done_for_you.cta_button') }}</a></section>
@endsection
