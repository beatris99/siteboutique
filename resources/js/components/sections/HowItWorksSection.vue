<template>
    <section class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-6">
            <SectionTitle
                :eyebrow="section.eyebrow"
                :title="section.title"
                :description="section.description"
                wrapper-class="mb-12 max-w-3xl"
            />

            <div class="grid gap-6 md:grid-cols-4">
                <article
                    v-for="step in section.steps"
                    :key="step.number"
                    class="rounded-[2rem] border border-black/10 bg-[#f7f4ef] p-6"
                >
                    <p class="text-sm font-semibold text-[#8b6f47]">
                        {{ step.number }}
                    </p>

                    <h3 class="mt-5 text-2xl font-semibold">
                        {{ step.title }}
                    </h3>

                    <p class="mt-4 text-sm leading-6 text-black/60">
                        {{ step.description }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
import SectionTitle from '../ui/SectionTitle.vue'

defineProps({
    section: {
        type: Object,
        required: true,
    },
})
</script>
