<template>
    <div class="bg-[#f7f2e9] text-[#171717]">
        <section class="relative overflow-hidden px-6 py-24">
            <div class="absolute right-0 top-0 h-96 w-96 rounded-full bg-[#b6c7a5]/60 blur-3xl"></div>
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
                            class="rounded-full bg-black px-7 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#6d7f5d]"
                        >
                            {{ content.hero.primaryButton }}
                        </a>

                        <a
                            href="#tourism-rooms"
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
                        <div class="flex items-center gap-2 border-b border-black/10 bg-[#f7f2e9] px-4 py-3">
                            <span class="h-3 w-3 rounded-full bg-red-300"></span>
                            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                            <span class="h-3 w-3 rounded-full bg-green-300"></span>

                            <div class="ml-3 flex-1 rounded-full bg-white px-3 py-1 text-[10px] text-black/40">
                                casavaleaverde.ro
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-[#1f261b] via-[#6d7f5d] to-[#d8c3a5] p-6 text-white">
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
                                    <p class="text-xs text-white/50">Rezervări</p>
                                    <p class="mt-1 text-xl font-semibold">Online</p>
                                </div>

                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Experiență</p>
                                    <p class="mt-1 text-xl font-semibold">Locală</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 bg-white p-5">
                            <div
                                v-for="room in content.rooms.slice(0, 3)"
                                :key="room.name"
                                class="rounded-2xl bg-[#f7f2e9] p-4"
                            >
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="font-semibold">
                                            {{ room.name }}
                                        </p>

                                        <p class="mt-1 text-xs text-black/50">
                                            {{ room.price }}
                                        </p>
                                    </div>

                                    <span
                                        v-if="room.featured"
                                        class="rounded-full bg-[#6d7f5d] px-2 py-1 text-[10px] font-semibold text-white"
                                    >
                                        Popular
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

        <section id="tourism-rooms" class="bg-white px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#6d7f5d]">
                        Camere / unități
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Cazarea este prezentată clar, cu preț și beneficii.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Clientul vede rapid ce poate rezerva, pentru câte persoane este potrivit și ce include.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="room in content.rooms"
                        :key="room.name"
                        class="rounded-[2rem] border p-6 transition hover:-translate-y-1 hover:shadow-xl"
                        :class="room.featured ? 'border-black bg-black text-white' : 'border-black/10 bg-[#f7f2e9] text-black'"
                    >
                        <div class="flex items-center justify-between gap-3">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-2xl"
                                :class="room.featured ? 'bg-white text-black' : 'bg-black text-white'"
                            >
                                ⌂
                            </div>

                            <span
                                v-if="room.featured"
                                class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-black"
                            >
                                Recomandat
                            </span>
                        </div>

                        <h3 class="mt-6 text-2xl font-semibold">
                            {{ room.name }}
                        </h3>

                        <p
                            class="mt-4 text-sm leading-6"
                            :class="room.featured ? 'text-white/60' : 'text-black/60'"
                        >
                            {{ room.description }}
                        </p>

                        <p
                            class="mt-6 text-lg font-semibold"
                            :class="room.featured ? 'text-white' : 'text-[#6d7f5d]'"
                        >
                            {{ room.price }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span
                                v-for="spec in room.specs"
                                :key="spec"
                                class="rounded-full px-3 py-1 text-xs"
                                :class="room.featured ? 'bg-white/10 text-white/70' : 'bg-white text-black/60'"
                            >
                                {{ spec }}
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-[#f7f2e9] px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#6d7f5d]">
                        Facilități
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Facilitățile ajută clientul să decidă mai repede.
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        Această secțiune poate include dotări, reguli, servicii extra sau beneficii ale locației.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <article
                        v-for="facility in content.facilities"
                        :key="facility.title"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-black text-white">
                            ✓
                        </div>

                        <h3 class="mt-5 text-xl font-semibold">
                            {{ facility.title }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-black/60">
                            {{ facility.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#6d7f5d]">
                        Galerie
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Imaginile vând experiența înaintea textului.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Pentru turism, galeria este esențială. Poți înlocui aceste zone cu fotografii reale ale locației.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-4">
                    <div
                        v-for="item in content.gallery"
                        :key="item.title"
                        class="min-h-72 rounded-[2rem] bg-gradient-to-br from-[#1f261b] via-[#6d7f5d] to-[#d8c3a5] p-5 text-white"
                    >
                        <p class="text-xs uppercase tracking-[0.25em] text-white/50">
                            {{ item.subtitle }}
                        </p>

                        <h3 class="mt-44 text-2xl font-semibold">
                            {{ item.title }}
                        </h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#f7f2e9] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#6d7f5d]">
                        În apropiere
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Arată ce poate face turistul în zonă.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Pentru cazări, atracțiile locale sunt un motiv important de rezervare.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="place in content.nearby"
                        :key="place.title"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <p class="w-fit rounded-full bg-[#f7f2e9] px-3 py-1 text-xs font-semibold text-[#6d7f5d]">
                            {{ place.distance }}
                        </p>

                        <h3 class="mt-5 text-2xl font-semibold">
                            {{ place.title }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ place.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#6d7f5d]">
                        Rezervare
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Proces simplu pentru cereri de rezervare.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Clientul înțelege pașii înainte să trimită cererea, iar tu primești informații mai clare.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-4">
                    <article
                        v-for="step in content.bookingSteps"
                        :key="step.number"
                        class="rounded-[2rem] border border-black/10 bg-[#f7f2e9] p-6"
                    >
                        <p class="text-sm font-semibold text-[#6d7f5d]">
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

        <section class="bg-[#f7f2e9] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#6d7f5d]">
                        Recenzii
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Recenziile cresc încrederea înainte de rezervare.
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="review in content.reviews"
                        :key="review.name"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <p class="leading-7 text-black/60">
                            “{{ review.text }}”
                        </p>

                        <p class="mt-6 font-semibold">
                            {{ review.name }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#6d7f5d]">
                        FAQ
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Întrebări utile pentru turiști.
                    </h2>
                </div>

                <div class="grid gap-4">
                    <details
                        v-for="item in content.faq"
                        :key="item.question"
                        class="group rounded-2xl border border-black/10 bg-[#f7f2e9] p-5"
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
                            Pensiuni
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Cabane
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Apartamente
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Tururi locale
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
