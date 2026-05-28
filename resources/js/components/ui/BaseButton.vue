<template>
    <component
        :is="href ? 'a' : 'button'"
        :href="href"
        :type="href ? null : type"
        :disabled="disabled"
        class="inline-flex items-center justify-center rounded-full px-6 py-3 text-sm font-medium transition disabled:cursor-not-allowed disabled:opacity-60"
        :class="variantClasses"
    >
        <slot />
    </component>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    href: {
        type: String,
        default: null,
    },
    type: {
        type: String,
        default: 'button',
    },
    variant: {
        type: String,
        default: 'dark',
    },
    disabled: {
        type: Boolean,
        default: false,
    },
})

const variantClasses = computed(() => {
    return {
        dark: 'bg-black text-white hover:bg-[#8b6f47]',
        light: 'bg-white text-black hover:bg-[#d8c3a5]',
        outline: 'border border-black/10 bg-white text-black hover:border-black/30',
    }[props.variant]
})
</script>
