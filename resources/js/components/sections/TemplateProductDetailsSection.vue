<template>
    <section class="bg-white px-4 py-16 sm:px-6 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Detalii model
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                        {{ template.name }} este punctul de pornire pentru site-ul tău.
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        Modelul nu este vândut ca template separat momentan. Îl folosim ca bază, iar eu îl adaptez cu textele, imaginile, culorile, paginile și funcționalitățile potrivite pentru afacerea ta.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-black p-6 text-white sm:p-8">
                    <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                        Serviciu complet
                    </p>

                    <h3 class="mt-4 text-3xl font-semibold">
                        Ți-l fac eu
                    </h3>

                    <p class="mt-4 max-w-2xl leading-8 text-white/60">
                        Alegi modelul, pachetul și funcțiile, iar după cerere stabilim împreună varianta finală. Site-ul este construit, adaptat și pregătit pentru lansare.
                    </p>

                    <p class="mt-6 text-3xl font-semibold">
                        de la {{ formatPrice(template.buildPriceFrom || template.basePrice || 2500) }}
                    </p>

                    <ul class="mt-6 grid gap-3 text-sm text-white/70">
                        <li>✓ Adaptare pentru afacerea ta</li>
                        <li>✓ Texte, imagini, culori și structură personalizate</li>
                        <li>✓ Design responsive pentru telefon și desktop</li>
                        <li>✓ Formular de contact, WhatsApp sau alte funcții alese</li>
                        <li>✓ Pregătire pentru lansare și SEO basic</li>
                    </ul>

                    <a
                        href="#builder"
                        class="mt-8 inline-flex rounded-full bg-white px-7 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    >
                        Configurează acest model
                    </a>
                </div>

                <!--
                    TEMPORAR ASCUNS - CARD TEMPLATE PENTRU DEVELOPERI
                    Reactivăm când SiteGo va vinde și template-uri separat.

                    Aici poți pune înapoi cardul cu:
                    - developerPrice
                    - cumpărare template
                    - fișiere incluse
                    - licență
                    - documentație
                -->
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Pagini incluse
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
                        Potrivit pentru
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
                        Termen estimativ
                    </p>

                    <p class="mt-4 text-3xl font-semibold">
                        {{ template.deliveryTime || "5-10 zile" }}
                    </p>

                    <p class="mt-3 leading-7 text-black/60">
                        Termenul final depinde de numărul de pagini, funcționalități și materialele pe care le ai pregătite.
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    template: {
        type: Object,
        required: true,
    },
});

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}
</script>
