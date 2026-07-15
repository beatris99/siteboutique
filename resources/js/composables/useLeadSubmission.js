import { ref } from "vue";

function normalizeValue(value) {
    const parsedValue = Number(value);

    return Number.isFinite(parsedValue) ? parsedValue : 0;
}

function trackSuccessfulLead(payload = {}) {
    try {
        const value = normalizeValue(payload.totalPrice);

        const eventParameters = {
            currency: "RON",
            value,
            form_name: payload.requestType || "lead_form",
            source_page: payload.sourcePage || window.location.pathname,
            project_type: payload.businessType || "not_selected",
            template_name: payload.template || "not_selected",
            package_name: payload.packageName || "not_selected",
        };

        if (typeof window.gtag === "function") {
            window.gtag("event", "generate_lead", eventParameters);
        }

        if (typeof window.fbq === "function") {
            window.fbq("track", "Lead", {
                currency: eventParameters.currency,
                value: eventParameters.value,
                content_name: eventParameters.form_name,
            });
        }
    } catch (error) {
        console.warn("Lead tracking could not be sent.", error);
    }
}

export function useLeadSubmission(messages = {}) {
    const isSubmitting = ref(false);
    const errorMessage = ref("");
    const successMessage = ref("");

    const fallbackMessages = {
        tooManyRequests:
            "Ai trimis prea multe cereri într-un timp scurt. Încearcă din nou peste un minut.",
        checkData: "Verifică datele introduse.",
        genericError: "A apărut o eroare.",
        requestFailed: "Nu s-a putut trimite cererea. Încearcă din nou.",
        success: "Cererea a fost trimisă cu succes.",
    };

    const text = {
        ...fallbackMessages,
        ...messages,
    };

    function resetMessages() {
        errorMessage.value = "";
        successMessage.value = "";
    }

    async function submitLead(payload) {
        isSubmitting.value = true;
        resetMessages();

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content");

        try {
            const response = await fetch("/leads", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify(payload),
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 429) {
                    errorMessage.value = text.tooManyRequests;

                    return null;
                }

                if (data.errors) {
                    const firstError = Object.values(data.errors)[0]?.[0];

                    errorMessage.value = firstError || text.checkData;
                } else {
                    errorMessage.value = data.message || text.genericError;
                }

                return null;
            }

            successMessage.value = data.message || text.success;

            trackSuccessfulLead(payload);

            return data;
        } catch (error) {
            console.error(error);

            errorMessage.value = text.requestFailed;

            return null;
        } finally {
            isSubmitting.value = false;
        }
    }

    return {
        isSubmitting,
        errorMessage,
        successMessage,
        submitLead,
        resetMessages,
    };
}
