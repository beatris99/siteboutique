<template>
    <section id="ce-putem-face" class="relative overflow-hidden bg-[#f7f4ef] px-4 py-10 sm:px-6 lg:px-8 lg:py-16">
        <div class="pointer-events-none absolute inset-0 opacity-80">
            <div class="absolute left-[-18%] top-[-30%] h-[34rem] w-[34rem] rounded-full bg-[#d8c3a5]/30 blur-3xl"></div>
            <div class="absolute bottom-[-25%] right-[-16%] h-[34rem] w-[34rem] rounded-full bg-white blur-3xl"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-10 xl:grid-cols-[0.92fr_1.08fr]">
            <div class="max-w-3xl">
                <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#a67c3a] sm:tracking-[0.45em]">
                    {{ hero.eyebrow }}
                </p>

                <h1 class="mt-7 text-4xl font-semibold leading-[1.02] tracking-[-0.06em] text-[#171717] sm:text-6xl lg:text-7xl">
                    {{ hero.title }}
                </h1>

                <p class="mt-6 max-w-2xl text-xl font-medium leading-8 text-[#a67c3a] sm:text-2xl">
                    {{ hero.highlight }}
                </p>

                <p class="mt-5 max-w-2xl text-base leading-8 text-black/60 sm:text-lg">
                    {{ hero.description }}
                </p>

                <div v-if="cards.length" class="mt-8 grid max-w-2xl gap-3 sm:grid-cols-3">
                    <article
                        v-for="item in cards"
                        :key="item.title"
                        class="rounded-[1.5rem] border border-black/10 bg-white/75 p-5 shadow-sm backdrop-blur"
                    >
                        <h3 class="text-sm font-bold text-[#171717]">
                            {{ item.title }}
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-black/55">
                            {{ item.text }}
                        </p>
                    </article>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-center">
                    <a
                        :href="hero.primaryHref || '#cerere'"
                        class="inline-flex items-center justify-center rounded-full bg-black px-7 py-4 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-[#a67c3a]"
                    >
                        {{ hero.primaryCta }}
                    </a>

                    <a
                        :href="hero.secondaryHref || '#mockup'"
                        class="inline-flex items-center justify-center rounded-full border border-black/10 bg-white px-7 py-4 text-sm font-bold text-[#171717] shadow-sm transition hover:-translate-y-0.5 hover:border-black/20"
                    >
                        {{ hero.secondaryCta }}
                    </a>
                </div>
            </div>

            <div id="mockup" class="relative flex items-center justify-center scroll-mt-28 pt-4 xl:justify-end xl:pt-0">
                <HeroPhoneShowcase :section="showcase" :locale="locale" />
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'
import HeroPhoneShowcase from './HeroPhoneShowcase.vue'

const props = defineProps({
    hero: {
        type: Object,
        required: true,
    },
    showcase: {
        type: Object,
        default: () => ({ items: [] }),
    },
    locale: {
        type: String,
        default: 'ro',
    },
})

const cards = computed(() => Array.isArray(props.hero?.cards) ? props.hero.cards : [])
</script>
