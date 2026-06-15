<template>
    <section id="live-sites" class="bg-[#f7f4ef] px-4 py-16 sm:px-6 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#a67c3a]">
                Proiecte reale
            </p>

            <h2 class="mt-4 max-w-3xl text-3xl font-semibold leading-tight tracking-tight text-[#1f1f1f] sm:text-4xl lg:text-5xl">
                Nu doar machete. Site-uri reale, online, care aduc clienți.
            </h2>

            <p class="mt-5 max-w-2xl text-base leading-8 text-black/60">
                Fiecare model din configurator pornește de la muncă reală, livrată pentru afaceri din România. Iată un exemplu pe care îl poți deschide chiar acum.
            </p>

            <div class="mt-10 grid gap-6 lg:grid-cols-2">
                <article
                    v-for="site in liveSites"
                    :key="site.name"
                    class="group flex flex-col overflow-hidden rounded-[2rem] border border-black/10 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl"
                >
                    <div
                        class="flex items-center justify-between gap-3 px-6 pt-6"
                    >
                        <div>
                            <p class="text-sm uppercase tracking-[0.2em] text-black/40">
                                {{ site.category }}
                            </p>
                            <h3 class="mt-2 text-2xl font-semibold text-[#1f1f1f]">
                                {{ site.name }}
                            </h3>
                        </div>

                        <span
                            v-if="site.status === 'live'"
                            class="inline-flex shrink-0 items-center gap-2 rounded-full bg-[#0f766e]/10 px-3 py-1 text-xs font-semibold text-[#0f766e]"
                        >
                            <span class="h-2 w-2 animate-pulse rounded-full bg-[#0f766e] motion-reduce:animate-none"></span>
                            Site live
                        </span>

                        <span
                            v-else
                            class="inline-flex shrink-0 items-center rounded-full bg-black/5 px-3 py-1 text-xs font-semibold text-black/50"
                        >
                            În curând
                        </span>
                    </div>

                    <p class="mt-4 px-6 leading-7 text-black/60">
                        {{ site.description }}
                    </p>

                    <!-- Metrics row: înlocuiește cu cifrele reale din Google Analytics / Clarity -->
                    <div
                        v-if="site.metrics?.length"
                        class="mt-6 grid grid-cols-3 gap-px overflow-hidden border-y border-black/5 bg-black/5"
                    >
                        <div
                            v-for="metric in site.metrics"
                            :key="metric.label"
                            class="bg-white px-4 py-5 text-center"
                        >
                            <p class="text-2xl font-semibold text-[#a67c3a]">
                                {{ metric.value }}
                            </p>
                            <p class="mt-1 text-xs leading-4 text-black/50">
                                {{ metric.label }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-auto flex flex-col gap-3 p-6 sm:flex-row">
                        <a
                            v-if="site.url"
                            :href="site.url"
                            target="_blank"
                            rel="noopener"
                            class="flex-1 rounded-full bg-black px-5 py-3 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                        >
                            Deschide site-ul live →
                        </a>

                        <a
                            v-if="site.templateSlug"
                            :href="`/templates/${site.templateSlug}#builder`"
                            class="flex-1 rounded-full border border-[#a67c3a] px-5 py-3 text-center text-sm font-semibold text-[#a67c3a] transition hover:bg-[#a67c3a] hover:text-white"
                        >
                            Vreau un site ca acesta
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
/*
 * ÎNLOCUIEȘTE valorile de mai jos cu datele reale.
 * - url:        linkul real al site-ului
 * - metrics:    trage-le din Google Analytics (vizitatori/lună, % mobil)
 *               și din formular/Clarity (cereri primite). Cifre reale = încredere.
 * - templateSlug: leagă proiectul de modelul corespunzător din configurator.
 */
const liveSites = [
    {
        name: 'RentRide Brașov',
        category: 'Închirieri scutere',
        status: 'live',
        url: 'https://rentride-brasov.ro', // ← pune URL-ul real
        description:
            'Site complet pentru o firmă de închirieri din Brașov: flotă, tarife clare, rezervare rapidă și buton WhatsApp. Construit, lansat și urmărit cu Analytics.',
        templateSlug: 'rental-flow',
        metrics: [
            { value: '1.2k+', label: 'vizitatori / lună' }, // ← din Analytics
            { value: '70%', label: 'intră de pe mobil' },   // ← din Analytics
            { value: '40+', label: 'cereri rezervare' },     // ← din formular
        ],
    },
    {
        name: 'Magazin online demo',
        category: 'eCommerce',
        status: 'soon',
        url: null, // ← pune linkul demo după ce îl deployezi
        description:
            'Magazin online complet, cu coș, checkout securizat, facturi automate și panou de administrare. Demo public în pregătire.',
        templateSlug: 'premium-store',
        metrics: [],
    },
]
</script>
