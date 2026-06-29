<template>
    <section id="abonament" class="bg-white px-4 py-12 sm:px-6 lg:py-16">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr] lg:items-center">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#a67c3a]">
                        {{ t.eyebrow }}
                    </p>
                    <h2 class="mt-4 max-w-xl font-serif text-3xl font-medium leading-tight text-[#171717] sm:text-4xl lg:text-5xl">
                        {{ t.title }}
                    </h2>
                    <p class="mt-5 max-w-xl text-base leading-8 text-black/60">
                        {{ t.description }}
                    </p>
                    <a
                        href="#contact"
                        class="mt-7 inline-flex rounded-full bg-[#171717] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#a67c3a]"
                    >
                        {{ t.cta }}
                    </a>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <article
                        v-for="item in t.items"
                        :key="item.title"
                        class="rounded-[1.5rem] border border-black/10 bg-[#f7f4ef] p-6"
                    >
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#a67c3a]">
                            {{ item.label }}
                        </p>
                        <h3 class="mt-4 text-xl font-semibold text-[#171717]">
                            {{ item.title }}
                        </h3>
                        <p class="mt-3 text-sm leading-7 text-black/60">
                            {{ item.text }}
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    t: { type: Object, required: true },
})
</script>
