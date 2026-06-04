<template>
    <div class="rounded-[2rem] border border-black/10 bg-white p-6">
        <h3 class="text-2xl font-semibold">Google Analytics pregătit</h3>

        <p class="mt-3 leading-7 text-black/60">
            Componenta marchează unde se adaugă codul de Analytics / tracking în
            proiectul final.
        </p>

        <p
            class="mt-4 rounded-2xl bg-[#f7f4ef] p-4 font-mono text-sm text-black/60"
        >
            {{ trackingId || "G-XXXXXXXXXX" }}
        </p>
    </div>
</template>

<script setup>
defineProps({
    trackingId: {
        type: String,
        default: "",
    },
});
</script>
