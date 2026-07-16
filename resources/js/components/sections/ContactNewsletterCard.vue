<template>
    <section id="newsletter" class="bg-[#f7f4ef] px-4 pb-14 sm:px-6 lg:pb-20">
        <div class="mx-auto max-w-6xl">
            <div
                class="rounded-[1.5rem] border border-black/10 bg-white px-5 py-5 shadow-sm sm:px-6 lg:flex lg:items-center lg:justify-between lg:gap-8"
            >
                <div class="max-w-2xl">
                    <p
                        class="text-[11px] font-semibold uppercase tracking-[0.28em] text-[#a67c3a]"
                    >
                        {{ copy.compact_eyebrow }}
                    </p>

                    <h2
                        class="mt-2 text-xl font-semibold tracking-[-0.03em] text-[#171717] sm:text-2xl"
                    >
                        {{ copy.compact_title }}
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-black/55">
                        {{ copy.compact_description }}
                    </p>
                </div>

                <div class="mt-5 w-full lg:mt-0 lg:max-w-md">
                    <div
                        v-if="subscribed"
                        class="rounded-2xl bg-[#f7f4ef] px-5 py-4 text-[#171717]"
                    >
                        <p class="font-semibold">
                            {{ copy.success_subscribe_title }}
                        </p>

                        <p class="mt-1 text-sm leading-6 text-black/60">
                            {{ successMessage || copy.success_subscribe_text }}
                        </p>
                    </div>

                    <form
                        v-else
                        class="grid gap-3"
                        @submit.prevent="handleSubmit"
                    >
                        <input
                            v-model="website"
                            type="text"
                            name="website"
                            autocomplete="off"
                            tabindex="-1"
                            class="hidden"
                            aria-hidden="true"
                        />

                        <div class="flex flex-col gap-3 sm:flex-row">
                            <input
                                v-model="email"
                                type="email"
                                required
                                :placeholder="copy.email_placeholder"
                                class="min-w-0 flex-1 rounded-full border border-black/10 bg-[#f7f4ef] px-5 py-3.5 text-sm text-[#171717] outline-none placeholder:text-black/35 focus:border-[#a67c3a]"
                                autocomplete="email"
                            />

                            <button
                                type="submit"
                                class="inline-flex shrink-0 items-center justify-center rounded-full bg-[#171717] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#a67c3a] disabled:cursor-not-allowed disabled:opacity-60"
                                :disabled="isSubmitting || !consent"
                            >
                                {{
                                    isSubmitting
                                        ? copy.sending
                                        : copy.submit_subscribe
                                }}
                            </button>
                        </div>

                        <label
                            class="flex items-start gap-3 text-xs leading-5 text-black/50"
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
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed, ref } from "vue";
import { useNewsletter } from "../../composables/useNewsletter";

const props = defineProps({
    t: {
        type: Object,
        required: true,
    },
});

const copy = computed(() => ({
    ...props.t,
    compact_eyebrow: props.t.compact_eyebrow || props.t.eyebrow || "",
    compact_title: props.t.compact_title || props.t.title || "",
    compact_description:
        props.t.compact_description || props.t.description || "",
    messages: props.t.messages || {},
}));

const email = ref("");
const consent = ref(false);
const website = ref("");
const subscribed = ref(false);
const successMessage = ref("");

const { isSubmitting, errorMessage, subscribe } = useNewsletter(
    copy.value.messages,
);

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

    successMessage.value = result.message || copy.value.success_subscribe_text;

    subscribed.value = true;
    email.value = "";
    consent.value = false;
    website.value = "";
}
</script>
