<template>
    <textarea
        v-if="type === 'textarea'"
        :value="modelValue"
        :rows="rows"
        :placeholder="placeholder"
        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 outline-none placeholder:text-white/40"
        @input="$emit('update:modelValue', $event.target.value)"
    />

    <input
        v-else
        :value="modelValue"
        :type="type"
        :placeholder="placeholder"
        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 outline-none placeholder:text-white/40"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>

<script setup>
defineProps({
    modelValue: {
        type: String,
        default: '',
    },
    type: {
        type: String,
        default: 'text',
    },
    placeholder: {
        type: String,
        default: '',
    },
    rows: {
        type: Number,
        default: 5,
    },
})

defineEmits(['update:modelValue'])
</script>
