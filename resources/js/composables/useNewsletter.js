import { ref } from "vue";

function csrfToken() {
    return (
        document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content") || ""
    );
}

async function readJson(response) {
    try {
        return await response.json();
    } catch (error) {
        return {};
    }
}

function currentLocale() {
    const locale = document.documentElement.lang?.slice(0, 2).toLowerCase();

    return ["ro", "en"].includes(locale) ? locale : "ro";
}

function preparePayload(payload = {}) {
    return {
        ...payload,
        locale: payload.locale || currentLocale(),
        sourcePage: payload.sourcePage || window.location.href,
    };
}

function firstValidationError(errors = {}) {
    return Object.values(errors)?.[0]?.[0] || "";
}

function trackDiscountRequest() {
    try {
        if (typeof window.gtag === "function") {
            window.gtag("event", "discount_code_requested", {
                source_page: window.location.pathname,
            });
        }
    } catch (error) {
        console.warn("Discount request tracking could not be sent.", error);
    }
}

export function useNewsletter(messages = {}) {
    const isSubmitting = ref(false);
    const errorMessage = ref("");

    function translatedMessage(key) {
        return messages?.[key] || "";
    }

    async function send(endpoint, payload) {
        isSubmitting.value = true;
        errorMessage.value = "";

        try {
            const response = await fetch(endpoint, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken(),
                },
                body: JSON.stringify(preparePayload(payload)),
            });

            const data = await readJson(response);

            if (!response.ok) {
                if (response.status === 429) {
                    errorMessage.value = translatedMessage("too_many_requests");

                    return null;
                }

                if (data.errors) {
                    errorMessage.value =
                        firstValidationError(data.errors) ||
                        translatedMessage("check_email");

                    return null;
                }

                errorMessage.value =
                    data.message || translatedMessage("generic_error");

                return null;
            }

            return data;
        } catch (error) {
            console.error(error);

            errorMessage.value = translatedMessage("request_failed");

            return null;
        } finally {
            isSubmitting.value = false;
        }
    }

    async function subscribe(payload) {
        const result = await send("/newsletter/subscribe", payload);

        if (result) {
            trackDiscountRequest();
        }

        return result;
    }

    function unsubscribe(payload) {
        return send("/newsletter/unsubscribe", payload);
    }

    return {
        isSubmitting,
        errorMessage,
        subscribe,
        unsubscribe,
    };
}
