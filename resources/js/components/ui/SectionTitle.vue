<template>
    <div :class="wrapperClass">
        <p
            class="text-sm uppercase tracking-[0.25em]"
            :class="dark ? 'text-white/40' : 'text-[#8b6f47]'"
        >
            {{ eyebrow }}
        </p>

        <h2
            class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl"
            :class="dark ? 'text-white' : 'text-black'"
        >
            {{ title }}
        </h2>

        <p
            v-if="description"
            class="mt-4 max-w-3xl leading-7"
            :class="dark ? 'text-white/60' : 'text-black/60'"
        >
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
        default: '',
    },
    dark: {
        type: Boolean,
        default: false,
    },
})
</script>
