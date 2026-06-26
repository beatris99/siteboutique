<template>
    <section id="cerere" class="scroll-mt-28 bg-[#f7f4ef] px-4 py-12 sm:px-6 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[0.86fr_1.14fr] lg:items-start">
            <aside class="rounded-[2.5rem] bg-black p-7 text-white shadow-2xl sm:p-10">
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#d8c3a5]">
                    {{ t.eyebrow }}
                </p>

                <h2 class="mt-5 text-3xl font-semibold leading-tight tracking-[-0.05em] sm:text-5xl">
                    {{ t.title }}
                </h2>

                <p class="mt-6 text-base leading-8 text-white/62">
                    {{ t.description }}
                </p>

                <div v-if="bullets.length" class="mt-8 grid gap-3">
                    <div
                        v-for="item in bullets"
                        :key="item"
                        class="flex items-start gap-3 rounded-2xl bg-white/8 px-4 py-3 text-sm leading-6 text-white/72 ring-1 ring-white/10"
                    >
                        <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-[#d8c3a5] text-xs font-black text-black">✓</span>
                        <span>{{ item }}</span>
                    </div>
                </div>
            </aside>

            <div class="rounded-[2.5rem] border border-black/10 bg-white p-5 shadow-sm sm:p-8">
                <div v-if="hasSubmitted" class="rounded-[2rem] border border-green-200 bg-green-50 p-7 text-green-900">
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-green-700">
                        {{ t.successEyebrow }}
                    </p>
                    <h3 class="mt-3 text-3xl font-semibold">
                        {{ t.successTitle }}
                    </h3>
                    <p class="mt-3 leading-7 text-green-900/70">
                        {{ t.successText }}
                    </p>
                    <button
                        type="button"
                        class="mt-6 rounded-full bg-green-900 px-6 py-3 text-sm font-bold text-white transition hover:bg-green-800"
                        @click="prepareAnotherRequest"
                    >
                        {{ t.sendAnother }}
                    </button>
                </div>

                <form v-else class="grid gap-5" @submit.prevent="handleSubmit">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#a67c3a]">
                            {{ t.formEyebrow }}
                        </p>
                        <h3 class="mt-3 text-3xl font-semibold tracking-[-0.04em] text-[#171717] sm:text-4xl">
                            {{ t.formTitle }}
                        </h3>
                        <p class="mt-3 leading-7 text-black/55">
                            {{ t.formDescription }}
                        </p>
                    </div>

                    <input v-model="form.website" type="text" name="website" autocomplete="off" tabindex="-1" class="hidden">
                    <input v-model="form.requestType" type="hidden" name="requestType">

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ t.fields.name }}</span>
                        <input v-model="form.name" type="text" required class="field" autocomplete="name">
                    </label>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">{{ t.fields.phone }}</span>
                            <input v-model="form.phone" type="text" class="field" autocomplete="tel">
                        </label>

                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">{{ t.fields.email }}</span>
                            <input v-model="form.email" type="email" class="field" autocomplete="email">
                        </label>
                    </div>

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ t.fields.businessType }}</span>
                        <select v-model="form.businessType" class="field">
                            <option value="">{{ t.selectPlaceholder }}</option>
                            <option v-for="option in businessOptions" :key="option" :value="option">
                                {{ option }}
                            </option>
                        </select>
                    </label>

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">{{ t.fields.message }}</span>
                        <textarea
                            v-model="form.message"
                            rows="6"
                            required
                            :placeholder="t.messagePlaceholder"
                            class="field resize-none"
                        ></textarea>
                    </label>

                    <label class="flex cursor-pointer gap-3 rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 text-sm leading-6 text-black/65">
                        <input v-model="form.privacyAccepted" type="checkbox" required class="mt-1 h-4 w-4 shrink-0 rounded border-black/20">
                        <span>{{ t.privacy }}</span>
                    </label>

                    <p v-if="errorMessage" class="rounded-2xl bg-red-50 px-5 py-4 text-sm text-red-700">
                        {{ errorMessage }}
                    </p>

                    <p v-if="successMessage" class="rounded-2xl bg-green-50 px-5 py-4 text-sm text-green-700">
                        {{ successMessage }}
                    </p>

                    <button
                        type="submit"
                        class="rounded-full bg-black px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#8b6f47] disabled:cursor-not-allowed disabled:opacity-60"
                        :disabled="isSubmitting"
                    >
                        {{ isSubmitting ? t.sending : t.submit }}
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
    section: {
        type: Object,
        default: () => ({}),
    },
    locale: {
        type: String,
        default: 'ro',
    },
})

const emit = defineEmits(['lead-created'])

const fallback = {
    eyebrow: 'Contact',
    title: 'Spune-ne ideea ta.',
    description: 'Trimite un mesaj scurt și revenim cu întrebări de clarificare.',
    bullets: [],
    successEyebrow: 'Cerere trimisă',
    successTitle: 'Am primit mesajul.',
    successText: 'Revenim cu întrebări de clarificare.',
    sendAnother: 'Trimite alt mesaj',
    formEyebrow: 'Contact',
    formTitle: 'Ce ai vrea să construim?',
    formDescription: 'Oferta se stabilește după ce înțelegem proiectul.',
    fields: {
        name: 'Nume',
        phone: 'Telefon',
        email: 'Email',
        businessType: 'Tip proiect',
        message: 'Ideea ta',
    },
    selectPlaceholder: 'Alege o variantă',
    businessOptions: [],
    messagePlaceholder: '',
    privacy: 'Sunt de acord să fiu contactat/ă pentru această cerere.',
    submit: 'Trimite mesajul',
    sending: 'Se trimite...',
    successMessage: 'Mesajul a fost trimis cu succes.',
    leadMeta: {},
}

const t = computed(() => ({
    ...fallback,
    ...props.section,
    fields: {
        ...fallback.fields,
        ...(props.section?.fields || {}),
    },
    leadMeta: {
        ...fallback.leadMeta,
        ...(props.section?.leadMeta || {}),
    },
}))

const bullets = computed(() => Array.isArray(t.value.bullets) ? t.value.bullets : [])
const businessOptions = computed(() => Array.isArray(t.value.businessOptions) ? t.value.businessOptions : [])

const { isSubmitting, errorMessage, successMessage, submitLead, resetMessages } = useLeadSubmission({
    success: t.value.successMessage,
})

const hasSubmitted = ref(false)

const emptyForm = {
    name: '',
    email: '',
    phone: '',
    requestType: t.value.leadMeta.requestType || 'custom_project',
    siteGoal: t.value.leadMeta.siteGoal || 'Soluție digitală personalizată',
    businessType: '',
    message: '',
    website: '',
    privacyAccepted: false,
}

const form = ref({ ...emptyForm })

function resetForm() {
    form.value = {
        ...emptyForm,
        requestType: t.value.leadMeta.requestType || 'custom_project',
        siteGoal: t.value.leadMeta.siteGoal || 'Soluție digitală personalizată',
    }
}

function prepareAnotherRequest() {
    hasSubmitted.value = false
    resetMessages()
}

async function handleSubmit() {
    const meta = t.value.leadMeta || {}

    const payload = {
        ...form.value,
        privacyAccepted: form.value.privacyAccepted ? '1' : '0',
        sourcePage: window.location.pathname,
        template: meta.template || 'Cerere personalizată SiteGo',
        categoryKey: meta.categoryKey || 'custom',
        categoryLabel: meta.categoryLabel || 'Proiect personalizat',
        packageKey: meta.packageKey || 'custom-offer',
        packageName: meta.packageName || 'Ofertă după discuție',
        features: Array.isArray(meta.features) ? meta.features : [],
        totalPrice: 0,
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
    padding: 1rem;
    color: #171717;
    outline: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.field:focus {
    border-color: #a67c3a;
    box-shadow: 0 0 0 4px rgb(166 124 58 / 0.12);
}
</style>
