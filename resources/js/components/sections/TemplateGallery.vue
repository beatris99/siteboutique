<template>
    <section id="templates" class="mx-auto max-w-7xl px-6 py-24">
        <SectionTitle
            eyebrow="Template-uri"
            title="Alege punctul de plecare."
            description="Template-uri gândite pentru afaceri reale, nu doar pentru aspect."
            wrapper-class="mb-12 max-w-2xl"
        />

        <div class="grid gap-6 md:grid-cols-3">
            <TemplateCard
                v-for="template in templates"
                :key="template.id"
                :template="template"
                :is-selected="selectedTemplateId === template.id"
                @select="$emit('select-template', template.id)"
            />
        </div>
    </section>
</template>

<script setup>
import SectionTitle from '../ui/SectionTitle.vue'
import TemplateCard from '../cards/TemplateCard.vue'

defineProps({
    templates: {
        type: Array,
        required: true,
    },
    selectedTemplateId: {
        type: Number,
        required: true,
    },
})

defineEmits(['select-template'])
</script>
