<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Cereri primite - SiteBoutique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f7f4ef] text-[#171717]">
@if(session('success'))
    <div class="mb-6 rounded-2xl bg-green-100 px-5 py-4 text-sm font-medium text-green-800">
        {{ session('success') }}
    </div>
@endif
<main class="min-h-screen px-6 py-10">
    <div class="mx-auto max-w-7xl">
        <div class="mb-10 flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    SiteBoutique Admin
                </p>
                <h1 class="mt-3 text-4xl font-semibold tracking-tight">
                    Cereri primite
                </h1>
                <p class="mt-3 text-black/60">
                    Aici vezi toate cererile trimise din configurator.
                </p>
            </div>

            <a
                href="/"
                class="rounded-full bg-black px-5 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
            >
                Înapoi la site
            </a>
        </div>

        <div class="overflow-hidden rounded-[2rem] border border-black/10 bg-white shadow-xl">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-black text-white">
                    <tr>
                        <th class="px-5 py-4">#</th>
                        <th class="px-5 py-4">Client</th>
                        <th class="px-5 py-4">Contact</th>
                        <th class="px-5 py-4">Template</th>
                        <th class="px-5 py-4">Funcții</th>
                        <th class="px-5 py-4">Total</th>
                        <th class="px-5 py-4">Mesaj</th>
                        <th class="px-5 py-4">Data</th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-black/10">
                    @forelse($leads as $lead)
                        <tr class="align-top hover:bg-[#f7f4ef]">
                            <td class="px-5 py-4 font-medium">
                                {{ $lead->id }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="font-semibold">
                                    {{ $lead->name }}
                                </div>

                                <form
                                    method="POST"
                                    action="{{ route('admin.leads.update-status', $lead) }}"
                                    class="mt-3"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <select
                                        name="status"
                                        onchange="this.form.submit()"
                                        class="rounded-full border border-black/10 bg-white px-3 py-1 text-xs font-medium text-black outline-none"
                                    >
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{ $status->value }}"
                                                @selected($lead->status === $status->value)
                                            >
                                                {{ $status->label() }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>

                            <td class="px-5 py-4">
                                @if($lead->email)
                                    <div>
                                        <a href="mailto:{{ $lead->email }}" class="text-[#8b6f47] hover:underline">
                                            {{ $lead->email }}
                                        </a>
                                    </div>
                                @endif

                                @if($lead->phone)
                                    <div class="mt-1">
                                        <a href="tel:{{ $lead->phone }}" class="text-[#8b6f47] hover:underline">
                                            {{ $lead->phone }}
                                        </a>
                                    </div>
                                @endif
                            </td>

                            <td class="px-5 py-4 font-medium">
                                {{ $lead->selected_template }}
                            </td>

                            <td class="px-5 py-4">
                                @if(!empty($lead->selected_features))
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($lead->selected_features as $feature)
                                            <span class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs">
                                                        {{ $feature }}
                                                    </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-black/40">Fără extra</span>
                                @endif
                            </td>

                            <td class="px-5 py-4 font-semibold">
                                {{ number_format($lead->total_price, 0, ',', '.') }} lei
                            </td>

                            <td class="max-w-xs px-5 py-4 text-black/60">
                                {{ $lead->message ?: '-' }}
                            </td>

                            <td class="px-5 py-4 text-black/50">
                                {{ $lead->created_at->format('d.m.Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-12 text-center text-black/50">
                                Nu ai încă nicio cerere.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>
