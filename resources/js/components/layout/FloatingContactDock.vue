<template>
    <div class="fixed bottom-4 right-4 z-50 flex flex-col items-end gap-3 sm:bottom-6 sm:right-6">
        <Transition enter-active-class="transition duration-200 ease-out motion-reduce:transition-none" enter-from-class="translate-y-2 opacity-0" enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-150 ease-in motion-reduce:transition-none" leave-from-class="translate-y-0 opacity-100" leave-to-class="translate-y-2 opacity-0">
            <div v-show="isOpen" class="flex flex-col items-end gap-2">
                <a v-if="contactInfo.email" :href="`mailto:${contactInfo.email}`" class="flex items-center gap-3 rounded-full bg-white py-2.5 pl-4 pr-2.5 text-sm font-semibold text-black shadow-lg ring-1 ring-black/5 transition hover:-translate-x-1">{{ dock.email_label }}<span class="flex h-9 w-9 items-center justify-center rounded-full bg-black text-white">@</span></a>
                <a v-if="contactInfo.phone" :href="phoneHref" class="flex items-center gap-3 rounded-full bg-white py-2.5 pl-4 pr-2.5 text-sm font-semibold text-black shadow-lg ring-1 ring-black/5 transition hover:-translate-x-1">{{ dock.phone_label }}<span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#a67c3a] text-white"><svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M6.6 10.8a15.6 15.6 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.24 11.4 11.4 0 0 0 3.6.58 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .58 3.6 1 1 0 0 1-.24 1z" /></svg></span></a>
                <a href="/configurator" class="flex items-center gap-3 rounded-full bg-black py-2.5 pl-4 pr-2.5 text-sm font-semibold text-white shadow-lg transition hover:-translate-x-1" @click="isOpen = false">{{ dock.configurator_label }}<span class="flex h-9 w-9 items-center justify-center rounded-full bg-white/15">→</span></a>
            </div>
        </Transition>
        <button type="button" class="flex h-14 w-14 items-center justify-center rounded-full bg-black text-white shadow-xl ring-4 ring-black/10 transition hover:scale-105 motion-reduce:transition-none" :aria-expanded="isOpen" :aria-label="isOpen ? dock.close_label : dock.open_label" @click="isOpen = !isOpen"><span v-if="!isOpen">✉</span><span v-else>×</span></button>
    </div>
</template>
<script setup>
import { computed, ref } from 'vue'
const props = defineProps({ dock: { type: Object, required: true }, contactInfo: { type: Object, required: true } })
const isOpen = ref(false)
const phoneHref = computed(() => {
    const digits = props.contactInfo.phone.replace(/\D/g, '')
    return digits ? `tel:+${digits}` : '#'
})
</script>
