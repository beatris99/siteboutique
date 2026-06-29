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

            <TemplateProductDetailsSection
                :template="publicTemplate"
                :locale="locale"
            />

            <WhatYouGetSection :section="siteContent.whatYouGet" />
            <WhyWorkWithMeSection :section="siteContent.whyWorkWithMe" />

            <TemplatePreparationSection
                v-if="templateClientInfo"
                :info="templateClientInfo"
            />

            <TemplateScopeSection
                v-if="templateClientInfo"
                :info="templateClientInfo"
            />

            <PackageSelector
                :section="siteContent.packagesSection"
                :common="siteContent.common"
                :packages="packages"
                :selected-package-id="selectedPackageId"
                @select-package="selectPackage"
            />

            <section id="builder" class="bg-white px-4 py-12 sm:px-6 lg:py-16">
                <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[1.15fr_0.85fr]">
                    <SiteConfigurator
                        :section="siteContent.configurator"
                        :features="availableFeatures"
                        :selected-feature-ids="selectedFeatureIds"
                        @toggle-feature="toggleFeature"
                    />

                    <PriceSummary
                        :summary="siteContent.priceSummary"
                        :selected-template="selectedTemplate"
                        :selected-package="selectedPackage"
                        :selected-features="selectedFeatures"
                        :total-price="totalPrice"
                    />
                </div>
            </section>

            <ContactLeadForm
                :contact="siteContent.contact"
                :contact-info="contactInfo"
                :selected-template="selectedTemplate"
                :selected-package="selectedPackage"
                :selected-features="selectedFeatures"
                :total-price="totalPrice"
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

            <AppFooter
                :footer="siteContent.footer"
                :brand="siteContent.brand"
                :navigation="siteContent.navigation"
                :contact-info="contactInfo"
                :locale="locale"
            />
        </template>

        <template v-else-if="isConfiguratorPage">
            <PackageSelector
                :section="siteContent.packagesSection"
                :common="siteContent.common"
                :packages="packages"
                :selected-package-id="selectedPackageId"
                @select-package="selectPackage"
            />

            <section id="builder" class="bg-white px-4 py-10 sm:px-6 lg:py-14">
                <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[1.15fr_0.85fr]">
                    <SiteConfigurator
                        :section="siteContent.configurator"
                        :features="availableFeatures"
                        :selected-feature-ids="selectedFeatureIds"
                        @toggle-feature="toggleFeature"
                    />

                    <PriceSummary
                        :summary="siteContent.priceSummary"
                        :selected-template="selectedTemplate"
                        :selected-package="selectedPackage"
                        :selected-features="selectedFeatures"
                        :total-price="totalPrice"
                    />
                </div>
            </section>

            <ContactLeadForm
                :contact="siteContent.contact"
                :contact-info="contactInfo"
                :selected-template="selectedTemplate"
                :selected-package="selectedPackage"
                :selected-features="selectedFeatures"
                :total-price="totalPrice"
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

        <template v-else-if="isContactPage">
            <InvitationSection
                :t="siteContent.landing.invitation"
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
            <SubscribePopup :popup="siteContent.landing.popup" />

            <HeroSection
                :t="siteContent.landing.hero"
                :showcase="siteContent.landing.showcase"
            />

            <CapabilitiesSection :t="siteContent.landing.capabilities" />

            <SubscriptionCareSection
                v-if="siteContent.landing.subscription"
                :t="siteContent.landing.subscription"
            />

            <NewsletterSection
                v-if="siteContent.landing.newsletter"
                :t="siteContent.landing.newsletter"
            />

            <InvitationSection
                :t="siteContent.landing.invitation"
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
import { getTemplateClientInfo } from './templates/templateClientInfo'

import AppHeader from './components/layout/AppHeader.vue'
import AppFooter from './components/layout/AppFooter.vue'
import FloatingContactDock from './components/layout/FloatingContactDock.vue'

import HeroSection from './components/sections/HeroSection.vue'
import CapabilitiesSection from './components/sections/CapabilitiesSection.vue'
import SubscriptionCareSection from './components/sections/SubscriptionCareSection.vue'
import NewsletterSection from './components/sections/NewsletterSection.vue'
import InvitationSection from './components/sections/InvitationSection.vue'
import SubscribePopup from './components/sections/SubscribePopup.vue'

import WhatYouGetSection from './components/sections/WhatYouGetSection.vue'
import WhyWorkWithMeSection from './components/sections/WhyWorkWithMeSection.vue'
import TemplateGallery from './components/sections/TemplateGallery.vue'
import ContactLeadForm from './components/sections/ContactLeadForm.vue'
import TemplatePreparationSection from './components/sections/TemplatePreparationSection.vue'
import TemplateScopeSection from './components/sections/TemplateScopeSection.vue'
import TemplateProductDetailsSection from './components/sections/TemplateProductDetailsSection.vue'
import SiteConfigurator from './components/sections/SiteConfigurator.vue'

import PackageSelector from './components/builder/PackageSelector.vue'
import PriceSummary from './components/builder/PriceSummary.vue'

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

const templateClientInfo = computed(() => {
    return getTemplateClientInfo(templateSlug.value, locale)
})

function handleTemplateSelect(templateId) {
    selectTemplate(templateId)

    const template = templates.find(item => item.id === templateId)

    if (template) {
        sessionStorage.setItem('sitego_selected_template_id', String(template.id))
    }

    window.location.href = '/configurator#builder'
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
