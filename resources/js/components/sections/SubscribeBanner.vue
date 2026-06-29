<template>
    <transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="-translate-y-full opacity-0"
        leave-active-class="transition duration-200 ease-in"
        leave-to-class="-translate-y-full opacity-0"
    >
        <div v-if="visible" class="relative z-30 bg-[#171717] text-white">
            <div class="mx-auto flex max-w-7xl items-center justify-center gap-3 px-4 py-2.5 sm:px-6">
                <span class="hidden h-6 shrink-0 items-center rounded-full bg-[#a67c3a] px-2.5 text-[11px] font-bold sm:inline-flex">
                    −10%
                </span>
                <p class="text-center text-[13px] leading-5 text-white/90 sm:text-sm">
                    {{ banner.text }}
                </p>
                <a
                    href="#contact"
                    class="hidden shrink-0 rounded-full bg-white px-4 py-1.5 text-[12px] font-semibold text-[#171717] transition hover:bg-[#f3eadb] sm:inline-flex"
                    @click="scrollToContact"
                >
                    {{ banner.cta }}
                </a>
                <button
                    type="button"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-white/50 transition hover:text-white sm:right-4"
                    :aria-label="banner.dismiss"
                    @click="dismiss"
                >
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
    banner: { type: Object, required: true },
})

const STORAGE_KEY = 'sitego_banner_dismissed'

function wasDismissed() {
    try {
        return window.localStorage.getItem(STORAGE_KEY) === '1'
    } catch (error) {
        return false
    }
}

const visible = ref(!wasDismissed())

function dismiss() {
    visible.value = false
    try {
        window.localStorage.setItem(STORAGE_KEY, '1')
    } catch (error) {
        // storage unavailable — banner simply reappears next visit
    }
}

function scrollToContact(event) {
    const target = document.getElementById('contact')
    if (target) {
        event.preventDefault()
        target.scrollIntoView({ behavior: 'smooth' })
    }
}
</script>
