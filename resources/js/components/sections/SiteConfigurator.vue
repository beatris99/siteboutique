<template>
    <div>
        <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
            Funcționalități extra
        </p>

        <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
            Adaugă doar ce ai nevoie.
        </h2>

        <p class="mt-4 max-w-2xl leading-8 text-black/60">
            Pornești de la modelul ales și adaugi funcții concrete: WhatsApp,
            formular, rezervări, produse, hartă, administrare sau plată online.
        </p>

        <div class="mt-8 grid gap-8">
            <div v-for="group in groupedFeatures" :key="group.category">
                <h3 class="text-xl font-semibold">
                    {{ group.category }}
                </h3>

                <div class="mt-4 grid gap-4 md:grid-cols-2">
                    <button
                        v-for="feature in group.items"
                        :key="feature.id"
                        type="button"
                        class="rounded-2xl border p-5 text-left transition hover:-translate-y-1 hover:shadow-lg"
                        :class="
                            isSelected(feature.id)
                                ? 'border-black bg-black text-white'
                                : 'border-black/10 bg-white text-black'
                        "
                        @click="$emit('toggle-feature', feature.id)"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="font-semibold">
                                    {{ feature.name }}
                                </p>

                                <p
                                    class="mt-2 text-sm leading-6"
                                    :class="
                                        isSelected(feature.id)
                                            ? 'text-white/60'
                                            : 'text-black/50'
                                    "
                                >
                                    {{ feature.plainName }}
                                </p>
                            </div>

                            <span
                                class="shrink-0 rounded-full px-3 py-1 text-xs font-semibold"
                                :class="
                                    isSelected(feature.id)
                                        ? 'bg-white text-black'
                                        : 'bg-[#f7f4ef] text-black'
                                "
                            >
                                {{
                                    isSelected(feature.id)
                                        ? "Adăugat"
                                        : "Adaugă"
                                }}
                            </span>
                        </div>

                        <div class="mt-5 grid gap-2 text-sm">
                            <div class="flex justify-between gap-4">
                                <span
                                    :class="
                                        isSelected(feature.id)
                                            ? 'text-white/50'
                                            : 'text-black/50'
                                    "
                                >
                                    Pentru client
                                </span>
                                <strong>{{
                                    formatPrice(feature.price)
                                }}</strong>
                            </div>

                            <div class="flex justify-between gap-4">
                                <span
                                    :class="
                                        isSelected(feature.id)
                                            ? 'text-white/50'
                                            : 'text-black/50'
                                    "
                                >
                                    Pentru developer
                                </span>
                                <strong>{{
                                    formatPrice(feature.developerPrice)
                                }}</strong>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    features: {
        type: Array,
        required: true,
    },
    selectedFeatureIds: {
        type: Array,
        required: true,
    },
});

defineEmits(["toggle-feature"]);

const groupedFeatures = computed(() => {
    const groups = {};

    props.features.forEach((feature) => {
        if (!groups[feature.category]) {
            groups[feature.category] = [];
        }

        groups[feature.category].push(feature);
    });

    return Object.entries(groups).map(([category, items]) => ({
        category,
        items,
    }));
});

function isSelected(featureId) {
    return props.selectedFeatureIds.includes(featureId);
}

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}
</script>
