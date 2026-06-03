<template>
    <div class="bg-[#faf4ed] text-[#171717]">
        <section class="relative overflow-hidden px-6 py-24">
            <div class="absolute right-0 top-0 h-96 w-96 rounded-full bg-[#e7b98f]/50 blur-3xl"></div>
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
                            href="#shop-products"
                            class="rounded-full bg-black px-7 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#a86f3f]"
                        >
                            {{ content.hero.primaryButton }}
                        </a>

                        <a
                            href="#how-to-order"
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
                        <div class="flex items-center gap-2 border-b border-black/10 bg-[#faf4ed] px-4 py-3">
                            <span class="h-3 w-3 rounded-full bg-red-300"></span>
                            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                            <span class="h-3 w-3 rounded-full bg-green-300"></span>

                            <div class="ml-3 flex-1 rounded-full bg-white px-3 py-1 text-[10px] text-black/40">
                                ateliernatural.ro
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-[#2b1c16] via-[#a86f3f] to-[#e7b98f] p-6 text-white">
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
                                    <p class="text-xs text-white/50">Produse</p>
                                    <p class="mt-1 text-xl font-semibold">Locale</p>
                                </div>

                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Comenzi</p>
                                    <p class="mt-1 text-xl font-semibold">Simple</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 bg-white p-5">
                            <div
                                v-for="product in content.products.slice(0, 3)"
                                :key="product.name"
                                class="rounded-2xl bg-[#faf4ed] p-4"
                            >
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="font-semibold">
                                            {{ product.name }}
                                        </p>

                                        <p class="mt-1 text-xs text-black/50">
                                            {{ product.price }}
                                        </p>
                                    </div>

                                    <span class="rounded-full bg-black px-2 py-1 text-[10px] font-semibold text-white">
                                        {{ product.badge }}
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
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Categorii
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Categoriile ajută clientul să găsească rapid ce caută.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Pentru magazine mici, structura trebuie să fie simplă, ușor de parcurs și ușor de adaptat.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <article
                        v-for="category in content.categories"
                        :key="category.name"
                        class="rounded-[2rem] border border-black/10 bg-[#faf4ed] p-6 transition hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-black text-white">
                            ✦
                        </div>

                        <h3 class="mt-6 text-2xl font-semibold">
                            {{ category.name }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ category.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section id="shop-products" class="bg-[#faf4ed] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Produse
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Produse afișate curat, cu preț și detalii utile.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Acest template poate funcționa ca magazin simplu, catalog online sau punct de pornire pentru ecommerce complet.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-4">
                    <article
                        v-for="product in content.products"
                        :key="product.name"
                        class="rounded-[2rem] border border-black/10 bg-white p-5 transition hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div class="flex min-h-48 flex-col justify-between rounded-[1.5rem] bg-gradient-to-br from-[#2b1c16] via-[#a86f3f] to-[#e7b98f] p-5 text-white">
                            <span class="w-fit rounded-full bg-white px-3 py-1 text-xs font-semibold text-black">
                                {{ product.badge }}
                            </span>

                            <div>
                                <p class="text-sm text-white/60">
                                    Produs
                                </p>

                                <h3 class="mt-2 text-2xl font-semibold">
                                    {{ product.name }}
                                </h3>
                            </div>
                        </div>

                        <p class="mt-5 text-sm leading-6 text-black/60">
                            {{ product.description }}
                        </p>

                        <p class="mt-5 text-2xl font-semibold text-[#a86f3f]">
                            {{ product.price }}
                        </p>

                        <div class="mt-5 flex flex-wrap gap-2">
                            <span
                                v-for="spec in product.specs"
                                :key="spec"
                                class="rounded-full bg-[#faf4ed] px-3 py-1 text-xs text-black/60"
                            >
                                {{ spec }}
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-white px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Avantaje
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Bun pentru business-uri mici care vor să înceapă simplu.
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        Nu toate magazinele au nevoie din prima de checkout complex. Uneori este mai eficient să începi cu un catalog clar și cereri de comandă.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <article
                        v-for="benefit in content.benefits"
                        :key="benefit.title"
                        class="rounded-[2rem] border border-black/10 bg-[#faf4ed] p-6"
                    >
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-black text-white">
                            ✓
                        </div>

                        <h3 class="mt-5 text-xl font-semibold">
                            {{ benefit.title }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-black/60">
                            {{ benefit.description }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section id="how-to-order" class="bg-[#faf4ed] px-6 py-24">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Cum se comandă
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Proces simplu pentru comenzi fără complicații.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Ideal pentru branduri care vor să valideze rapid produsele înainte de un ecommerce complet.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-4">
                    <article
                        v-for="step in content.howToOrder"
                        :key="step.number"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <p class="text-sm font-semibold text-[#a86f3f]">
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

        <section class="bg-white px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Funcționalități
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Poate rămâne simplu sau poate crește în timp.
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        Simple Shop este potrivit pentru început, dar poate fi extins ulterior cu funcții ecommerce mai avansate.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div
                        v-for="feature in content.shopFeatures"
                        :key="feature"
                        class="flex gap-3 rounded-2xl bg-[#faf4ed] p-5 text-sm text-black/70"
                    >
                        <span class="text-[#a86f3f]">✓</span>
                        <span>{{ feature }}</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#faf4ed] px-6 py-24">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        FAQ
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        Întrebări frecvente pentru magazine mici.
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
                            Handmade
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Produse locale
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Cosmetice
                        </span>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70">
                            Catalog online
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
