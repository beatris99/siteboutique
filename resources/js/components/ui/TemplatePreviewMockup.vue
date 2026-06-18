<template>
    <div class="overflow-hidden rounded-[1.5rem] border border-white/10 bg-white text-black shadow-2xl">
        <div class="flex items-center gap-2 border-b border-black/10 bg-[#f7f4ef] px-4 py-3">
            <span class="h-3 w-3 rounded-full bg-red-300"></span>
            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
            <span class="h-3 w-3 rounded-full bg-green-300"></span>

            <div class="ml-3 flex-1 rounded-full bg-white px-3 py-1 text-[10px] text-black/40">
                sitego.ro/templates/{{ template.slug }}
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#111] to-[#8b6f47] p-5 text-white">
            <p class="text-[10px] uppercase tracking-[0.25em] text-white/50">
                {{ template.preview?.eyebrow || template.category }}
            </p>

            <h3 class="mt-4 text-2xl font-semibold leading-tight">
                {{ template.preview?.headline || template.name }}
            </h3>

            <p class="mt-3 text-sm leading-6 text-white/60">
                {{ template.preview?.subheadline || template.description }}
            </p>

            <div class="mt-5 flex flex-wrap gap-2">
                <span class="rounded-full bg-white px-4 py-2 text-xs font-semibold text-black">
                    {{ template.preview?.primaryButton || 'Cere ofertă' }}
                </span>

                <span class="rounded-full border border-white/20 px-4 py-2 text-xs font-semibold text-white">
                    {{ template.preview?.secondaryButton || 'Află detalii' }}
                </span>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-3">
                <div
                    v-for="stat in template.preview?.stats || []"
                    :key="stat.label"
                    class="rounded-2xl bg-white/10 p-3"
                >
                    <p class="text-[10px] uppercase tracking-wide text-white/40">
                        {{ stat.label }}
                    </p>

                    <p class="mt-1 text-lg font-semibold">
                        {{ stat.value }}
                    </p>
                </div>
            </div>
        </div>

        <div class="grid gap-3 bg-white p-5">
            <div
                v-for="section in template.preview?.sections || []"
                :key="section"
                class="rounded-2xl bg-[#f7f4ef] p-4"
            >
                <div class="h-2 w-24 rounded-full bg-black/20"></div>
                <div class="mt-3 h-2 w-full rounded-full bg-black/10"></div>
                <div class="mt-2 h-2 w-2/3 rounded-full bg-black/10"></div>

                <p class="mt-4 text-xs font-semibold text-black/50">
                    {{ section }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    template: {
        type: Object,
        required: true,
    },
})
</script>
