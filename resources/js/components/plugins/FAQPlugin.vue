<template>
    <div class="grid gap-4">
        <details
            v-for="item in items"
            :key="item.question"
            class="rounded-2xl border border-black/10 bg-white p-5"
        >
            <summary class="cursor-pointer font-semibold">
                {{ item.question }}
            </summary>

            <p class="mt-4 leading-7 text-black/60">
                {{ item.answer }}
            </p>
        </details>
    </div>
</template>

<script setup>
defineProps({
    items: {
        type: Array,
        default: () => [],
    },
});
</script>
