<template>
    <section class="bg-[#f7f4ef] py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <SectionTitle
                        :eyebrow="section.eyebrow"
                        :title="section.title"
                        :description="section.description"
                        wrapper-class="sticky top-8"
                    />
                </div>

                <div class="grid gap-5 md:grid-cols-2">
                    <article
                        v-for="item in section.items"
                        :key="item.title"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-black text-white">
                            ✓
                        </div>

                        <h3 class="mt-5 text-xl font-semibold">
                            {{ item.title }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-black/60">
                            {{ item.description }}
                        </p>
                    </article>
                </div>
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
