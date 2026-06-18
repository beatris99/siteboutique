<template>
    <div
        class="fixed bottom-4 right-4 z-50 flex flex-col items-end gap-3 sm:bottom-6 sm:right-6"
    >
        <!-- Expanded actions -->
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
                    :href="whatsappLink"
                    target="_blank"
                    rel="noopener"
                    class="flex items-center gap-3 rounded-full bg-white py-2.5 pl-4 pr-2.5 text-sm font-semibold text-black shadow-lg ring-1 ring-black/5 transition hover:-translate-x-1"
                >
                    Scrie pe WhatsApp
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#25D366] text-white">
                        <WhatsappIcon class="h-5 w-5" />
                    </span>
                </a>

                <a
                    :href="`tel:${phone.replace(/\s+/g, '')}`"
                    class="flex items-center gap-3 rounded-full bg-white py-2.5 pl-4 pr-2.5 text-sm font-semibold text-black shadow-lg ring-1 ring-black/5 transition hover:-translate-x-1"
                >
                    Sună acum
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#a67c3a] text-white">
                        <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                            <path d="M6.6 10.8a15.6 15.6 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.24 11.4 11.4 0 0 0 3.6.58 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .58 3.6 1 1 0 0 1-.24 1z" />
                        </svg>
                    </span>
                </a>

                <a
                    href="#builder"
                    class="flex items-center gap-3 rounded-full bg-black py-2.5 pl-4 pr-2.5 text-sm font-semibold text-white shadow-lg transition hover:-translate-x-1"
                    @click="isOpen = false"
                >
                    Configurează site-ul
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white/15">
                        <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </span>
                </a>
            </div>
        </Transition>

        <!-- Toggle bubble -->
        <button
            type="button"
            class="flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-xl ring-4 ring-[#25D366]/20 transition hover:scale-105 motion-reduce:transition-none"
            :aria-expanded="isOpen"
            :aria-label="isOpen ? 'Închide opțiunile de contact' : 'Deschide opțiunile de contact'"
            @click="isOpen = !isOpen"
        >
            <WhatsappIcon v-if="!isOpen" class="h-7 w-7" />
            <svg v-else viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M6 6l12 12M18 6L6 18" />
            </svg>
        </button>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import WhatsappIcon from '../icons/WhatsappIcon.vue'

const props = defineProps({
    whatsapp: { type: String, default: '40747084861' },
    phone: { type: String, default: '+40 747 084 861' },
    message: {
        type: String,
        default: 'Salut! Am văzut SiteGo și aș vrea un site pentru afacerea mea.',
    },
})

const isOpen = ref(false)

const whatsappLink = computed(
    () => `https://wa.me/${props.whatsapp}?text=${encodeURIComponent(props.message)}`
)
</script>
