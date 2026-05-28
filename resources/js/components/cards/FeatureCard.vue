<template>
    <label
        class="flex cursor-pointer items-center justify-between rounded-2xl border border-black/10 p-5 transition hover:border-black/30"
    >
        <div class="flex items-center gap-4">
            <input
                type="checkbox"
                :checked="isSelected"
                class="h-5 w-5 rounded border-black/20"
                @change="$emit('toggle', feature.id)"
            />

            <div>
                <p class="font-medium">
                    {{ feature.name }}
                </p>

                <p class="mt-1 text-sm text-black/50">
                    {{ feature.description }}
                </p>
            </div>
        </div>

        <span class="font-semibold">
            +{{ feature.price }} lei
        </span>
    </label>
</template>

<script setup>
defineProps({
    feature: {
        type: Object,
        required: true,
    },
    isSelected: {
        type: Boolean,
        default: false,
    },
})

defineEmits(['toggle'])
</script>
