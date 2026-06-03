<template>
    <article
        class="rounded-[2rem] border bg-white p-5 transition hover:-translate-y-1 hover:shadow-xl"
        :class="isSelected ? 'border-black' : 'border-black/10'"
    >
        <div
            class="cursor-pointer"
            @click="$emit('select', template.id)"
        >
            <TemplatePreviewMockup :template="template" />
        </div>

        <div class="mt-6">
            <div class="flex items-center justify-between gap-3">
                <p class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/50">
                    {{ template.category }}
                </p>

                <p class="text-xs text-black/40">
                    {{ template.deliveryTime }}
                </p>
            </div>

            <h4 class="mt-4 text-xl font-semibold">
                {{ template.name }}
            </h4>

            <p class="mt-2 text-sm leading-6 text-black/50">
                {{ template.description }}
            </p>

            <div class="mt-6 flex items-center justify-between">
                <span class="text-sm text-black/50">de la</span>
                <strong class="text-xl">{{ template.basePrice }} lei</strong>
            </div>

            <div class="mt-6 flex gap-3">
                <button
                    type="button"
                    class="flex-1 rounded-full bg-black px-4 py-3 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
                    @click="$emit('select', template.id)"
                >
                    Selectează
                </button>

                <a
                    :href="`/templates/${template.slug}`"
                    class="flex-1 rounded-full border border-black/10 bg-white px-4 py-3 text-center text-sm font-medium transition hover:border-black/30"
                >
                    Vezi demo
                </a>
            </div>
        </div>
    </article>
</template>

<script setup>
import TemplatePreviewMockup from '../ui/TemplatePreviewMockup.vue'

defineProps({
    template: {
        type: Object,
        required: true,
    },
    isSelected: {
        type: Boolean,
        default: false,
    },
})

defineEmits(['select'])
</script>
