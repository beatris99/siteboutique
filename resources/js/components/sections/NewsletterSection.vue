<template>
    <section id="newsletter" class="bg-[#f7f4ef] px-4 py-12 sm:px-6 lg:py-16">
        <div class="mx-auto grid max-w-7xl gap-8 rounded-[2rem] border border-black/10 bg-white p-6 shadow-[0_24px_80px_rgba(23,23,23,0.06)] sm:p-8 lg:grid-cols-[0.9fr_1.1fr] lg:p-10">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#a67c3a]">
                    {{ t.eyebrow }}
                </p>

                <h2 class="mt-4 max-w-xl font-serif text-3xl font-medium leading-tight text-[#171717] sm:text-4xl">
                    {{ t.title }}
                </h2>

                <p class="mt-4 max-w-xl text-base leading-8 text-black/60">
                    {{ t.description }}
                </p>

                <div class="mt-7 grid gap-3 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                    <div
                        v-for="item in t.points"
                        :key="item.title"
                        class="rounded-2xl bg-[#f7f4ef] p-4"
                    >
                        <p class="font-semibold text-[#171717]">{{ item.title }}</p>
                        <p class="mt-1 text-sm leading-6 text-black/55">{{ item.text }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[1.5rem] bg-[#171717] p-5 text-white sm:p-6">
                <div v-if="successMessage" class="rounded-2xl bg-white px-5 py-5 text-[#171717]">
                    <p class="font-semibold">{{ t.success_subscribe_title }}</p>
                    <p class="mt-2 text-sm leading-6 text-black/60">{{ successMessage }}</p>
                    <button
                        type="button"
                        class="mt-4 text-sm font-semibold text-[#a67c3a]"
                        @click="resetForm"
                    >
                        {{ t.send_another }}
                    </button>
                </div>

                <form v-else class="grid gap-4" @submit.prevent="handleSubmit">
                    <input v-model="website" type="text" name="website" autocomplete="off" tabindex="-1" class="hidden" aria-hidden="true">

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-white/75">{{ t.email_label }}</span>
                        <input
                            v-model="email"
                            type="email"
                            required
                            :placeholder="t.email_placeholder"
                            class="w-full rounded-2xl border border-white/10 bg-white px-4 py-3.5 text-[#171717] outline-none transition placeholder:text-black/35 focus:border-[#d8c3a5] focus:shadow-[0_0_0_3px_rgba(216,195,165,0.18)]"
                        >
                    </label>

                    <label class="flex cursor-pointer items-start gap-3 text-[13px] leading-5 text-white/55">
                        <input v-model="consent" type="checkbox" class="mt-0.5 h-4 w-4 shrink-0 rounded border-white/20">
                        <span>{{ t.consent }}</span>
                    </label>

                    <p v-if="errorMessage" class="rounded-xl bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ errorMessage }}
                    </p>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-full bg-white px-6 py-4 text-sm font-semibold text-[#171717] transition hover:bg-[#d8c3a5] disabled:cursor-not-allowed disabled:opacity-60"
                        :disabled="isSubmitting || !consent"
                    >
                        {{ isSubmitting ? t.sending : t.submit_subscribe }}
                    </button>

                    <p class="text-center text-xs leading-5 text-white/40">
                        {{ t.note_subscribe }}
                    </p>
                </form>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue'
import { useNewsletter } from '../../composables/useNewsletter'

const props = defineProps({
    t: { type: Object, required: true },
})

const email = ref('')
const consent = ref(false)
const website = ref('')
const successMessage = ref('')

const { isSubmitting, errorMessage, subscribe } = useNewsletter(props.t.messages || {})

function resetForm() {
    email.value = ''
    consent.value = false
    website.value = ''
    successMessage.value = ''
    errorMessage.value = ''
}

async function handleSubmit() {
    const result = await subscribe({
        email: email.value.trim(),
        privacyAccepted: consent.value ? '1' : '0',
        sourcePage: window.location.pathname,
        website: website.value,
    })

    if (!result) return

    successMessage.value = result.message || props.t.success_subscribe_text
}
</script>
