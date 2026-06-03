<template>
    <section id="what-you-get" class="bg-black py-24 text-white">
        <div class="mx-auto max-w-7xl px-6">
            <SectionTitle
                :eyebrow="section.eyebrow"
                :title="section.title"
                :description="section.description"
                wrapper-class="mb-12 max-w-4xl"
                dark
            />

            <div class="grid gap-6 md:grid-cols-3">
                <article
                    v-for="item in section.items"
                    :key="item.title"
                    class="rounded-[2rem] border border-white/10 bg-white/10 p-6"
                >
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-black">
                        ✓
                    </div>

                    <h3 class="mt-6 text-2xl font-semibold">
                        {{ item.title }}
                    </h3>

                    <p class="mt-4 text-sm leading-6 text-white/60">
                        {{ item.description }}
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
