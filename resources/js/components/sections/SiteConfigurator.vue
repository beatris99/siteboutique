<template>
    <div>
        <p class="text-sm uppercase tracking-[0.25em] text-[#a67c3a]">
            {{ section.eyebrow }}
        </p>

        <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
            {{ section.title }}
        </h2>

        <p class="mt-4 max-w-2xl leading-8 text-black/60">
            {{ section.description }}
        </p>

        <div class="mt-8 grid gap-7">
            <div
                v-for="group in groupedFeatures"
                :key="group.category"
            >
                <div class="mb-3 flex items-center justify-between gap-4">
                    <h3 class="text-lg font-semibold">
                        {{ group.category }}
                    </h3>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
                    <button
                        v-for="feature in group.items"
                        :key="feature.id"
                        type="button"
                        class="rounded-[1.25rem] border p-4 text-left transition hover:-translate-y-1 hover:shadow-lg"
                        :class="isSelected(feature.id)
                            ? 'border-black bg-black text-white'
                            : 'border-black/10 bg-white text-black'"
                        @click="$emit('toggle-feature', feature.id)"
                    >
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex gap-3">
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl text-xs font-bold"
                                    :class="isSelected(feature.id)
                                        ? 'bg-white text-black'
                                        : 'bg-[#f7f4ee] text-[#a67c3a]'"
                                >
                                    <WhatsappIcon
                                        v-if="feature.name === 'Buton WhatsApp' || feature.name === 'WhatsApp button'"
                                        class="h-5 w-5"
                                    />

                                    <span v-else>
                                        {{ getIcon(feature.name) }}
                                    </span>
                                </div>

                                <div>
                                    <p class="font-semibold leading-6">
                                        {{ feature.name }}
                                    </p>

                                    <p
                                        class="mt-1 text-sm leading-6"
                                        :class="isSelected(feature.id) ? 'text-white/60' : 'text-black/50'"
                                    >
                                        {{ feature.plainName }}
                                    </p>
                                </div>
                            </div>

                            <span
                                class="shrink-0 rounded-full px-3 py-1 text-xs font-semibold"
                                :class="isSelected(feature.id)
                                    ? 'bg-white text-black'
                                    : 'bg-[#f7f4ee] text-black'"
                            >
                                {{ isSelected(feature.id) ? section.addedLabel : section.addLabel }}
                            </span>
                        </div>

                        <div class="mt-4 flex items-center justify-between gap-4 border-t pt-3 text-sm"
                             :class="isSelected(feature.id) ? 'border-white/10' : 'border-black/10'"
                        >
                            <span :class="isSelected(feature.id) ? 'text-white/50' : 'text-black/50'">
                                {{ section.costLabel }}
                            </span>

                            <strong>
                                {{ formatPrice(feature.price) }}
                            </strong>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import WhatsappIcon from "../icons/WhatsappIcon.vue";

const props = defineProps({
    section: {
        type: Object,
        required: true,
    },
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

function getIcon(name) {
    const icons = {
        "Formular de contact": "✉",
        "Contact form": "✉",
        "Buton WhatsApp": "WA",
        "WhatsApp button": "WA",
        "Formular de rezervare": "📅",
        "Booking form": "📅",
        "Galerie foto / video": "▣",
        "Photo / video gallery": "▣",
        "Listă servicii și prețuri": "☰",
        "Services and pricing list": "☰",
        "Întrebări frecvente": "?",
        "Frequently asked questions": "?",
        "Testimoniale / recenzii": "★",
        "Testimonials / reviews": "★",
        "Google Maps": "⌖",
        "Catalog produse": "□",
        "Product catalog": "□",
        "Coș de cumpărături": "🛒",
        "Shopping cart": "🛒",
        "Checkout / comandă": "✓",
        "Checkout / order": "✓",
        "Plată online": "💳",
        "Online payment": "💳",
        "Newsletter / abonare": "↗",
        "Newsletter / subscription": "↗",
        "Google Analytics": "GA",
        "Pixel Facebook / TikTok": "PX",
        "Facebook / TikTok pixel": "PX",
        "Panou cereri clienți": "ADM",
        "Client requests dashboard": "ADM",
        "Administrare produse / servicii": "⚙",
        "Products / services management": "⚙",
        "Setări Google de bază": "SEO",
        "Basic Google setup": "SEO",
        "Site în română și engleză": "RO",
        "Romanian and English website": "EN",
        "Cont client / autentificare": "🔐",
        "Client account / login": "🔐",
    };

    return icons[name] || "+";
}
</script>
