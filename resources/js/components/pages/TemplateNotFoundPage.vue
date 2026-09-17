<template>
    <section class="flex min-h-[70vh] items-center bg-[#f7f4ef] px-6 py-20">
        <div class="mx-auto max-w-3xl text-center">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                {{ content.eyebrow }}
            </p>
            <h1 class="mt-5 text-5xl font-semibold tracking-tight md:text-7xl">
                {{ content.title }}
            </h1>
            <p class="mt-6 text-lg leading-8 text-black/60">
                {{ content.description }}
            </p>
            <div class="mt-9 flex flex-col justify-center gap-4 sm:flex-row">
                <a
                    :href="content.primary_href"
                    class="rounded-full bg-black px-7 py-4 text-center text-sm font-medium text-white transition hover:bg-[#8b6f47]"
                >
                    {{ content.primary }}
                </a>
                <a
                    :href="content.secondary_href"
                    class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-medium transition hover:border-black/30"
                >
                    {{ content.secondary }}
                </a>
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
