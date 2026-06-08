<template>
    <section id="templates" class="bg-[#f7f4ee] px-4 py-16 sm:px-6 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a67c3a]">
                        Template-uri populare
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl">
                        Alege un model concret, nu doar o idee.
                    </h2>

                    <p class="mt-5 text-base leading-8 text-black/60 sm:text-lg">
                        Fiecare template are mini-demo, culori, butoane, secțiuni și funcționalități clare,
                        ca să îți dai seama rapid ce se potrivește.
                    </p>
                </div>

                <a
                    href="#contact"
                    class="inline-flex w-fit rounded-full bg-black px-6 py-4 text-sm font-semibold text-white hover:bg-[#a67c3a]"
                >
                    Vreau recomandare
                </a>
            </div>

            <div class="mt-10 flex gap-3 overflow-x-auto pb-3">
                <button
                    v-for="category in categories"
                    :key="category.key"
                    type="button"
                    class="shrink-0 rounded-full border px-5 py-3 text-sm font-semibold transition"
                    :class="selectedCategoryKey === category.key
                        ? 'border-black bg-black text-white'
                        : 'border-black/10 bg-white text-black hover:border-[#a67c3a]'"
                    @click="$emit('select-category', category.key)"
                >
                    {{ category.label }}
                </button>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-2">
                <TemplateCard
                    v-for="template in templates"
                    :key="template.id"
                    :template="template"
                    :selected="selectedTemplateId === template.id"
                    @select-template="$emit('select-template', template.id)"
                />
            </div>
        </div>
    </section>
</template>

<script setup>
import TemplateCard from '../cards/TemplateCard.vue'

defineProps({
    categories: {
        type: Array,
        required: true,
    },
    templates: {
        type: Array,
        required: true,
    },
    selectedCategoryKey: {
        type: String,
        required: true,
    },
    selectedTemplateId: {
        type: Number,
        required: true,
    },
    selectedTemplate: {
        type: Object,
        default: null,
    },
})

defineEmits(['select-category', 'select-template'])
</script>
