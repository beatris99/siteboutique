<template>
    <section id="faq" class="bg-[#f7f4ef] py-24">
        <div class="mx-auto max-w-4xl px-6">
            <SectionTitle
                :eyebrow="section.eyebrow"
                :title="section.title"
                :description="section.description"
                wrapper-class="mb-12 max-w-3xl"
            />

            <div class="grid gap-4">
                <details
                    v-for="item in section.items"
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
