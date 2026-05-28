<template>
    <section class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-24 md:grid-cols-2 md:py-32">
        <div>
            <p class="mb-5 inline-flex rounded-full border border-black/10 bg-white/60 px-4 py-2 text-sm text-black/60">
                {{ hero.badge }}
            </p>

            <h1 class="max-w-2xl text-5xl font-semibold tracking-tight md:text-7xl">
                {{ hero.title }}
                <span class="italic text-[#8b6f47]"> {{ hero.highlightedTitle }}</span>
            </h1>

            <p class="mt-6 max-w-xl text-lg leading-8 text-black/60">
                {{ hero.description }}
            </p>

            <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                <a
                    :href="hero.primaryButton.href"
                    class="rounded-full bg-black px-7 py-4 text-center text-sm font-medium text-white transition hover:bg-[#8b6f47]"
                >
                    {{ hero.primaryButton.label }}
                </a>

                <a
                    :href="hero.secondaryButton.href"
                    class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-medium transition hover:border-black/30"
                >
                    {{ hero.secondaryButton.label }}
                </a>
            </div>
        </div>

        <div class="relative">
            <div class="absolute -right-10 -top-10 h-72 w-72 rounded-full bg-[#d8c3a5] blur-3xl"></div>

            <div class="relative rounded-[2rem] border border-black/10 bg-white p-4 shadow-2xl">
                <div class="rounded-[1.5rem] bg-[#111] p-5 text-white">
                    <div class="mb-8 flex items-center justify-between">
                        <div class="h-3 w-24 rounded-full bg-white/20"></div>
                        <div class="flex gap-2">
                            <span class="h-3 w-3 rounded-full bg-white/30"></span>
                            <span class="h-3 w-3 rounded-full bg-white/30"></span>
                            <span class="h-3 w-3 rounded-full bg-white/30"></span>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-white p-6 text-black">
                        <p class="text-xs uppercase tracking-widest text-black/40">
                            {{ hero.preview.eyebrow }}
                        </p>

                        <h3 class="mt-4 text-3xl font-semibold">
                            {{ hero.preview.title }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-black/50">
                            {{ hero.preview.description }}
                        </p>

                        <div class="mt-8 grid grid-cols-2 gap-4">
                            <div class="rounded-2xl bg-[#f7f4ef] p-4">
                                <p class="text-sm text-black/50">{{ hero.preview.priceLabel }}</p>
                                <p class="mt-1 text-2xl font-semibold">{{ hero.preview.price }}</p>
                            </div>

                            <div class="rounded-2xl bg-[#f7f4ef] p-4">
                                <p class="text-sm text-black/50">{{ hero.preview.timeLabel }}</p>
                                <p class="mt-1 text-2xl font-semibold">{{ hero.preview.time }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    hero: {
        type: Object,
        required: true,
    },
})
</script>
