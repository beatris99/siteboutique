<template>
    <div class="inline-flex rounded-full border border-black/10 bg-white p-1">
        <button
            v-for="language in languages"
            :key="language.value"
            type="button"
            class="rounded-full px-4 py-2 text-sm font-semibold transition"
            :class="
                modelValue === language.value
                    ? 'bg-black text-white'
                    : 'text-black/60 hover:text-black'
            "
            @click="$emit('update:modelValue', language.value)"
        >
            {{ language.label }}
        </button>
    </div>
</template>

<script setup>
defineProps({
    modelValue: {
        type: String,
        default: "ro",
    },
    languages: {
        type: Array,
        default: () => [
            { label: "RO", value: "ro" },
            { label: "EN", value: "en" },
        ],
    },
});

defineEmits(["update:modelValue"]);
</script>
