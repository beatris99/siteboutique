<template>
    <main class="min-h-screen bg-[#f7f4ef] text-[#171717]">
        <AppHeader
            :brand="siteContent.brand"
            :navigation="siteContent.navigation"
        />

        <template v-if="isTemplatePage && !publicTemplate">
            <TemplateNotFoundPage />

            <AppFooter :footer="siteContent.footer" />
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
            />

            <TemplateProductDetailsSection :template="publicTemplate" />

            <PluginLibrarySection />

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
                :packages="packages"
                :selected-package-id="selectedPackageId"
                @select-package="selectPackage"
            />

            <section
                id="builder"
                class="bg-white px-4 py-16 sm:px-6 sm:py-20 lg:py-24"
            >
                <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1.2fr_0.8fr]">
                    <SiteConfigurator
                        :features="availableFeatures"
                        :selected-feature-ids="selectedFeatureIds"
                        @toggle-feature="toggleFeature"
                    />

                    <PriceSummary
                        :selected-template="selectedTemplate"
                        :selected-package="selectedPackage"
                        :selected-features="selectedFeatures"
                        :total-price="totalPrice"
                    />
                </div>
            </section>

            <ProjectProcessSection :section="siteContent.projectProcess" />

            <FAQSection :section="siteContent.faq" />

            <FinalCTASection :section="siteContent.finalCta" />

            <ContactLeadForm
                :contact="siteContent.contact"
                :selected-template="selectedTemplate"
                :selected-package="selectedPackage"
                :selected-features="selectedFeatures"
                :total-price="totalPrice"
                @lead-created="resetSelectedFeatures"
            />

            <AppFooter :footer="siteContent.footer" />
        </template>

        <template v-else>
            <HeroSection :hero="siteContent.hero" />

            <ProductPathsSection />

            <TrustSection :items="siteContent.trust" />

            <HowItWorksSection :section="siteContent.howItWorks" />

            <WhatYouGetSection :section="siteContent.whatYouGet" />

            <AudienceSection :section="siteContent.audience" />

            <WhyWorkWithMeSection :section="siteContent.whyWorkWithMe" />

            <PortfolioSection :section="siteContent.portfolio" />

            <TemplateGallery
                :categories="templateCategories"
                :templates="filteredTemplates"
                :selected-category-key="selectedCategoryKey"
                :selected-template-id="selectedTemplateId"
                :selected-template="selectedTemplate"
                @select-category="selectCategory"
                @select-template="selectTemplate"
            />

            <PluginLibrarySection />

            <PackageSelector
                :packages="packages"
                :selected-package-id="selectedPackageId"
                @select-package="selectPackage"
            />

            <section
                id="builder"
                class="bg-white px-4 py-16 sm:px-6 sm:py-20 lg:py-24"
            >
                <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1.2fr_0.8fr]">
                    <SiteConfigurator
                        :features="availableFeatures"
                        :selected-feature-ids="selectedFeatureIds"
                        @toggle-feature="toggleFeature"
                    />

                    <PriceSummary
                        :selected-template="selectedTemplate"
                        :selected-package="selectedPackage"
                        :selected-features="selectedFeatures"
                        :total-price="totalPrice"
                    />
                </div>
            </section>

            <ProjectProcessSection :section="siteContent.projectProcess" />

            <MaintenancePlans :section="siteContent.maintenance" />

            <FAQSection :section="siteContent.faq" />

            <FinalCTASection :section="siteContent.finalCta" />

            <ContactLeadForm
                :contact="siteContent.contact"
                :selected-template="selectedTemplate"
                :selected-package="selectedPackage"
                :selected-features="selectedFeatures"
                :total-price="totalPrice"
                @lead-created="resetSelectedFeatures"
            />

            <AppFooter :footer="siteContent.footer" />
        </template>
    </main>
</template>

<script setup>
import { computed, onMounted } from "vue";
import {
    features,
    packages,
    templateCategories,
    templates,
} from "./data/siteBuilder";
import { siteContent } from "./data/siteContent";
import { useSiteBuilder } from "./composables/useSiteBuilder";
import { getRegisteredTemplate } from "./templates/templateRegistry";
import { getTemplateClientInfo } from "./templates/templateClientInfo";

import AppHeader from "./components/layout/AppHeader.vue";
import AppFooter from "./components/layout/AppFooter.vue";

import HeroSection from "./components/sections/HeroSection.vue";
import ProductPathsSection from "./components/sections/ProductPathsSection.vue";
import TrustSection from "./components/sections/TrustSection.vue";
import HowItWorksSection from "./components/sections/HowItWorksSection.vue";
import WhatYouGetSection from "./components/sections/WhatYouGetSection.vue";
import AudienceSection from "./components/sections/AudienceSection.vue";
import WhyWorkWithMeSection from "./components/sections/WhyWorkWithMeSection.vue";
import PortfolioSection from "./components/sections/PortfolioSection.vue";
import TemplateGallery from "./components/sections/TemplateGallery.vue";
import PluginLibrarySection from "./components/sections/PluginLibrarySection.vue";
import MaintenancePlans from "./components/sections/MaintenancePlans.vue";
import ProjectProcessSection from "./components/sections/ProjectProcessSection.vue";
import FAQSection from "./components/sections/FAQSection.vue";
import FinalCTASection from "./components/sections/FinalCTASection.vue";
import ContactLeadForm from "./components/sections/ContactLeadForm.vue";
import TemplatePreparationSection from "./components/sections/TemplatePreparationSection.vue";
import TemplateScopeSection from "./components/sections/TemplateScopeSection.vue";
import TemplateProductDetailsSection from "./components/sections/TemplateProductDetailsSection.vue";

import PackageSelector from "./components/builder/PackageSelector.vue";
import SiteConfigurator from "./components/sections/SiteConfigurator.vue";
import PriceSummary from "./components/builder/PriceSummary.vue";
import TemplatePublicPage from "./components/pages/TemplatePublicPage.vue";
import TemplateNotFoundPage from "./components/pages/TemplateNotFoundPage.vue";

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
} = useSiteBuilder(templates, features, templateCategories, packages);

const currentPath = window.location.pathname;

const isTemplatePage = computed(() => {
    return currentPath.startsWith("/templates/");
});

const templateSlug = computed(() => {
    if (!isTemplatePage.value) {
        return null;
    }

    return currentPath.split("/templates/")[1]?.replace(/^\/+|\/+$/g, "") || null;
});

const publicTemplate = computed(() => {
    return templates.find((template) => template.slug === templateSlug.value) || null;
});

const registeredTemplate = computed(() => {
    return getRegisteredTemplate(templateSlug.value);
});

const realTemplateComponent = computed(() => {
    return registeredTemplate.value?.component || null;
});

const realTemplateData = computed(() => {
    return registeredTemplate.value?.data || null;
});

const templateClientInfo = computed(() => {
    return getTemplateClientInfo(templateSlug.value);
});

onMounted(() => {
    if (!publicTemplate.value) {
        return;
    }

    selectCategory(publicTemplate.value.categoryKey);
    selectTemplate(publicTemplate.value.id);
});
</script>
