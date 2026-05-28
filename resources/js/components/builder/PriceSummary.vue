<template>
    <aside class="h-fit rounded-[2rem] border border-black/10 bg-[#f7f4ef] p-6 shadow-xl md:sticky md:top-28">
        <p class="text-sm text-black/50">Template selectat</p>
        <h3 class="mt-2 text-2xl font-semibold">{{ selectedTemplate.name }}</h3>

        <div class="mt-8 space-y-4">
            <div class="flex justify-between text-sm">
                <span>Template bază</span>
                <strong>{{ selectedTemplate.basePrice }} lei</strong>
            </div>

            <div
                v-for="feature in selectedFeatures"
                :key="feature.id"
                class="flex justify-between text-sm text-black/60"
            >
                <span>{{ feature.name }}</span>
                <span>{{ feature.price }} lei</span>
            </div>
        </div>

        <div class="my-6 border-t border-black/10"></div>

        <div class="flex items-end justify-between">
            <span class="text-black/50">Total estimativ</span>
            <strong class="text-4xl">{{ totalPrice }} lei</strong>
        </div>

        <a
            href="#contact"
            class="mt-8 block rounded-full bg-black px-6 py-4 text-center text-sm font-medium text-white transition hover:bg-[#8b6f47]"
        >
            Trimite cererea
        </a>
    </aside>
</template>

<script setup>
defineProps({
    selectedTemplate: {
        type: Object,
        required: true,
    },
    selectedFeatures: {
        type: Array,
        required: true,
    },
    totalPrice: {
        type: Number,
        required: true,
    },
})
</script>
