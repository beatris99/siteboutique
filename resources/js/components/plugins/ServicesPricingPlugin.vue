<template>
    <div class="grid gap-4 md:grid-cols-2">
        <article
            v-for="service in services"
            :key="service.name"
            class="rounded-[2rem] border border-black/10 bg-white p-6"
        >
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-xl font-semibold">{{ service.name }}</h3>
                    <p class="mt-2 text-sm leading-6 text-black/60">{{ service.description }}</p>
                </div>

                <p class="shrink-0 rounded-full bg-[#f7f4ef] px-4 py-2 text-sm font-semibold">
                    {{ service.price }}
                </p>
            </div>
        </article>
    </div>
</template>

<script setup>
defineProps({
    services: {
        type: Array,
        default: () => [],
    },
})
</script>