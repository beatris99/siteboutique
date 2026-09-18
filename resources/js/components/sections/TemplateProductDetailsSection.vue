<template>
    <section class="bg-white px-4 py-16 sm:px-6 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#805d2c]">
                        {{ labels.eyebrow }}
                    </p>
                    <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                        {{ labels.title_prefix }} {{ template.shortTitle || template.name }} {{ labels.title_suffix }}
                    </h2>
                    <p class="mt-5 leading-8 text-black/60">
                        {{ labels.description }}
                    </p>
                </div>
                <div class="rounded-[2rem] bg-black p-6 text-white sm:p-8">
                    <p class="text-sm uppercase tracking-[0.25em] text-white/65">
                        {{ labels.service_eyebrow }}
                    </p>
                    <h3 class="mt-4 text-3xl font-semibold">
                        {{ labels.service_title }}
                    </h3>
                    <p class="mt-4 max-w-2xl leading-8 text-white/60">
                        {{ labels.service_description }}
                    </p>
                    <p class="mt-6 text-3xl font-semibold">
                        {{ labels.from }} {{ formatPrice(template.buildPriceFrom || template.basePrice) }}
                    </p>
                    <ul class="mt-6 grid gap-3 text-sm text-white/70">
                        <li v-for="item in labels.includes || []" :key="item">✓ {{ item }}</li>
                    </ul>
                    <a
                        href="#builder"
                        class="mt-8 inline-flex rounded-full bg-white px-7 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    >
                        {{ labels.button }}
                    </a>
                </div>
            </div>
            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#805d2c]">
                        {{ labels.pages_label }}
                    </p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="page in template.pages"
                            :key="page"
                            class="rounded-full bg-white px-3 py-1 text-sm text-black/60"
                        >
                            {{ page }}
                        </span>
                    </div>
                </article>
                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#805d2c]">
                        {{ labels.ideal_for_label }}
                    </p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="item in template.idealFor"
                            :key="item"
                            class="rounded-full bg-white px-3 py-1 text-sm text-black/60"
                        >
                            {{ item }}
                        </span>
                    </div>
                </article>
                <article class="rounded-[2rem] bg-[#f7f4ef] p-6">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#805d2c]">
                        {{ labels.timeline_label }}
                    </p>
                    <p class="mt-4 text-3xl font-semibold">
                        {{ template.deliveryTime || labels.default_timeline }}
                    </p>
                    <p class="mt-3 leading-7 text-black/60">
                        {{ labels.timeline_description }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    template: {
        type: Object,
        required: true,
    },
    labels: {
        type: Object,
        required: true,
    },
    currencyLabel: {
        type: String,
        required: true,
    },
});

function formatPrice(value) {
    const price = Number(value || 0).toLocaleString("ro-RO");
    return `${price} ${props.currencyLabel}`.trim();
}
</script>
