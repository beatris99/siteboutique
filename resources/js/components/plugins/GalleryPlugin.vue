<template>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <figure
            v-for="image in images"
            :key="image.src"
            class="overflow-hidden rounded-[2rem] bg-[#f7f4ef]"
        >
            <img
                :src="image.src"
                :alt="image.alt"
                class="h-64 w-full object-cover"
            />

            <figcaption v-if="image.caption" class="p-4 text-sm text-black/60">
                {{ image.caption }}
            </figcaption>
        </figure>
    </div>
</template>

<script setup>
defineProps({
    images: {
        type: Array,
        default: () => [],
    },
});
</script>
