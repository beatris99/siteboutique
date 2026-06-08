<template>
    <div>
        <p class="text-sm uppercase tracking-[0.25em] text-[#a67c3a]">
            Configurator
        </p>

        <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
            Alege ce vrei să poată face site-ul.
        </h2>

        <p class="mt-4 max-w-2xl leading-8 text-black/60">
            Pornești de la modelul ales și adaugi funcții concrete. Nu trebuie să știi cod.
            Alegi ce are nevoie afacerea ta.
        </p>

        <div class="mt-8 grid gap-8">
            <div
                v-for="group in groupedFeatures"
                :key="group.category"
            >
                <div class="mb-4 flex items-center justify-between gap-4">
                    <h3 class="text-xl font-semibold">
                        {{ group.category }}
                    </h3>

                    <span class="text-sm text-black/40">
                        {{ group.items.length }} opțiuni
                    </span>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <button
                        v-for="feature in group.items"
                        :key="feature.id"
                        type="button"
                        class="rounded-[1.5rem] border p-5 text-left transition hover:-translate-y-1 hover:shadow-lg"
                        :class="isSelected(feature.id)
                            ? 'border-black bg-black text-white'
                            : 'border-black/10 bg-white text-black'"
                        @click="$emit('toggle-feature', feature.id)"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex gap-3">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl text-sm font-bold"
                                    :class="isSelected(feature.id)
                                        ? 'bg-white text-black'
                                        : 'bg-[#f7f4ee] text-[#a67c3a]'"
                                >
                                    <WhatsappIcon
                                        v-if="feature.name === 'Buton WhatsApp'"
                                        class="h-6 w-6"
                                    />

                                    <span v-else>
    {{ getIcon(feature.name) }}
</span>
                                </div>

                                <div>
                                    <p class="font-semibold">
                                        {{ feature.name }}
                                    </p>

                                    <p
                                        class="mt-2 text-sm leading-6"
                                        :class="isSelected(feature.id) ? 'text-white/60' : 'text-black/50'"
                                    >
                                        {{ feature.plainName }}
                                    </p>
                                </div>
                            </div>

                            <span
                                class="shrink-0 rounded-full px-3 py-1 text-xs font-semibold"
                                :class="isSelected(feature.id)
                                    ? 'bg-white text-black'
                                    : 'bg-[#f7f4ee] text-black'"
                            >
                                {{ isSelected(feature.id) ? 'Adăugat' : 'Adaugă' }}
                            </span>
                        </div>

                        <div
                            class="mt-5 rounded-2xl p-4"
                            :class="isSelected(feature.id) ? 'bg-white/10' : 'bg-[#f7f4ee]'"
                        >
                            <p
                                class="text-xs font-semibold uppercase tracking-[0.2em]"
                                :class="isSelected(feature.id) ? 'text-white/40' : 'text-black/40'"
                            >
                                Exemplu concret
                            </p>

                            <p
                                class="mt-2 text-sm leading-6"
                                :class="isSelected(feature.id) ? 'text-white/70' : 'text-black/60'"
                            >
                                {{ getExample(feature.name) }}
                            </p>
                        </div>

                        <div class="mt-5 grid gap-2 text-sm">
                            <div class="flex justify-between gap-4">
                                <span :class="isSelected(feature.id) ? 'text-white/50' : 'text-black/50'">
                                    Dacă ți-l fac eu
                                </span>
                                <strong>{{ formatPrice(feature.price) }}</strong>
                            </div>

                            <div class="flex justify-between gap-4">
                                <span :class="isSelected(feature.id) ? 'text-white/50' : 'text-black/50'">
                                    Pentru developer
                                </span>
                                <strong>{{ formatPrice(feature.developerPrice) }}</strong>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import WhatsappIcon from '../icons/WhatsappIcon.vue'

const props = defineProps({
    features: {
        type: Array,
        required: true,
    },
    selectedFeatureIds: {
        type: Array,
        required: true,
    },
})

defineEmits(['toggle-feature'])

const groupedFeatures = computed(() => {
    const groups = {}

    props.features.forEach(feature => {
        if (!groups[feature.category]) {
            groups[feature.category] = []
        }

        groups[feature.category].push(feature)
    })

    return Object.entries(groups).map(([category, items]) => ({
        category,
        items,
    }))
})

function isSelected(featureId) {
    return props.selectedFeatureIds.includes(featureId)
}

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString('ro-RO')} lei`
}

function getIcon(name) {
    const icons = {
        'Formular de contact': '✉',
        'Formular de rezervare': '📅',
        'Galerie foto / video': '▣',
        'Listă servicii și prețuri': '☰',
        'Întrebări frecvente': '?',
        'Testimoniale / recenzii': '★',
        'Google Maps': '⌖',
        'Catalog produse': '□',
        'Coș de cumpărături': '🛒',
        'Checkout / comandă': '✓',
        'Plată online': '💳',
        'Newsletter / abonare': '↗',
        'Google Analytics': 'GA',
        'Pixel Facebook / TikTok': 'PX',
        'Panou cereri clienți': 'ADM',
        'Administrare produse / servicii': '⚙',
        'Setări Google de bază': 'SEO',
        'Site în română și engleză': 'RO',
        'Cont client / autentificare': '🔐',
    }

    return icons[name] || '+'
}

function getExample(name) {
    const examples = {
        'Formular de contact': 'Exemplu: clientul completează nume, telefon și mesaj, iar tu primești cererea pe email.',
        'Buton WhatsApp': 'Exemplu: vizitatorul apasă „Scrie pe WhatsApp” și îți trimite direct mesaj.',
        'Formular de rezervare': 'Exemplu: clientul alege ziua, perioada și îți trimite cerere de disponibilitate.',
        'Galerie foto / video': 'Exemplu: afișezi poze cu salonul, produsele, camerele, lucrările sau rezultatele.',
        'Listă servicii și prețuri': 'Exemplu: arăți clar pachetele: Basic, Pro, Premium sau lista de servicii cu preț.',
        'Întrebări frecvente': 'Exemplu: „Cum rezerv?”, „Cât durează?”, „Ce este inclus?” într-o secțiune ușor de citit.',
        'Testimoniale / recenzii': 'Exemplu: afișezi 3-6 păreri scurte de la clienți mulțumiți.',
        'Google Maps': 'Exemplu: clientul vede locația și poate deschide traseul direct pe telefon.',
        'Catalog produse': 'Exemplu: produse cu imagine, nume, descriere, preț și categorie.',
        'Coș de cumpărături': 'Exemplu: clientul adaugă mai multe produse și vede totalul înainte de comandă.',
        'Checkout / comandă': 'Exemplu: clientul trimite o comandă cu datele lui și produsele alese.',
        'Plată online': 'Exemplu: clientul poate plăti cu cardul după ce alege produsul sau serviciul.',
        'Newsletter / abonare': 'Exemplu: vizitatorii își lasă emailul pentru oferte, reduceri sau noutăți.',
        'Google Analytics': 'Exemplu: vezi câți oameni intră pe site și ce pagini vizitează cel mai des.',
        'Pixel Facebook / TikTok': 'Exemplu: poți măsura rezultatele reclamelor și cine ajunge pe site din campanii.',
        'Panou cereri clienți': 'Exemplu: vezi într-o pagină toate cererile primite, statusul și notițele.',
        'Administrare produse / servicii': 'Exemplu: poți modifica produse, servicii sau prețuri fără să intri în cod.',
        'Setări Google de bază': 'Exemplu: titluri, descrieri, sitemap și structură mai bună pentru indexare.',
        'Site în română și engleză': 'Exemplu: clientul poate schimba limba între RO și EN.',
        'Cont client / autentificare': 'Exemplu: utilizatorii pot intra într-un cont cu date, comenzi sau documente.',
    }

    return examples[name] || 'Funcționalitate adaptată în funcție de proiect.'
}
</script>
