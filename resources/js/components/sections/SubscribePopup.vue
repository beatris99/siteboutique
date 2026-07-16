<template>
    <transition name="popup-fade">
        <div
            v-if="visible"
            class="fixed inset-0 z-[80] bg-black/45 px-3 py-4 backdrop-blur-sm sm:grid sm:place-items-center sm:px-4 sm:py-6"
            role="dialog"
            aria-modal="true"
            @click.self="decline"
        >
            <div
                class="relative mx-auto flex max-h-[88vh] w-full max-w-[22rem] flex-col overflow-hidden rounded-[1.75rem] bg-[#f7f4ef] shadow-[0_30px_90px_rgba(0,0,0,0.35)] sm:max-w-3xl sm:grid sm:max-h-none sm:grid-cols-[0.95fr_1.05fr] sm:rounded-[2rem]"
            >
                <button
                    type="button"
                    class="absolute right-3 top-3 z-10 grid h-9 w-9 place-items-center rounded-full bg-white/85 text-lg leading-none text-black/55 shadow-sm transition hover:bg-white hover:text-black sm:right-4 sm:top-4 sm:h-10 sm:w-10 sm:text-xl"
                    :aria-label="copy.close"
                    @click="decline"
                >
                    ×
                </button>

                <div class="hidden bg-[#171717] p-7 text-white sm:block sm:p-9">
                    <p
                        class="text-xs font-semibold uppercase tracking-[0.32em] text-[#d8c3a5]"
                    >
                        {{ copy.eyebrow }}
                    </p>

                    <h2
                        class="mt-5 text-3xl font-semibold leading-tight tracking-[-0.05em] sm:text-4xl"
                    >
                        {{ copy.title }}
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/62">
                        {{ copy.description }}
                    </p>

                    <div class="mt-7 grid gap-3">
                        <div
                            v-for="item in copy.points"
                            :key="item.title"
                            class="rounded-2xl border border-white/10 bg-white/[0.06] px-5 py-4"
                        >
                            <p class="text-sm font-semibold text-white">
                                {{ item.title }}
                            </p>
                            <p class="mt-1 text-sm leading-6 text-white/55">
                                {{ item.text }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="overflow-y-auto p-5 sm:p-9">
                    <div class="sm:hidden">
                        <p
                            class="text-[11px] font-semibold uppercase tracking-[0.28em] text-[#a67c3a]"
                        >
                            {{ copy.eyebrow }}
                        </p>

                        <h2
                            class="mt-3 text-2xl font-semibold leading-tight tracking-[-0.04em] text-[#171717]"
                        >
                            {{ copy.title }}
                        </h2>

                        <p class="mt-3 text-sm leading-6 text-black/60">
                            {{ copy.description }}
                        </p>
                    </div>

                    <div
                        v-if="subscribed"
                        class="flex min-h-[16rem] flex-col justify-center text-center sm:min-h-[20rem]"
                    >
                        <div
                            class="mx-auto grid h-12 w-12 place-items-center rounded-full bg-green-700 text-white sm:h-14 sm:w-14"
                        >
                            ✓
                        </div>

                        <h3
                            class="mt-5 text-xl font-semibold tracking-[-0.04em] text-[#171717] sm:mt-6 sm:text-2xl"
                        >
                            {{ copy.success_title }}
                        </h3>

                        <p
                            class="mt-3 text-sm leading-6 text-black/60 sm:leading-7"
                        >
                            {{ successMessage || copy.success_text }}
                        </p>
                    </div>

                    <form
                        v-else
                        class="mt-5 grid gap-4 sm:mt-0"
                        @submit.prevent="handleSubmit"
                    >
                        <p
                            class="hidden text-xs font-semibold uppercase tracking-[0.26em] text-[#a67c3a] sm:block"
                        >
                            {{ copy.form_eyebrow }}
                        </p>

                        <h3
                            class="hidden text-2xl font-semibold tracking-[-0.04em] text-[#171717] sm:block"
                        >
                            {{ copy.form_title }}
                        </h3>

                        <input
                            v-model="website"
                            type="text"
                            name="website"
                            autocomplete="off"
                            tabindex="-1"
                            class="hidden"
                            aria-hidden="true"
                        />

                        <label class="grid gap-2">
                            <span class="text-sm font-medium text-black/70">
                                {{ copy.email_label }}
                            </span>

                            <input
                                v-model="email"
                                type="email"
                                required
                                :placeholder="copy.email_placeholder"
                                class="w-full rounded-2xl border border-black/10 bg-white px-4 py-3.5 text-[#171717] outline-none transition placeholder:text-black/35 focus:border-[#a67c3a] focus:shadow-[0_0_0_3px_rgba(166,124,58,0.12)]"
                                autocomplete="email"
                            />
                        </label>

                        <label
                            class="flex cursor-pointer items-start gap-3 text-[13px] leading-5 text-black/55"
                        >
                            <input
                                v-model="consent"
                                type="checkbox"
                                required
                                class="mt-0.5 h-4 w-4 shrink-0 rounded border-black/20"
                            />
                            <span>{{ copy.consent }}</span>
                        </label>

                        <p
                            v-if="errorMessage"
                            class="rounded-xl bg-red-50 px-4 py-3 text-sm text-red-700"
                        >
                            {{ errorMessage }}
                        </p>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-[#171717] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#a67c3a] disabled:cursor-not-allowed disabled:opacity-60"
                            :disabled="isSubmitting || !consent"
                        >
                            {{ isSubmitting ? copy.sending : copy.submit }}
                            <span v-if="!isSubmitting">→</span>
                        </button>

                        <button
                            type="button"
                            class="mx-auto text-[13px] font-medium text-black/40 underline-offset-4 transition hover:text-black/70 hover:underline"
                            @click="decline"
                        >
                            {{ copy.decline }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { computed, onBeforeUnmount, onMounted, ref } from "vue";
import { useNewsletter } from "../../composables/useNewsletter";

const props = defineProps({
    popup: {
        type: Object,
        required: true,
    },
});

const copy = computed(() => ({
    ...props.popup,
    eyebrow: props.popup.eyebrow || props.popup.badge || "",
    description: props.popup.description || props.popup.subtitle || "",
    close: props.popup.close || props.popup.dismiss || "",
    points: Array.isArray(props.popup.points) ? props.popup.points : [],
    messages: props.popup.messages || {},
}));

const STORAGE_KEY = "sitego_newsletter_popup_seen_random_discount_v1";
const SHOW_DELAY = 4000;
const CLOSE_AFTER_SUCCESS = 2600;

const visible = ref(false);
const subscribed = ref(false);
const successMessage = ref("");
const email = ref("");
const consent = ref(false);
const website = ref("");

const { isSubmitting, errorMessage, subscribe } = useNewsletter(
    copy.value.messages,
);

let showTimer = null;
let closeTimer = null;

function alreadySeen() {
    try {
        return window.localStorage.getItem(STORAGE_KEY) === "1";
    } catch (error) {
        return false;
    }
}

function markSeen() {
    try {
        window.localStorage.setItem(STORAGE_KEY, "1");
    } catch (error) {
        // Local storage can be unavailable in private browsers.
    }
}

function close() {
    visible.value = false;
}

function decline() {
    markSeen();
    close();
}

async function handleSubmit() {
    const result = await subscribe({
        email: email.value.trim(),
        privacyAccepted: consent.value ? "1" : "0",
        sourcePage: window.location.href,
        website: website.value,
    });

    if (!result) {
        return;
    }

    successMessage.value = result.message || copy.value.success_text;
    markSeen();
    subscribed.value = true;
    closeTimer = setTimeout(close, CLOSE_AFTER_SUCCESS);
}

onMounted(() => {
    if (!alreadySeen()) {
        showTimer = setTimeout(() => {
            visible.value = true;
        }, SHOW_DELAY);
    }
});

onBeforeUnmount(() => {
    if (showTimer) {
        clearTimeout(showTimer);
    }

    if (closeTimer) {
        clearTimeout(closeTimer);
    }
});
</script>

<style scoped>
.popup-fade-enter-active,
.popup-fade-leave-active {
    transition: opacity 0.2s ease;
}

.popup-fade-enter-from,
.popup-fade-leave-to {
    opacity: 0;
}
</style>
