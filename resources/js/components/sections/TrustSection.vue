<template>
    <section class="bg-[#f7f4ef] py-16">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid gap-4 md:grid-cols-4">
                <article
                    v-for="item in items"
                    :key="item.title"
                    class="rounded-[1.5rem] border border-black/10 bg-white p-5"
                >
                    <p class="text-2xl font-semibold text-[#8b6f47]">
                        {{ item.value }}
                    </p>

                    <h3 class="mt-3 font-semibold">
                        {{ item.title }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-black/60">
                        {{ item.description }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    items: {
        type: Array,
        required: true,
    },
})
</script>
