import { computed, ref } from 'vue'

export function useSiteBuilder(templates, features) {
    const selectedTemplateId = ref(templates[0]?.id ?? null)
    const selectedFeatureIds = ref([])

    const selectedTemplate = computed(() => {
        return templates.find(template => template.id === selectedTemplateId.value) || templates[0]
    })

    const selectedFeatures = computed(() => {
        return features.filter(feature => selectedFeatureIds.value.includes(feature.id))
    })

    const totalPrice = computed(() => {
        if (!selectedTemplate.value) {
            return 0
        }

        return selectedTemplate.value.basePrice + selectedFeatures.value.reduce((sum, feature) => {
            return sum + feature.price
        }, 0)
    })

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
        selectedTemplateId,
        selectedFeatureIds,
        selectedTemplate,
        selectedFeatures,
        totalPrice,
        selectTemplate,
        toggleFeature,
        resetSelectedFeatures,
    }
}
