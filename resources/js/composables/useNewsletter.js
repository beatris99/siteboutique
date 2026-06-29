import { ref } from 'vue'

const defaultMessages = {
    too_many_requests: 'Ai trimis prea multe cereri într-un timp scurt. Încearcă din nou peste un minut.',
    check_email: 'Verifică adresa de email.',
    generic_error: 'A apărut o eroare.',
    request_failed: 'Nu s-a putut trimite cererea. Încearcă din nou.',
}

function csrfToken() {
    return document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute('content') || ''
}

async function readJson(response) {
    try {
        return await response.json()
    } catch (error) {
        return {}
    }
}

export function useNewsletter(messages = {}) {
    const isSubmitting = ref(false)
    const errorMessage = ref('')

    const text = { ...defaultMessages, ...messages }

    async function send(endpoint, payload) {
        isSubmitting.value = true
        errorMessage.value = ''

        try {
            const response = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': csrfToken(),
                },
                body: JSON.stringify(payload),
            })

            const data = await readJson(response)

            if (!response.ok) {
                if (response.status === 429) {
                    errorMessage.value = text.too_many_requests
                    return null
                }

                if (data.errors) {
                    errorMessage.value = Object.values(data.errors)[0]?.[0] || text.check_email
                    return null
                }

                errorMessage.value = data.message || text.generic_error
                return null
            }

            return data
        } catch (error) {
            console.error(error)
            errorMessage.value = text.request_failed
            return null
        } finally {
            isSubmitting.value = false
        }
    }

    function subscribe(payload) {
        return send('/newsletter/subscribe', payload)
    }

    function unsubscribe(payload) {
        return send('/newsletter/unsubscribe', payload)
    }

    return { isSubmitting, errorMessage, subscribe, unsubscribe }
}
