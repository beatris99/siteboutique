<template>
    <header class="sticky top-0 z-50 border-b border-black/5 bg-[#f7f4ef]/85 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6">
            <a href="/" class="flex shrink-0 items-center">
                <img
                    src="/images/siteboutique-icon.png"
                    alt="SiteBoutique"
                    class="h-10 w-10 rounded-xl object-contain sm:hidden"
                />

                <img
                    src="/images/siteboutique-logo-small.png"
                    alt="SiteBoutique"
                    class="hidden h-10 w-auto object-contain sm:block lg:h-12"
                />
            </a>

            <nav class="hidden items-center gap-6 text-sm text-black/60 lg:flex">
                <a
                    v-for="item in navigation"
                    :key="item.href"
                    :href="item.href"
                    class="transition hover:text-black"
                >
                    {{ item.label }}
                </a>
            </nav>

            <a
                href="#builder"
                class="hidden rounded-full bg-black px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#8b6f47] sm:inline-flex"
            >
                Configurează site-ul
            </a>

            <a
                href="#builder"
                class="inline-flex rounded-full bg-black px-4 py-2 text-xs font-semibold text-white transition hover:bg-[#8b6f47] sm:hidden"
            >
                Configurare
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
