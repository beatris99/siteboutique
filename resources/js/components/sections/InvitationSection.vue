<template>
    <section
        id="contact"
        class="scroll-mt-28 bg-[#f7f4ef] px-4 py-16 sm:px-6 lg:py-24"
    >
        <div
            class="mx-auto grid max-w-6xl overflow-hidden rounded-[2.25rem] border border-black/10 bg-white shadow-sm lg:grid-cols-[0.9fr_1.1fr]"
        >
            <aside class="relative bg-[#171717] p-7 text-white sm:p-10 lg:p-12">
                <div class="pointer-events-none absolute inset-0 opacity-40">
                    <div
                        class="absolute -left-24 top-10 h-56 w-56 rounded-full bg-[#a67c3a]/30 blur-3xl"
                    ></div>

                    <div
                        class="absolute bottom-0 right-0 h-48 w-48 rounded-full bg-white/10 blur-3xl"
                    ></div>
                </div>

                <div class="relative">
                    <p
                        class="text-xs font-semibold uppercase tracking-[0.28em] text-[#d8c3a5]"
                    >
                        {{ copy.eyebrow }}
                    </p>

                    <h2
                        class="mt-5 max-w-xl text-3xl font-semibold leading-tight tracking-[-0.05em] sm:text-5xl"
                    >
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
                <div
                    v-if="hasSubmitted"
                    class="flex h-full min-h-[26rem] flex-col justify-center rounded-[2rem] border border-green-200 bg-green-50 p-8 text-center"
                >
                    <div
                        class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-green-700 text-white"
                    >
                        <svg
                            viewBox="0 0 24 24"
                            class="h-7 w-7"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <h3
                        class="mt-6 text-3xl font-semibold tracking-[-0.04em] text-green-950"
                    >
                        {{ copy.form.success_title }}
                    </h3>

                    <p
                        class="mx-auto mt-3 max-w-sm leading-7 text-green-900/70"
                    >
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

                <form
                    v-else
                    class="grid gap-5"
                    novalidate
                    @submit.prevent="handleSubmit"
                >
                    <div>
                        <p
                            class="text-xs font-semibold uppercase tracking-[0.25em] text-[#a67c3a]"
                        >
                            {{ copy.form.eyebrow }}
                        </p>

                        <h3
                            class="mt-3 text-3xl font-semibold tracking-[-0.04em] text-[#171717] sm:text-4xl"
                        >
                            {{ copy.form.title }}
                        </h3>

                        <p class="mt-3 max-w-xl leading-7 text-black/55">
                            {{ copy.form.description }}
                        </p>
                    </div>

                    <input
                        v-model="form.website"
                        type="text"
                        name="website"
                        autocomplete="off"
                        tabindex="-1"
                        class="hidden"
                        aria-hidden="true"
                    />

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">
                                {{ copy.form.name }}
                            </span>

                            <input
                                v-model="form.name"
                                type="text"
                                autocomplete="name"
                                :placeholder="copy.form.name_placeholder"
                                :class="[
                                    'field',
                                    {
                                        'field-error': errors.name,
                                    },
                                ]"
                                :aria-invalid="errors.name ? 'true' : 'false'"
                                data-field="name"
                                @blur="touchField('name')"
                                @input="onFieldInput('name')"
                            />

                            <p v-if="errors.name" class="validation-message">
                                {{ errors.name }}
                            </p>
                        </label>

                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">
                                {{ copy.form.contact }}
                            </span>

                            <input
                                v-model="form.contact"
                                type="text"
                                :placeholder="copy.form.contact_placeholder"
                                :class="[
                                    'field',
                                    {
                                        'field-error': errors.contact,
                                    },
                                ]"
                                :aria-invalid="
                                    errors.contact ? 'true' : 'false'
                                "
                                data-field="contact"
                                @blur="touchField('contact')"
                                @input="onFieldInput('contact')"
                            />

                            <p v-if="errors.contact" class="validation-message">
                                {{ errors.contact }}
                            </p>
                        </label>
                    </div>

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">
                            {{ copy.form.company }}
                        </span>

                        <input
                            v-model="form.company"
                            type="text"
                            autocomplete="organization"
                            :placeholder="copy.form.company_placeholder"
                            class="field"
                        />
                    </label>

                    <label class="grid gap-2">
                        <span class="text-sm font-medium text-black/70">
                            {{ copy.form.message }}
                        </span>

                        <textarea
                            v-model="form.message"
                            rows="4"
                            :placeholder="copy.form.message_placeholder"
                            :class="[
                                'field resize-none',
                                {
                                    'field-error': errors.message,
                                },
                            ]"
                            :aria-invalid="errors.message ? 'true' : 'false'"
                            data-field="message"
                            @blur="touchField('message')"
                            @input="onFieldInput('message')"
                        ></textarea>

                        <p v-if="errors.message" class="validation-message">
                            {{ errors.message }}
                        </p>
                    </label>

                    <div>
                        <label
                            :class="[
                                'flex cursor-pointer gap-3 rounded-2xl border bg-[#f7f4ef] px-5 py-4 text-sm leading-6 text-black/60 transition-colors',
                                errors.privacyAccepted
                                    ? 'border-[#d8aaa6]'
                                    : 'border-black/10',
                            ]"
                            data-field="privacyAccepted"
                        >
                            <input
                                v-model="form.privacyAccepted"
                                type="checkbox"
                                class="mt-0.5 h-4 w-4 shrink-0 rounded border-black/20 accent-[#a67c3a]"
                                :aria-invalid="
                                    errors.privacyAccepted ? 'true' : 'false'
                                "
                                @change="touchField('privacyAccepted')"
                            />

                            <span>
                                {{ copy.form.consent }}
                            </span>
                        </label>

                        <p
                            v-if="errors.privacyAccepted"
                            class="validation-message mt-2"
                        >
                            {{ errors.privacyAccepted }}
                        </p>
                    </div>

                    <p
                        v-if="errorMessage"
                        class="rounded-2xl border border-[#e5c8c5] bg-[#fdf8f7] px-5 py-4 text-sm leading-6 text-[#8f4e48]"
                    >
                        {{ errorMessage }}
                    </p>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-[#b1843b] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#9d7331] disabled:cursor-not-allowed disabled:opacity-60"
                        :disabled="isSubmitting"
                    >
                        {{
                            isSubmitting ? copy.form.sending : copy.form.submit
                        }}

                        <span v-if="!isSubmitting"> → </span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed, nextTick, onMounted, ref } from "vue";

import { useLeadSubmission } from "../../composables/useLeadSubmission";

const props = defineProps({
    t: {
        type: Object,
        required: true,
    },
    messages: {
        type: Object,
        required: true,
    },
    currencyCode: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(["lead-created"]);

const copy = computed(() => props.t);

const points = computed(() => copy.value.points);

const { isSubmitting, errorMessage, submitLead, resetMessages } =
    useLeadSubmission(
        {
            ...props.messages,
            success: copy.value.form.success_title,
        },
        { currencyCode: props.currencyCode },
    );

const hasSubmitted = ref(false);

const emptyForm = {
    name: "",
    contact: "",
    company: "",
    message: "",
    website: "",
    privacyAccepted: false,
};

const emptyErrors = {
    name: "",
    contact: "",
    message: "",
    privacyAccepted: "",
};

const emptyTouched = {
    name: false,
    contact: false,
    message: false,
    privacyAccepted: false,
};

const form = ref({
    ...emptyForm,
});

const errors = ref({
    ...emptyErrors,
});

const touched = ref({
    ...emptyTouched,
});

const topicPrefillMap = computed(() => ({
    abonament: copy.value.form.subscription_message,
    subscription: copy.value.form.subscription_message,
}));

onMounted(() => {
    const search = new URLSearchParams(window.location.search);

    const topic = search.get("topic");

    if (topic && topicPrefillMap.value[topic] && !form.value.message.trim()) {
        form.value.message = topicPrefillMap.value[topic];
    }
});

function resetForm() {
    form.value = {
        ...emptyForm,
    };
}

function resetValidation() {
    errors.value = {
        ...emptyErrors,
    };

    touched.value = {
        ...emptyTouched,
    };
}

function prepareAnother() {
    hasSubmitted.value = false;

    resetMessages();
    resetForm();
    resetValidation();
}

function validateName() {
    const value = form.value.name.trim();

    if (!value) {
        return copy.value.form.validation.name_required;
    }

    if (value.length < 2) {
        return copy.value.form.validation.name_short;
    }

    return "";
}

function validateContact() {
    const value = form.value.contact.trim();

    if (!value) {
        return copy.value.form.validation.contact_required;
    }

    if (value.includes("@")) {
        const isValidEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);

        if (!isValidEmail) {
            return copy.value.form.validation.email_invalid;
        }

        return "";
    }

    const digits = value.replace(/\D/g, "");

    if (digits.length < 7) {
        return copy.value.form.validation.phone_invalid;
    }

    return "";
}

function validateMessage() {
    const value = form.value.message.trim();

    if (!value) {
        return copy.value.form.validation.message_required;
    }

    if (value.length < 8) {
        return copy.value.form.validation.message_short;
    }

    return "";
}

function validatePrivacyAccepted() {
    if (!form.value.privacyAccepted) {
        return copy.value.form.validation.consent_required;
    }

    return "";
}

function validateField(field) {
    switch (field) {
        case "name":
            errors.value.name = validateName();
            break;

        case "contact":
            errors.value.contact = validateContact();
            break;

        case "message":
            errors.value.message = validateMessage();
            break;

        case "privacyAccepted":
            errors.value.privacyAccepted = validatePrivacyAccepted();
            break;

        default:
            break;
    }
}

function touchField(field) {
    touched.value[field] = true;

    validateField(field);
}

function onFieldInput(field) {
    if (!touched.value[field]) {
        return;
    }

    validateField(field);
}

async function focusFirstInvalidField() {
    const order = ["name", "contact", "message", "privacyAccepted"];

    const firstInvalid = order.find((field) => Boolean(errors.value[field]));

    if (!firstInvalid) {
        return;
    }

    await nextTick();

    const element = document.querySelector(`[data-field="${firstInvalid}"]`);

    if (!element) {
        return;
    }

    element.scrollIntoView({
        behavior: "smooth",
        block: "center",
    });

    const focusable = element.matches("input, textarea, select, button")
        ? element
        : element.querySelector("input, textarea, select, button");

    if (focusable) {
        setTimeout(() => {
            focusable.focus({
                preventScroll: true,
            });
        }, 250);
    }
}

async function validateForm() {
    touched.value.name = true;
    touched.value.contact = true;
    touched.value.message = true;
    touched.value.privacyAccepted = true;

    validateField("name");
    validateField("contact");
    validateField("message");
    validateField("privacyAccepted");

    const isValid =
        !errors.value.name &&
        !errors.value.contact &&
        !errors.value.message &&
        !errors.value.privacyAccepted;

    if (!isValid) {
        await focusFirstInvalidField();
    }

    return isValid;
}

function splitContact(value) {
    const trimmed = (value || "").trim();

    const isEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(trimmed);

    return {
        email: isEmail ? trimmed : "",

        phone: isEmail ? "" : trimmed,
    };
}

async function handleSubmit() {
    resetMessages();

    const isValid = await validateForm();

    if (!isValid) {
        return;
    }

    const { email, phone } = splitContact(form.value.contact);

    const message = [
        form.value.company
            ? `${copy.value.form.lead.company_prefix}: ${form.value.company}`
            : null,

        form.value.message,
    ]
        .filter(Boolean)
        .join("\n\n");

    const payload = {
        name: form.value.name.trim(),

        email,

        phone,

        message,

        requestType: copy.value.form.lead.request_type,

        siteGoal: copy.value.form.lead.site_goal,

        template: copy.value.form.lead.template,

        categoryKey: copy.value.form.lead.category_key,

        categoryLabel: copy.value.form.lead.category_label,

        packageKey: copy.value.form.lead.package_key,

        packageName: copy.value.form.lead.package_name,

        features: [],

        totalPrice: 0,

        privacyAccepted: form.value.privacyAccepted ? "1" : "0",

        sourcePage: window.location.pathname + window.location.search,

        website: form.value.website,
    };

    const result = await submitLead(payload);

    if (!result) {
        return;
    }

    resetForm();
    resetValidation();

    hasSubmitted.value = true;

    emit("lead-created");
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
    transition:
        border-color 0.2s ease,
        box-shadow 0.2s ease,
        background-color 0.2s ease;
}

.field::placeholder {
    color: rgb(0 0 0 / 0.34);
}

.field:hover {
    border-color: rgb(0 0 0 / 0.24);
}

.field:focus {
    border-color: #a67c3a;
    box-shadow: 0 0 0 3px rgb(166 124 58 / 0.1);
}

.field-error {
    border-color: rgb(169 87 80 / 0.55);
    background: white;
    color: #171717;
    box-shadow: none;
}

.field-error:hover {
    border-color: rgb(169 87 80 / 0.7);
}

.field-error:focus {
    border-color: #a95750;
    box-shadow: 0 0 0 3px rgb(169 87 80 / 0.07);
}

.validation-message {
    margin-top: 0.15rem;
    font-size: 0.8125rem;
    font-weight: 500;
    line-height: 1.45;
    color: #a95750;
}
</style>
