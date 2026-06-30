<template>
    <section id="templates" class="bg-[#f7f4ef] px-4 py-16 sm:px-6 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ section.eyebrow }}
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                        {{ section.title }}
                    </h2>

                    <p class="mt-5 max-w-2xl leading-8 text-black/60">
                        {{ section.description }}
                    </p>
                </div>

                <div class="rounded-[2rem] bg-white p-5 shadow-sm ring-1 ring-black/5">
                    <p class="text-sm font-semibold text-black">
                        {{ section.helper_title || section.helperTitle }}
                    </p>

                    <p class="mt-2 text-sm leading-6 text-black/55">
                        {{ section.helper_text || section.helperText }}
                    </p>
                </div>
            </div>

            <p class="mt-6 text-sm text-black/40 sm:hidden">
                {{ section.mobile_hint || section.mobileHint }}
            </p>

            <div class="mt-6 flex gap-3 overflow-x-auto pb-2 -mx-1 px-1 sm:grid sm:grid-cols-2 sm:overflow-visible lg:grid-cols-5">
                <button
                    v-for="category in categories"
                    :key="category.key"
                    type="button"
                    class="min-w-[16rem] snap-start rounded-[1.25rem] border p-4 text-left transition hover:-translate-y-1 hover:shadow-lg sm:min-w-0"
                    :class="selectedCategoryKey === category.key
                        ? 'border-black bg-black text-white'
                        : 'border-black/10 bg-white text-black'"
                    @click="$emit('select-category', category.key)"
                >
                    <p class="font-semibold">
                        {{ category.label }}
                    </p>

                    <p
                        class="mt-2 text-xs leading-5"
                        :class="selectedCategoryKey === category.key ? 'text-white/60' : 'text-black/50'"
                    >
                        {{ category.description }}
                    </p>
                </button>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-2">
                <article
                    v-for="template in templates"
                    :key="template.id"
                    class="overflow-hidden rounded-[2rem] border bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl"
                    :class="selectedTemplateId === template.id ? 'border-[#a67c3a]' : 'border-black/10'"
                >
                    <div class="border-b border-black/10 bg-[#f7f4ef] p-4">
                        <TemplateMiniPreview :template="template" />
                    </div>

                    <div class="p-5">
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="item in template.idealFor"
                                :key="item"
                                class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60"
                            >
                                {{ item }}
                            </span>
                        </div>

                        <h3 class="mt-5 text-2xl font-semibold">
                            {{ template.shortTitle || template.name }}
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-black/60">
                            {{ template.description }}
                        </p>

                        <div class="mt-5 grid gap-3 rounded-2xl bg-[#f7f4ef] p-4">
                            <div class="flex items-center justify-between gap-4 text-sm">
                                <span class="text-black/50">
                                    {{ common.realization }}
                                </span>

                                <strong>
                                    {{ common.from }} {{ formatPrice(template.buildPriceFrom || template.basePrice) }}
                                </strong>
                            </div>

                            <div class="flex items-center justify-between gap-4 text-sm">
                                <span class="text-black/50">
                                    {{ common.estimated_delivery || common.estimatedDelivery || 'Termen estimativ' }}
                                </span>

                                <strong>
                                    {{ template.deliveryTime || '5-10 zile' }}
                                </strong>
                            </div>
                        </div>

                        <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                            <a
                                :href="`/templates/${template.slug}`"
                                class="flex-1 rounded-full bg-black px-6 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                            >
                                {{ common.view_demo || common.viewDemo || 'Vezi demo' }}
                            </a>

                            <button
                                type="button"
                                class="flex-1 rounded-full border border-black/10 bg-white px-6 py-4 text-sm font-semibold text-black transition hover:border-black/30"
                                @click="chooseTemplate(template)"
                            >
                                {{ common.choose_template || common.chooseTemplate || 'Alege modelul' }}
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
import TemplateMiniPreview from '../templates/TemplateMiniPreview.vue'

defineProps({
    section: {
        type: Object,
        required: true,
    },
    common: {
        type: Object,
        required: true,
    },
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
        default: null,
    },
    selectedTemplate: {
        type: Object,
        default: null,
    },
})

const emit = defineEmits(['select-category', 'select-template'])

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString('ro-RO')} lei`
}

function chooseTemplate(template) {
    emit('select-template', template.id)

    setTimeout(() => {
        document.getElementById('builder')?.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
        })
    }, 50)
}
</script>
