import PremiumStudioTemplate from './premium-studio/PremiumStudioTemplate.vue'
import { premiumStudioData } from './premium-studio/data'

import BusinessEssenceTemplate from './business-essence/BusinessEssenceTemplate.vue'
import { businessEssenceData } from './business-essence/data'

import RentalFlowTemplate from './rental-flow/RentalFlowTemplate.vue'
import { rentalFlowData } from './rental-flow/data'

import TourismStayTemplate from './tourism-stay/TourismStayTemplate.vue'
import { tourismStayData } from './tourism-stay/data'

import SimpleShopTemplate from './simple-shop/SimpleShopTemplate.vue'
import { simpleShopData } from './simple-shop/data'

import ConversionFlowTemplate from './conversion-flow/ConversionFlowTemplate.vue'
import { conversionFlowData } from './conversion-flow/data'

export const templateRegistry = {
    'premium-studio': {
        component: PremiumStudioTemplate,
        data: premiumStudioData,
    },
    'business-essence': {
        component: BusinessEssenceTemplate,
        data: businessEssenceData,
    },
    'rental-flow': {
        component: RentalFlowTemplate,
        data: rentalFlowData,
    },
    'tourism-stay': {
        component: TourismStayTemplate,
        data: tourismStayData,
    },
    'simple-shop': {
        component: SimpleShopTemplate,
        data: simpleShopData,
    },
    'conversion-flow': {
        component: ConversionFlowTemplate,
        data: conversionFlowData,
    },
}

export function getRegisteredTemplate(slug, locale = 'ro') {
    if (locale === 'en') {
        return null
    }

    return templateRegistry[slug] || null
}
