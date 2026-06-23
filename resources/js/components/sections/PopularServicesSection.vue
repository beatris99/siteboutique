<template>
    <section class="bg-white px-4 py-12 sm:px-6 lg:py-16">
        <div class="mx-auto max-w-7xl">
            <div class="rounded-[2rem] border border-black/10 bg-[#f7f4ef] p-6 shadow-[0_18px_60px_rgba(22,32,51,0.06)] sm:p-8">
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[#8b6f47]">
                    {{ section.eyebrow }}
                </p>

                <h2 class="mt-3 max-w-3xl text-3xl font-semibold leading-tight text-[#171717] sm:text-4xl">
                    {{ section.title }}
                </h2>

                <p v-if="section.description" class="mt-4 max-w-3xl leading-7 text-black/60">
                    {{ section.description }}
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a
                        v-for="item in section.items"
                        :key="item.href"
                        :href="item.href"
                        class="rounded-full border border-black/10 bg-white px-4 py-3 text-sm font-semibold text-[#171717] transition hover:-translate-y-0.5 hover:border-[#a67c3a] hover:text-[#8b6f47]"
                    >
                        {{ item.label }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    section: {
        type: Object,
        required: true,
    },
})
</script>
