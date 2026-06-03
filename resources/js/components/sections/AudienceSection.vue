<template>
    <section id="audience" class="bg-[#f7f4ef] py-24">
        <div class="mx-auto max-w-7xl px-6">
            <SectionTitle
                :eyebrow="section.eyebrow"
                :title="section.title"
                :description="section.description"
                wrapper-class="mb-12 max-w-4xl"
            />

            <div class="grid gap-6 md:grid-cols-3">
                <article
                    v-for="group in section.groups"
                    :key="group.title"
                    class="rounded-[2rem] border border-black/10 bg-white p-6 transition hover:-translate-y-1 hover:shadow-xl"
                >
                    <h3 class="text-2xl font-semibold">
                        {{ group.title }}
                    </h3>

                    <div class="mt-5 flex flex-wrap gap-2">
                        <span
                            v-for="example in group.examples"
                            :key="example"
                            class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60"
                        >
                            {{ example }}
                        </span>
                    </div>
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
