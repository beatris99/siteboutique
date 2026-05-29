<template>
    <div class="mb-10 grid gap-3 md:grid-cols-5">
        <button
            v-for="category in categories"
            :key="category.key"
            type="button"
            class="rounded-2xl border p-4 text-left transition hover:-translate-y-0.5 hover:shadow-lg"
            :class="selectedCategoryKey === category.key
                ? 'border-black bg-black text-white'
                : 'border-black/10 bg-white text-black'"
            @click="$emit('select-category', category.key)"
        >
            <span class="text-sm font-semibold">
                {{ category.label }}
            </span>

            <span
                class="mt-2 block text-xs leading-5"
                :class="selectedCategoryKey === category.key ? 'text-white/60' : 'text-black/50'"
            >
                {{ category.description }}
            </span>
        </button>
    </div>
</template>

<script setup>
defineProps({
    categories: {
        type: Array,
        required: true,
    },
    selectedCategoryKey: {
        type: String,
        required: true,
    },
})

defineEmits(['select-category'])
</script>
