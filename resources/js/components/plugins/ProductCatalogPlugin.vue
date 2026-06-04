<template>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <article
            v-for="product in products"
            :key="product.name"
            class="overflow-hidden rounded-[2rem] border border-black/10 bg-white"
        >
            <img
                v-if="product.image"
                :src="product.image"
                :alt="product.name"
                class="h-56 w-full object-cover"
            />

            <div class="p-5">
                <h3 class="text-xl font-semibold">{{ product.name }}</h3>
                <p class="mt-2 text-sm text-black/60">
                    {{ product.description }}
                </p>
                <p class="mt-4 text-2xl font-semibold">{{ product.price }}</p>
            </div>
        </article>
    </div>
</template>

<script setup>
defineProps({
    products: {
        type: Array,
        default: () => [],
    },
});
</script>
