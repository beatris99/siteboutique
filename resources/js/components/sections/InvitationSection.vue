<template>
    <section id="contact" class="bg-[#f7f4ef] px-4 py-20 sm:px-6 lg:py-28">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.95fr_1.05fr] lg:items-stretch">
            <!-- Left: the invitation -->
            <div class="flex flex-col justify-between rounded-[2.5rem] bg-[#171717] p-8 text-white shadow-2xl sm:p-10">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#d8c3a5]">
                        {{ t.eyebrow }}
                    </p>
                    <h2 class="mt-5 font-serif text-4xl font-medium leading-[1.08] tracking-[-0.03em] sm:text-5xl">
                        {{ t.title }}
                    </h2>
                    <p class="mt-6 text-base leading-8 text-white/55">
                        {{ t.description }}
                    </p>
                </div>

                <div class="mt-10 grid gap-4">
                    <div
                        v-for="(item, index) in t.points"
                        :key="item.title"
                        class="flex gap-4 rounded-2xl bg-white/[0.06] p-5 ring-1 ring-white/10"
                    >
                        <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-[#d8c3a5] text-sm font-bold text-[#171717]">
                            {{ index + 1 }}
                        </span>
                        <div>
                            <p class="font-semibold text-white">{{ item.title }}</p>
                            <p class="mt-1 text-sm leading-6 text-white/50">{{ item.text }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: the form -->
            <div class="rounded-[2.5rem] border border-black/10 bg-white p-6 shadow-sm sm:p-9">
                <!-- Success state -->
                <div v-if="hasSubmitted" class="flex h-full flex-col justify-center rounded-[2rem] border border-green-200 bg-green-50 p-8 text-center">
                    <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-green-600 text-white">
                        <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="mt-6 font-serif text-3xl font-medium text-green-950">{{ t.form.success_title }}</h3>
                    <p class="mx-auto mt-3 max-w-sm leading-7 text-green-900/70">{{ t.form.success_text }}</p>
                    <button
                        type="button"
                        class="mx-auto mt-7 rounded-full bg-[#171717] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#a67c3a]"
                        @click="prepareAnother"
                    >
                        {{ t.form.send_another }}
                    </button>
                </div>

                <!-- Form -->
                <form v-else class="grid gap-6" @submit.prevent="handleSubmit">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#a67c3a]">
                            {{ t.form.eyebrow }}
                        </p>
                        <h3 class="mt-3 font-serif text-3xl font-medium text-[#171717]">{{ t.form.title }}</h3>
                        <p class="mt-3 leading-7 text-black/55">{{ t.form.description }}</p>
                    </div>

                    <!-- Honeypot -->
                    <input v-model="form.website" type="text" name="website" autocomplete="off" tabindex="-1" class="hidden" aria-hidden="true">

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ t.form.name }}</span>
                        <input v-model="form.name" type="text" required :placeholder="t.form.name_placeholder" class="field">
                    </label>

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ t.form.contact }}</span>
                        <input v-model="form.contact" type="text" required :placeholder="t.form.contact_placeholder" class="field">
                    </label>

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ t.form.message }}</span>
                        <textarea
                            v-model="form.message"
                            rows="4"
                            :placeholder="t.form.message_placeholder"
                            class="field resize-none"
                        ></textarea>
                    </label>

                    <!-- Discount code (optional) -->
                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ t.form.discount_label }}</span>
                        <input
                            v-model="form.discountCode"
                            type="text"
                            :placeholder="t.form.discount_placeholder"
                            class="field uppercase tracking-wide"
                        >
                    </label>

                    <label class="flex cursor-pointer gap-3 rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 text-sm leading-6 text-black/60">
                        <input v-model="form.privacyAccepted" type="checkbox" class="mt-0.5 h-4 w-4 shrink-0 rounded border-black/20">
                        <span>{{ t.form.consent }}</span>
                    </label>

                    <p v-if="errorMessage" class="rounded-2xl bg-red-50 px-5 py-4 text-sm text-red-700">
                        {{ errorMessage }}
                    </p>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-[#171717] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#a67c3a] disabled:cursor-not-allowed disabled:opacity-60"
                        :disabled="isSubmitting"
                    >
                        {{ isSubmitting ? t.form.sending : t.form.submit }}
                        <span v-if="!isSubmitting">→</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue'
import { useLeadSubmission } from '../../composables/useLeadSubmission'

const props = defineProps({
    t: { type: Object, required: true },
})

const emit = defineEmits(['lead-created'])

const { isSubmitting, errorMessage, submitLead, resetMessages } = useLeadSubmission({
    success: props.t.form.success_title,
})

const hasSubmitted = ref(false)

const emptyForm = {
    name: '',
    contact: '',
    message: '',
    discountCode: '',
    website: '',
    privacyAccepted: false,
}

const form = ref({ ...emptyForm })

function resetForm() {
    form.value = { ...emptyForm }
}

function prepareAnother() {
    hasSubmitted.value = false
    resetMessages()
}

function splitContact(value) {
    const trimmed = (value || '').trim()
    const isEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(trimmed)
    return {
        email: isEmail ? trimmed : '',
        phone: isEmail ? '' : trimmed,
    }
}

async function handleSubmit() {
    const { email, phone } = splitContact(form.value.contact)
    const code = form.value.discountCode.trim().toUpperCase()

    // Append the discount code to the message so it always reaches the inbox,
    // and also send it as a dedicated field for future backend support.
    const baseMessage = form.value.message.trim()
    const message = code
        ? `${baseMessage}${baseMessage ? '\n\n' : ''}Cod de reducere: ${code}`
        : baseMessage

    const payload = {
        name: form.value.name,
        email,
        phone,
        message,
        discountCode: code,
        requestType: 'conversation',
        siteGoal: 'Conversație despre proiect',
        template: 'Cerere de conversație',
        categoryKey: 'conversation',
        categoryLabel: 'Conversație',
        features: code ? [`Cod reducere: ${code}`] : [],
        totalPrice: 0,
        privacyAccepted: form.value.privacyAccepted ? '1' : '0',
        sourcePage: window.location.pathname,
        website: form.value.website,
    }

    const result = await submitLead(payload)
    if (!result) return

    resetForm()
    hasSubmitted.value = true
    emit('lead-created')
}
</script>

<style scoped>
.field {
    width: 100%;
    border-radius: 1rem;
    border: 1px solid rgb(0 0 0 / 0.15);
    background: white;
    padding: 0.95rem 1rem;
    color: #171717;
    outline: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.field::placeholder {
    color: rgb(0 0 0 / 0.35);
    text-transform: none;
    letter-spacing: normal;
}

.field:focus {
    border-color: #a67c3a;
    box-shadow: 0 0 0 3px rgb(166 124 58 / 0.12);
}
</style>
