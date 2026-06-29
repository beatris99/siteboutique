<template>
    <section class="relative overflow-hidden bg-[#f7f4ef] px-4 pb-16 pt-12 sm:px-6 lg:px-8 lg:pb-24 lg:pt-20">
        <!-- Ambient glow -->
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute left-[-12%] top-[-24%] h-[32rem] w-[32rem] rounded-full bg-[#d8c3a5]/25 blur-3xl"></div>
            <div class="absolute bottom-[-30%] right-[-10%] h-[34rem] w-[34rem] rounded-full bg-white/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-[1.05fr_0.95fr]">
            <!-- Copy -->
            <div class="max-w-2xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-black/10 bg-white/70 px-4 py-1.5 text-[11px] font-semibold uppercase tracking-[0.28em] text-[#a67c3a] backdrop-blur">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#a67c3a]"></span>
                    {{ t.eyebrow }}
                </p>

                <h1 class="mt-8 font-serif text-5xl font-medium leading-[1.02] tracking-[-0.03em] text-[#171717] sm:text-6xl lg:text-[5.25rem]">
                    {{ t.title_line_1 }}
                    <span class="block text-[#a67c3a]">{{ t.title_line_2 }}</span>
                    {{ t.title_line_3 }}
                </h1>

                <p class="mt-8 max-w-xl text-lg leading-8 text-black/60">
                    {{ t.description }}
                </p>

                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <a
                        href="#contact"
                        class="group inline-flex items-center gap-2 rounded-full bg-[#171717] px-8 py-4 text-sm font-semibold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-[#a67c3a]"
                    >
                        {{ t.primary_cta }}
                        <span class="transition-transform group-hover:translate-x-0.5">→</span>
                    </a>

                    <a
                        href="#capabilities"
                        class="inline-flex items-center gap-2 rounded-full border border-black/15 bg-white px-8 py-4 text-sm font-semibold text-[#171717] shadow-sm transition hover:-translate-y-0.5 hover:border-black/30"
                    >
                        {{ t.secondary_cta }}
                    </a>
                </div>
            </div>

            <!-- Phone -->
            <div class="relative flex items-center justify-center pt-4 lg:justify-end lg:pt-0">
                <HeroPhoneShowcase :showcase="showcase" />
            </div>
        </div>
    </section>
</template>

<script setup>
import HeroPhoneShowcase from './HeroPhoneShowcase.vue'

defineProps({
    t: { type: Object, required: true },
    showcase: { type: Object, required: true },
})
</script>
