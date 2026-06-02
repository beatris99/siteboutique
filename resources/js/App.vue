<template>
    <main class="min-h-screen bg-[#f7f4ef] text-[#171717]">
        <AppHeader
            :brand="siteContent.brand"
            :navigation="siteContent.navigation"
        />

        <HeroSection :hero="siteContent.hero" />

        <TrustSection :items="siteContent.trust" />

        <TemplateGallery
            :categories="templateCategories"
            :templates="filteredTemplates"
            :selected-category-key="selectedCategoryKey"
            :selected-template-id="selectedTemplateId"
            @select-category="selectCategory"
            @select-template="selectTemplate"
            :selected-template="selectedTemplate"
        />

        <section id="builder" class="bg-white py-24">
            <div class="mx-auto grid max-w-7xl gap-10 px-6 md:grid-cols-[1.2fr_0.8fr]">
                <SiteConfigurator
                    :features="availableFeatures"
                    :selected-feature-ids="selectedFeatureIds"
                    @toggle-feature="toggleFeature"
                />

                <PriceSummary
                    :selected-template="selectedTemplate"
                    :selected-features="selectedFeatures"
                    :total-price="totalPrice"
                />
            </div>
        </section>

        <ContactLeadForm
            :contact="siteContent.contact"
            :selected-template="selectedTemplate"
            :selected-features="selectedFeatures"
            :total-price="totalPrice"
            @lead-created="resetSelectedFeatures"
        />

        <AppFooter :footer="siteContent.footer" />

    </main>
</template>

<script setup>
import { features, templateCategories, templates } from './data/siteBuilder'
import { siteContent } from './data/siteContent'
import { useSiteBuilder } from './composables/useSiteBuilder'

import AppHeader from './components/layout/AppHeader.vue'
import HeroSection from './components/sections/HeroSection.vue'
import TemplateGallery from './components/sections/TemplateGallery.vue'
import SiteConfigurator from './components/sections/SiteConfigurator.vue'
import PriceSummary from './components/builder/PriceSummary.vue'
import ContactLeadForm from './components/sections/ContactLeadForm.vue'
import TrustSection from './components/sections/TrustSection.vue'
import AppFooter from './components/layout/AppFooter.vue'

const {
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
} = useSiteBuilder(templates, features, templateCategories)
</script>
