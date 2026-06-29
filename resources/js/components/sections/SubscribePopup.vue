<template>
    <transition
        enter-active-class="transition duration-200 ease-out"
        enter-from-class="opacity-0"
        leave-active-class="transition duration-200 ease-in"
        leave-to-class="opacity-0"
    >
        <div
            v-if="visible"
            class="fixed inset-0 z-[60] flex items-center justify-center p-4"
            @click.self="decline"
        >
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

            <div class="relative w-full max-w-md overflow-hidden rounded-[2rem] bg-white shadow-2xl">
                <!-- Close -->
                <button
                    type="button"
                    class="absolute right-4 top-4 z-10 grid h-9 w-9 place-items-center rounded-full bg-black/5 text-black/50 transition hover:bg-black/10 hover:text-black"
                    :aria-label="popup.dismiss"
                    @click="decline"
                >
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>

                <!-- Accent header -->
                <div class="relative bg-[#171717] px-7 pb-7 pt-9 text-white">
                    <span class="inline-flex items-center rounded-full bg-[#a67c3a] px-3 py-1 text-sm font-bold">
                        {{ popup.badge }}
                    </span>
                    <h2 class="mt-4 font-serif text-3xl font-medium leading-tight">{{ popup.title }}</h2>
                </div>

                <div class="px-7 py-7">
                    <!-- Success (briefly shown, then auto-closes) -->
                    <div v-if="subscribed" class="py-2 text-center">
                        <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-green-600 text-white">
                            <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="mt-5 font-serif text-2xl font-medium text-[#171717]">{{ popup.success_title }}</h3>
                        <p class="mx-auto mt-2 max-w-xs leading-7 text-black/55">{{ popup.success_text }}</p>
                    </div>

                    <!-- Form -->
                    <form v-else class="grid gap-4" @submit.prevent="handleSubmit">
                        <p class="leading-7 text-black/60">{{ popup.subtitle }}</p>

                        <input v-model="website" type="text" name="website" autocomplete="off" tabindex="-1" class="hidden" aria-hidden="true">

                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">{{ popup.email_label }}</span>
                            <input
                                v-model="email"
                                type="email"
                                required
                                :placeholder="popup.email_placeholder"
                                class="w-full rounded-2xl border border-black/15 bg-white px-4 py-3.5 text-[#171717] outline-none transition focus:border-[#a67c3a] focus:shadow-[0_0_0_3px_rgba(166,124,58,0.12)]"
                            >
                        </label>

                        <label class="flex cursor-pointer items-start gap-3 text-[13px] leading-5 text-black/55">
                            <input v-model="consent" type="checkbox" class="mt-0.5 h-4 w-4 shrink-0 rounded border-black/20">
                            <span>{{ popup.consent }}</span>
                        </label>

                        <p v-if="errorMessage" class="rounded-xl bg-red-50 px-4 py-3 text-sm text-red-700">
                            {{ errorMessage }}
                        </p>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-[#171717] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#a67c3a] disabled:cursor-not-allowed disabled:opacity-60"
                            :disabled="isSubmitting || !consent"
                        >
                            {{ isSubmitting ? popup.sending : popup.submit }}
                            <span v-if="!isSubmitting">→</span>
                        </button>

                        <button
                            type="button"
                            class="mx-auto -mb-1 text-[13px] font-medium text-black/40 underline-offset-4 transition hover:text-black/70 hover:underline"
                            @click="decline"
                        >
                            {{ popup.decline }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { onBeforeUnmount, onMounted, ref } from 'vue'
import { useNewsletter } from '../../composables/useNewsletter'

const props = defineProps({
    popup: { type: Object, required: true },
})

const STORAGE_KEY = 'sitego_newsletter_popup_seen_v2'
const SHOW_DELAY = 1500
const CLOSE_AFTER_SUCCESS = 2600

const visible = ref(false)
const subscribed = ref(false)
const email = ref('')
const consent = ref(false)
const website = ref('')

const { isSubmitting, errorMessage, subscribe } = useNewsletter(props.popup.messages || {})

let showTimer = null
let closeTimer = null

function alreadySeen() {
    try {
        return window.localStorage.getItem(STORAGE_KEY) === '1'
    } catch (error) {
        return false
    }
}

function markSeen() {
    try {
        window.localStorage.setItem(STORAGE_KEY, '1')
    } catch (error) {
        // storage unavailable — popup may show again next visit
    }
}

function close() {
    visible.value = false
}

// User explicitly declines ("Nu, mulțumesc" / X / backdrop): close and don't show again.
function decline() {
    markSeen()
    close()
}

async function handleSubmit() {
    const payload = {
        email: email.value.trim(),
        privacyAccepted: consent.value ? '1' : '0',
        sourcePage: window.location.pathname,
        website: website.value,
    }

    const result = await subscribe(payload)
    if (!result) return

    // Subscribed: mark seen, show a brief confirmation, then the popup disappears.
    markSeen()
    subscribed.value = true
    closeTimer = setTimeout(close, CLOSE_AFTER_SUCCESS)
}

onMounted(() => {
    if (!alreadySeen()) {
        showTimer = setTimeout(() => { visible.value = true }, SHOW_DELAY)
    }
})

onBeforeUnmount(() => {
    if (showTimer) clearTimeout(showTimer)
    if (closeTimer) clearTimeout(closeTimer)
})
</script>
