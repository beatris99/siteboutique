<template>
    <aside class="lg:sticky lg:top-28">
        <div class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                {{ summary.eyebrow }}
            </p>

            <h2 class="mt-4 text-3xl font-semibold">
                {{ summary.title }}
            </h2>

            <div class="mt-6 grid gap-4">
                <div class="rounded-2xl bg-[#f7f4ef] p-4">
                    <p class="text-sm text-black/50">
                        {{ summary.templateLabel }}
                    </p>

                    <p class="mt-2 font-semibold">
                        {{ selectedTemplate?.name || "-" }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#f7f4ef] p-4">
                    <p class="text-sm text-black/50">
                        {{ summary.packageLabel }}
                    </p>

                    <p class="mt-2 font-semibold">
                        {{ selectedPackage?.name || "-" }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#f7f4ef] p-4">
                    <p class="text-sm text-black/50">
                        {{ summary.featuresLabel }}
                    </p>

                    <div
                        v-if="selectedFeatures.length"
                        class="mt-3 flex flex-wrap gap-2"
                    >
                        <span
                            v-for="feature in selectedFeatures"
                            :key="feature.id"
                            class="rounded-full bg-white px-3 py-1 text-xs text-black/60"
                        >
                            {{ feature.name }}
                        </span>
                    </div>

                    <p
                        v-else
                        class="mt-2 text-sm text-black/50"
                    >
                        {{ summary.noFeatures }}
                    </p>
                </div>

                <div class="rounded-[1.5rem] bg-black p-5 text-white">
                    <p class="text-sm text-white/50">
                        {{ summary.totalLabel }}
                    </p>

                    <p class="mt-2 text-4xl font-semibold">
                        {{ formatPrice(totalPrice) }}
                    </p>

                    <p class="mt-3 text-sm leading-6 text-white/60">
                        {{ summary.totalDescription }}
                    </p>
                </div>

                <a
                    href="#contact"
                    class="rounded-full bg-black px-6 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                >
                    {{ summary.cta }}
                </a>
            </div>
        </div>
    </aside>
</template>

<script setup>
defineProps({
    summary: {
        type: Object,
        required: true,
    },
    selectedTemplate: {
        type: Object,
        default: null,
    },
    selectedPackage: {
        type: Object,
        default: null,
    },
    selectedFeatures: {
        type: Array,
        required: true,
    },
    totalPrice: {
        type: Number,
        required: true,
    },
});

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}
</script>
