import { ref } from "vue";

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
