import { useNewsletter } from './useNewsletter'

export function useSubscription(messages = {}) {
    const newsletter = useNewsletter(messages)

    return {
        isSubmitting: newsletter.isSubmitting,
        errorMessage: newsletter.errorMessage,
        subscribe: newsletter.subscribe,
        unsubscribe: newsletter.unsubscribe,
    }
}
