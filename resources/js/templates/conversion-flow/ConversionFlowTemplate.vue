<template>
    <div class="bg-[#f7f4ef] text-[#171717]">
        <section class="relative overflow-hidden px-6 py-24">
            <div class="absolute right-0 top-0 h-96 w-96 rounded-full bg-[#d8c3a5]/60 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-96 w-96 rounded-full bg-white blur-3xl"></div>

            <div class="relative mx-auto grid max-w-7xl gap-12 lg:grid-cols-[1fr_0.9fr] lg:items-center">
                <div>
                    <a
                        href="/#templates"
                        class="text-sm text-black/50 transition hover:text-black"
                    >
                        ← Înapoi la template-uri
                    </a>

                    <p class="mt-10 inline-flex rounded-full border border-black/10 bg-white px-4 py-2 text-sm text-black/60">
                        {{ content.hero.eyebrow }}
                    </p>

                    <h1 class="mt-6 max-w-4xl text-5xl font-semibold tracking-tight md:text-7xl">
                        {{ content.hero.title }}
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-black/60">
                        {{ content.hero.description }}
                    </p>

                    <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                        <a
                            href="#contact"
                            class="rounded-full bg-black px-7 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                        >
                            {{ content.hero.primaryButton }}
                        </a>

                        <a
                            href="#conversion-structure"
                            class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-semibold transition hover:border-black/30"
                        >
                            {{ content.hero.secondaryButton }}
                        </a>
                    </div>

                    <div class="mt-10 grid max-w-2xl gap-4 sm:grid-cols-3">
                        <div
                            v-for="stat in content.stats"
                            :key="stat.label"
                            class="rounded-2xl border border-black/10 bg-white p-4"
                        >
                            <p class="text-2xl font-semibold">
                                {{ stat.value }}
                            </p>

                            <p class="mt-1 text-sm text-black/50">
                                {{ stat.label }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[2.5rem] border border-black/10 bg-white p-4 shadow-2xl">
                    <div class="overflow-hidden rounded-[2rem] border border-black/10 bg-white">
                        <div class="flex items-center gap-2 border-b border-black/10 bg-[#f7f4ef] px-4 py-3">
                            <span class="h-3 w-3 rounded-full bg-red-300"></span>
                            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                            <span class="h-3 w-3 rounded-full bg-green-300"></span>

                            <div class="ml-3 flex-1 rounded-full bg-white px-3 py-1 text-[10px] text-black/40">
                                growthlaunch.ro
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-[#171717] via-[#8b6f47] to-[#d8c3a5] p-6 text-white">
                            <p class="text-sm text-white/60">
                                {{ content.brand.location }}
                            </p>

                            <h2 class="mt-20 text-4xl font-semibold">
                                {{ content.brand.name }}
                            </h2>

                            <p class="mt-4 max-w-md leading-7 text-white/70">
                                {{ content.brand.shortDescription }}
                            </p>

                            <div class="mt-8 grid grid-cols-2 gap-3">
                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Focus</p>
                                    <p class="mt-1 text-xl font-semibold">Lead-uri</p>
                                </div>

                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Structură</p>
                                    <p class="mt-1 text-xl font-semibold">Sales</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 bg-white p-5">
                            <div class="rounded-2xl bg-[#f7f4ef] p-4">
                                <p class="text-sm font-semibold">
                                    Problemă
                                </p>
                                <div class="mt-3 h-2 w-full rounded-full bg-black/10"></div>
                                <div class="mt-2 h-2 w-2/3 rounded-full bg-black/10"></div>
                            </div>

                            <div class="rounded-2xl bg-[#f7f4ef] p-4">
                                <p class="text-sm font-semibold">
                                    Beneficii
                                </p>
                                <div class="mt-3 h-2 w-full rounded-full bg-black/10"></div>
                                <div class="mt-2 h-2 w-3/4 rounded-full bg-black/10"></div>
                            </div>

                            <div class="rounded-2xl bg-black p-4 text-white">
                                <p class="text-sm font-semibold">
                                    CTA principal
                                </p>
                                <div class="mt-3 h-2 w-full rounded-full bg-white/20"></div>
                                <div class="mt-2 h-2 w-2/3 rounded-full bg-white/20"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ content.problem.eyebrow }}
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        {{ content.problem.title }}
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        {{ content.problem.description }}
                    </p>
                </div>

                <div class="grid gap-4">
                    <div
                        v-for="point in content.problem.points"
                        :key="point"
                        class="flex gap-3 rounded-2xl bg-[#f7f4ef] p-5 text-sm text-black/70"
                    >
                        <span class="text-[#8b6f47]">!</span>
                        <span>{{ point }}</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#f7f4ef] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ content.solution.eyebrow }}
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        {{ content.solution.title }}
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        {{ content.solution.description }}
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-4">
                    <article
                        v-for="item in content.solution.items"
                        :key="item.title"
                        class="rounded-[2rem] border border-black/10 bg-white p-6 transition hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-black text-white">
                            ✓
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">
                            {{ item.title }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ item.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Beneficii
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Landing page cu scop clar: să ducă vizitatorul spre acțiune.
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        Template-ul este potrivit când nu ai nevoie de un site mare, ci de o pagină concentrată pe o ofertă.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <article
                        v-for="benefit in content.benefits"
                        :key="benefit.title"
                        class="rounded-[2rem] border border-black/10 bg-[#f7f4ef] p-6"
                    >
                        <h3 class="text-xl font-semibold">
                            {{ benefit.title }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ benefit.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section id="conversion-structure" class="bg-[#f7f4ef] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Structură
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Secțiunile sunt puse în ordinea potrivită pentru vânzare.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Asta reduce discuțiile inutile, pentru că oferta este explicată pas cu pas.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-4">
                    <article
                        v-for="section in content.sections"
                        :key="section.number"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <p class="text-sm font-semibold text-[#8b6f47]">
                            {{ section.number }}
                        </p>

                        <h3 class="mt-5 text-xl font-semibold">
                            {{ section.title }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ section.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ content.offer.eyebrow }}
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        {{ content.offer.title }}
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        {{ content.offer.description }}
                    </p>
                </div>

                <div class="rounded-[2rem] bg-black p-8 text-white shadow-xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                        Pachet exemplu
                    </p>

                    <h3 class="mt-4 text-3xl font-semibold">
                        Conversion Page
                    </h3>

                    <p class="mt-4 text-5xl font-semibold">
                        {{ content.offer.price }}
                    </p>

                    <div class="mt-8 grid gap-3">
                        <div
                            v-for="feature in content.offer.features"
                            :key="feature"
                            class="flex gap-3 rounded-2xl bg-white/10 p-4 text-sm text-white/70"
                        >
                            <span class="text-white">✓</span>
                            <span>{{ feature }}</span>
                        </div>
                    </div>

                    <div class="mt-8 rounded-2xl bg-white p-5 text-black">
                        <p class="font-semibold">
                            Bonusuri posibile
                        </p>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <span
                                v-for="bonus in content.offer.bonuses"
                                :key="bonus"
                                class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60"
                            >
                                {{ bonus }}
                            </span>
                        </div>
                    </div>

                    <a
                        href="#builder"
                        class="mt-8 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    >
                        Configurează oferta
                    </a>
                </div>
            </div>
        </section>

        <section class="bg-[#f7f4ef] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Dovadă socială
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Testimonialele și rezultatele cresc încrederea.
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="item in content.socialProof"
                        :key="item.name"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <p class="w-fit rounded-full bg-[#f7f4ef] px-3 py-1 text-xs font-semibold text-[#8b6f47]">
                            {{ item.result }}
                        </p>

                        <p class="mt-5 leading-7 text-black/60">
                            “{{ item.text }}”
                        </p>

                        <p class="mt-6 font-semibold">
                            {{ item.name }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        FAQ
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Întrebări frecvente pentru landing page-uri.
                    </h2>
                </div>

                <div class="grid gap-4">
                    <details
                        v-for="item in content.faq"
                        :key="item.question"
                        class="group rounded-2xl border border-black/10 bg-[#f7f4ef] p-5"
                    >
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold">
                            {{ item.question }}

                            <span class="transition group-open:rotate-45">
                                +
                            </span>
                        </summary>

                        <p class="mt-4 leading-7 text-black/60">
                            {{ item.answer }}
                        </p>
                    </details>
                </div>
            </div>
        </section>

        <section class="bg-black px-6 py-24 text-white">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1fr_0.8fr] lg:items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                        Template real
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-6xl">
                        {{ content.finalCta.title }}
                    </h2>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-white/60">
                        {{ content.finalCta.description }}
                    </p>
                </div>

                <div class="rounded-[2rem] bg-white/10 p-6">
                    <p class="text-sm text-white/50">
                        Potrivit pentru
                    </p>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Campanii
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Cursuri
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Servicii premium
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Lead-uri
                        </span>
                    </div>

                    <a
                        href="#builder"
                        class="mt-8 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    >
                        {{ content.finalCta.button }}
                    </a>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
defineProps({
    content: {
        type: Object,
        required: true,
    },
})
</script>
