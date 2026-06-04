<template>
    <article
        class="group overflow-hidden rounded-[2rem] border bg-white transition hover:-translate-y-1 hover:shadow-2xl"
        :class="selected ? 'border-black shadow-xl' : 'border-black/10'"
    >
        <div
            class="p-4"
            :style="{ background: template.preview?.background || '#f7f4ef' }"
        >
            <div
                class="rounded-[1.5rem] bg-white/90 p-4 shadow-lg backdrop-blur"
            >
                <div class="flex items-center gap-2">
                    <span class="h-3 w-3 rounded-full bg-red-300"></span>
                    <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                    <span class="h-3 w-3 rounded-full bg-green-300"></span>

                    <div
                        class="ml-auto h-2 w-24 rounded-full bg-black/10"
                    ></div>
                </div>

                <div class="mt-6">
                    <p class="text-xs uppercase tracking-[0.2em] text-black/40">
                        {{ template.preview?.eyebrow || template.category }}
                    </p>

                    <h3 class="mt-2 text-2xl font-semibold leading-tight">
                        {{ template.preview?.title || template.name }}
                    </h3>

                    <p class="mt-2 text-sm text-black/50">
                        {{ template.preview?.subtitle || template.description }}
                    </p>
                </div>

                <div class="mt-6 grid gap-2 sm:grid-cols-2">
                    <div
                        v-for="section in template.preview?.sections ||
                        template.includes"
                        :key="section"
                        class="rounded-xl bg-black/5 px-3 py-2 text-xs font-semibold text-black/60"
                    >
                        {{ section }}
                    </div>
                </div>

                <div class="mt-6 flex gap-2">
                    <span
                        v-for="color in template.preview?.colors || []"
                        :key="color"
                        class="h-6 w-6 rounded-full border border-black/10"
                        :style="{ backgroundColor: color }"
                    ></span>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p
                        class="text-xs uppercase tracking-[0.25em] text-[#8b6f47]"
                    >
                        {{ template.category }}
                    </p>

                    <h3 class="mt-3 text-2xl font-semibold">
                        {{ template.shortTitle || template.name }}
                    </h3>
                </div>

                <span
                    v-if="selected"
                    class="rounded-full bg-black px-3 py-1 text-xs font-semibold text-white"
                >
                    Selectat
                </span>
            </div>

            <p class="mt-4 text-sm leading-6 text-black/60">
                {{ template.description }}
            </p>

            <div class="mt-5 flex flex-wrap gap-2">
                <span
                    v-for="item in template.idealFor"
                    :key="item"
                    class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs font-semibold text-black/60"
                >
                    {{ item }}
                </span>
            </div>

            <div class="mt-6 grid gap-3 rounded-2xl bg-[#f7f4ef] p-4 text-sm">
                <div class="flex justify-between gap-4">
                    <span class="text-black/50">Template pentru developer</span>
                    <strong>{{ formatPrice(template.developerPrice) }}</strong>
                </div>

                <div class="flex justify-between gap-4">
                    <span class="text-black/50">Site făcut de mine</span>
                    <strong
                        >de la
                        {{ formatPrice(template.buildPriceFrom) }}</strong
                    >
                </div>

                <div class="flex justify-between gap-4">
                    <span class="text-black/50">Stil butoane</span>
                    <strong>{{ template.preview?.button || "-" }}</strong>
                </div>
            </div>

            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                <a
                    :href="`/templates/${template.slug}`"
                    class="inline-flex items-center justify-center rounded-full bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                >
                    Vezi demo
                </a>

                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-full border border-black/10 px-5 py-3 text-sm font-semibold transition hover:border-black"
                    @click="$emit('select-template', template.id)"
                >
                    Alege modelul
                </button>
            </div>
        </div>
    </article>
</template>

<script setup>
defineProps({
    template: {
        type: Object,
        required: true,
    },
    selected: {
        type: Boolean,
        default: false,
    },
});

defineEmits(["select-template"]);

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}
</script>
