<template>
    <section
        id="contact"
        class="bg-black px-4 py-16 text-white sm:px-6 sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-5xl">
            <div class="max-w-3xl">
                <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                    Ultimul pas
                </p>

                <h2
                    class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl"
                >
                    Trimite și primești o ofertă fermă în maxim o zi.
                </h2>

                <p class="mt-5 text-base leading-8 text-white/60 sm:text-lg">
                    Câteva răspunsuri simple, fără termeni tehnici. Îți spun eu ce
                    variantă ți se potrivește și cât costă exact.
                </p>
            </div>

            <div class="mt-10 rounded-[2rem] bg-white/10 p-5 sm:p-6">
                <p class="text-sm text-white/50">Ai ales</p>

                <p class="mt-2 text-xl font-semibold">
                    {{ selectedTemplate?.name || "Model neselectat" }} —
                    {{ formatPrice(totalPrice) }}
                </p>

                <p class="mt-1 text-sm text-white/50">
                    Pachet: {{ selectedPackage?.name || "Neselectat" }}
                </p>

                <div
                    v-if="selectedFeatures.length"
                    class="mt-4 flex flex-wrap gap-2"
                >
                    <span
                        v-for="feature in selectedFeatures"
                        :key="feature.id"
                        class="rounded-full bg-white/10 px-3 py-1 text-xs font-semibold"
                    >
                        {{ feature.name }}
                    </span>
                </div>

                <p v-else class="mt-4 text-sm text-white/40">
                    Fără funcționalități extra.
                </p>
            </div>

            <div
                v-if="hasSubmitted"
                class="mt-8 rounded-[2rem] border border-green-400/20 bg-green-500/15 p-6"
            >
                <p
                    class="text-sm uppercase tracking-[0.25em] text-green-100/70"
                >
                    Cerere trimisă
                </p>

                <h3 class="mt-4 text-3xl font-semibold text-white">
                    Am primit cererea ta.
                </h3>

                <p class="mt-4 leading-7 text-green-50/80">
                    Revin cu un mesaj pentru clarificări. Configurația aleasă a
                    fost salvată.
                </p>

                <button
                    type="button"
                    class="mt-6 rounded-full bg-white px-6 py-3 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    @click="prepareAnotherRequest"
                >
                    Trimite altă cerere
                </button>
            </div>

            <form v-else class="mt-8 grid gap-5" @submit.prevent="handleSubmit">
                <input
                    v-model="form.website"
                    type="text"
                    name="website"
                    autocomplete="off"
                    tabindex="-1"
                    class="hidden"
                />

                <ChoicePills
                    v-model="form.requestType"
                    label="Ce variantă vrei?"
                    :options="requestTypeOptions"
                    grid-class="grid gap-2 md:grid-cols-2"
                />

                <div class="grid gap-4 md:grid-cols-2">
                    <FormField v-model="form.name" placeholder="Numele tău" />

                    <FormField v-model="form.phone" placeholder="Telefon" />
                </div>

                <FormField
                    v-model="form.email"
                    type="email"
                    placeholder="Email"
                />

                <FormField
                    v-model="form.message"
                    type="textarea"
                    placeholder="Spune-mi pe scurt ce vrei. Exemplu: vreau să prezint servicii, să primesc rezervări pe WhatsApp, să arăt produse etc."
                />

                <label
                    class="flex cursor-pointer gap-3 rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-sm leading-6 text-white/70"
                >
                    <input
                        v-model="form.privacyAccepted"
                        type="checkbox"
                        class="mt-1 h-4 w-4 shrink-0 rounded border-white/20"
                    />

                    <span>
                        Sunt de acord să fiu contactat/ă pentru această cerere.
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
                    {{ isSubmitting ? "Se trimite..." : "Trimite cererea" }}
                </BaseButton>
            </form>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import { useLeadSubmission } from "../../composables/useLeadSubmission";
import BaseButton from "../ui/BaseButton.vue";
import ChoicePills from "../ui/ChoicePills.vue";
import FormField from "../ui/FormField.vue";

const props = defineProps({
    contact: {
        type: Object,
        required: true,
    },
    selectedTemplate: {
        type: Object,
        default: null,
    },
    selectedPackage: {
        type: Object,
        default: null,
    },
    selectedFeatures: {
        type: Array,
        required: true,
    },
    totalPrice: {
        type: Number,
        required: true,
    },
});

const emit = defineEmits(["lead-created"]);

const {
    isSubmitting,
    errorMessage,
    successMessage,
    submitLead,
    resetMessages,
} = useLeadSubmission();

const hasSubmitted = ref(false);

const requestTypeOptions = [
    {
        label: "Vreau să îmi faci tu site-ul",
        value: "done_for_you",
        description:
            "Aleg modelul, iar tu îl adaptezi și îl pregătești pentru lansare.",
    },
    {
        label: "Cumpăr template-ul",
        value: "developer_template",
        description: "Sunt developer și vreau să îl folosesc eu.",
    },
];

const emptyForm = {
    name: "",
    email: "",
    phone: "",
    requestType: "done_for_you",
    siteGoal: "",
    businessType: "",
    hasLogo: "",
    hasPhotos: "",
    hasDomain: "",
    budgetRange: "",
    urgency: "",
    launchDeadline: "",
    message: "",
    website: "",
    privacyAccepted: false,
};

const form = ref({ ...emptyForm });

function resetForm() {
    form.value = { ...emptyForm };
}

function prepareAnotherRequest() {
    hasSubmitted.value = false;
    resetMessages();
}

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}

async function handleSubmit() {
    const payload = {
        ...form.value,
        hasLogo: form.value.hasLogo,
        hasPhotos: form.value.hasPhotos,
        hasDomain: form.value.hasDomain,
        privacyAccepted: form.value.privacyAccepted ? "1" : "0",
        sourcePage: window.location.pathname,
        template: props.selectedTemplate?.name || null,
        categoryKey: props.selectedTemplate?.categoryKey || null,
        categoryLabel: props.selectedTemplate?.category || null,
        packageKey: props.selectedPackage?.key || null,
        packageName: props.selectedPackage?.name || null,
        features: props.selectedFeatures.map((feature) => feature.name),
        totalPrice: props.totalPrice,
    };

    const result = await submitLead(payload);

    if (!result) {
        return;
    }

    resetForm();
    hasSubmitted.value = true;
    emit("lead-created");
}
</script>
