<template>
    <section class="bg-white px-6 py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Materiale necesare
                    </p>

                    <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                        {{ info.title }}
                    </h2>

                    <p class="mt-5 leading-8 text-black/60">
                        {{ info.description }}
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div
                        v-for="item in info.requirements"
                        :key="item"
                        class="flex gap-3 rounded-2xl bg-[#f7f4ef] p-5 text-sm text-black/70"
                    >
                        <span class="text-[#8b6f47]">✓</span>
                        <span>{{ item }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    info: {
        type: Object,
        required: true,
    },
})
</script>
