<template>
    <section class="bg-[#f7f4ef] px-6 py-20">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.9fr] lg:items-center">
                <div>
                    <a
                        href="/#templates"
                        class="text-sm text-black/50 transition hover:text-black"
                    >
                        ← Înapoi la template-uri
                    </a>

                    <p class="mt-8 inline-flex rounded-full border border-black/10 bg-white px-4 py-2 text-sm text-black/60">
                        {{ template.category }}
                    </p>

                    <h1 class="mt-6 max-w-3xl text-5xl font-semibold tracking-tight md:text-7xl">
                        {{ template.name }}
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-black/60">
                        {{ template.description }}
                    </p>

                    <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                        <a
                            href="#builder"
                            class="rounded-full bg-black px-7 py-4 text-center text-sm font-medium text-white transition hover:bg-[#8b6f47]"
                        >
                            Configurează acest template
                        </a>

                        <a
                            href="#contact"
                            class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-medium transition hover:border-black/30"
                        >
                            Vreau ofertă
                        </a>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-black/10 bg-black p-4 shadow-xl">
                    <TemplatePreviewMockup :template="template" />
                </div>
            </div>

            <div class="mt-16 grid gap-6 md:grid-cols-3">
                <article class="rounded-[2rem] border border-black/10 bg-white p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Potrivit pentru
                    </p>

                    <div class="mt-5 flex flex-wrap gap-2">
                        <span
                            v-for="item in template.idealFor || []"
                            :key="item"
                            class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60"
                        >
                            {{ item }}
                        </span>
                    </div>
                </article>

                <article class="rounded-[2rem] border border-black/10 bg-white p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Pagini incluse
                    </p>

                    <div class="mt-5 flex flex-wrap gap-2">
                        <span
                            v-for="page in template.pages || []"
                            :key="page"
                            class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60"
                        >
                            {{ page }}
                        </span>
                    </div>
                </article>

                <article class="rounded-[2rem] border border-black/10 bg-white p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Detalii rapide
                    </p>

                    <div class="mt-5 grid gap-3 text-sm text-black/60">
                        <div class="flex justify-between">
                            <span>Preț bază</span>
                            <strong class="text-black">{{ template.basePrice }} lei</strong>
                        </div>

                        <div class="flex justify-between">
                            <span>Livrare</span>
                            <strong class="text-black">{{ template.deliveryTime || 'Estimativ' }}</strong>
                        </div>

                        <div class="flex justify-between">
                            <span>Categorie</span>
                            <strong class="text-black">{{ template.category }}</strong>
                        </div>
                    </div>
                </article>
            </div>

            <div class="mt-6 rounded-[2rem] border border-black/10 bg-white p-6">
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    Ce include
                </p>

                <ul class="mt-6 grid gap-4 md:grid-cols-2">
                    <li
                        v-for="item in template.includes || []"
                        :key="item"
                        class="flex gap-3 rounded-2xl bg-[#f7f4ef] p-4 text-sm text-black/60"
                    >
                        <span class="text-[#8b6f47]">✓</span>
                        <span>{{ item }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script setup>
import TemplatePreviewMockup from '../ui/TemplatePreviewMockup.vue'

defineProps({
    template: {
        type: Object,
        required: true,
    },
})
</script>
