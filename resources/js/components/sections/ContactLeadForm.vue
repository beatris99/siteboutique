<template>
    <section id="contact" class="bg-[#f7f4ef] px-4 py-14 sm:px-6 sm:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="text-sm uppercase tracking-[0.25em] text-[#a67c3a]">
                    {{ contact.eyebrow }}
                </p>

                <h1
                    class="mt-4 text-4xl font-semibold leading-tight text-black sm:text-5xl lg:text-6xl"
                >
                    {{ contact.title }}
                </h1>

                <p class="mt-5 text-base leading-8 text-black/60 sm:text-lg">
                    {{ contact.description }}
                </p>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
                <aside
                    class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-sm sm:p-8"
                >
                    <div
                        class="overflow-hidden rounded-[1.5rem] bg-[#f7f4ef] p-6"
                    >
                        <p
                            class="text-sm uppercase tracking-[0.25em] text-[#a67c3a]"
                        >
                            {{ contact.details_eyebrow }}
                        </p>

                        <h2 class="mt-3 text-3xl font-semibold text-black">
                            {{ contact.details_title }}
                        </h2>

                        <p class="mt-4 leading-7 text-black/60">
                            {{ contact.details_description }}
                        </p>
                    </div>

                    <div class="mt-8 grid gap-6">
                        <div>
                            <p class="text-sm font-medium text-black/45">
                                {{ contact.email_label }}
                            </p>

                            <a
                                v-if="contactInfo.email"
                                :href="`mailto:${contactInfo.email}`"
                                class="mt-1 inline-block text-lg font-semibold text-black hover:text-[#a67c3a]"
                            >
                                {{ contactInfo.email }}
                            </a>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-black/45">
                                {{ contact.phone_label }}
                            </p>

                            <a
                                v-if="contactInfo.phone"
                                :href="phoneHref"
                                class="mt-1 inline-block text-lg font-semibold text-black hover:text-[#a67c3a]"
                            >
                                {{ contactInfo.phone }}
                            </a>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-black/45">
                                {{ contact.area_label }}
                            </p>

                            <p class="mt-1 text-black/70">
                                {{ contactInfo.area || contactInfo.location }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-black/45">
                                {{ contact.services_label }}
                            </p>

                            <p class="mt-1 leading-7 text-black/70">
                                {{ contact.services_text }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="mt-8 rounded-[1.5rem] border border-black/10 bg-[#f7f4ef] p-5"
                    >
                        <p class="font-semibold text-black">
                            {{ contact.note_title }}
                        </p>

                        <p class="mt-2 text-sm leading-6 text-black/60">
                            {{ contact.note_text }}
                        </p>
                    </div>
                </aside>

                <div
                    class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-sm sm:p-8"
                >
                    <div class="mb-8">
                        <h2 class="text-3xl font-semibold text-black">
                            {{ contact.form_title }}
                        </h2>

                        <p class="mt-3 leading-7 text-black/60">
                            {{ contact.form_description }}
                        </p>
                    </div>

                    <div class="mb-8 rounded-[1.5rem] bg-[#f7f4ef] p-5">
                        <p class="text-sm text-black/50">
                            {{ contact.selected_label }}
                        </p>

                        <template v-if="hasSelectedConfiguration">
                            <div class="mt-3 grid gap-3">
                                <div class="grid gap-1">
                                    <p
                                        class="text-xs uppercase tracking-[0.2em] text-black/40"
                                    >
                                        {{ contact.template_label }}
                                    </p>

                                    <p class="text-lg font-semibold text-black">
                                        {{
                                            selectedTemplate?.name ||
                                            contact.no_template_selected
                                        }}
                                    </p>
                                </div>

                                <div class="grid gap-1">
                                    <p
                                        class="text-xs uppercase tracking-[0.2em] text-black/40"
                                    >
                                        {{ contact.package_label }}
                                    </p>

                                    <p class="text-lg font-semibold text-black">
                                        {{
                                            selectedPackage?.name ||
                                            contact.no_package_selected
                                        }}
                                    </p>
                                </div>

                                <div
                                    v-if="selectedFeatures.length"
                                    class="grid gap-2"
                                >
                                    <p
                                        class="text-xs uppercase tracking-[0.2em] text-black/40"
                                    >
                                        {{ contact.features_label }}
                                    </p>

                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            v-for="feature in selectedFeatures"
                                            :key="feature.id"
                                            class="rounded-full bg-white px-3 py-1 text-xs text-black/60"
                                        >
                                            {{ feature.name }}
                                        </span>
                                    </div>
                                </div>

                                <p v-else class="text-sm text-black/45">
                                    {{ contact.empty_features }}
                                </p>

                                <div v-if="totalPrice > 0" class="pt-1">
                                    <p
                                        class="text-xs uppercase tracking-[0.2em] text-black/40"
                                    >
                                        {{ contact.estimated_total_label }}
                                    </p>

                                    <p
                                        class="mt-1 text-2xl font-semibold text-black"
                                    >
                                        {{ formatPrice(totalPrice) }}
                                    </p>
                                </div>
                            </div>
                        </template>

                        <template v-else>
                            <div
                                class="mt-3 rounded-[1rem] border border-black/10 bg-white px-4 py-4"
                            >
                                <p class="font-semibold text-black">
                                    {{ contact.selection_hint_title }}
                                </p>

                                <p class="mt-2 text-sm leading-6 text-black/60">
                                    {{ contact.selection_hint_text }}
                                </p>
                            </div>
                        </template>
                    </div>

                    <div
                        v-if="hasSubmitted"
                        class="rounded-[1.5rem] border border-green-200 bg-green-50 p-6"
                    >
                        <p
                            class="text-sm uppercase tracking-[0.25em] text-green-700"
                        >
                            {{ contact.success_eyebrow }}
                        </p>

                        <h3 class="mt-3 text-2xl font-semibold text-green-950">
                            {{ contact.success_title }}
                        </h3>

                        <p class="mt-3 leading-7 text-green-900/70">
                            {{ contact.success_description }}
                        </p>

                        <button
                            type="button"
                            class="mt-6 rounded-full bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                            @click="prepareAnotherRequest"
                        >
                            {{ contact.send_another }}
                        </button>
                    </div>

                    <form
                        v-else
                        class="grid gap-5"
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

                        <input
                            v-model="form.requestType"
                            type="hidden"
                            name="requestType"
                        />

                        <div class="grid gap-5 md:grid-cols-2">
                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.name_label }}
                                </span>

                                <input
                                    v-model="form.name"
                                    type="text"
                                    required
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                />
                            </label>

                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.phone_label }}
                                </span>

                                <input
                                    v-model="form.phone"
                                    type="text"
                                    required
                                    :placeholder="contact.phone_placeholder"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                />
                            </label>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.email_label }}
                                </span>

                                <input
                                    v-model="form.email"
                                    type="email"
                                    :placeholder="contact.email_placeholder"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                />
                            </label>

                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.project_type_label }}
                                </span>

                                <select
                                    v-model="form.businessType"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                >
                                    <option value="">
                                        {{ contact.project_type_placeholder }}
                                    </option>

                                    <option
                                        v-for="option in contact.project_type_options"
                                        :key="option"
                                        :value="option"
                                    >
                                        {{ option }}
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.package_interest_label }}
                                </span>

                                <select
                                    v-model="form.packageInterest"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                >
                                    <option value="">
                                        {{
                                            contact.package_interest_placeholder
                                        }}
                                    </option>

                                    <option
                                        v-for="option in contact.package_interest_options"
                                        :key="option"
                                        :value="option"
                                    >
                                        {{ option }}
                                    </option>
                                </select>
                            </label>

                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.budget_range_label }}
                                </span>

                                <select
                                    v-model="form.budgetRange"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                >
                                    <option value="">
                                        {{ contact.budget_range_placeholder }}
                                    </option>

                                    <option
                                        v-for="option in contact.budget_range_options"
                                        :key="option"
                                        :value="option"
                                    >
                                        {{ option }}
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.urgency_label }}
                                </span>

                                <select
                                    v-model="form.urgency"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                >
                                    <option value="">
                                        {{ contact.urgency_placeholder }}
                                    </option>

                                    <option
                                        v-for="option in contact.urgency_options"
                                        :key="option"
                                        :value="option"
                                    >
                                        {{ option }}
                                    </option>
                                </select>
                            </label>

                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.has_domain_label }}
                                </span>

                                <select
                                    v-model="form.hasDomain"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                >
                                    <option value="">
                                        {{ contact.select_placeholder }}
                                    </option>

                                    <option
                                        v-for="option in contact.availability_options"
                                        :key="`domain-${option}`"
                                        :value="option"
                                    >
                                        {{ option }}
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.has_logo_label }}
                                </span>

                                <select
                                    v-model="form.hasLogo"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                >
                                    <option value="">
                                        {{ contact.select_placeholder }}
                                    </option>

                                    <option
                                        v-for="option in contact.availability_options"
                                        :key="`logo-${option}`"
                                        :value="option"
                                    >
                                        {{ option }}
                                    </option>
                                </select>
                            </label>

                            <label class="grid gap-2">
                                <span class="text-sm font-medium text-black/70">
                                    {{ contact.has_photos_label }}
                                </span>

                                <select
                                    v-model="form.hasPhotos"
                                    class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                                >
                                    <option value="">
                                        {{ contact.select_placeholder }}
                                    </option>

                                    <option
                                        v-for="option in contact.availability_options"
                                        :key="`photos-${option}`"
                                        :value="option"
                                    >
                                        {{ option }}
                                    </option>
                                </select>
                            </label>
                        </div>

                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">
                                {{ contact.message_label }}
                            </span>

                            <textarea
                                v-model="form.message"
                                rows="6"
                                :placeholder="contact.message_placeholder"
                                class="w-full rounded-2xl border border-black/15 bg-white px-4 py-4 text-black outline-none transition focus:border-[#a67c3a]"
                            ></textarea>
                        </label>

                        <label
                            class="flex cursor-pointer gap-3 rounded-2xl border border-black/10 bg-[#f7f4ef] px-5 py-4 text-sm leading-6 text-black/65"
                        >
                            <input
                                v-model="form.privacyAccepted"
                                type="checkbox"
                                class="mt-1 h-4 w-4 shrink-0 rounded border-black/20"
                            />

                            <span>
                                {{ contact.consent_label }}
                            </span>
                        </label>

                        <p
                            v-if="errorMessage"
                            class="rounded-2xl bg-red-50 px-5 py-4 text-sm text-red-700"
                        >
                            {{ errorMessage }}
                        </p>

                        <p
                            v-if="successMessage"
                            class="rounded-2xl bg-green-50 px-5 py-4 text-sm text-green-700"
                        >
                            {{ successMessage }}
                        </p>

                        <button
                            type="submit"
                            class="rounded-full bg-black px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#8b6f47] disabled:cursor-not-allowed disabled:opacity-60"
                            :disabled="isSubmitting"
                        >
                            {{
                                isSubmitting
                                    ? contact.submitting_button
                                    : contact.submit_button
                            }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed, ref } from "vue";
import { useLeadSubmission } from "../../composables/useLeadSubmission";
import { formatPrice as formatCurrency } from "../../utils/formatPrice";

const props = defineProps({
    contact: { type: Object, required: true },
    contactInfo: { type: Object, required: true },
    selectedTemplate: { type: Object, default: null },
    selectedPackage: { type: Object, default: null },
    selectedFeatures: { type: Array, required: true },
    totalPrice: { type: Number, required: true },
    currencyLabel: { type: String, required: true },
    currencyCode: { type: String, required: true },
});

const emit = defineEmits(["lead-created"]);

const {
    isSubmitting,
    errorMessage,
    successMessage,
    submitLead,
    resetMessages,
} = useLeadSubmission(props.contact.messages || {}, {
    currencyCode: props.currencyCode,
});

const hasSubmitted = ref(false);

const phoneHref = computed(() => {
    const digits = (props.contactInfo.phone || "").replace(/\D/g, "");
    return digits ? `tel:+${digits}` : "#";
});

const hasSelectedConfiguration = computed(() => {
    return Boolean(
        props.selectedTemplate ||
        props.selectedPackage ||
        props.selectedFeatures.length ||
        props.totalPrice > 0,
    );
});

const emptyForm = {
    name: "",
    email: "",
    phone: "",
    requestType: "contact",
    siteGoal: "",
    businessType: "",
    packageInterest: "",
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
    resetForm();
}

function formatPrice(value) {
    return formatCurrency(value, props.currencyLabel);
}

async function handleSubmit() {
    const payload = {
        ...form.value,
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
