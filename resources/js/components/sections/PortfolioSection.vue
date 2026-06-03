<template>
    <section id="portfolio" class="bg-black py-24 text-white">
        <div class="mx-auto max-w-7xl px-6">
            <SectionTitle
                :eyebrow="section.eyebrow"
                :title="section.title"
                :description="section.description"
                wrapper-class="mb-12 max-w-4xl"
                dark
            />

            <div class="grid gap-6 md:grid-cols-2">
                <article
                    v-for="item in section.items"
                    :key="item.title"
                    class="rounded-[2rem] border border-white/10 bg-white/10 p-6 transition hover:-translate-y-1 hover:bg-white/[0.14]"
                >
                    <div class="flex flex-col justify-between gap-4 md:flex-row md:items-start">
                        <div>
                            <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                                {{ item.category }}
                            </p>

                            <h3 class="mt-4 text-3xl font-semibold">
                                {{ item.title }}
                            </h3>
                        </div>

                        <span class="w-fit rounded-full bg-white px-3 py-1 text-xs font-semibold text-black">
                            Demo
                        </span>
                    </div>

                    <p class="mt-5 leading-7 text-white/60">
                        {{ item.description }}
                    </p>

                    <div class="mt-6 flex flex-wrap gap-2">
                        <span
                            v-for="tag in item.tags"
                            :key="tag"
                            class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70"
                        >
                            {{ tag }}
                        </span>
                    </div>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a
                            :href="`/templates/${item.templateSlug}`"
                            class="rounded-full bg-white px-5 py-3 text-center text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                        >
                            Vezi demo
                        </a>

                        <a
                            :href="`/templates/${item.templateSlug}#builder`"
                            class="rounded-full border border-white/20 px-5 py-3 text-center text-sm font-semibold text-white transition hover:border-white/50"
                        >
                            Configurează asemănător
                        </a>
                    </div>

                    <p class="mt-5 text-xs text-white/35">
                        Bazat pe template-ul {{ item.templateName }}.
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
import SectionTitle from '../ui/SectionTitle.vue'

defineProps({
    section: {
        type: Object,
        required: true,
    },
})
</script>
