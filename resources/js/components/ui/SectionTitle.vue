<template>
    <div :class="wrapperClass">
        <p class="text-sm uppercase tracking-[0.25em]" :class="eyebrowClass">
            {{ eyebrow }}
        </p>

        <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
            {{ title }}
        </h2>

        <p v-if="description" class="mt-5 text-black/60">
            {{ description }}
        </p>
    </div>
</template>

<script setup>
defineProps({
    eyebrow: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    description: {
        type: String,
        default: '',
    },
    wrapperClass: {
        type: String,
        default: 'max-w-2xl',
    },
    eyebrowClass: {
        type: String,
        default: 'text-[#8b6f47]',
    },
})
</script>
