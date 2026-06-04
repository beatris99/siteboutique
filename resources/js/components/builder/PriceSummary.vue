<template>
    <aside
        class="sticky top-28 self-start rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl"
    >
        <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
            Configurația ta
        </p>

        <h3 class="mt-4 text-3xl font-semibold">Ce ai ales</h3>

        <div class="mt-6 space-y-4">
            <div class="rounded-2xl bg-[#f7f4ef] p-4">
                <p class="text-sm text-black/50">Model site</p>
                <p class="mt-1 font-semibold">
                    {{ selectedTemplate?.name || "Neselectat" }}
                </p>
            </div>

            <div class="rounded-2xl bg-[#f7f4ef] p-4">
                <p class="text-sm text-black/50">Pachet</p>
                <p class="mt-1 font-semibold">
                    {{ selectedPackage?.name || "Neselectat" }}
                </p>
            </div>

            <div class="rounded-2xl bg-[#f7f4ef] p-4">
                <p class="text-sm text-black/50">Funcționalități extra</p>

                <div v-if="selectedFeatures.length" class="mt-3 grid gap-2">
                    <div
                        v-for="feature in selectedFeatures"
                        :key="feature.id"
                        class="flex justify-between gap-4 text-sm"
                    >
                        <span>{{ feature.name }}</span>
                        <strong>{{ formatPrice(feature.price) }}</strong>
                    </div>
                </div>

                <p v-else class="mt-2 text-sm text-black/40">
                    Nu ai adăugat extra-uri.
                </p>
            </div>
        </div>

        <div class="mt-6 rounded-[2rem] bg-black p-5 text-white">
            <p class="text-sm text-white/50">Dacă vrei să îți fac eu site-ul</p>

            <p class="mt-2 text-4xl font-semibold">
                {{ formatPrice(totalPrice) }}
            </p>

            <p class="mt-3 text-sm leading-6 text-white/50">
                Preț estimativ. Oferta finală depinde de conținut, funcții și
                termen.
            </p>
        </div>

        <div class="mt-4 rounded-[2rem] bg-[#f7f4ef] p-5">
            <p class="text-sm text-black/50">Dacă ești developer</p>

            <p class="mt-2 text-2xl font-semibold">
                {{ formatPrice(developerTotal) }}
            </p>

            <p class="mt-3 text-sm leading-6 text-black/50">
                Template + funcționalități pentru integrare proprie.
            </p>
        </div>

        <a
            href="#contact"
            class="mt-6 inline-flex w-full items-center justify-center rounded-full bg-black px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
        >
            Vreau acest site
        </a>
    </aside>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
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

const developerTotal = computed(() => {
    const templatePrice =
        props.selectedPackage?.developerPrice ||
        props.selectedTemplate?.developerPrice ||
        0;

    const extraPrice = props.selectedFeatures.reduce((total, feature) => {
        return total + (feature.developerPrice || 0);
    }, 0);

    return templatePrice + extraPrice;
});

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}
</script>
