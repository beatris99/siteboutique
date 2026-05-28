@extends('admin.layout')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">
            {{ __('site.admin.vehicles.edit_title') }}
        </h1>
        <p class="mt-2 text-slate-600">
            {{ $vehicle->name }}
        </p>
    </div>

    <form
        method="POST"
        action="{{ route('admin.vehicles.update', $vehicle) }}"
        enctype="multipart/form-data"
        class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm"
    >
        @csrf
        @method('PUT')

        @include('admin.vehicles._form')

        <div class="flex flex-col sm:flex-row gap-3 mt-8">
            <button class="rounded-full bg-sky-600 px-6 py-3 font-semibold text-white hover:bg-sky-700">
                {{ __('site.admin.actions.update') }}
            </button>

            <a href="{{ route('admin.vehicles.index') }}" class="rounded-full border border-slate-300 bg-white px-6 py-3 text-center font-semibold text-slate-700 hover:border-sky-300 hover:text-sky-700">
                {{ __('site.admin.actions.cancel') }}
            </a>
        </div>
    </form>

@endsection
