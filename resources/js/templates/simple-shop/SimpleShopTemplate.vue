<template>
    <div class="bg-[#faf4ed] text-[#171717]">
        <section class="relative overflow-hidden px-4 py-14 sm:px-6 sm:py-20 lg:py-24">
            <div class="absolute right-0 top-0 h-80 w-80 rounded-full bg-[#e7b98f]/50 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-80 w-80 rounded-full bg-white blur-3xl"></div>

            <div class="relative mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <a
                        href="/#templates"
                        class="text-sm text-black/50 transition hover:text-black"
                    >
                        ← Înapoi la template-uri
                    </a>

                    <p class="mt-8 inline-flex rounded-full border border-black/10 bg-white px-4 py-2 text-sm text-black/60">
                        {{ content.hero.eyebrow }}
                    </p>

                    <h1 class="mt-6 max-w-4xl text-4xl font-semibold tracking-tight sm:text-5xl lg:text-7xl">
                        {{ content.hero.title }}
                    </h1>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-black/60 sm:text-lg">
                        {{ content.hero.description }}
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="#shop-products"
                            class="rounded-full bg-black px-7 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#a86f3f]"
                        >
                            {{ content.hero.primaryButton }}
                        </a>

                        <a
                            href="#order-demo"
                            class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-semibold transition hover:border-black/30"
                        >
                            {{ content.hero.secondaryButton }}
                        </a>
                    </div>

                    <div class="mt-8 grid gap-3 sm:grid-cols-3">
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

                <div class="rounded-[2rem] border border-black/10 bg-white p-3 shadow-2xl sm:p-4">
                    <div class="overflow-hidden rounded-[1.5rem] border border-black/10 bg-white">
                        <div class="flex items-center gap-2 border-b border-black/10 bg-[#faf4ed] px-4 py-3">
                            <span class="h-3 w-3 rounded-full bg-red-300"></span>
                            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                            <span class="h-3 w-3 rounded-full bg-green-300"></span>

                            <div class="ml-3 flex-1 rounded-full bg-white px-3 py-1 text-[10px] text-black/40">
                                millafashion.ro
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-[#2b1c16] via-[#a86f3f] to-[#e7b98f] p-5 text-white sm:p-6">
                            <p class="text-sm text-white/60">
                                Colecție nouă
                            </p>

                            <h2 class="mt-16 text-4xl font-semibold sm:mt-20">
                                Produse clare. Comandă simplă.
                            </h2>

                            <p class="mt-4 max-w-md leading-7 text-white/70">
                                Template pentru branduri mici care vor catalog, produse și cereri de comandă.
                            </p>

                            <div class="mt-8 grid grid-cols-2 gap-3">
                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Produse</p>
                                    <p class="mt-1 text-xl font-semibold">32</p>
                                </div>

                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Comandă</p>
                                    <p class="mt-1 text-xl font-semibold">Rapidă</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 bg-white p-4 sm:p-5">
                            <div
                                v-for="product in products.slice(0, 3)"
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

        <section class="bg-white px-4 py-14 sm:px-6 sm:py-20">
            <div class="mx-auto max-w-7xl">
                <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                            Categorii
                        </p>

                        <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
                            Clientul găsește rapid ce caută.
                        </h2>
                    </div>

                    <a
                        href="#shop-products"
                        class="inline-flex w-fit rounded-full bg-black px-6 py-3 text-sm font-semibold text-white"
                    >
                        Vezi produse
                    </a>
                </div>

                <div class="-mx-4 mt-8 overflow-x-auto px-4 sm:mx-0 sm:px-0">
                    <div class="flex w-max min-w-full gap-3 pb-3">
                        <button
                            v-for="category in categories"
                            :key="category.key"
                            type="button"
                            class="shrink-0 whitespace-nowrap rounded-full border px-6 py-3 text-sm font-semibold transition"
                            :class="selectedCategoryKey === category.key
                ? 'border-black bg-black text-white'
                : 'border-black/10 bg-white text-black hover:border-black/30'"
                            @click="$emit('select-category', category.key)"
                        >
                            {{ category.label }}
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="shop-products" class="bg-[#faf4ed] px-4 py-14 sm:px-6 sm:py-20">
            <div class="mx-auto max-w-7xl">
                <div class="mb-8 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Produse
                    </p>

                    <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
                        Produse cu poză, preț și acțiune clară.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Clientul vede produsul, prețul și poate cere comanda. Simplu, fără magazin complicat din prima zi.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <article
                        v-for="product in products"
                        :key="product.name"
                        class="rounded-[2rem] border border-black/10 bg-white p-4 transition hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div
                            class="flex min-h-44 flex-col justify-between rounded-[1.5rem] p-5 text-white"
                            :class="product.gradient"
                        >
                            <span class="w-fit rounded-full bg-white px-3 py-1 text-xs font-semibold text-black">
                                {{ product.badge }}
                            </span>

                            <div>
                                <p class="text-xs text-white/60">
                                    {{ product.category }}
                                </p>

                                <h3 class="mt-2 text-2xl font-semibold">
                                    {{ product.name }}
                                </h3>
                            </div>
                        </div>

                        <p class="mt-4 text-sm leading-6 text-black/60">
                            {{ product.description }}
                        </p>

                        <div class="mt-5 flex items-center justify-between gap-3">
                            <p class="text-2xl font-semibold text-[#a86f3f]">
                                {{ product.price }}
                            </p>

                            <button
                                type="button"
                                class="rounded-full bg-black px-4 py-2 text-xs font-semibold text-white"
                            >
                                Adaugă
                            </button>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="order-demo" class="bg-white px-4 py-14 sm:px-6 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[1fr_0.8fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Comandă
                    </p>

                    <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
                        Coș simplu + cerere de comandă.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Bun pentru început: clientul alege produsele și trimite cererea. Ulterior poate fi extins cu plată online.
                    </p>

                    <div class="mt-6 grid gap-3 sm:grid-cols-3">
                        <div
                            v-for="step in orderSteps"
                            :key="step.number"
                            class="rounded-2xl bg-[#faf4ed] p-4"
                        >
                            <p class="text-sm font-semibold text-[#a86f3f]">
                                {{ step.number }}
                            </p>

                            <p class="mt-3 font-semibold">
                                {{ step.title }}
                            </p>

                            <p class="mt-2 text-sm leading-6 text-black/60">
                                {{ step.description }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-black/10 bg-[#faf4ed] p-5">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Coș demo
                    </p>

                    <div class="mt-5 grid gap-3">
                        <div
                            v-for="item in cartItems"
                            :key="item.name"
                            class="flex items-center justify-between gap-3 rounded-2xl bg-white p-4"
                        >
                            <div>
                                <p class="font-semibold">
                                    {{ item.name }}
                                </p>

                                <p class="text-sm text-black/50">
                                    {{ item.qty }} x {{ item.price }}
                                </p>
                            </div>

                            <p class="font-semibold">
                                {{ item.total }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 flex items-center justify-between border-t border-black/10 pt-5">
                        <span class="text-black/50">Total</span>
                        <strong class="text-2xl">388 lei</strong>
                    </div>

                    <button
                        type="button"
                        class="mt-5 w-full rounded-full bg-black px-6 py-4 text-sm font-semibold text-white"
                    >
                        Trimite cererea de comandă
                    </button>
                </div>
            </div>
        </section>

        <section class="bg-[#faf4ed] px-4 py-14 sm:px-6 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a86f3f]">
                        Ce include
                    </p>

                    <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
                        Simplu acum, extensibil mai târziu.
                    </h2>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div
                        v-for="feature in shopFeatures"
                        :key="feature"
                        class="flex gap-3 rounded-2xl bg-white p-5 text-sm text-black/70"
                    >
                        <span class="text-[#a86f3f]">✓</span>
                        <span>{{ feature }}</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-black px-4 py-14 text-white sm:px-6 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[1fr_0.8fr] lg:items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                        Template concret
                    </p>

                    <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-6xl">
                        Potrivit pentru magazine mici care vor să înceapă rapid.
                    </h2>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/60 sm:text-lg">
                        Include produse, categorii, coș demo, cerere de comandă și structură pentru extindere.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-white/10 p-6">
                    <p class="text-sm text-white/50">
                        Potrivit pentru
                    </p>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="item in ['Handmade', 'Produse locale', 'Cosmetice', 'Catalog online']"
                            :key="item"
                            class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70"
                        >
                            {{ item }}
                        </span>
                    </div>

                    <a
                        href="#builder"
                        class="mt-8 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    >
                        Configurează acest model
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

const categories = [
    {
        name: 'Îmbrăcăminte',
        description: 'Produse pe colecții, mărimi sau sezon.',
        gradient: 'bg-gradient-to-br from-[#2b1c16] to-[#e7b98f]',
    },
    {
        name: 'Cosmetice',
        description: 'Produse cu beneficii, ingrediente și preț.',
        gradient: 'bg-gradient-to-br from-pink-200 to-orange-100',
    },
    {
        name: 'Handmade',
        description: 'Produse locale, lucrate manual sau personalizate.',
        gradient: 'bg-gradient-to-br from-[#a86f3f] to-[#faf4ed]',
    },
    {
        name: 'Cadouri',
        description: 'Seturi, pachete și produse recomandate.',
        gradient: 'bg-gradient-to-br from-stone-200 to-[#e7b98f]',
    },
]

const products = [
    {
        name: 'Rochie de vară',
        category: 'Fashion',
        description: 'Produs prezentat clar, cu preț și acțiune rapidă.',
        price: '159 lei',
        badge: 'Nou',
        gradient: 'bg-gradient-to-br from-[#2b1c16] via-[#a86f3f] to-[#e7b98f]',
    },
    {
        name: 'Set cadou',
        category: 'Cadouri',
        description: 'Potrivit pentru pachete, oferte și recomandări.',
        price: '229 lei',
        badge: 'Popular',
        gradient: 'bg-gradient-to-br from-[#7c4a25] via-[#a86f3f] to-[#e7b98f]',
    },
    {
        name: 'Cremă naturală',
        category: 'Cosmetice',
        description: 'Descriere scurtă, beneficii și preț vizibil.',
        price: '79 lei',
        badge: 'Bio',
        gradient: 'bg-gradient-to-br from-pink-200 via-orange-100 to-[#e7b98f]',
    },
    {
        name: 'Geantă handmade',
        category: 'Handmade',
        description: 'Bun pentru produse unicat sau colecții mici.',
        price: '189 lei',
        badge: 'Limited',
        gradient: 'bg-gradient-to-br from-stone-300 via-[#a86f3f] to-[#2b1c16]',
    },
]

const orderSteps = [
    {
        number: '01',
        title: 'Alege produsul',
        description: 'Clientul vede produsul și îl adaugă în coș.',
    },
    {
        number: '02',
        title: 'Trimite cererea',
        description: 'Completează nume, telefon și mesaj.',
    },
    {
        number: '03',
        title: 'Confirmi comanda',
        description: 'Tu revii cu stoc, livrare și plată.',
    },
]

const cartItems = [
    {
        name: 'Rochie de vară',
        qty: '1',
        price: '159 lei',
        total: '159 lei',
    },
    {
        name: 'Set cadou',
        qty: '1',
        price: '229 lei',
        total: '229 lei',
    },
]

const shopFeatures = [
    'Categorii produse',
    'Carduri produse cu preț',
    'Coș demo / cerere comandă',
    'Formular contact',
    'Posibilitate plată online ulterior',
    'Administrare produse opțional',
]
</script>
