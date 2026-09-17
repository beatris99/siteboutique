<template>
    <section
        class="flex min-h-[68vh] items-center justify-center px-4 py-16 sm:px-6 lg:py-24"
    >
        <div
            class="w-full max-w-3xl overflow-hidden rounded-[2rem] border border-black/10 bg-white shadow-[0_30px_80px_rgba(0,0,0,0.08)]"
        >
            <div class="px-6 py-12 text-center sm:px-12 sm:py-16">
                <div
                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#f4eee5] text-[#a67c3a]"
                    aria-hidden="true"
                >
                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="h-8 w-8"
                    >
                        <path d="M20 6 9 17l-5-5" />
                    </svg>
                </div>

                <p
                    class="mt-7 text-xs font-semibold uppercase tracking-[0.24em] text-[#a67c3a]"
                >
                    {{ content.eyebrow }}
                </p>

                <h1
                    class="mx-auto mt-4 max-w-2xl text-4xl font-semibold tracking-[-0.04em] text-[#171717] sm:text-5xl"
                >
                    {{ content.title }}
                </h1>

                <p
                    class="mx-auto mt-5 max-w-xl text-base leading-7 text-black/60 sm:text-lg"
                >
                    {{ content.description }}
                </p>

                <div
                    class="mx-auto mt-8 max-w-lg rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4"
                >
                    <p class="text-sm leading-6 text-black/60">
                        {{ content.next_step }}
                    </p>
                </div>

                <div
                    class="mt-9 flex flex-col justify-center gap-3 sm:flex-row"
                >
                    <a
                        href="/"
                        class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#171717] px-7 py-3 text-sm font-semibold text-white transition hover:bg-[#a67c3a]"
                    >
                        {{ content.actions.home }}
                    </a>

                    <a
                        href="/portofoliu"
                        class="inline-flex min-h-12 items-center justify-center rounded-full border border-black/15 bg-white px-7 py-3 text-sm font-semibold text-[#171717] transition hover:border-[#a67c3a] hover:text-[#a67c3a]"
                    >
                        {{ content.actions.portfolio }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    content: {
        type: Object,
        required: true,
    },
});
</script>
