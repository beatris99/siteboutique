<template>
    <section id="process" class="scroll-mt-28 bg-[#f7f4ef] px-4 py-16 sm:px-6 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#a67c3a]">
                        {{ section.eyebrow }}
                    </p>

                    <h2 class="mt-5 max-w-3xl text-3xl font-semibold leading-tight tracking-[-0.05em] text-[#171717] sm:text-5xl">
                        {{ section.title }}
                    </h2>
                </div>

                <p class="max-w-2xl text-base leading-8 text-black/55 lg:justify-self-end">
                    {{ section.description }}
                </p>
            </div>

            <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="step in steps"
                    :key="step.number"
                    class="rounded-[1.75rem] border border-black/10 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#a67c3a]/30 hover:shadow-xl"
                >
                    <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[#a67c3a]">
                        {{ step.number }}
                    </p>

                    <h3 class="mt-5 text-xl font-semibold tracking-[-0.03em] text-[#171717]">
                        {{ step.title }}
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-black/55">
                        {{ step.description }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    section: {
        type: Object,
        required: true,
    },
})

const steps = computed(() => Array.isArray(props.section?.steps) ? props.section.steps : [])
</script>
