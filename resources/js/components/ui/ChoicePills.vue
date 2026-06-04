<template>
    <div class="space-y-3">
        <p
            v-if="label"
            class="text-sm font-semibold"
            :class="dark ? 'text-white/70' : 'text-black/70'"
        >
            {{ label }}
        </p>

        <div :class="gridClass">
            <button
                v-for="option in options"
                :key="option.value"
                type="button"
                class="rounded-2xl border px-4 py-3 text-left text-sm font-semibold transition"
                :class="buttonClass(option.value)"
                @click="$emit('update:modelValue', option.value)"
            >
                <span>{{ option.label }}</span>

                <span
                    v-if="option.description"
                    class="mt-1 block text-xs font-normal opacity-70"
                >
                    {{ option.description }}
                </span>
            </button>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    label: {
        type: String,
        default: "",
    },
    modelValue: {
        type: [String, Number, Boolean],
        default: "",
    },
    options: {
        type: Array,
        required: true,
    },
    dark: {
        type: Boolean,
        default: true,
    },
    gridClass: {
        type: String,
        default: "grid gap-2 sm:grid-cols-3",
    },
});

defineEmits(["update:modelValue"]);

function buttonClass(value) {
    const isSelected = props.modelValue === value;

    if (props.dark) {
        return isSelected
            ? "border-white bg-white text-black"
            : "border-white/10 bg-white/10 text-white hover:bg-white/20";
    }

    return isSelected
        ? "border-black bg-black text-white"
        : "border-black/10 bg-white text-black hover:border-black/30";
}
</script>
