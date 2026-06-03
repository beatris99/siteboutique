<template>
    <div class="bg-[#f8f1ea] text-[#171717]">
        <section class="relative overflow-hidden px-6 py-24">
            <div class="absolute right-0 top-0 h-96 w-96 rounded-full bg-[#d8b99a]/40 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-96 w-96 rounded-full bg-[#f1d8c4]/70 blur-3xl"></div>

            <div class="relative mx-auto grid max-w-7xl gap-12 lg:grid-cols-[1fr_0.9fr] lg:items-center">
                <div>
                    <a
                        href="/#templates"
                        class="text-sm text-black/50 transition hover:text-black"
                    >
                        ← Înapoi la template-uri
                    </a>

                    <p class="mt-10 inline-flex rounded-full border border-black/10 bg-white/70 px-4 py-2 text-sm text-black/60">
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
                            href="#premium-services"
                            class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-semibold transition hover:border-black/30"
                        >
                            {{ content.hero.secondaryButton }}
                        </a>
                    </div>

                    <div class="mt-10 grid max-w-2xl gap-4 sm:grid-cols-3">
                        <div
                            v-for="stat in content.stats"
                            :key="stat.label"
                            class="rounded-2xl border border-black/10 bg-white/70 p-4"
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
                    <div class="overflow-hidden rounded-[2rem] bg-black text-white">
                        <div class="flex items-center gap-2 border-b border-white/10 bg-white/10 px-4 py-3">
                            <span class="h-3 w-3 rounded-full bg-red-300"></span>
                            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                            <span class="h-3 w-3 rounded-full bg-green-300"></span>
                            <div class="ml-3 flex-1 rounded-full bg-white/10 px-3 py-1 text-[10px] text-white/40">
                                {{ content.brand.name.toLowerCase().replaceAll(' ', '') }}.ro
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-[#2b1c16] via-[#8b6f47] to-[#d8b99a] p-6">
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
                                    <p class="text-xs text-white/50">Programări</p>
                                    <p class="mt-1 text-xl font-semibold">Online</p>
                                </div>

                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Stil</p>
                                    <p class="mt-1 text-xl font-semibold">Premium</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 bg-white p-5 text-black">
                            <div
                                v-for="service in content.services.slice(0, 3)"
                                :key="service.title"
                                class="rounded-2xl bg-[#f8f1ea] p-4"
                            >
                                <div class="flex items-center justify-between gap-3">
                                    <p class="font-semibold">
                                        {{ service.title }}
                                    </p>

                                    <p class="text-xs text-black/50">
                                        {{ service.price }}
                                    </p>
                                </div>

                                <div class="mt-3 h-2 w-full rounded-full bg-black/10"></div>
                                <div class="mt-2 h-2 w-2/3 rounded-full bg-black/10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="premium-services" class="bg-white px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Servicii
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Servicii prezentate clar, cu descriere și preț de pornire.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Secțiunea poate fi adaptată rapid cu serviciile reale ale clientului.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-4">
                    <article
                        v-for="service in content.services"
                        :key="service.title"
                        class="rounded-[2rem] border border-black/10 bg-[#f8f1ea] p-6 transition hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-black text-white">
                            ✦
                        </div>

                        <h3 class="mt-6 text-2xl font-semibold">
                            {{ service.title }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ service.description }}
                        </p>

                        <p class="mt-6 text-sm font-semibold text-[#8b6f47]">
                            {{ service.price }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-[#f8f1ea] px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        {{ content.about.eyebrow }}
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        {{ content.about.title }}
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        {{ content.about.description }}
                    </p>

                    <ul class="mt-8 grid gap-3">
                        <li
                            v-for="bullet in content.about.bullets"
                            :key="bullet"
                            class="flex gap-3 rounded-2xl bg-white p-4 text-sm text-black/70"
                        >
                            <span class="text-[#8b6f47]">✓</span>
                            <span>{{ bullet }}</span>
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div
                        v-for="item in content.gallery"
                        :key="item.title"
                        class="min-h-52 rounded-[2rem] bg-gradient-to-br from-[#2b1c16] to-[#d8b99a] p-5 text-white"
                    >
                        <p class="text-xs uppercase tracking-[0.25em] text-white/50">
                            {{ item.subtitle }}
                        </p>

                        <h3 class="mt-24 text-2xl font-semibold">
                            {{ item.title }}
                        </h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Pachete / prețuri
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Prețurile pot fi afișate simplu și elegant.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Pentru saloane, secțiunea de prețuri reduce mesajele repetitive și clarifică rapid serviciile principale.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="plan in content.pricing"
                        :key="plan.name"
                        class="rounded-[2rem] border p-6 transition hover:-translate-y-1 hover:shadow-xl"
                        :class="plan.highlighted ? 'border-black bg-black text-white' : 'border-black/10 bg-[#f8f1ea] text-black'"
                    >
                        <p
                            class="text-sm uppercase tracking-[0.25em]"
                            :class="plan.highlighted ? 'text-white/40' : 'text-[#8b6f47]'"
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
                                <span :class="plan.highlighted ? 'text-white' : 'text-[#8b6f47]'">✓</span>
                                <span>{{ feature }}</span>
                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-[#f8f1ea] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Testimoniale
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Încrederea se construiește cu recenzii vizibile.
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="testimonial in content.testimonials"
                        :key="testimonial.name"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <p class="leading-7 text-black/60">
                            “{{ testimonial.text }}”
                        </p>

                        <p class="mt-6 font-semibold">
                            {{ testimonial.name }}
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
                        Întrebări utile înainte de programare.
                    </h2>
                </div>

                <div class="grid gap-4">
                    <details
                        v-for="item in content.faq"
                        :key="item.question"
                        class="group rounded-2xl border border-black/10 bg-[#f8f1ea] p-5"
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
                            Beauty
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Wellness
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Nails
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Cosmetică
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
