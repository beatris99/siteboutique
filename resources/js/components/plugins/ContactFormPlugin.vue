<template>
    <form
        class="grid gap-4 rounded-[2rem] bg-white p-6 shadow-xl"
        @submit.prevent="$emit('submit-form', form)"
    >
        <h3 class="text-2xl font-semibold">{{ title }}</h3>

        <input
            v-model="form.name"
            class="rounded-2xl border border-black/10 px-4 py-3"
            placeholder="Nume"
        />
        <input
            v-model="form.email"
            class="rounded-2xl border border-black/10 px-4 py-3"
            placeholder="Email"
        />
        <input
            v-model="form.phone"
            class="rounded-2xl border border-black/10 px-4 py-3"
            placeholder="Telefon"
        />

        <textarea
            v-model="form.message"
            rows="4"
            class="rounded-2xl border border-black/10 px-4 py-3"
            placeholder="Mesaj"
        ></textarea>

        <button
            class="rounded-full bg-black px-6 py-3 text-sm font-semibold text-white"
        >
            Trimite
        </button>
    </form>
</template>

<script setup>
import { ref } from "vue";

defineProps({
    title: {
        type: String,
        default: "Trimite o cerere",
    },
});

defineEmits(["submit-form"]);

const form = ref({
    name: "",
    email: "",
    phone: "",
    message: "",
});
</script>
