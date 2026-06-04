<template>
    <a
        :href="whatsappUrl"
        target="_blank"
        class="inline-flex items-center justify-center rounded-full bg-green-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-green-600"
    >
        {{ label }}
    </a>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    phone: {
        type: String,
        required: true,
    },
    message: {
        type: String,
        default: "Bună! Aș vrea mai multe detalii.",
    },
    label: {
        type: String,
        default: "Scrie pe WhatsApp",
    },
});

const whatsappUrl = computed(() => {
    const cleanPhone = props.phone.replace(/\D/g, "");
    return `https://wa.me/${cleanPhone}?text=${encodeURIComponent(props.message)}`;
});
</script>
