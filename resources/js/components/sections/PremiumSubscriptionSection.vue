<template>
    <section id="abonament" class="bg-white px-4 py-14 sm:px-6 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-[#a67c3a] sm:tracking-[0.28em]">
                        {{ t.eyebrow }}
                    </p>

                    <h2 class="mt-5 max-w-3xl text-3xl font-semibold leading-tight tracking-[-0.04em] text-[#171717] sm:text-5xl">
                        {{ t.title }}
                    </h2>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-black/60 sm:text-lg">
                        {{ t.description }}
                    </p>

                    <div class="mt-8 rounded-[2rem] border border-black/10 bg-[#f7f4ef] p-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#a67c3a]">
                            {{ t.importantTitle }}
                        </p>
                        <p class="mt-3 text-sm leading-7 text-black/65">
                            {{ t.importantText }}
                        </p>
                    </div>
                </div>

                <div class="grid gap-4">
                    <article
                        v-for="item in t.steps"
                        :key="item.title"
                        class="rounded-[2rem] border border-black/10 p-6 shadow-sm"
                        :class="item.dark ? 'bg-black text-white shadow-xl' : 'bg-[#f7f4ef] text-[#171717]'"
                    >
                        <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.25em]" :class="item.dark ? 'text-[#d8c3a5]' : 'text-[#a67c3a]'">
                                    {{ item.eyebrow }}
                                </p>

                                <h3 class="mt-3 text-2xl font-semibold sm:text-3xl">
                                    {{ item.title }}
                                </h3>

                                <p class="mt-3 leading-7" :class="item.dark ? 'text-white/60' : 'text-black/60'">
                                    {{ item.text }}
                                </p>
                            </div>

                            <span
                                class="w-fit rounded-full px-4 py-2 text-sm font-bold shadow-sm"
                                :class="item.dark ? 'bg-white text-black' : 'bg-white text-[#171717]'"
                            >
                                {{ item.badge }}
                            </span>
                        </div>
                    </article>
                </div>
            </div>

            <div class="mt-12 grid gap-4 md:grid-cols-3">
                <div
                    v-for="item in t.infoCards"
                    :key="item.title"
                    class="rounded-[2rem] border border-black/10 bg-[#f7f4ef] p-6"
                >
                    <h3 class="text-xl font-semibold text-[#171717]">
                        {{ item.title }}
                    </h3>
                    <p class="mt-3 leading-7 text-black/60">
                        {{ item.text }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    locale: {
        type: String,
        default: 'ro',
    },
})

const copy = {
    ro: {
        eyebrow: 'Model simplu și predictibil',
        title: 'Nu plătești doar o pagină. Primești un site care rămâne îngrijit.',
        description: 'Lucrăm pe un model clar: taxă de start pentru construcția site-ului și abonament lunar pentru mentenanță, suport, ajustări și îmbunătățiri. Este potrivit pentru afaceri care vor prezență online serioasă, dar nu vor să plătească tot proiectul din prima.',
        importantTitle: 'Important',
        importantText: 'Colaborarea se face transparent, pe minim 24 luni. Clientul știe de la început ce primește, ce plătește lunar și ce include suportul.',
        steps: [
            {
                eyebrow: 'Start',
                title: 'De la 500 lei',
                text: 'Pornim proiectul, stabilim structura, adaptăm direcția vizuală și pregătim site-ul pentru afacerea ta.',
                badge: 'inițial',
                dark: false,
            },
            {
                eyebrow: 'Abonament',
                title: '200–300 lei / lună',
                text: 'Include mentenanță, mici ajustări, monitorizare, suport și păstrarea site-ului într-o formă bună după lansare.',
                badge: 'lunar',
                dark: true,
            },
            {
                eyebrow: 'Contract',
                title: '24 luni',
                text: 'Un parteneriat suficient de lung încât site-ul să fie construit, lansat, ajustat și folosit real în business.',
                badge: 'minim',
                dark: false,
            },
        ],
        infoCards: [
            {
                title: 'Pentru cine este',
                text: 'Afaceri locale, cabinete, saloane, servicii, fotografi, terapeuți, închirieri sau proiecte mici care vor imagine bună și contact rapid.',
            },
            {
                title: 'Ce primești',
                text: 'Site modern, responsive, formular, butoane de contact, structură clară, conectări de bază și suport după lansare.',
            },
            {
                title: 'Ce discutăm înainte',
                text: 'Domeniul, logo-ul, pozele, textele, obiectivul site-ului, bugetul și dacă modelul cu abonament este potrivit.',
            },
        ],
    },
    en: {
        eyebrow: 'Simple and predictable model',
        title: 'You are not paying for just a page. You get a website that stays maintained.',
        description: 'We work with a clear model: a setup fee for building the website and a monthly subscription for maintenance, support, adjustments and improvements. It is suitable for businesses that want a serious online presence without paying the full project upfront.',
        importantTitle: 'Important',
        importantText: 'The collaboration is transparent, with a minimum 24-month term. The client knows from the beginning what is included, what is paid monthly and what support covers.',
        steps: [
            {
                eyebrow: 'Start',
                title: 'From 500 RON',
                text: 'We start the project, define the structure, adapt the visual direction and prepare the website for your business.',
                badge: 'initial',
                dark: false,
            },
            {
                eyebrow: 'Subscription',
                title: '200–300 RON / month',
                text: 'Includes maintenance, small updates, monitoring, support and keeping the website in good shape after launch.',
                badge: 'monthly',
                dark: true,
            },
            {
                eyebrow: 'Term',
                title: '24 months',
                text: 'A long enough partnership to build, launch, adjust and actually use the website in the business.',
                badge: 'minimum',
                dark: false,
            },
        ],
        infoCards: [
            {
                title: 'Who it is for',
                text: 'Local businesses, clinics, salons, service providers, photographers, therapists, rentals or small projects that need a premium image and quick contact.',
            },
            {
                title: 'What you get',
                text: 'Modern responsive website, form, contact buttons, clear structure, basic integrations and post-launch support.',
            },
            {
                title: 'What we discuss first',
                text: 'Domain, logo, photos, text, website objective, budget and whether the subscription model is right for the project.',
            },
        ],
    },
}

const t = computed(() => copy[props.locale] || copy.ro)
</script>
