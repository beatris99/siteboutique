<template>
    <footer class="border-t border-black/10 bg-black text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr]">
            <div>
                <div class="text-2xl font-semibold tracking-tight">{{ brand.first_part }}<span class="italic text-[#d8c3a5]">{{ brand.second_part }}</span></div>
                <p class="mt-5 max-w-md leading-7 text-white/60">{{ footer.description }}</p>
                <p class="mt-6 text-sm text-white/40">{{ footer.copyright }}</p>
            </div>
            <div>
                <h3 class="font-semibold">{{ footer.navigation_title }}</h3>
                <nav class="mt-5 grid gap-3 text-sm text-white/60"><a v-for="item in navigation" :key="item.href" :href="item.href" class="transition hover:text-white">{{ item.label }}</a></nav>
            </div>
            <div>
                <h3 class="font-semibold">{{ footer.legal_title }}</h3>
                <nav class="mt-5 grid gap-3 text-sm text-white/60"><a v-for="item in footer.legal_links" :key="item.href" :href="item.href" class="transition hover:text-white">{{ item.label }}</a></nav>
            </div>
            <div>
                <h3 class="font-semibold">{{ footer.contact_title }}</h3>
                <div class="mt-5 grid gap-3 text-sm text-white/60">
                    <a v-if="contactInfo.email" :href="`mailto:${contactInfo.email}`" class="transition hover:text-white">{{ contactInfo.email }}</a>
                    <a v-if="contactInfo.phone" :href="phoneHref" class="transition hover:text-white">{{ contactInfo.phone }}</a>
                    <p v-if="contactInfo.location">{{ contactInfo.location }}</p>
                </div>
            </div>
        </div>
    </footer>
</template>
<script setup>
import { computed } from 'vue'
const props = defineProps({ footer: { type: Object, required: true }, brand: { type: Object, required: true }, navigation: { type: Array, required: true }, contactInfo: { type: Object, required: true }, locale: { type: String, default: 'ro' } })
const phoneHref = computed(() => {
    const digits = props.contactInfo.phone.replace(/\D/g, '')
    return digits ? `tel:+${digits}` : '#'
})
</script>
