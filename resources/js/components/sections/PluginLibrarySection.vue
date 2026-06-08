<template>
    <section class="bg-white px-4 py-14 sm:px-6 lg:py-16">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#a67c3a]">
                        Funcționalități
                    </p>

                    <h2 class="mt-3 text-3xl font-semibold leading-tight sm:text-4xl lg:text-5xl">
                        Adaugi ce are nevoie site-ul tău.
                    </h2>

                    <p class="mt-4 text-sm leading-7 text-black/60 sm:text-base">
                        Alegi lucruri concrete: formular, rezervare, galerie, produse,
                        hartă, recenzii sau buton de WhatsApp.
                    </p>
                </div>

                <a
                    href="#builder"
                    class="inline-flex w-fit rounded-full bg-black px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#a67c3a]"
                >
                    Configurează site-ul
                </a>
            </div>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <article
                    v-for="plugin in pluginItems"
                    :key="plugin.name"
                    class="group overflow-hidden rounded-[2rem] border border-black/10 bg-[#f7f4ee] transition hover:-translate-y-1 hover:border-[#a67c3a] hover:bg-white hover:shadow-xl"
                >
                    <div
                        class="min-h-36 p-5"
                        :style="{ background: plugin.background }"
                    >
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/90 text-[#a67c3a] shadow-sm">
                                <WhatsappIcon
                                    v-if="plugin.type === 'whatsapp'"
                                    class="h-6 w-6"
                                />

                                <span
                                    v-else
                                    class="text-sm font-bold"
                                >
                                    {{ plugin.icon }}
                                </span>
                            </div>

                            <span class="rounded-full bg-white/80 px-3 py-1 text-[11px] font-semibold text-black/50">
                                {{ plugin.category }}
                            </span>
                        </div>

                        <div class="mt-8 rounded-2xl bg-white/80 p-4 shadow-sm backdrop-blur">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-black/40">
                                Exemplu
                            </p>

                            <p class="mt-2 text-sm font-semibold text-black">
                                {{ plugin.exampleTitle }}
                            </p>

                            <p class="mt-1 text-xs leading-5 text-black/50">
                                {{ plugin.exampleText }}
                            </p>
                        </div>
                    </div>

                    <div class="p-5">
                        <h3 class="text-lg font-semibold">
                            {{ plugin.name }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-black/60">
                            {{ plugin.description }}
                        </p>

                        <div class="mt-5 grid gap-2">
                            <div
                                v-for="benefit in plugin.benefits"
                                :key="benefit"
                                class="flex gap-2 text-xs leading-5 text-black/60"
                            >
                                <span class="text-[#a67c3a]">✓</span>
                                <span>{{ benefit }}</span>
                            </div>
                        </div>

                        <div class="mt-5 flex flex-wrap gap-2">
                            <span
                                v-for="useCase in plugin.useCases"
                                :key="useCase"
                                class="rounded-full bg-[#f7f4ee] px-3 py-1 text-[11px] font-semibold text-black/50"
                            >
                                {{ useCase }}
                            </span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
import WhatsappIcon from '../icons/WhatsappIcon.vue'

const pluginItems = [
    {
        icon: '✉',
        category: 'Contact',
        name: 'Formular de contact',
        description: 'Clientul îți poate trimite nume, telefon, email și mesaj direct din site.',
        exampleTitle: '„Vreau mai multe detalii”',
        exampleText: 'Formular simplu pentru cereri, întrebări sau programări.',
        background: 'linear-gradient(135deg, #fef3c7 0%, #fde68a 100%)',
        benefits: ['Primești cereri clare', 'Nu pierzi clienți interesați', 'Poate fi conectat la email'],
        useCases: ['Servicii', 'Cabinete', 'Consultanță'],
    },
    {
        type: 'whatsapp',
        category: 'Contact rapid',
        name: 'Buton WhatsApp',
        description: 'Vizitatorul apasă pe buton și începe direct conversația cu tine.',
        exampleTitle: '„Scrie pe WhatsApp”',
        exampleText: 'Bun pentru business-uri unde clientul întreabă rapid.',
        background: 'linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%)',
        benefits: ['Contact rapid', 'Foarte util pe mobil', 'Perfect pentru servicii locale'],
        useCases: ['Beauty', 'Închirieri', 'Cazare'],
    },
    {
        icon: '📅',
        category: 'Rezervări',
        name: 'Formular de rezervare',
        description: 'Clientul poate alege o dată, o perioadă sau poate trimite o cerere de disponibilitate.',
        exampleTitle: '„Verifică disponibilitatea”',
        exampleText: 'Ideal pentru închirieri, pensiuni, saloane sau programări.',
        background: 'linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%)',
        benefits: ['Ceri date utile din prima', 'Simplifică programările', 'Reduce mesajele repetitive'],
        useCases: ['Cazare', 'Scutere', 'Programări'],
    },
    {
        icon: '▣',
        category: 'Conținut',
        name: 'Galerie foto / video',
        description: 'Afișezi poze cu produse, lucrări, camere, locație sau rezultate.',
        exampleTitle: '„Vezi galeria”',
        exampleText: 'Ajută clientul să vadă concret ce oferi.',
        background: 'linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%)',
        benefits: ['Arată vizual calitatea', 'Crește încrederea', 'Bun pentru servicii premium'],
        useCases: ['Salon', 'Pensiune', 'Portofoliu'],
    },
    {
        icon: '☰',
        category: 'Prețuri',
        name: 'Listă servicii și prețuri',
        description: 'Afișezi clar serviciile, pachetele sau tarifele, ca oamenii să înțeleagă rapid costurile.',
        exampleTitle: '„Servicii de la 150 lei”',
        exampleText: 'Listă aerisită cu nume, descriere și preț.',
        background: 'linear-gradient(135deg, #ede9fe 0%, #ddd6fe 100%)',
        benefits: ['Clarifică oferta', 'Reduce întrebările repetitive', 'Ajută clientul să decidă'],
        useCases: ['Beauty', 'Consultanță', 'Servicii'],
    },
    {
        icon: '?',
        category: 'Întrebări',
        name: 'Întrebări frecvente',
        description: 'Răspunzi direct la întrebările pe care clienții le pun mereu.',
        exampleTitle: '„Cum fac o rezervare?”',
        exampleText: 'Întrebări care se deschid și se închid simplu.',
        background: 'linear-gradient(135deg, #f5f5f4 0%, #e7e5e4 100%)',
        benefits: ['Explică pe scurt', 'Face pagina mai clară', 'Crește încrederea'],
        useCases: ['Orice site', 'Magazine', 'Servicii'],
    },
    {
        icon: '★',
        category: 'Încredere',
        name: 'Testimoniale / recenzii',
        description: 'Afișezi părerile clienților sau exemple de rezultate.',
        exampleTitle: '„Recomand cu drag”',
        exampleText: 'Carduri cu recenzii scurte și ușor de citit.',
        background: 'linear-gradient(135deg, #fff7ed 0%, #fed7aa 100%)',
        benefits: ['Dovadă socială', 'Mai multă încredere', 'Ajută vânzarea'],
        useCases: ['Servicii', 'Beauty', 'Cursuri'],
    },
    {
        icon: '⌖',
        category: 'Localizare',
        name: 'Hartă Google',
        description: 'Clientul vede rapid unde ești și poate deschide traseul.',
        exampleTitle: '„Găsește-ne ușor”',
        exampleText: 'Hartă integrată pentru locație fizică.',
        background: 'linear-gradient(135deg, #ecfeff 0%, #a5f3fc 100%)',
        benefits: ['Util pentru business local', 'Ajută pe mobil', 'Crește șansa de vizită'],
        useCases: ['Cabinet', 'Salon', 'Pensiune'],
    },
    {
        icon: '□',
        category: 'Produse',
        name: 'Catalog produse',
        description: 'Afișezi produse cu poză, preț, descriere și categorie.',
        exampleTitle: '„Vezi produsele”',
        exampleText: 'Carduri pentru produse, colecții sau servicii ambalate.',
        background: 'linear-gradient(135deg, #faf7f2 0%, #e8d6bd 100%)',
        benefits: ['Potrivit pentru shop simplu', 'Poate porni fără plată online', 'Bun pentru catalog online'],
        useCases: ['Handmade', 'Produse', 'Catalog'],
    },
    {
        icon: '🛒',
        category: 'Magazin',
        name: 'Coș de cumpărături',
        description: 'Clientul poate adăuga produse într-un coș înainte de comandă.',
        exampleTitle: '„Adaugă în coș”',
        exampleText: 'Pentru magazine care vor o experiență mai apropiată de ecommerce.',
        background: 'linear-gradient(135deg, #eff6ff 0%, #bfdbfe 100%)',
        benefits: ['Mai clar pentru cumpărător', 'Potrivit pentru mai multe produse', 'Pregătește checkout-ul'],
        useCases: ['Shop', 'Produse', 'Ecommerce'],
    },
    {
        icon: '💳',
        category: 'Plată',
        name: 'Plată online',
        description: 'Integrare pentru plată cu cardul, în funcție de procesatorul ales.',
        exampleTitle: '„Plătește cu cardul”',
        exampleText: 'Pentru magazine sau servicii care vând direct online.',
        background: 'linear-gradient(135deg, #eef2ff 0%, #c7d2fe 100%)',
        benefits: ['Vânzare directă', 'Comenzi mai rapide', 'Potrivit pentru ecommerce'],
        useCases: ['Shop', 'Cursuri', 'Rezervări'],
    },
    {
        icon: 'RO',
        category: 'Limbi',
        name: 'Română / Engleză',
        description: 'Site-ul poate avea două limbi, cu buton de schimbare.',
        exampleTitle: '„RO / EN”',
        exampleText: 'Util pentru turism, servicii internaționale sau branduri premium.',
        background: 'linear-gradient(135deg, #f1f5f9 0%, #cbd5e1 100%)',
        benefits: ['Mai accesibil pentru străini', 'Bun pentru turism', 'Imagine mai profesională'],
        useCases: ['Turism', 'Premium', 'Servicii'],
    },
]
</script>
