const commonCanCustomize = [
    'Numele afacerii',
    'Culorile brandului',
    'Logo-ul',
    'Textele',
    'Imaginile',
    'Serviciile / produsele',
    'Prețurile',
    'Datele de contact',
    'Formularul',
    'Buton WhatsApp',
    'Domeniul propriu',
]

const commonNotIncluded = [
    'Logo profesional, dacă nu se stabilește separat',
    'Ședință foto profesională',
    'Texte copywriting avansate',
    'Reclame Google Ads / Facebook Ads',
    'Mentenanță lunară',
    'Domeniu și hosting, dacă nu se stabilesc separat',
    'Administrare conținut complexă, dacă nu este aleasă ca funcționalitate',
]

export const templateClientInfo = {
    'premium-studio': {
        title: 'Ce am nevoie de la tine pentru Premium Studio',
        description:
            'Pentru saloane, beauty, wellness, nails, make-up sau servicii premium, materialele vizuale și lista serviciilor sunt cele mai importante.',
        requirements: [
            'Numele salonului sau brandului',
            'Logo, dacă există',
            'Culori preferate',
            'Lista serviciilor',
            'Prețuri sau intervale de preț',
            'Poze reale cu salonul / lucrările',
            'Program de lucru',
            'Telefon și WhatsApp',
            'Adresă și link Google Maps',
            'Linkuri social media',
        ],
        canCustomize: commonCanCustomize,
        notIncluded: commonNotIncluded,
    },

    'business-essence': {
        title: 'Ce am nevoie de la tine pentru Site pentru firmă locală',
        description:
            'Pentru firme locale, consultanți, cabinete sau prestatori de servicii, claritatea serviciilor și încrederea sunt esențiale.',
        requirements: [
            'Numele firmei',
            'Domeniul de activitate',
            'Lista serviciilor',
            'Descriere scurtă pentru fiecare serviciu',
            'Zone acoperite',
            'Beneficii / diferențiatori',
            'Procesul de lucru',
            'Recenzii, dacă există',
            'Telefon, email și WhatsApp',
            'Adresă sau zonă de activitate',
        ],
        canCustomize: commonCanCustomize,
        notIncluded: commonNotIncluded,
    },

    'rental-flow': {
        title: 'Ce am nevoie de la tine pentru Rental Flow',
        description:
            'Pentru închirieri, cele mai importante informații sunt produsele disponibile, tarifele, garanția și condițiile.',
        requirements: [
            'Ce produse / vehicule închiriezi',
            'Poze reale cu produsele',
            'Tarife pe zi / săptămână / lună',
            'Garanție',
            'Acte necesare',
            'Condiții de predare și returnare',
            'Ce este inclus în preț',
            'Locație de predare',
            'Program de lucru',
            'Telefon și WhatsApp',
        ],
        canCustomize: commonCanCustomize,
        notIncluded: commonNotIncluded,
    },

    'tourism-stay': {
        title: 'Ce am nevoie de la tine pentru Tourism Stay',
        description:
            'Pentru pensiuni, cabane sau apartamente, pozele reale, facilitățile și regulile de rezervare contează cel mai mult.',
        requirements: [
            'Numele locației',
            'Poze reale cu camerele / locația',
            'Tipuri de camere sau unități',
            'Prețuri pe noapte',
            'Facilități',
            'Reguli check-in / check-out',
            'Politică avans / anulare',
            'Atracții în apropiere',
            'Adresă și hartă',
            'Telefon și WhatsApp',
        ],
        canCustomize: commonCanCustomize,
        notIncluded: commonNotIncluded,
    },

    'simple-shop': {
        title: 'Ce am nevoie de la tine pentru Simple Shop',
        description:
            'Pentru un magazin mic sau catalog online, ai nevoie de produse clare, poze, categorii și o metodă simplă de comandă.',
        requirements: [
            'Numele brandului',
            'Logo, dacă există',
            'Categorii de produse',
            'Lista produselor',
            'Poze produse',
            'Prețuri',
            'Descrieri produse',
            'Stoc sau disponibilitate',
            'Metodă de comandă',
            'Telefon, email și WhatsApp',
        ],
        canCustomize: commonCanCustomize,
        notIncluded: commonNotIncluded,
    },

    'conversion-flow': {
        title: 'Ce am nevoie de la tine pentru Conversion Flow',
        description:
            'Pentru landing page-uri, trebuie să fie foarte clară oferta, beneficiile și acțiunea pe care vrei să o facă vizitatorul.',
        requirements: [
            'Ce vinzi sau promovezi',
            'Pentru cine este oferta',
            'Beneficiile principale',
            'Preț sau condiții ofertă',
            'Testimoniale / rezultate, dacă există',
            'Bonusuri, dacă există',
            'Întrebări frecvente',
            'CTA principal',
            'Date contact',
            'Linkuri pentru tracking / ads, dacă există',
        ],
        canCustomize: commonCanCustomize,
        notIncluded: commonNotIncluded,
    },
}

export function getTemplateClientInfo(slug, locale = 'ro') {
    if (locale === 'en') {
        return null
    }

    return templateClientInfo[slug] || null
}
