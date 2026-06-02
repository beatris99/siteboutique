import { ref } from 'vue'

export function useLeadSubmission() {
    const isSubmitting = ref(false)
    const errorMessage = ref('')
    const successMessage = ref('')

    function resetMessages() {
        errorMessage.value = ''
        successMessage.value = ''
    }

    async function submitLead(payload) {
        isSubmitting.value = true
        resetMessages()

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content')

        try {
            const response = await fetch('/leads', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(payload),
            })

            const data = await response.json()

            if (!response.ok) {
                if (response.status === 429) {
                    errorMessage.value = 'Ai trimis prea multe cereri într-un timp scurt. Încearcă din nou peste un minut.'
                    return null
                }

                if (data.errors) {
                    const firstError = Object.values(data.errors)[0]?.[0]
                    errorMessage.value = firstError || 'Verifică datele introduse.'
                } else {
                    errorMessage.value = data.message || 'A apărut o eroare.'
                }

                return null
            }

            successMessage.value = data.message || 'Cererea a fost trimisă cu succes.'

            return data
        } catch (error) {
            console.error(error)
            errorMessage.value = 'Nu s-a putut trimite cererea. Încearcă din nou.'
            return null
        } finally {
            isSubmitting.value = false
        }
    }

    return {
        isSubmitting,
        errorMessage,
        successMessage,
        submitLead,
        resetMessages,
    }
}
