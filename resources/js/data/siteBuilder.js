export const templateCategories = [
    {
        key: "presentation",
        label: "Prezentare",
        description:
            "Site-uri pentru firme, servicii, portofolii sau imagine de brand.",
    },
    {
        key: "sales",
        label: "Vânzare",
        description:
            "Landing page-uri orientate pe conversie, promovare și campanii.",
    },
    {
        key: "booking",
        label: "Rezervări",
        description:
            "Site-uri pentru închirieri, programări, turism sau servicii cu disponibilitate.",
    },
    {
        key: "ecommerce",
        label: "Magazin online",
        description:
            "Magazine online simple sau avansate, cu produse, coș și plăți.",
    },
    {
        key: "custom-platform",
        label: "Platformă custom",
        description:
            "Aplicații web, dashboard-uri, CRM-uri sau sisteme interne.",
    },
];

export const packages = [
    {
        id: 1,
        key: "start",
        name: "Start",
        label: "Pentru început",
        price: 2500,
        developerPrice: 490,
        description:
            "Pentru un site simplu, clar, potrivit unei afaceri la început.",
        clientDescription: "Îți fac eu site-ul pornind de la modelul ales.",
        developerDescription: "Primești template-ul și îl integrezi tu.",
        includes: [
            "Model de site ales",
            "Adaptare culori și texte",
            "4-5 secțiuni principale",
            "Formular de contact",
            "Variantă mobil și desktop",
            "Setări Google de bază",
        ],
    },
    {
        id: 2,
        key: "pro",
        name: "Pro",
        label: "Recomandat",
        price: 4500,
        developerPrice: 890,
        description:
            "Pentru o afacere care vrea un site complet și mai convingător.",
        clientDescription:
            "Îți fac eu site-ul complet, cu mai multe secțiuni și funcții.",
        developerDescription:
            "Primești template-ul, componentele și structura pregătită.",
        includes: [
            "Tot ce include Start",
            "Mai multe secțiuni personalizate",
            "Funcționalități extra",
            "Texte structurate mai bine",
            "Optimizare viteză",
            "Pregătire pentru reclame",
        ],
    },
    {
        id: 3,
        key: "premium",
        name: "Premium",
        label: "Complet",
        price: 7500,
        developerPrice: 1290,
        description:
            "Pentru proiecte care au nevoie de imagine premium și structură mai avansată.",
        clientDescription:
            "Îți fac eu un site mai complex, adaptat serios pe business.",
        developerDescription:
            "Primești kit complet: template, componente, documentație.",
        includes: [
            "Tot ce include Pro",
            "Design mai personalizat",
            "Pagini extra",
            "Funcționalități avansate",
            "Structură pentru vânzare / cereri",
            "Suport lansare",
        ],
    },
];

export const templates = [
    {
        id: 1,
        slug: "business-essence",
        categoryKey: "presentation",
        name: "Business Essence",
        category: "Prezentare",
        description:
            "Pentru firme locale, cabinete, consultanță, servicii premium sau brand personal.",
        basePrice: 2200,
        deliveryTime: "5-7 zile",
        pages: ["Acasă", "Despre", "Servicii", "Contact"],
        idealFor: [
            "Firme locale",
            "Cabinete",
            "Consultanță",
            "Servicii premium",
        ],
        includes: [
            "Design responsive",
            "Structură clară de prezentare",
            "Formular de contact",
            "SEO basic",
        ],
        preview: {
            eyebrow: "Business local",
            headline:
                "Servicii profesionale pentru clienți care caută încredere.",
            subheadline:
                "O pagină clară, modernă și ușor de parcurs pentru firme locale.",
            primaryButton: "Cere ofertă",
            secondaryButton: "Vezi servicii",
            stats: [
                { label: "Pagini", value: "4+" },
                { label: "Lansare", value: "7 zile" },
            ],
            sections: ["Servicii", "Beneficii", "Testimoniale"],
        },
    },
    {
        id: 2,
        slug: "premium-studio",
        categoryKey: "presentation",
        name: "Premium Studio",
        category: "Prezentare",
        description:
            "Pentru beauty, design interior, fotografie, wellness sau servicii creative.",
        basePrice: 2600,
        deliveryTime: "7-10 zile",
        pages: ["Acasă", "Portofoliu", "Servicii", "Despre", "Contact"],
        idealFor: ["Beauty", "Fotografie", "Wellness", "Design interior"],
        includes: [
            "Design premium",
            "Galerie imagini",
            "Secțiune servicii",
            "Formular contact",
        ],
        preview: {
            eyebrow: "Studio premium",
            headline:
                "Imagine elegantă pentru servicii vizuale și experiențe premium.",
            subheadline:
                "Un design aerisit, cu accent pe imagini, emoție și conversie.",
            primaryButton: "Programează-te",
            secondaryButton: "Vezi portofoliu",
            stats: [
                { label: "Galerie", value: "Inclusă" },
                { label: "Stil", value: "Premium" },
            ],
            sections: ["Portofoliu", "Servicii", "Contact rapid"],
        },
    },
    {
        id: 3,
        slug: "launch-page",
        categoryKey: "sales",
        name: "Launch Page",
        category: "Vânzare",
        description:
            "Landing page pentru promovarea unui produs, serviciu, curs sau ofertă limitată.",
        basePrice: 1800,
        deliveryTime: "3-5 zile",
        pages: ["Landing page"],
        idealFor: ["Campanii", "Cursuri", "Servicii", "Produse digitale"],
        includes: [
            "Hero orientat spre conversie",
            "Secțiune beneficii",
            "Call-to-action clar",
            "Formular lead",
        ],
        preview: {
            eyebrow: "Campanie rapidă",
            headline:
                "Lansează o ofertă clară și transformă vizitatorii în lead-uri.",
            subheadline:
                "Landing page direct, cu beneficii, ofertă și formular de contact.",
            primaryButton: "Vreau oferta",
            secondaryButton: "Află detalii",
            stats: [
                { label: "Focus", value: "Lead-uri" },
                { label: "Pagini", value: "1" },
            ],
            sections: ["Beneficii", "Ofertă", "FAQ"],
        },
    },
    {
        id: 4,
        slug: "conversion-flow",
        categoryKey: "sales",
        name: "Conversion Flow",
        category: "Vânzare",
        description:
            "Pagină de vânzare cu secțiuni de beneficii, testimoniale, ofertă și call-to-action.",
        basePrice: 2500,
        deliveryTime: "5-7 zile",
        pages: ["Landing page extins"],
        idealFor: ["Servicii premium", "Cursuri", "Lansări", "Campanii ads"],
        includes: [
            "Structură de vânzare",
            "Testimoniale",
            "Secțiune ofertă",
            "Tracking conversii opțional",
        ],
        preview: {
            eyebrow: "Sales flow",
            headline:
                "Pagină construită pentru promovare, argumente și conversie.",
            subheadline:
                "Ideală pentru reclame, servicii premium sau lansări cu termen limitat.",
            primaryButton: "Cumpără / Cere ofertă",
            secondaryButton: "Vezi beneficiile",
            stats: [
                { label: "CTA-uri", value: "Multiple" },
                { label: "Conversie", value: "Focus" },
            ],
            sections: ["Problemă", "Soluție", "Dovadă socială"],
        },
    },
    {
        id: 5,
        slug: "rental-flow",
        categoryKey: "booking",
        name: "Rental Flow",
        category: "Rezervări",
        description:
            "Pentru scutere, biciclete, ATV-uri, echipamente sau servicii de închiriere.",
        basePrice: 2500,
        deliveryTime: "7-10 zile",
        pages: [
            "Acasă",
            "Vehicule / Produse",
            "Prețuri",
            "Cum funcționează",
            "Contact",
        ],
        idealFor: ["Închirieri scutere", "Biciclete", "ATV-uri", "Echipamente"],
        includes: [
            "Listare produse/vehicule",
            "Secțiune prețuri",
            "Formular rezervare",
            "Buton WhatsApp opțional",
        ],
        preview: {
            eyebrow: "Rental business",
            headline: "Închirieri rapide cu prețuri clare și rezervare simplă.",
            subheadline:
                "Prezintă flota, condițiile, prețurile și pașii de rezervare.",
            primaryButton: "Rezervă acum",
            secondaryButton: "Vezi prețuri",
            stats: [
                { label: "Flotă", value: "Listată" },
                { label: "Rezervări", value: "Formular" },
            ],
            sections: ["Vehicule", "Tarife", "Cum funcționează"],
        },
    },
    {
        id: 6,
        slug: "tourism-stay",
        categoryKey: "booking",
        name: "Tourism Stay",
        category: "Rezervări",
        description:
            "Pentru pensiuni, cabane, apartamente, tururi sau experiențe turistice locale.",
        basePrice: 2800,
        deliveryTime: "7-10 zile",
        pages: [
            "Acasă",
            "Camere / Servicii",
            "Galerie",
            "Rezervare",
            "Contact",
        ],
        idealFor: ["Pensiuni", "Cabane", "Apartamente", "Tururi locale"],
        includes: [
            "Prezentare locație",
            "Galerie foto",
            "Formular rezervare",
            "Google Maps opțional",
        ],
        preview: {
            eyebrow: "Turism local",
            headline:
                "Transformă o locație frumoasă într-o experiență ușor de rezervat.",
            subheadline:
                "Prezentare elegantă pentru cazare, tururi sau experiențe locale.",
            primaryButton: "Verifică disponibilitatea",
            secondaryButton: "Vezi galeria",
            stats: [
                { label: "Galerie", value: "Da" },
                { label: "Rezervări", value: "Da" },
            ],
            sections: ["Camere", "Experiențe", "Recenzii"],
        },
    },
    {
        id: 7,
        slug: "simple-shop",
        categoryKey: "ecommerce",
        name: "Simple Shop",
        category: "Magazin online",
        description:
            "Magazin online simplu, cu produse, categorii, coș și cerere de ofertă sau comandă.",
        basePrice: 3900,
        deliveryTime: "10-14 zile",
        pages: ["Acasă", "Produse", "Categorie", "Produs", "Contact"],
        idealFor: [
            "Magazine mici",
            "Produse handmade",
            "Afaceri locale",
            "Cataloage produse",
        ],
        includes: [
            "Listare produse",
            "Categorii produse",
            "Pagină produs",
            "Cerere ofertă sau comandă",
        ],
        preview: {
            eyebrow: "Shop simplu",
            headline: "Prezintă produsele clar și primește cereri sau comenzi.",
            subheadline:
                "Pentru afaceri care vor să înceapă simplu, fără sistem complicat.",
            primaryButton: "Vezi produse",
            secondaryButton: "Cere ofertă",
            stats: [
                { label: "Produse", value: "Listate" },
                { label: "Comenzi", value: "Simplu" },
            ],
            sections: ["Categorii", "Produse", "Contact"],
        },
    },
    {
        id: 8,
        slug: "premium-store",
        categoryKey: "ecommerce",
        name: "Premium Store",
        category: "Magazin online",
        description:
            "Magazin online complet, cu variante produse, plăți online și administrare.",
        basePrice: 5900,
        deliveryTime: "14-21 zile",
        pages: [
            "Acasă",
            "Shop",
            "Categorii",
            "Produs",
            "Coș",
            "Checkout",
            "Cont client",
        ],
        idealFor: [
            "Magazine online",
            "Branduri premium",
            "Produse cu variante",
            "Comenzi online",
        ],
        includes: [
            "Coș cumpărături",
            "Checkout",
            "Variante produse",
            "Administrare produse",
        ],
        preview: {
            eyebrow: "Premium ecommerce",
            headline: "Magazin online pregătit pentru vânzare și administrare.",
            subheadline:
                "Structură completă pentru produse, variante, coș și checkout.",
            primaryButton: "Cumpără acum",
            secondaryButton: "Explorează shop-ul",
            stats: [
                { label: "Checkout", value: "Inclus" },
                { label: "Admin", value: "Inclus" },
            ],
            sections: ["Shop", "Coș", "Checkout"],
        },
    },
    {
        id: 9,
        slug: "client-portal",
        categoryKey: "custom-platform",
        name: "Client Portal",
        category: "Platformă custom",
        description:
            "Platformă cu autentificare, conturi clienți, dashboard și funcționalități personalizate.",
        basePrice: 8500,
        deliveryTime: "21+ zile",
        pages: [
            "Login",
            "Dashboard",
            "Profil client",
            "Administrare",
            "Rapoarte",
        ],
        idealFor: [
            "Dashboard-uri",
            "CRM-uri",
            "Platforme interne",
            "Portaluri clienți",
        ],
        includes: [
            "Autentificare",
            "Dashboard personalizat",
            "Structură backend",
            "Funcționalități custom",
        ],
        preview: {
            eyebrow: "Platformă custom",
            headline:
                "Dashboard personalizat pentru date, clienți și procese interne.",
            subheadline:
                "Pentru afaceri care au nevoie de mai mult decât un site de prezentare.",
            primaryButton: "Vezi dashboard",
            secondaryButton: "Cere consultanță",
            stats: [
                { label: "Login", value: "Da" },
                { label: "Custom", value: "100%" },
            ],
            sections: ["Dashboard", "Rapoarte", "Utilizatori"],
        },
    },
];

export const features = [
    {
        id: 1,
        category: "Contact",
        name: "Buton WhatsApp",
        plainName: "Clientul te poate contacta direct pe WhatsApp.",
        price: 150,
        developerPrice: 49,
        availableFor: ["start", "pro", "premium"],
    },
    {
        id: 2,
        category: "Contact",
        name: "Formular de contact",
        plainName: "Primești cereri direct din site.",
        price: 300,
        developerPrice: 99,
        availableFor: ["start", "pro", "premium"],
    },
    {
        id: 3,
        category: "Contact",
        name: "Formular de rezervare",
        plainName: "Clientul poate cere o dată, o oră sau o perioadă.",
        price: 600,
        developerPrice: 199,
        availableFor: ["pro", "premium"],
    },
    {
        id: 4,
        category: "Conținut",
        name: "Galerie foto",
        plainName: "Afișezi poze cu produse, salon, camere sau lucrări.",
        price: 300,
        developerPrice: 99,
        availableFor: ["start", "pro", "premium"],
    },
    {
        id: 5,
        category: "Conținut",
        name: "Listă servicii și prețuri",
        plainName: "Arăți clar ce oferi și cât costă.",
        price: 350,
        developerPrice: 149,
        availableFor: ["start", "pro", "premium"],
    },
    {
        id: 6,
        category: "Conținut",
        name: "Întrebări frecvente",
        plainName: "Răspunzi dinainte la întrebările clienților.",
        price: 200,
        developerPrice: 79,
        availableFor: ["start", "pro", "premium"],
    },
    {
        id: 7,
        category: "Localizare",
        name: "Google Maps",
        plainName: "Clientul vede rapid unde te găsește.",
        price: 200,
        developerPrice: 79,
        availableFor: ["start", "pro", "premium"],
    },
    {
        id: 8,
        category: "Vânzare",
        name: "Catalog produse",
        plainName: "Afișezi produse cu poză, preț și descriere.",
        price: 900,
        developerPrice: 299,
        availableFor: ["pro", "premium"],
    },
    {
        id: 9,
        category: "Vânzare",
        name: "Coș de cumpărături simplu",
        plainName: "Clientul poate adăuga produse în coș.",
        price: 1800,
        developerPrice: 699,
        availableFor: ["premium"],
    },
    {
        id: 10,
        category: "Vânzare",
        name: "Plată online",
        plainName: "Integrare pentru plată cu cardul.",
        price: 1800,
        developerPrice: 699,
        availableFor: ["premium"],
    },
    {
        id: 11,
        category: "Administrare",
        name: "Panou cereri clienți",
        plainName: "Vezi cererile primite într-un panou de administrare.",
        price: 1200,
        developerPrice: 399,
        availableFor: ["pro", "premium"],
    },
    {
        id: 12,
        category: "Administrare",
        name: "Administrare produse / servicii",
        plainName: "Poți modifica produse, servicii sau prețuri din admin.",
        price: 1800,
        developerPrice: 699,
        availableFor: ["premium"],
    },
    {
        id: 13,
        category: "Google",
        name: "Setări Google de bază",
        plainName: "Titluri, descrieri, sitemap și structură pentru indexare.",
        price: 700,
        developerPrice: 249,
        availableFor: ["start", "pro", "premium"],
    },
    {
        id: 14,
        category: "Google",
        name: "Google Analytics",
        plainName: "Vezi câți oameni intră pe site.",
        price: 250,
        developerPrice: 99,
        availableFor: ["start", "pro", "premium"],
    },
    {
        id: 15,
        category: "Avansat",
        name: "Site în română și engleză",
        plainName: "Site multilingv cu două limbi.",
        price: 1500,
        developerPrice: 499,
        availableFor: ["pro", "premium"],
    },
];
