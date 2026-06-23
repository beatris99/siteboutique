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
                <div v-if="selectedTemplate?.name" class="rounded-2xl bg-[#f7f4ef] p-4">
                    <p class="text-sm text-black/50">
                        {{ label('template_label', 'templateLabel') }}
                    </p>

                    <p class="mt-2 font-semibold">
                        {{ selectedTemplate.name }}
                    </p>
                </div>

                <div v-if="selectedPackage?.name" class="rounded-2xl bg-[#f7f4ef] p-4">
                    <p class="text-sm text-black/50">
                        {{ label('package_label', 'packageLabel') }}
                    </p>

                    <p class="mt-2 font-semibold">
                        {{ selectedPackage.name }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#f7f4ef] p-4">
                    <p class="text-sm text-black/50">
                        {{ label('features_label', 'featuresLabel') }}
                    </p>

                    <div v-if="visibleSelectedFeatures.length" class="mt-3 flex flex-wrap gap-2">
                        <span
                            v-for="feature in visibleSelectedFeatures"
                            :key="feature.id || feature.name"
                            class="rounded-full bg-white px-3 py-1 text-xs text-black/60"
                        >
                            {{ feature.name }}
                        </span>
                    </div>

                    <p v-else class="mt-2 text-sm text-black/50">
                        {{ label('no_features', 'noFeatures') }}
                    </p>
                </div>

                <div class="rounded-[1.5rem] bg-black p-5 text-white">
                    <p class="text-sm text-white/50">
                        {{ label('total_label', 'totalLabel') }}
                    </p>

                    <p class="mt-2 text-4xl font-semibold">
                        {{ formatPrice(totalPrice) }}
                    </p>

                    <p class="mt-3 text-sm leading-6 text-white/60">
                        {{ label('total_description', 'totalDescription') }}
                    </p>
                </div>

                <a href="#contact" class="rounded-full bg-black px-6 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]">
                    {{ summary.cta }}
                </a>
            </div>
        </div>
    </aside>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
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

const visibleSelectedFeatures = computed(() => (props.selectedFeatures || []).filter(feature => feature?.name && String(feature.name).trim() !== ''))

function label(snakeKey, camelKey) {
    return props.summary?.[snakeKey] || props.summary?.[camelKey] || ''
}

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}
</script>
