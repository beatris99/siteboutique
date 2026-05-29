import { computed, ref } from 'vue'

export function useSiteBuilder(templates, features, categories) {
    const selectedCategoryKey = ref(categories[0]?.key ?? null)

    const filteredTemplates = computed(() => {
        return templates.filter(template => template.categoryKey === selectedCategoryKey.value)
    })

    const availableFeatures = computed(() => {
        return features.filter(feature => {
            return feature.availableFor.includes(selectedCategoryKey.value)
        })
    })

    const selectedTemplateId = ref(filteredTemplates.value[0]?.id ?? templates[0]?.id ?? null)
    const selectedFeatureIds = ref([])

    const selectedTemplate = computed(() => {
        return templates.find(template => template.id === selectedTemplateId.value) || templates[0]
    })

    const selectedFeatures = computed(() => {
        return availableFeatures.value.filter(feature => {
            return selectedFeatureIds.value.includes(feature.id)
        })
    })

    const totalPrice = computed(() => {
        if (!selectedTemplate.value) {
            return 0
        }

        return selectedTemplate.value.basePrice + selectedFeatures.value.reduce((sum, feature) => {
            return sum + feature.price
        }, 0)
    })

    function selectCategory(categoryKey) {
        selectedCategoryKey.value = categoryKey

        const firstTemplateFromCategory = templates.find(template => {
            return template.categoryKey === categoryKey
        })

        if (firstTemplateFromCategory) {
            selectedTemplateId.value = firstTemplateFromCategory.id
        }

        selectedFeatureIds.value = []
    }

    function selectTemplate(templateId) {
        selectedTemplateId.value = templateId
    }

    function toggleFeature(featureId) {
        if (selectedFeatureIds.value.includes(featureId)) {
            selectedFeatureIds.value = selectedFeatureIds.value.filter(id => id !== featureId)
            return
        }

        selectedFeatureIds.value.push(featureId)
    }

    function resetSelectedFeatures() {
        selectedFeatureIds.value = []
    }

    return {
        selectedCategoryKey,
        selectedTemplateId,
        selectedFeatureIds,
        filteredTemplates,
        availableFeatures,
        selectedTemplate,
        selectedFeatures,
        totalPrice,
        selectCategory,
        selectTemplate,
        toggleFeature,
        resetSelectedFeatures,
    }
}
