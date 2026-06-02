export const siteContent = {
    brand: {
        firstPart: 'Site',
        secondPart: 'Boutique',
    },

    navigation: [
        {
            label: 'Template-uri',
            href: '#templates',
        },
        {
            label: 'Configurator',
            href: '#builder',
        },
        {
            label: 'Mentenanță',
            href: '#maintenance',
        },
        {
            label: 'FAQ',
            href: '#faq',
        },
        {
            label: 'Contact',
            href: '#contact',
        },
    ],

    hero: {
        badge: 'Site-uri premium. Preț clar. Lansare rapidă.',
        title: 'Alege designul.',
        highlightedTitle: 'Construiește oferta.',
        description:
            'Site-uri moderne, configurabile și transparente pentru afaceri care vor să se lanseze rapid, fără discuții inutile și fără prețuri ascunse.',
        primaryButton: {
            label: 'Vezi template-uri',
            href: '#templates',
        },
        secondaryButton: {
            label: 'Configurează prețul',
            href: '#builder',
        },
        preview: {
            eyebrow: 'Template demo',
            title: 'Rental Business',
            description:
                'Perfect pentru scutere, biciclete, pensiuni, servicii cu rezervare sau afaceri locale.',
            priceLabel: 'De la',
            price: '2.500 lei',
            timeLabel: 'Lansare',
            time: '7 zile',
        },
    },

    howItWorks: {
        eyebrow: 'Proces',
        title: 'Cum funcționează.',
        description:
            'Am simplificat procesul ca să poți vedea rapid ce ți se potrivește și cât ar costa estimativ.',
        steps: [
            {
                number: '01',
                title: 'Alegi tipul de site',
                description:
                    'Selectezi categoria potrivită: prezentare, vânzare, rezervări, magazin online sau platformă custom.',
            },
            {
                number: '02',
                title: 'Alegi template-ul',
                description:
                    'Pornești de la un design potrivit afacerii tale, nu de la o pagină goală.',
            },
            {
                number: '03',
                title: 'Configurezi funcțiile',
                description:
                    'Alegi pachetul și extra-urile necesare, iar prețul se actualizează automat.',
            },
            {
                number: '04',
                title: 'Discutăm detaliile',
                description:
                    'Trimiți cererea, iar eu revin cu recomandări și ajustări concrete pentru proiectul tău.',
            },
        ],
    },

    maintenance: {
        eyebrow: 'Mentenanță',
        title: 'Suport lunar după lansare.',
        description:
            'Un site bun nu se termină la lansare. Îl poți păstra actualizat, rapid și sigur printr-un pachet lunar.',
        plans: [
            {
                name: 'Start',
                price: '150 lei/lună',
                description: 'Pentru site-uri simple care au nevoie de mici actualizări.',
                features: [
                    'Actualizări minore de text',
                    'Verificare funcționare site',
                    'Backup lunar',
                    'Suport pe email',
                ],
            },
            {
                name: 'Pro',
                price: '350 lei/lună',
                description: 'Pentru business-uri active care modifică periodic conținutul.',
                features: [
                    'Actualizări text și imagini',
                    'Verificare formulare',
                    'Backup lunar',
                    'Monitorizare basic',
                    'Suport prioritar',
                ],
                highlighted: true,
            },
            {
                name: 'Premium',
                price: '700 lei/lună',
                description: 'Pentru proiecte care au nevoie de optimizări și suport constant.',
                features: [
                    'Actualizări recurente',
                    'Optimizări viteză',
                    'SEO basic lunar',
                    'Raport lunar',
                    'Suport prioritar',
                ],
            },
        ],
    },

    faq: {
        eyebrow: 'FAQ',
        title: 'Întrebări frecvente.',
        description:
            'Răspunsuri rapide la întrebările pe care le au de obicei clienții înainte să pornească un proiect.',
        items: [
            {
                question: 'Prețul afișat este final?',
                answer:
                    'Prețul este estimativ. După ce trimiți configurația, discutăm concret ce ai nevoie, iar apoi primești o ofertă finală clară.',
            },
            {
                question: 'Cât durează realizarea unui site?',
                answer:
                    'Un site simplu poate fi gata în 5-7 zile lucrătoare. Proiectele cu rezervări, magazin online sau funcții custom pot dura mai mult.',
            },
            {
                question: 'Domeniul și hostingul sunt incluse?',
                answer:
                    'Pot fi incluse separat sau te pot ajuta să le alegi. În funcție de proiect, îți recomand varianta potrivită.',
            },
            {
                question: 'Pot modifica singură conținutul după lansare?',
                answer:
                    'Da, dacă alegi panou admin sau o structură editabilă. Pentru site-urile simple, modificările pot fi făcute și prin mentenanță lunară.',
            },
            {
                question: 'Se poate face și magazin online?',
                answer:
                    'Da. Poți alege categoria Magazin online și poți adăuga funcții precum coș, plată online, variante produse și cont client.',
            },
            {
                question: 'Trebuie să plătesc avans?',
                answer:
                    'Pentru începerea proiectului se poate solicita avans, iar restul se achită la livrare sau conform etapelor stabilite.',
            },
        ],
    },

    contact: {
        eyebrow: 'Contact',
        title: 'Hai să discutăm proiectul.',
        description:
            'După ce trimiți cererea, revin cu un mesaj pentru clarificări și recomandări.',
        selectedConfigurationLabel: 'Configurație aleasă',
        namePlaceholder: 'Nume',
        emailPlaceholder: 'Email',
        phonePlaceholder: 'Telefon',
        messagePlaceholder: 'Spune-mi pe scurt ce business ai.',
        buttonLabel: 'Trimite cererea',
        loadingLabel: 'Se trimite...',
    },
}
