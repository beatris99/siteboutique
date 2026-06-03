<template>
    <div class="bg-[#f4f7f5] text-[#171717]">
        <section class="relative overflow-hidden bg-[#f4f7f5] px-6 py-24">
            <div class="absolute right-0 top-0 h-96 w-96 rounded-full bg-[#9fc7aa]/50 blur-3xl"></div>
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
                            class="rounded-full bg-black px-7 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#5f8d69]"
                        >
                            {{ content.hero.primaryButton }}
                        </a>

                        <a
                            href="#rental-pricing"
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
                        <div class="flex items-center gap-2 border-b border-black/10 bg-[#f4f7f5] px-4 py-3">
                            <span class="h-3 w-3 rounded-full bg-red-300"></span>
                            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                            <span class="h-3 w-3 rounded-full bg-green-300"></span>

                            <div class="ml-3 flex-1 rounded-full bg-white px-3 py-1 text-[10px] text-black/40">
                                urbanrent.ro
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-[#101510] via-[#31563a] to-[#9fc7aa] p-6 text-white">
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
                                    <p class="text-xs text-white/50">Rezervare</p>
                                    <p class="mt-1 text-xl font-semibold">Rapidă</p>
                                </div>

                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Tarife</p>
                                    <p class="mt-1 text-xl font-semibold">Clare</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 bg-white p-5">
                            <div
                                v-for="vehicle in content.vehicles.slice(0, 3)"
                                :key="vehicle.name"
                                class="rounded-2xl bg-[#f4f7f5] p-4"
                            >
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="font-semibold">
                                            {{ vehicle.name }}
                                        </p>

                                        <p class="mt-1 text-xs text-black/50">
                                            {{ vehicle.price }}
                                        </p>
                                    </div>

                                    <span
                                        class="rounded-full px-2 py-1 text-[10px] font-semibold"
                                        :class="vehicle.available ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700'"
                                    >
                                        {{ vehicle.available ? 'Disponibil' : 'La cerere' }}
                                    </span>
                                </div>

                                <div class="mt-3 h-2 w-full rounded-full bg-black/10"></div>
                                <div class="mt-2 h-2 w-2/3 rounded-full bg-black/10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#5f8d69]">
                        Flotă / produse
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Produsele de închiriat sunt prezentate clar.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Clientul vede ce poate închiria, ce include fiecare variantă și care este prețul de pornire.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="vehicle in content.vehicles"
                        :key="vehicle.name"
                        class="rounded-[2rem] border border-black/10 bg-[#f4f7f5] p-6 transition hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-black text-white">
                                ↗
                            </div>

                            <span
                                class="rounded-full px-3 py-1 text-xs font-semibold"
                                :class="vehicle.available ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700'"
                            >
                                {{ vehicle.available ? 'Disponibil' : 'La cerere' }}
                            </span>
                        </div>

                        <h3 class="mt-6 text-2xl font-semibold">
                            {{ vehicle.name }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ vehicle.description }}
                        </p>

                        <p class="mt-6 text-lg font-semibold text-[#5f8d69]">
                            {{ vehicle.price }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span
                                v-for="spec in vehicle.specs"
                                :key="spec"
                                class="rounded-full bg-white px-3 py-1 text-xs text-black/60"
                            >
                                {{ spec }}
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-[#f4f7f5] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#5f8d69]">
                        Cum funcționează
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Proces simplu pentru client și pentru business.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Explicarea pașilor reduce mesajele repetitive și face rezervarea mai ușoară.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-4">
                    <article
                        v-for="step in content.howItWorks"
                        :key="step.number"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <p class="text-sm font-semibold text-[#5f8d69]">
                            {{ step.number }}
                        </p>

                        <h3 class="mt-5 text-xl font-semibold">
                            {{ step.title }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ step.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section id="rental-pricing" class="bg-white px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#5f8d69]">
                        Tarife
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Tarifele clare reduc discuțiile inutile.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Poți afișa prețuri zilnice, săptămânale sau personalizate, în funcție de modelul de business.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="plan in content.pricing"
                        :key="plan.name"
                        class="rounded-[2rem] border p-6 transition hover:-translate-y-1 hover:shadow-xl"
                        :class="plan.highlighted ? 'border-black bg-black text-white' : 'border-black/10 bg-[#f4f7f5] text-black'"
                    >
                        <p
                            class="text-sm uppercase tracking-[0.25em]"
                            :class="plan.highlighted ? 'text-white/40' : 'text-[#5f8d69]'"
                        >
                            Pachet
                        </p>

                        <h3 class="mt-4 text-3xl font-semibold">
                            {{ plan.name }}
                        </h3>

                        <p
                            class="mt-4 text-sm leading-6"
                            :class="plan.highlighted ? 'text-white/60' : 'text-black/60'"
                        >
                            {{ plan.description }}
                        </p>

                        <p class="mt-8 text-3xl font-semibold">
                            {{ plan.price }}
                        </p>

                        <ul
                            class="mt-6 space-y-3 text-sm"
                            :class="plan.highlighted ? 'text-white/70' : 'text-black/60'"
                        >
                            <li
                                v-for="feature in plan.features"
                                :key="feature"
                                class="flex gap-2"
                            >
                                <span :class="plan.highlighted ? 'text-white' : 'text-[#5f8d69]'">✓</span>
                                <span>{{ feature }}</span>
                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-[#f4f7f5] px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#5f8d69]">
                        Condiții
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Regulile de închiriere sunt afișate înainte de contact.
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        Aici poți clarifica garanția, contractul, actele necesare, ce este inclus și cum se face returnarea.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <article
                        v-for="condition in content.conditions"
                        :key="condition.title"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <h3 class="text-xl font-semibold">
                            {{ condition.title }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ condition.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#5f8d69]">
                        Avantaje
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Un template făcut să răspundă întrebărilor înainte să apară.
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        Pentru business-urile de închirieri, cele mai multe discuții sunt despre preț, disponibilitate, garanție și condiții. Template-ul le pune pe toate într-o structură clară.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div
                        v-for="benefit in content.benefits"
                        :key="benefit"
                        class="flex gap-3 rounded-2xl bg-[#f4f7f5] p-5 text-sm text-black/70"
                    >
                        <span class="text-[#5f8d69]">✓</span>
                        <span>{{ benefit }}</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#f4f7f5] px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#5f8d69]">
                        FAQ
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Întrebări frecvente pentru închirieri.
                    </h2>
                </div>

                <div class="grid gap-4">
                    <details
                        v-for="item in content.faq"
                        :key="item.question"
                        class="group rounded-2xl border border-black/10 bg-white p-5"
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
                            Scutere
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Biciclete
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            ATV-uri
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Echipamente
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
