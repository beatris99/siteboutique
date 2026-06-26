<template>
    <main class="min-h-screen bg-[#f7f4ef] text-[#171717]">
        <AppHeader
            :brand="siteContent.brand"
            :header="siteContent.header"
            :navigation="siteContent.navigation"
            :locale="locale"
        />

        <FloatingContactDock
            :dock="siteContent.floatingDock"
            :contact-info="contactInfo"
        />

        <template v-if="isTemplatePage && !publicTemplate">
            <TemplateNotFoundPage />
            <AppFooter
                :footer="siteContent.footer"
                :brand="siteContent.brand"
                :navigation="siteContent.navigation"
                :contact-info="contactInfo"
                :locale="locale"
            />
        </template>

        <template v-else-if="isTemplatePage && publicTemplate">
            <component
                :is="realTemplateComponent"
                v-if="realTemplateComponent"
                :content="realTemplateData"
            />

            <TemplatePublicPage
                v-else
                :template="publicTemplate"
                :locale="locale"
            />

            <PremiumLeadCaptureSection
                :section="siteContent.leadCapture"
                :locale="locale"
                @lead-created="resetSelectedFeatures"
            />

            <AppFooter
                :footer="siteContent.footer"
                :brand="siteContent.brand"
                :navigation="siteContent.navigation"
                :contact-info="contactInfo"
                :locale="locale"
            />
        </template>

        <template v-else-if="isTemplatesListingPage">
            <TemplateGallery
                :section="siteContent.templateGallery"
                :common="siteContent.common"
                :categories="templateCategories"
                :templates="filteredTemplates"
                :selected-category-key="selectedCategoryKey"
                :selected-template-id="selectedTemplateId"
                :selected-template="selectedTemplate"
                @select-category="selectCategory"
                @select-template="handleTemplateSelect"
            />

            <PremiumLeadCaptureSection
                :section="siteContent.leadCapture"
                :locale="locale"
                @lead-created="resetSelectedFeatures"
            />

            <AppFooter
                :footer="siteContent.footer"
                :brand="siteContent.brand"
                :navigation="siteContent.navigation"
                :contact-info="contactInfo"
                :locale="locale"
            />
        </template>

        <template v-else-if="isConfiguratorPage || isContactPage">
            <PremiumLeadCaptureSection
                :section="siteContent.leadCapture"
                :locale="locale"
                @lead-created="resetSelectedFeatures"
            />

            <AppFooter
                :footer="siteContent.footer"
                :brand="siteContent.brand"
                :navigation="siteContent.navigation"
                :contact-info="contactInfo"
                :locale="locale"
            />
        </template>

        <template v-else>
            <HeroSection
                :hero="siteContent.hero"
                :showcase="siteContent.homeShowcase"
                :locale="locale"
            />

            <PremiumLeadCaptureSection
                :section="siteContent.leadCapture"
                :locale="locale"
                @lead-created="resetSelectedFeatures"
            />

            <AppFooter
                :footer="siteContent.footer"
                :brand="siteContent.brand"
                :navigation="siteContent.navigation"
                :contact-info="contactInfo"
                :locale="locale"
            />
        </template>
    </main>
</template>

<script setup>
import { computed, onMounted } from 'vue'
import { useSiteBuilder } from './composables/useSiteBuilder'
import { getRegisteredTemplate } from './templates/templateRegistry'

import AppHeader from './components/layout/AppHeader.vue'
import AppFooter from './components/layout/AppFooter.vue'
import FloatingContactDock from './components/layout/FloatingContactDock.vue'

import HeroSection from './components/sections/HeroSection.vue'
import PremiumLeadCaptureSection from './components/sections/PremiumLeadCaptureSection.vue'
import TemplateGallery from './components/sections/TemplateGallery.vue'

import TemplatePublicPage from './components/pages/TemplatePublicPage.vue'
import TemplateNotFoundPage from './components/pages/TemplateNotFoundPage.vue'

const props = defineProps({
    initialLocale: { type: String, default: 'ro' },
    initialContent: { type: Object, required: true },
    initialBuilder: { type: Object, required: true },
    siteConfig: { type: Object, default: () => ({ contact: {} }) },
})

const locale = props.initialLocale === 'en' ? 'en' : 'ro'
const siteContent = props.initialContent
const builder = props.initialBuilder

const contactInfo = {
    email: props.siteConfig?.contact?.email || '',
    phone: props.siteConfig?.contact?.phone || '',
    location: props.siteConfig?.contact?.location || '',
    area: props.siteConfig?.contact?.area || '',
}

const features = builder.features || []
const packages = builder.packages || []
const templateCategories = builder.template_categories || []
const templates = builder.templates || []

const {
    selectedCategoryKey,
    selectedTemplateId,
    filteredTemplates,
    selectedTemplate,
    selectCategory,
    selectTemplate,
    resetSelectedFeatures,
} = useSiteBuilder(templates, features, templateCategories, packages)

const currentPath = window.location.pathname.replace(/\/+$/, '') || '/'

const isTemplatePage = computed(() => currentPath.startsWith('/templates/'))
const isTemplatesListingPage = computed(() => currentPath === '/modele-site')
const isConfiguratorPage = computed(() => currentPath === '/configurator')
const isContactPage = computed(() => currentPath === '/contact')

const templateSlug = computed(() => {
    if (!isTemplatePage.value) return null

    return currentPath
        .split('/templates/')[1]
        ?.replace(/^\/+|\/+$/g, '') || null
})

const publicTemplate = computed(() => {
    return templates.find(template => template.slug === templateSlug.value) || null
})

const registeredTemplate = computed(() => {
    return getRegisteredTemplate(templateSlug.value, locale)
})

const realTemplateComponent = computed(() => {
    return registeredTemplate.value?.component || null
})

const realTemplateData = computed(() => {
    return registeredTemplate.value?.data || null
})

function handleTemplateSelect(templateId) {
    selectTemplate(templateId)

    const template = templates.find(item => item.id === templateId)

    if (template) {
        sessionStorage.setItem('sitego_selected_template_label', template.name || template.title || '')
    }

    window.location.href = '/#cerere'
}

onMounted(() => {
    if (publicTemplate.value) {
        selectCategory(publicTemplate.value.categoryKey)
        selectTemplate(publicTemplate.value.id)
        return
    }

    const storedTemplateId = Number(sessionStorage.getItem('sitego_selected_template_id'))

    if (!storedTemplateId) return

    const storedTemplate = templates.find(template => template.id === storedTemplateId)

    if (!storedTemplate) return

    selectCategory(storedTemplate.categoryKey)
    selectTemplate(storedTemplate.id)

    sessionStorage.removeItem('sitego_selected_template_id')
})
</script>
