import { computed, ref } from 'vue'

export function useSiteBuilder(templates, features, templateCategories, packages) {
    const selectedCategoryKey = ref(templateCategories[0]?.key || '')
    const selectedTemplateId = ref(templates[0]?.id || null)
    const selectedPackageId = ref(packages[1]?.id || packages[0]?.id || null)
    const selectedFeatureIds = ref([])

    const filteredTemplates = computed(() => {
        return templates.filter(template => template.categoryKey === selectedCategoryKey.value)
    })

    const selectedTemplate = computed(() => {
        return templates.find(template => template.id === selectedTemplateId.value) || templates[0] || null
    })

    const selectedPackage = computed(() => {
        return packages.find(packageItem => packageItem.id === selectedPackageId.value) || packages[0] || null
    })

    const availableFeatures = computed(() => {
        if (!selectedPackage.value) {
            return []
        }

        return features.filter(feature => feature.availableFor.includes(selectedPackage.value.key))
    })

    const selectedFeatures = computed(() => {
        return features.filter(feature => selectedFeatureIds.value.includes(feature.id))
    })

    const totalPrice = computed(() => {
        const packagePrice = selectedPackage.value?.price || 0

        const featuresPrice = selectedFeatures.value.reduce((total, feature) => {
            return total + feature.price
        }, 0)

        return packagePrice + featuresPrice
    })

    function selectCategory(categoryKey) {
        selectedCategoryKey.value = categoryKey

        const firstTemplateInCategory = templates.find(template => template.categoryKey === categoryKey)

        if (firstTemplateInCategory) {
            selectedTemplateId.value = firstTemplateInCategory.id
        }
    }

    function selectTemplate(templateId) {
        selectedTemplateId.value = templateId
    }

    function selectPackage(packageId) {
        selectedPackageId.value = packageId

        selectedFeatureIds.value = selectedFeatureIds.value.filter(featureId => {
            return availableFeatures.value.some(feature => feature.id === featureId)
        })
    }

    function toggleFeature(featureId) {
        if (selectedFeatureIds.value.includes(featureId)) {
            selectedFeatureIds.value = selectedFeatureIds.value.filter(id => id !== featureId)
            return
        }

        selectedFeatureIds.value = [...selectedFeatureIds.value, featureId]
    }

    function resetSelectedFeatures() {
        selectedFeatureIds.value = []
    }

    return {
        selectedCategoryKey,
        selectedTemplateId,
        selectedPackageId,
        selectedFeatureIds,
        filteredTemplates,
        availableFeatures,
        selectedTemplate,
        selectedPackage,
        selectedFeatures,
        totalPrice,
        selectCategory,
        selectTemplate,
        selectPackage,
        toggleFeature,
        resetSelectedFeatures,
    }
}