<template>
    <section class="relative overflow-hidden bg-[#f7f4ee] px-4 pt-10 sm:px-6 lg:pt-14">
        <div class="mx-auto max-w-7xl">
            <div class="grid items-center gap-10 lg:grid-cols-[0.85fr_1.15fr]">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#a67c3a]">
                        Template-uri premium. Site-uri profesionale.
                    </p>

                    <h1 class="mt-5 max-w-3xl text-4xl font-semibold leading-tight tracking-tight text-[#1f1f1f] sm:text-5xl lg:text-6xl">
                        Două căi. Un site de succes.
                        <span class="block text-[#a67c3a]">
                            Alege, personalizează și lansează rapid.
                        </span>
                    </h1>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-black/60">
                        Alegi un model de site, adaugi funcționalități și decizi dacă îl cumperi ca template sau dacă ți-l construiesc eu complet.
                    </p>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <a
                            href="/pentru-developeri"
                            class="rounded-[1.5rem] border border-[#c8a468]/40 bg-white/80 p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl"
                        >
                            <p class="text-lg font-semibold text-black">
                                Pentru developeri
                            </p>

                            <p class="mt-2 text-sm leading-6 text-black/50">
                                Cumperi template-ul și îl adaptezi tu.
                            </p>

                            <span class="mt-4 inline-flex rounded-full bg-[#a67c3a] px-5 py-3 text-sm font-semibold text-white">
                                Cumpără template
                            </span>

                            <p class="mt-3 text-xs text-black/40">
                                Acces fișiere • Fără abonament • Cod reutilizabil
                            </p>
                        </a>

                        <a
                            href="/site-facut-pentru-tine"
                            class="rounded-[1.5rem] border border-[#c8a468]/40 bg-white/80 p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl"
                        >
                            <p class="text-lg font-semibold text-black">
                                Ți-l fac eu
                            </p>

                            <p class="mt-2 text-sm leading-6 text-black/50">
                                Îți adaptez modelul și primești site-ul gata.
                            </p>

                            <span class="mt-4 inline-flex rounded-full border border-[#a67c3a] px-5 py-3 text-sm font-semibold text-[#a67c3a]">
                                Solicită site gata făcut
                            </span>

                            <p class="mt-3 text-xs text-black/40">
                                Design • Personalizare • Lansare
                            </p>
                        </a>
                    </div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        <div
                            v-for="item in benefits"
                            :key="item.title"
                            class="rounded-2xl bg-white/60 p-4"
                        >
                            <p class="text-sm font-semibold text-black">
                                {{ item.title }}
                            </p>

                            <p class="mt-1 text-xs leading-5 text-black/50">
                                {{ item.description }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-black/10 bg-[#1f1f1f] p-3 shadow-2xl">
                    <div class="rounded-[1.5rem] bg-[#f7f4ee] p-3">
                        <div class="flex items-center gap-2 border-b border-black/10 pb-3">
                            <span class="h-3 w-3 rounded-full bg-red-300"></span>
                            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                            <span class="h-3 w-3 rounded-full bg-green-300"></span>

                            <div class="ml-auto h-2 w-32 rounded-full bg-black/10"></div>
                        </div>

                        <div class="mt-3 grid gap-3 md:grid-cols-2">
                            <TemplateMiniPreview
                                v-for="template in featuredTemplates"
                                :key="template.id"
                                :template="template"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 grid gap-4 rounded-[2rem] bg-white/80 p-4 shadow-sm sm:grid-cols-2 lg:grid-cols-4">
                <div
                    v-for="item in quickStats"
                    :key="item.title"
                    class="flex items-center gap-3 border-black/10 lg:border-r last:border-r-0"
                >
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#f0e6d6] text-[#a67c3a]">
                        ✓
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-black">
                            {{ item.title }}
                        </p>

                        <p class="text-xs text-black/50">
                            {{ item.description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'
import { templates } from '../../data/siteBuilder'
import TemplateMiniPreview from '../templates/TemplateMiniPreview.vue'

defineProps({
    hero: {
        type: Object,
        required: true,
    },
})

const featuredTemplates = computed(() => {
    return templates
        .filter(template => ['premium-studio', 'rental-flow', 'simple-shop', 'conversion-flow'].includes(template.slug))
        .slice(0, 4)
})

const benefits = [
    {
        title: 'Design premium',
        description: 'Modele vizuale, nu doar descrieri.',
    },
    {
        title: 'Adaptat pentru mobil',
        description: 'Structură gândită și pentru telefon.',
    },
    {
        title: 'Funcții modulare',
        description: 'Adaugi doar ce ai nevoie.',
    },
]

const quickStats = [
    {
        title: 'Template-uri moderne',
        description: 'Pentru mai multe industrii',
    },
    {
        title: 'Funcționalități clare',
        description: 'Formulare, rezervări, produse',
    },
    {
        title: 'Pentru developeri',
        description: 'Template-uri ușor de adaptat',
    },
    {
        title: 'Site gata făcut',
        description: 'Pentru clienți non-tehnici',
    },
]
</script>
