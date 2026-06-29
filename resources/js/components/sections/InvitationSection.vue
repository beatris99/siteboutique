<template>
    <section id="contact" class="scroll-mt-28 bg-[#f7f4ef] px-4 py-16 sm:px-6 lg:py-24">
        <div class="mx-auto grid max-w-6xl overflow-hidden rounded-[2.25rem] border border-black/10 bg-white shadow-sm lg:grid-cols-[0.9fr_1.1fr]">
            <aside class="relative bg-[#171717] p-7 text-white sm:p-10 lg:p-12">
                <div class="pointer-events-none absolute inset-0 opacity-40">
                    <div class="absolute -left-24 top-10 h-56 w-56 rounded-full bg-[#a67c3a]/30 blur-3xl"></div>
                    <div class="absolute bottom-0 right-0 h-48 w-48 rounded-full bg-white/10 blur-3xl"></div>
                </div>

                <div class="relative">
                    <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#d8c3a5]">
                        {{ copy.eyebrow }}
                    </p>

                    <h2 class="mt-5 max-w-xl text-3xl font-semibold leading-tight tracking-[-0.05em] sm:text-5xl">
                        {{ copy.title }}
                    </h2>

                    <p class="mt-6 max-w-lg text-base leading-8 text-white/62">
                        {{ copy.description }}
                    </p>

                    <div v-if="points.length" class="mt-9 grid gap-3">
                        <div
                            v-for="item in points"
                            :key="item.title"
                            class="rounded-2xl border border-white/10 bg-white/[0.06] px-5 py-4"
                        >
                            <p class="text-sm font-semibold text-white">
                                {{ item.title }}
                            </p>
                            <p class="mt-1 text-sm leading-6 text-white/52">
                                {{ item.text }}
                            </p>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="p-6 sm:p-9 lg:p-12">
                <div v-if="hasSubmitted" class="flex h-full min-h-[26rem] flex-col justify-center rounded-[2rem] border border-green-200 bg-green-50 p-8 text-center">
                    <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-green-700 text-white">
                        <svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <h3 class="mt-6 text-3xl font-semibold tracking-[-0.04em] text-green-950">
                        {{ copy.form.success_title }}
                    </h3>

                    <p class="mx-auto mt-3 max-w-sm leading-7 text-green-900/70">
                        {{ copy.form.success_text }}
                    </p>

                    <button
                        type="button"
                        class="mx-auto mt-7 rounded-full bg-[#171717] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#a67c3a]"
                        @click="prepareAnother"
                    >
                        {{ copy.form.send_another }}
                    </button>
                </div>

                <form v-else class="grid gap-5" @submit.prevent="handleSubmit">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#a67c3a]">
                            {{ copy.form.eyebrow }}
                        </p>

                        <h3 class="mt-3 text-3xl font-semibold tracking-[-0.04em] text-[#171717] sm:text-4xl">
                            {{ copy.form.title }}
                        </h3>

                        <p class="mt-3 max-w-xl leading-7 text-black/55">
                            {{ copy.form.description }}
                        </p>
                    </div>

                    <input v-model="form.website" type="text" name="website" autocomplete="off" tabindex="-1" class="hidden" aria-hidden="true">

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">{{ copy.form.name }}</span>
                            <input v-model="form.name" type="text" required :placeholder="copy.form.name_placeholder" class="field" autocomplete="name">
                        </label>

                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">{{ copy.form.contact }}</span>
                            <input v-model="form.contact" type="text" required :placeholder="copy.form.contact_placeholder" class="field" autocomplete="email tel">
                        </label>
                    </div>

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ copy.form.company }}</span>
                        <input v-model="form.company" type="text" :placeholder="copy.form.company_placeholder" class="field" autocomplete="organization">
                    </label>

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ copy.form.message }}</span>
                        <textarea
                            v-model="form.message"
                            rows="4"
                            required
                            :placeholder="copy.form.message_placeholder"
                            class="field resize-none"
                        ></textarea>
                    </label>

                    <div class="rounded-2xl border border-dashed border-black/10 bg-[#f7f4ef]/70 px-4 py-3">
                        <button
                            v-if="!showDiscountField"
                            type="button"
                            class="text-sm font-medium text-black/40 underline-offset-4 transition hover:text-[#a67c3a] hover:underline"
                            @click="showDiscountField = true"
                        >
                            {{ copy.form.discount_toggle }}
                        </button>

                        <label v-else class="grid gap-2">
                            <span class="sr-only">{{ copy.form.discount_label }}</span>
                            <input
                                v-model="form.discountCode"
                                type="text"
                                :placeholder="copy.form.discount_placeholder"
                                class="field uppercase tracking-wide"
                                autocomplete="off"
                            >
                            <button
                                type="button"
                                class="justify-self-start text-xs text-black/40 transition hover:text-black/70"
                                @click="hideDiscountField"
                            >
                                {{ copy.form.discount_hide }}
                            </button>
                        </label>
                    </div>

                    <label class="flex cursor-pointer gap-3 rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 text-sm leading-6 text-black/60">
                        <input v-model="form.privacyAccepted" type="checkbox" required class="mt-0.5 h-4 w-4 shrink-0 rounded border-black/20">
                        <span>{{ copy.form.consent }}</span>
                    </label>

                    <p v-if="errorMessage" class="rounded-2xl bg-red-50 px-5 py-4 text-sm text-red-700">
                        {{ errorMessage }}
                    </p>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-[#171717] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#a67c3a] disabled:cursor-not-allowed disabled:opacity-60"
                        :disabled="isSubmitting"
                    >
                        {{ isSubmitting ? copy.form.sending : copy.form.submit }}
                        <span v-if="!isSubmitting">→</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed, ref } from 'vue'
import { useLeadSubmission } from '../../composables/useLeadSubmission'

const props = defineProps({
    t: { type: Object, required: true },
})

const emit = defineEmits(['lead-created'])

const fallback = {
    eyebrow: 'Contact',
    title: 'Hai să discutăm despre proiectul tău.',
    description: 'Trimite-ne câteva detalii esențiale, iar echipa SiteGo revine cu o direcție clară pentru următorii pași.',
    points: [
        { title: 'Răspuns clar', text: 'Revenim cu pași concreți, nu cu un formular complicat.' },
        { title: 'Direcție potrivită', text: 'Stabilim ce are sens pentru etapa în care este afacerea ta.' },
        { title: 'Colaborare simplă', text: 'Păstrăm procesul clar, aerisit și ușor de urmărit.' },
    ],
    form: {
        eyebrow: 'Cerere de colaborare',
        title: 'Spune-ne pe scurt ce ai nevoie.',
        description: 'Nu trebuie să ai totul pregătit. Este suficient să ne spui ideea principală.',
        name: 'Nume',
        name_placeholder: 'Numele tău',
        contact: 'Telefon sau email',
        contact_placeholder: 'telefon sau email',
        company: 'Companie / proiect, opțional',
        company_placeholder: 'Ex: salon, cabinet, pensiune, serviciu local',
        message: 'Cu ce te putem ajuta?',
        message_placeholder: 'Ex: Am nevoie de un site de prezentare, o pagină de campanie, CRM, formular, automatizare...',
        discount_toggle: 'Ai primit un cod de campanie?',
        discount_label: 'Cod de campanie',
        discount_placeholder: 'Ex: SG-7K2QXM',
        discount_hide: 'Ascunde codul',
        consent: 'Sunt de acord să fiu contactat în legătură cu solicitarea mea.',
        submit: 'Trimite mesajul',
        sending: 'Se trimite...',
        success_title: 'Mesaj trimis',
        success_text: 'Mulțumim. Echipa SiteGo revine cu un răspuns cât mai curând.',
        send_another: 'Trimite alt mesaj',
    },
}

const copy = computed(() => ({
    ...fallback,
    ...props.t,
    points: Array.isArray(props.t?.points) ? props.t.points : fallback.points,
    form: {
        ...fallback.form,
        ...(props.t?.form || {}),
    },
}))

const points = computed(() => copy.value.points)

const { isSubmitting, errorMessage, submitLead, resetMessages } = useLeadSubmission({
    success: copy.value.form.success_title || 'Mesaj trimis',
})

const hasSubmitted = ref(false)
const showDiscountField = ref(false)

const emptyForm = {
    name: '',
    contact: '',
    company: '',
    message: '',
    discountCode: '',
    website: '',
    privacyAccepted: false,
}

const form = ref({ ...emptyForm })

function resetForm() {
    form.value = { ...emptyForm }
    showDiscountField.value = false
}

function prepareAnother() {
    hasSubmitted.value = false
    resetMessages()
}

function hideDiscountField() {
    form.value.discountCode = ''
    showDiscountField.value = false
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
    const discountCode = (form.value.discountCode || '').trim().toUpperCase()

    const message = [
        form.value.company ? `Companie / proiect: ${form.value.company}` : null,
        discountCode ? `Cod campanie: ${discountCode}` : null,
        form.value.message,
    ].filter(Boolean).join('\n\n')

    const payload = {
        name: form.value.name,
        email,
        phone,
        message,
        requestType: 'conversation',
        siteGoal: 'Conversație despre proiect',
        template: 'Cerere de conversație SiteGo',
        categoryKey: 'conversation',
        categoryLabel: 'Conversație',
        packageKey: 'custom-offer',
        packageName: 'Ofertă după discuție',
        features: [],
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
