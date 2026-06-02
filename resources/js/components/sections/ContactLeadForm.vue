<template>
    <section id="contact" class="mx-auto max-w-4xl px-6 py-24">
        <div class="rounded-[2rem] bg-black p-8 text-white md:p-12">
            <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                {{ contact.eyebrow }}
            </p>

            <h2 class="mt-4 text-4xl font-semibold">
                {{ contact.title }}
            </h2>

            <p class="mt-4 text-white/60">
                {{ contact.description }}
            </p>

            <div class="mt-6 rounded-2xl bg-white/10 p-5">
                <p class="text-sm text-white/50">
                    {{ contact.selectedConfigurationLabel }}
                </p>

                <p class="mt-2 font-semibold">
                    {{ selectedTemplate.name }} — {{ totalPrice }} lei
                </p>

                <p class="mt-1 text-sm text-white/50">
                    Pachet: {{ selectedPackage.name }}
                </p>

                <div
                    v-if="selectedFeatures.length"
                    class="mt-3 flex flex-wrap gap-2"
                >
                    <span
                        v-for="feature in selectedFeatures"
                        :key="feature.id"
                        class="rounded-full bg-white/10 px-3 py-1 text-xs"
                    >
                        {{ feature.name }}
                    </span>
                </div>

                <p
                    v-else
                    class="mt-3 text-sm text-white/40"
                >
                    Nu ai selectat funcționalități extra.
                </p>
            </div>

            <div
                v-if="hasSubmitted"
                class="mt-8 rounded-[2rem] border border-green-400/20 bg-green-500/15 p-6"
            >
                <p class="text-sm uppercase tracking-[0.25em] text-green-100/70">
                    Cerere trimisă
                </p>

                <h3 class="mt-4 text-3xl font-semibold text-white">
                    {{ contact.successTitle || 'Am primit cererea ta.' }}
                </h3>

                <p class="mt-4 leading-7 text-green-50/80">
                    {{ contact.successDescription || 'Revin cu un mesaj pentru clarificări și recomandări. Configurația aleasă a fost salvată.' }}
                </p>

                <button
                    type="button"
                    class="mt-6 rounded-full bg-white px-6 py-3 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    @click="prepareAnotherRequest"
                >
                    {{ contact.anotherRequestLabel || 'Trimite altă cerere' }}
                </button>
            </div>

            <form
                v-else
                class="mt-8 grid gap-4"
                @submit.prevent="handleSubmit"
            >
                <input
                    v-model="form.website"
                    type="text"
                    name="website"
                    autocomplete="off"
                    tabindex="-1"
                    class="hidden"
                />

                <FormField
                    v-model="form.name"
                    :placeholder="contact.namePlaceholder"
                />

                <FormField
                    v-model="form.email"
                    type="email"
                    :placeholder="contact.emailPlaceholder"
                />

                <FormField
                    v-model="form.phone"
                    :placeholder="contact.phonePlaceholder"
                />

                <FormField
                    v-model="form.message"
                    type="textarea"
                    :placeholder="contact.messagePlaceholder"
                />

                <label class="flex cursor-pointer gap-3 rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-sm leading-6 text-white/70">
                    <input
                        v-model="form.privacyAccepted"
                        type="checkbox"
                        class="mt-1 h-4 w-4 shrink-0 rounded border-white/20"
                    >

                    <span>
                        {{ contact.privacyText || 'Sunt de acord să fiu contactat/ă pentru această cerere și înțeleg că datele introduse vor fi folosite pentru a primi un răspuns.' }}
                    </span>
                </label>

                <p
                    v-if="errorMessage"
                    class="rounded-2xl bg-red-500/20 px-5 py-4 text-sm text-red-100"
                >
                    {{ errorMessage }}
                </p>

                <p
                    v-if="successMessage"
                    class="rounded-2xl bg-green-500/20 px-5 py-4 text-sm text-green-100"
                >
                    {{ successMessage }}
                </p>

                <BaseButton
                    type="submit"
                    variant="light"
                    :disabled="isSubmitting"
                >
                    {{ isSubmitting ? contact.loadingLabel : contact.buttonLabel }}
                </BaseButton>
            </form>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue'
import { useLeadSubmission } from '../../composables/useLeadSubmission'
import BaseButton from '../ui/BaseButton.vue'
import FormField from '../ui/FormField.vue'

const props = defineProps({
    contact: {
        type: Object,
        required: true,
    },
    selectedTemplate: {
        type: Object,
        required: true,
    },
    selectedPackage: {
        type: Object,
        required: true,
    },
    selectedFeatures: {
        type: Array,
        required: true,
    },
    totalPrice: {
        type: Number,
        required: true,
    },
})

const emit = defineEmits(['lead-created'])

const {
    isSubmitting,
    errorMessage,
    successMessage,
    submitLead,
    resetMessages,
} = useLeadSubmission()

const hasSubmitted = ref(false)

const form = ref({
    name: '',
    email: '',
    phone: '',
    message: '',
    website: '',
    privacyAccepted: false,
})

function resetForm() {
    form.value = {
        name: '',
        email: '',
        phone: '',
        message: '',
        website: '',
        privacyAccepted: false,
    }
}

function prepareAnotherRequest() {
    hasSubmitted.value = false
    resetMessages()
}

async function handleSubmit() {
    const payload = {
        ...form.value,
        template: props.selectedTemplate.name,
        categoryKey: props.selectedTemplate.categoryKey,
        categoryLabel: props.selectedTemplate.category,
        packageKey: props.selectedPackage.key,
        packageName: props.selectedPackage.name,
        features: props.selectedFeatures.map(feature => feature.name),
        totalPrice: props.totalPrice,
    }

    const result = await submitLead(payload)

    if (!result) {
        return
    }

    resetForm()
    hasSubmitted.value = true
    emit('lead-created')
}
</script>
