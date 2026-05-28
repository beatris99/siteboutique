<template>
    <header class="sticky top-0 z-50 border-b border-black/5 bg-[#f7f4ef]/80 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <div class="text-xl font-semibold tracking-tight">
                {{ brand.firstPart }}<span class="italic text-[#8b6f47]">{{ brand.secondPart }}</span>
            </div>

            <nav class="hidden items-center gap-8 text-sm text-black/60 md:flex">
                <a
                    v-for="item in navigation"
                    :key="item.href"
                    :href="item.href"
                    class="hover:text-black"
                >
                    {{ item.label }}
                </a>
            </nav>

            <a
                href="#builder"
                class="rounded-full bg-black px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
            >
                Configurează site-ul
            </a>
        </div>
    </header>
</template>

<script setup>
defineProps({
    brand: {
        type: Object,
        required: true,
    },
    navigation: {
        type: Array,
        required: true,
    },
})
</script>
