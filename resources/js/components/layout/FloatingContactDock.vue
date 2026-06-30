<template>
    <div class="fixed bottom-24 right-4 z-50 flex flex-col items-end gap-3 sm:bottom-6 sm:right-6">
        <Transition
            enter-active-class="transition duration-200 ease-out motion-reduce:transition-none"
            enter-from-class="translate-y-2 opacity-0"
            enter-to-class="translate-y-0 opacity-100"
            leave-active-class="transition duration-150 ease-in motion-reduce:transition-none"
            leave-from-class="translate-y-0 opacity-100"
            leave-to-class="translate-y-2 opacity-0"
        >
            <div v-show="isOpen" class="flex flex-col items-end gap-2">
                <a
                    :href="whatsappHref"
                    target="_blank"
                    rel="noopener"
                    class="flex items-center gap-3 rounded-full bg-white py-2.5 pl-4 pr-2.5 text-sm font-semibold text-black shadow-lg ring-1 ring-black/5 transition hover:-translate-x-1"
                    @click="isOpen = false"
                >
                    {{ dock.whatsapp_label || 'Scrie pe WhatsApp' }}
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#25D366] text-white">
                        <WhatsappIcon class="h-5 w-5" />
                    </span>
                </a>

                <a
                    :href="emailHref"
                    class="flex items-center gap-3 rounded-full bg-white py-2.5 pl-4 pr-2.5 text-sm font-semibold text-black shadow-lg ring-1 ring-black/5 transition hover:-translate-x-1"
                    @click="isOpen = false"
                >
                    {{ dock.email_label || 'Trimite email' }}
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-black text-white">
                        <svg viewBox="0 0 24 24" class="h-4.5 w-4.5" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 6h16v12H4z" />
                            <path d="M4 7l8 6 8-6" />
                        </svg>
                    </span>
                </a>

                <a
                    v-if="contactInfo.phone"
                    :href="phoneHref"
                    class="flex items-center gap-3 rounded-full bg-white py-2.5 pl-4 pr-2.5 text-sm font-semibold text-black shadow-lg ring-1 ring-black/5 transition hover:-translate-x-1"
                    @click="isOpen = false"
                >
                    {{ dock.phone_label || 'Sună acum' }}
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#a67c3a] text-white">
                        <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                            <path d="M6.6 10.8a15.6 15.6 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.24 11.4 11.4 0 0 0 3.6.58 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .58 3.6 1 1 0 0 1-.24 1z" />
                        </svg>
                    </span>
                </a>

                <a
                    href="/contact"
                    class="flex items-center gap-3 rounded-full bg-black py-2.5 pl-4 pr-2.5 text-sm font-semibold text-white shadow-lg transition hover:-translate-x-1"
                    @click="isOpen = false"
                >
                    {{ dock.cta_label || 'Hai să vorbim' }}
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white/15">→</span>
                </a>
            </div>
        </Transition>

        <button
            type="button"
            class="flex h-14 w-14 items-center justify-center rounded-full bg-black text-white shadow-xl ring-4 ring-black/10 transition hover:scale-105 motion-reduce:transition-none"
            :aria-expanded="isOpen"
            :aria-label="isOpen ? (dock.close_label || 'Închide') : (dock.open_label || 'Contact rapid')"
            @click="isOpen = !isOpen"
        >
            <span v-if="!isOpen" class="relative">
                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    <path d="M8 9h8" />
                    <path d="M8 13h5" />
                </svg>
            </span>
            <span v-else class="text-2xl leading-none">×</span>
        </button>
    </div>
</template>

<script setup>
import { computed, onMounted, ref } from 'vue'
import WhatsappIcon from '../icons/WhatsappIcon.vue'

const props = defineProps({
    dock: { type: Object, required: true },
    contactInfo: { type: Object, required: true },
})

const isOpen = ref(false)

const fallbackEmail = 'sitegobv@gmail.com'
const fallbackPhone = '40747084861'

const emailHref = computed(() => {
    const email = props.contactInfo.email || fallbackEmail
    return `mailto:${email}`
})

const phoneHref = computed(() => {
    const digits = (props.contactInfo.phone || fallbackPhone).replace(/\D/g, '')
    return digits ? `tel:+${digits}` : '#'
})

const whatsappHref = computed(() => {
    const digits = (props.contactInfo.phone || fallbackPhone).replace(/\D/g, '')
    const text = encodeURIComponent('Bună! Aș vrea să discutăm despre un site.')
    return digits ? `https://wa.me/${digits}?text=${text}` : '#'
})

onMounted(() => {
    if (window.innerWidth >= 1024) {
        isOpen.value = true
    }
})
</script>
