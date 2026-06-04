<template>
    <section class="bg-white px-4 py-16 sm:px-6 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p
                        class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]"
                    >
                        Detalii model
                    </p>

                    <h2
                        class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl"
                    >
                        {{ template.name }} nu este doar demo. Este un punct de
                        pornire real.
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        Îl poți folosi ca model pentru site-ul tău sau îl poți
                        cumpăra ca template, dacă ești developer.
                    </p>
                </div>

                <div class="grid gap-6 lg:grid-cols-2">
                    <article class="rounded-[2rem] bg-black p-6 text-white">
                        <p
                            class="text-sm uppercase tracking-[0.25em] text-white/40"
                        >
                            Pentru client
                        </p>

                        <h3 class="mt-4 text-3xl font-semibold">Ți-l fac eu</h3>

                        <p class="mt-4 text-white/60">
                            Adaptez modelul cu textele, imaginile, culorile și
                            datele afacerii tale.
                        </p>

                        <p class="mt-6 text-3xl font-semibold">
                            de la
                            {{ formatPrice(template.buildPriceFrom || 2500) }}
                        </p>

                        <ul class="mt-6 grid gap-3 text-sm text-white/70">
                            <li>✓ Adaptare pentru afacerea ta</li>
                            <li>✓ Setări pentru telefon și desktop</li>
                            <li>✓ Formular / contact / WhatsApp</li>
                            <li>✓ Pregătire pentru lansare</li>
                        </ul>
                    </article>

                    <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                        <p
                            class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]"
                        >
                            Pentru developer
                        </p>

                        <h3 class="mt-4 text-3xl font-semibold">
                            Cumpăr template-ul
                        </h3>

                        <p class="mt-4 text-black/60">
                            Primești structura și o folosești tu pentru
                            proiectele tale.
                        </p>

                        <p class="mt-6 text-3xl font-semibold">
                            {{ formatPrice(template.developerPrice || 490) }}
                        </p>

                        <ul class="mt-6 grid gap-3 text-sm text-black/60">
                            <li>✓ Template Laravel + Vue + Tailwind</li>
                            <li>✓ Structură pe componente</li>
                            <li>✓ Ușor de adaptat</li>
                            <li>✓ Bază pentru proiecte rapide</li>
                        </ul>
                    </article>
                </div>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <h3 class="text-2xl font-semibold">Potrivit pentru</h3>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="item in template.idealFor"
                            :key="item"
                            class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-black/60"
                        >
                            {{ item }}
                        </span>
                    </div>
                </article>

                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <h3 class="text-2xl font-semibold">Include</h3>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="item in template.includes"
                            :key="item"
                            class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-black/60"
                        >
                            {{ item }}
                        </span>
                    </div>
                </article>

                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <h3 class="text-2xl font-semibold">Durată estimată</h3>

                    <p class="mt-4 text-3xl font-semibold">
                        {{ template.deliveryTime || "7-14 zile" }}
                    </p>

                    <p class="mt-3 text-sm text-black/50">
                        Durata exactă depinde de materiale și funcționalități.
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
