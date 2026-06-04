<template>
    <div class="overflow-hidden rounded-[2rem] border border-black/10 bg-white">
        <iframe
            :src="embedUrl"
            class="h-80 w-full"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
    </div>
</template>

<script setup>
defineProps({
    embedUrl: {
        type: String,
        required: true,
    },
});
</script>
