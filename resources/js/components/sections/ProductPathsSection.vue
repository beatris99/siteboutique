<template>
    <section class="bg-white px-4 py-16 sm:px-6 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ section.eyebrow }}
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl">
                        {{ section.title }}
                    </h2>

                    <p class="mt-5 max-w-2xl leading-8 text-black/60">
                        {{ section.description }}
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a
                            :href="section.primary?.href || '#templates'"
                            class="rounded-full bg-black px-7 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                        >
                            {{ section.primary?.label }}
                        </a>

                        <a
                            :href="section.secondary?.href || '/configurator#builder'"
                            class="rounded-full border border-black/10 bg-[#f7f4ef] px-7 py-4 text-center text-sm font-semibold transition hover:border-black/30"
                        >
                            {{ section.secondary?.label }}
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <article
                        v-for="step in section.steps"
                        :key="step.number"
                        class="rounded-[2rem] p-6"
                        :class="step.highlight ? 'bg-black text-white sm:col-span-2' : 'bg-[#f7f4ef] text-black'"
                    >
                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-full text-sm font-semibold"
                            :class="step.highlight ? 'bg-white text-black' : 'bg-black text-white'"
                        >
                            {{ step.number }}
                        </div>

                        <h3 class="mt-6 text-2xl font-semibold" :class="step.highlight ? 'sm:text-3xl' : ''">
                            {{ step.title }}
                        </h3>

                        <p class="mt-3 leading-7" :class="step.highlight ? 'max-w-2xl text-white/60' : 'text-black/60'">
                            {{ step.description }}
                        </p>

                        <a
                            v-if="step.button"
                            :href="step.button.href"
                            class="mt-8 inline-flex rounded-full bg-white px-7 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                        >
                            {{ step.button.label }}
                        </a>
                    </article>
                </div>
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
