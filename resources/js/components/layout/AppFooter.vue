<template>
    <footer class="border-t border-black/10 bg-black text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr]">
            <div>
                <div class="text-2xl font-semibold tracking-tight">
                    {{ footer.brand.firstPart }}<span class="italic text-[#d8c3a5]">{{ footer.brand.secondPart }}</span>
                </div>

                <p class="mt-5 max-w-md leading-7 text-white/60">
                    {{ footer.description }}
                </p>

                <p class="mt-6 text-sm text-white/40">
                    {{ footer.copyright }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold">
                    Navigare
                </h3>

                <nav class="mt-5 grid gap-3 text-sm text-white/60">
                    <a
                        v-for="item in footer.links"
                        :key="item.href"
                        :href="item.href"
                        class="transition hover:text-white"
                    >
                        {{ item.label }}
                    </a>
                </nav>
            </div>

            <div>
                <h3 class="font-semibold">
                    Legal
                </h3>

                <nav class="mt-5 grid gap-3 text-sm text-white/60">
                    <a
                        v-for="item in footer.legalLinks || []"
                        :key="item.href"
                        :href="item.href"
                        class="transition hover:text-white"
                    >
                        {{ item.label }}
                    </a>
                </nav>
            </div>

            <div>
                <h3 class="font-semibold">
                    Contact
                </h3>

                <div class="mt-5 grid gap-3 text-sm text-white/60">
                    <a
                        v-if="footer.email"
                        :href="`mailto:${footer.email}`"
                        class="transition hover:text-white"
                    >
                        {{ footer.email }}
                    </a>

                    <a
                        v-if="footer.phone"
                        :href="`tel:${footer.phone}`"
                        class="transition hover:text-white"
                    >
                        {{ footer.phone }}
                    </a>

                    <p v-if="footer.location">
                        {{ footer.location }}
                    </p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
defineProps({
    footer: {
        type: Object,
        required: true,
    },
})
</script>
