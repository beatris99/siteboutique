<template>
    <div>
        <SectionTitle
            eyebrow="Configurator"
            title="Vezi prețul estimativ live."
            description="Selectează funcțiile dorite. Prețul se actualizează automat."
            wrapper-class="max-w-2xl"
        />

        <div class="mt-10 grid gap-4">
            <FeatureCard
                v-for="feature in features"
                :key="feature.id"
                :feature="feature"
                :is-selected="selectedFeatureIds.includes(feature.id)"
                @toggle="$emit('toggle-feature', feature.id)"
            />
        </div>
    </div>
</template>

<script setup>
import SectionTitle from '../ui/SectionTitle.vue'
import FeatureCard from '../cards/FeatureCard.vue'

defineProps({
    features: {
        type: Array,
        required: true,
    },
    selectedFeatureIds: {
        type: Array,
        required: true,
    },
})

defineEmits(['toggle-feature'])
</script>
