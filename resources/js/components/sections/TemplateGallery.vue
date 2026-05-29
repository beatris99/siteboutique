<template>
    <section id="templates" class="mx-auto max-w-7xl px-6 py-24">
        <SectionTitle
            eyebrow="Template-uri"
            title="Alege tipul de site."
            description="Începe cu o categorie, apoi alege template-ul care se potrivește cel mai bine afacerii tale."
            wrapper-class="mb-12 max-w-3xl"
        />

        <TemplateCategoryTabs
            :categories="categories"
            :selected-category-key="selectedCategoryKey"
            @select-category="$emit('select-category', $event)"
        />

        <div
            v-if="templates.length"
            class="grid gap-6 md:grid-cols-3"
        >
            <TemplateCard
                v-for="template in templates"
                :key="template.id"
                :template="template"
                :is-selected="selectedTemplateId === template.id"
                @select="$emit('select-template', template.id)"
            />
        </div>

        <div
            v-else
            class="rounded-[2rem] border border-black/10 bg-white p-10 text-center text-black/50"
        >
            Nu există încă template-uri în această categorie.
        </div>
    </section>
</template>

<script setup>
import SectionTitle from '../ui/SectionTitle.vue'
import TemplateCard from '../cards/TemplateCard.vue'
import TemplateCategoryTabs from '../builder/TemplateCategoryTabs.vue'

defineProps({
    categories: {
        type: Array,
        required: true,
    },
    templates: {
        type: Array,
        required: true,
    },
    selectedCategoryKey: {
        type: String,
        required: true,
    },
    selectedTemplateId: {
        type: Number,
        required: true,
    },
})

defineEmits([
    'select-category',
    'select-template',
])
</script>
