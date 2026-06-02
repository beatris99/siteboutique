@php
    $currentStatus = collect($statuses)->first(
        fn ($status) => $status->value === $lead->status
    );

    $statusClasses = [
        'new' => 'bg-blue-100 text-blue-700 border-blue-200',
        'contacted' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
        'in_discussion' => 'bg-purple-100 text-purple-700 border-purple-200',
        'won' => 'bg-green-100 text-green-700 border-green-200',
        'lost' => 'bg-red-100 text-red-700 border-red-200',
    ];
@endphp

<details class="group relative w-fit">
    <summary
        class="flex cursor-pointer list-none items-center gap-2 rounded-full border px-3 py-1.5 text-xs font-semibold transition hover:shadow-sm {{ $statusClasses[$lead->status] ?? 'bg-gray-100 text-gray-700 border-gray-200' }}"
    >
        {{ $currentStatus?->label() ?? $lead->status }}

        <span class="text-[10px] transition group-open:rotate-180">
            ▼
        </span>
    </summary>

    <div class="absolute left-0 z-30 mt-2 w-44 overflow-hidden rounded-2xl border border-black/10 bg-white p-1 shadow-xl">
        @foreach($statuses as $status)
            <form
                method="POST"
                action="{{ route('admin.leads.update-status', $lead) }}"
            >
                @csrf
                @method('PATCH')

                <input type="hidden" name="status" value="{{ $status->value }}">

                <button
                    type="submit"
                    class="flex w-full items-center justify-between rounded-xl px-3 py-2 text-left text-xs font-medium transition hover:bg-[#f7f4ef] {{ $lead->status === $status->value ? 'text-[#8b6f47]' : 'text-black/70' }}"
                >
                    <span>{{ $status->label() }}</span>

                    @if($lead->status === $status->value)
                        <span>✓</span>
                    @endif
                </button>
            </form>
        @endforeach
    </div>
</details>
