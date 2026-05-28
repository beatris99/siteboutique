<template>
    <article
        class="cursor-pointer rounded-[2rem] border bg-white p-5 transition hover:-translate-y-1 hover:shadow-xl"
        :class="isSelected ? 'border-black' : 'border-black/10'"
        @click="$emit('select', template.id)"
    >
        <div class="h-52 rounded-[1.5rem] bg-gradient-to-br from-[#111] to-[#8b6f47] p-5 text-white">
            <p class="text-sm text-white/60">
                {{ template.category }}
            </p>

            <h3 class="mt-16 text-3xl font-semibold">
                {{ template.name }}
            </h3>
        </div>

        <h4 class="mt-6 text-xl font-semibold">
            {{ template.name }}
        </h4>

        <p class="mt-2 text-sm leading-6 text-black/50">
            {{ template.description }}
        </p>

        <div class="mt-6 flex items-center justify-between">
            <span class="text-sm text-black/50">de la</span>
            <strong class="text-xl">{{ template.basePrice }} lei</strong>
        </div>
    </article>
</template>

<script setup>
defineProps({
    template: {
        type: Object,
        required: true,
    },
    isSelected: {
        type: Boolean,
        default: false,
    },
})

defineEmits(['select'])
</script>
