<template>
    <div
        class="overflow-hidden rounded-[1.5rem] border border-black/10 shadow-sm"
        :style="{ background: template.preview.background }"
    >
        <div class="flex items-center gap-2 border-b border-black/10 bg-white/70 px-3 py-2 backdrop-blur">
            <span class="h-2.5 w-2.5 rounded-full bg-red-300"></span>
            <span class="h-2.5 w-2.5 rounded-full bg-yellow-300"></span>
            <span class="h-2.5 w-2.5 rounded-full bg-green-300"></span>

            <div class="ml-auto hidden h-2 w-20 rounded-full bg-black/10 sm:block"></div>
        </div>

        <div class="p-4">
            <div class="flex items-center justify-between gap-3">
                <p
                    class="text-[10px] font-bold uppercase tracking-[0.2em]"
                    :style="{ color: template.preview.accent }"
                >
                    {{ template.preview.eyebrow }}
                </p>

                <div class="hidden gap-2 sm:flex">
                    <span
                        v-for="item in template.preview.nav"
                        :key="item"
                        class="text-[10px] font-semibold text-black/40"
                    >
                        {{ item }}
                    </span>
                </div>
            </div>

            <div class="mt-4 grid gap-4 md:grid-cols-[1fr_0.9fr]">
                <div>
                    <p class="text-xs font-semibold text-black/40">
                        {{ template.preview.brand }}
                    </p>

                    <h3 class="mt-2 text-xl font-semibold leading-tight text-black sm:text-2xl">
                        {{ template.preview.title }}
                    </h3>

                    <p class="mt-3 text-xs leading-5 text-black/60 sm:text-sm sm:leading-6">
                        {{ template.preview.subtitle }}
                    </p>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <button
                            type="button"
                            class="rounded-full px-4 py-2 text-[11px] font-semibold text-white"
                            :style="{ backgroundColor: template.preview.accent }"
                        >
                            {{ template.preview.buttonText }}
                        </button>

                        <button
                            type="button"
                            class="rounded-full border border-black/10 bg-white/70 px-4 py-2 text-[11px] font-semibold text-black"
                        >
                            {{ template.preview.secondButtonText }}
                        </button>
                    </div>
                </div>

                <div class="grid gap-2">
                    <div
                        class="h-24 rounded-2xl bg-gradient-to-br sm:h-28"
                        :class="template.preview.imageTone"
                    ></div>

                    <div class="grid grid-cols-2 gap-2">
                        <div
                            v-for="card in template.preview.cards"
                            :key="card.title"
                            class="rounded-xl bg-white/75 p-3"
                        >
                            <p class="text-xs font-semibold text-black">
                                {{ card.title }}
                            </p>

                            <p class="mt-1 text-[10px] text-black/50">
                                {{ card.subtitle }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 grid grid-cols-3 gap-2">
                <div
                    v-for="stat in template.preview.stats"
                    :key="stat.label"
                    class="rounded-xl bg-white/70 p-2 text-center"
                >
                    <p class="text-xs font-bold text-black sm:text-sm">
                        {{ stat.value }}
                    </p>

                    <p class="mt-1 text-[10px] text-black/50">
                        {{ stat.label }}
                    </p>
                </div>
            </div>

            <div class="mt-4 flex flex-wrap gap-2">
                <span
                    v-for="item in template.includes"
                    :key="item"
                    class="rounded-full bg-white/70 px-3 py-1 text-[10px] font-semibold text-black/60"
                >
                    {{ item }}
                </span>
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
