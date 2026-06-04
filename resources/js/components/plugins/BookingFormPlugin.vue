<template>
    <form
        class="grid gap-4 rounded-[2rem] bg-white p-6 shadow-xl"
        @submit.prevent="$emit('submit-booking', form)"
    >
        <h3 class="text-2xl font-semibold">{{ title }}</h3>

        <input
            v-model="form.name"
            class="rounded-2xl border border-black/10 px-4 py-3"
            placeholder="Nume"
        />
        <input
            v-model="form.phone"
            class="rounded-2xl border border-black/10 px-4 py-3"
            placeholder="Telefon"
        />
        <input
            v-model="form.date"
            type="date"
            class="rounded-2xl border border-black/10 px-4 py-3"
        />

        <textarea
            v-model="form.details"
            rows="4"
            class="rounded-2xl border border-black/10 px-4 py-3"
            placeholder="Ce vrei să rezervi?"
        ></textarea>

        <button
            class="rounded-full bg-black px-6 py-3 text-sm font-semibold text-white"
        >
            Cere rezervare
        </button>
    </form>
</template>

<script setup>
import { ref } from "vue";

defineProps({
    title: {
        type: String,
        default: "Cerere rezervare",
    },
});

defineEmits(["submit-booking"]);

const form = ref({
    name: "",
    phone: "",
    date: "",
    details: "",
});
</script>
