<template>
    <section class="bg-[#f7f4ef] px-6 py-16 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.9fr] lg:items-center">
                <div>
                    <a href="/modele-site" class="text-sm text-black/50 transition hover:text-black">
                        {{ labels.back }}
                    </a>

                    <p class="mt-8 inline-flex rounded-full border border-black/10 bg-white px-4 py-2 text-sm text-black/60">
                        {{ template.category }}
                    </p>

                    <h1 class="mt-6 max-w-3xl text-5xl font-semibold tracking-tight md:text-7xl">
                        {{ template.shortTitle || template.name }}
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-black/60">
                        {{ template.description }}
                    </p>

                    <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                        <a href="#cerere" class="rounded-full bg-black px-7 py-4 text-center text-sm font-medium text-white transition hover:bg-[#8b6f47]">
                            {{ labels.request }}
                        </a>

                        <a href="/#mockup" class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-medium transition hover:border-black/30">
                            {{ labels.examples }}
                        </a>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-black/10 bg-black p-4 shadow-xl">
                    <TemplatePreviewMockup :template="template" />
                </div>
            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-3">
                <article class="rounded-[2rem] border border-black/10 bg-white p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ labels.idealFor }}
                    </p>

                    <div class="mt-5 flex flex-wrap gap-2">
                        <span v-for="item in template.idealFor || []" :key="item" class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60">
                            {{ item }}
                        </span>
                    </div>
                </article>

                <article class="rounded-[2rem] border border-black/10 bg-white p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ labels.pages }}
                    </p>

                    <div class="mt-5 flex flex-wrap gap-2">
                        <span v-for="page in template.pages || []" :key="page" class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60">
                            {{ page }}
                        </span>
                    </div>
                </article>

                <article class="rounded-[2rem] border border-black/10 bg-white p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ labels.quickDetails }}
                    </p>

                    <div class="mt-5 grid gap-3 text-sm text-black/60">
                        <div class="flex justify-between gap-4">
                            <span>{{ labels.delivery }}</span>
                            <strong class="text-black">{{ template.deliveryTime || labels.estimated }}</strong>
                        </div>

                        <div class="flex justify-between gap-4">
                            <span>{{ labels.category }}</span>
                            <strong class="text-black">{{ template.category }}</strong>
                        </div>
                    </div>
                </article>
            </div>

            <div class="mt-6 rounded-[2rem] border border-black/10 bg-white p-6">
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    {{ labels.includes }}
                </p>

                <ul class="mt-6 grid gap-4 md:grid-cols-2">
                    <li v-for="item in includesList" :key="item" class="flex gap-3 rounded-2xl bg-[#f7f4ef] p-4 text-sm text-black/60">
                        <span class="text-[#8b6f47]">✓</span>
                        <span>{{ item }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'
import TemplatePreviewMockup from '../ui/TemplatePreviewMockup.vue'

const props = defineProps({
    template: {
        type: Object,
        required: true,
    },
    locale: {
        type: String,
        default: 'ro',
    },
})

const labels = computed(() => props.locale === 'en' ? {
    back: '← Back to templates',
    request: 'Request a discussion',
    examples: 'View examples',
    idealFor: 'Best for',
    pages: 'Possible pages',
    quickDetails: 'Quick details',
    delivery: 'Timeline',
    estimated: 'Estimated after discussion',
    category: 'Category',
    includes: 'What it can include',
    defaultIncludes: ['Clear page structure', 'Responsive mobile and desktop design', 'Contact form or quick contact button', 'Basic SEO structure', 'Content adapted to your business', 'Launch support'],
} : {
    back: '← Înapoi la modele',
    request: 'Vreau să discutăm',
    examples: 'Vezi exemple',
    idealFor: 'Potrivit pentru',
    pages: 'Pagini posibile',
    quickDetails: 'Detalii rapide',
    delivery: 'Termen',
    estimated: 'Estimativ după discuție',
    category: 'Categorie',
    includes: 'Ce poate include',
    defaultIncludes: ['Structură clară pentru pagini', 'Design responsive mobil și desktop', 'Formular sau buton de contact rapid', 'Structură SEO basic', 'Conținut adaptat afacerii tale', 'Suport pentru lansare'],
})

const includesList = computed(() => props.template.includes?.length ? props.template.includes : labels.value.defaultIncludes)
</script>
