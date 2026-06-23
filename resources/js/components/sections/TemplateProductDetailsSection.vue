<template>
    <section class="bg-white px-4 py-16 sm:px-6 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ labels.eyebrow }}
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                        {{ labels.titlePrefix }} {{ template.shortTitle || template.name }} {{ labels.titleSuffix }}
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        {{ labels.description }}
                    </p>
                </div>

                <div class="rounded-[2rem] bg-black p-6 text-white sm:p-8">
                    <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                        {{ labels.serviceEyebrow }}
                    </p>

                    <h3 class="mt-4 text-3xl font-semibold">
                        {{ labels.serviceTitle }}
                    </h3>

                    <p class="mt-4 max-w-2xl leading-8 text-white/60">
                        {{ labels.serviceDescription }}
                    </p>

                    <p class="mt-6 text-3xl font-semibold">
                        {{ labels.from }} {{ formatPrice(template.buildPriceFrom || template.basePrice || 2500) }}
                    </p>

                    <ul class="mt-6 grid gap-3 text-sm text-white/70">
                        <li v-for="item in labels.includes" :key="item">✓ {{ item }}</li>
                    </ul>

                    <a
                        href="#builder"
                        class="mt-8 inline-flex rounded-full bg-white px-7 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    >
                        {{ labels.button }}
                    </a>
                </div>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ labels.pagesLabel }}
                    </p>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="page in template.pages"
                            :key="page"
                            class="rounded-full bg-white px-3 py-1 text-sm text-black/60"
                        >
                            {{ page }}
                        </span>
                    </div>
                </article>

                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ labels.idealForLabel }}
                    </p>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="item in template.idealFor"
                            :key="item"
                            class="rounded-full bg-white px-3 py-1 text-sm text-black/60"
                        >
                            {{ item }}
                        </span>
                    </div>
                </article>

                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ labels.timelineLabel }}
                    </p>

                    <p class="mt-4 text-3xl font-semibold">
                        {{ template.deliveryTime || labels.defaultTimeline }}
                    </p>

                    <p class="mt-3 leading-7 text-black/60">
                        {{ labels.timelineDescription }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    template: {
        type: Object,
        required: true,
    },
    locale: {
        type: String,
        default: 'ro',
    },
});

const labels = computed(() => props.locale === 'en' ? {
    eyebrow: 'Template details',
    titlePrefix: 'The',
    titleSuffix: 'model is a clear starting point for your website.',
    description: 'The model is not sold as a separate template at this stage. It is used as a base, then adapted with the content, pages, colors, images, and features suitable for your business.',
    serviceEyebrow: 'Complete service',
    serviceTitle: 'Implementation and launch handled for you',
    serviceDescription: 'You choose the model, package, and features. After your request, we clarify the final structure and prepare a complete website adapted to your business.',
    from: 'from',
    includes: ['Adapted to your business', 'Personalized structure, content, colors, and pages', 'Responsive design for mobile and desktop', 'Contact form, WhatsApp, or selected features', 'Launch preparation and basic SEO'],
    button: 'Configure this model',
    pagesLabel: 'Included pages',
    idealForLabel: 'Best for',
    timelineLabel: 'Estimated timeline',
    defaultTimeline: '5-10 days',
    timelineDescription: 'The final timeline depends on the number of pages, selected features, and the materials you have ready.',
} : {
    eyebrow: 'Detalii model',
    titlePrefix: 'Modelul',
    titleSuffix: 'este punctul de pornire pentru site-ul tău.',
    description: 'Modelul nu este vândut ca template separat momentan. Îl folosim ca bază, apoi îl adaptăm cu textele, imaginile, culorile, paginile și funcționalitățile potrivite pentru afacerea ta.',
    serviceEyebrow: 'Serviciu complet',
    serviceTitle: 'Implementare și lansare realizate pentru tine',
    serviceDescription: 'Alegi modelul, pachetul și funcționalitățile, iar după cerere clarificăm structura finală și pregătim un site complet, adaptat afacerii tale.',
    from: 'de la',
    includes: ['Adaptare pentru afacerea ta', 'Structură, texte, culori și pagini personalizate', 'Design responsive pentru telefon și desktop', 'Formular de contact, WhatsApp sau funcțiile alese', 'Pregătire pentru lansare și SEO basic'],
    button: 'Configurează acest model',
    pagesLabel: 'Pagini incluse',
    idealForLabel: 'Potrivit pentru',
    timelineLabel: 'Termen estimativ',
    defaultTimeline: '5-10 zile',
    timelineDescription: 'Termenul final depinde de numărul de pagini, funcționalități și materialele pe care le ai pregătite.',
})

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}
</script>
