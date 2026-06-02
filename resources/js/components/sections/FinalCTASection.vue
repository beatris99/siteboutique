<template>
    <section class="bg-black px-6 py-24 text-white">
        <div class="mx-auto grid max-w-7xl gap-10 md:grid-cols-[1.2fr_0.8fr] md:items-center">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                    {{ section.eyebrow }}
                </p>

                <h2 class="mt-5 max-w-3xl text-4xl font-semibold tracking-tight md:text-6xl">
                    {{ section.title }}
                </h2>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/60">
                    {{ section.description }}
                </p>
            </div>

            <div class="rounded-[2rem] bg-white/10 p-6">
                <p class="text-sm text-white/50">
                    {{ section.card.label }}
                </p>

                <p class="mt-3 text-3xl font-semibold">
                    {{ section.card.title }}
                </p>

                <p class="mt-4 leading-7 text-white/60">
                    {{ section.card.description }}
                </p>

                <a
                    :href="section.button.href"
                    class="mt-8 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                >
                    {{ section.button.label }}
                </a>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    section: {
        type: Object,
        required: true,
    },
})
</script>
