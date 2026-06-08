<template>
    <article
        class="group overflow-hidden rounded-[2rem] border bg-white transition hover:-translate-y-1 hover:shadow-2xl"
        :class="selected ? 'border-[#a67c3a] shadow-xl' : 'border-black/10'"
    >
        <TemplateMiniPreview :template="template" />

        <div class="p-5 sm:p-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#a67c3a]">
                        {{ template.category }}
                    </p>

                    <h3 class="mt-3 text-2xl font-semibold">
                        {{ template.shortTitle || template.name }}
                    </h3>
                </div>

                <span
                    v-if="selected"
                    class="w-fit rounded-full bg-[#a67c3a] px-3 py-1 text-xs font-semibold text-white"
                >
                    Selectat
                </span>
            </div>

            <p class="mt-4 text-sm leading-6 text-black/60">
                {{ template.description }}
            </p>

            <div class="mt-5 flex flex-wrap gap-2">
                <span
                    v-for="item in template.idealFor"
                    :key="item"
                    class="rounded-full bg-[#f7f4ee] px-3 py-1 text-xs font-semibold text-black/60"
                >
                    {{ item }}
                </span>
            </div>

            <div class="mt-6 grid gap-3 rounded-2xl bg-[#f7f4ee] p-4 text-sm">
                <div class="flex justify-between gap-4">
                    <span class="text-black/50">Template developer</span>
                    <strong>{{ formatPrice(template.developerPrice) }}</strong>
                </div>

                <div class="flex justify-between gap-4">
                    <span class="text-black/50">Site făcut de mine</span>
                    <strong>de la {{ formatPrice(template.buildPriceFrom) }}</strong>
                </div>
            </div>

            <div class="mt-6 grid gap-3 sm:grid-cols-2">
                <a
                    :href="`/templates/${template.slug}`"
                    class="inline-flex items-center justify-center rounded-full bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#a67c3a]"
                >
                    Vezi demo
                </a>

                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-full border border-black/10 px-5 py-3 text-sm font-semibold transition hover:border-[#a67c3a] hover:text-[#a67c3a]"
                    @click="$emit('select-template', template.id)"
                >
                    Alege modelul
                </button>
            </div>
        </div>
    </article>
</template>

<script setup>
import TemplateMiniPreview from '../templates/TemplateMiniPreview.vue'

defineProps({
    template: {
        type: Object,
        required: true,
    },
    selected: {
        type: Boolean,
        default: false,
    },
})

defineEmits(['select-template'])

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString('ro-RO')} lei`
}
</script>
