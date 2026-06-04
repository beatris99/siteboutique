<template>
    <section
        id="templates"
        class="bg-black px-4 py-16 text-white sm:px-6 sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                    Modele de site
                </p>

                <h2
                    class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl"
                >
                    Alege cum vrei să arate site-ul.
                </h2>

                <p class="mt-5 text-base leading-8 text-white/60 sm:text-lg">
                    Nu alegi doar o listă de secțiuni. Alegi un model vizual, cu
                    stil, culori, butoane și structură deja gândită.
                </p>
            </div>

            <div class="mt-10 flex gap-3 overflow-x-auto pb-3">
                <button
                    v-for="category in categories"
                    :key="category.key"
                    type="button"
                    class="shrink-0 rounded-full border px-5 py-3 text-sm font-semibold transition"
                    :class="
                        selectedCategoryKey === category.key
                            ? 'border-white bg-white text-black'
                            : 'border-white/10 bg-white/10 text-white hover:bg-white/20'
                    "
                    @click="$emit('select-category', category.key)"
                >
                    {{ category.label }}
                </button>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-2">
                <TemplateCard
                    v-for="template in templates"
                    :key="template.id"
                    :template="template"
                    :selected="selectedTemplateId === template.id"
                    @select-template="$emit('select-template', template.id)"
                />
            </div>

            <div
                v-if="selectedTemplate"
                class="mt-8 rounded-[2rem] border border-white/10 bg-white/10 p-6"
            >
                <p class="text-sm text-white/50">Model ales</p>

                <h3 class="mt-2 text-2xl font-semibold">
                    {{ selectedTemplate.name }}
                </h3>

                <p class="mt-3 text-white/60">
                    {{ selectedTemplate.description }}
                </p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <span
                        v-for="item in selectedTemplate.includes"
                        :key="item"
                        class="rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-white/70"
                    >
                        {{ item }}
                    </span>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import TemplateCard from "../cards/TemplateCard.vue";

defineProps({
    categories: {
        type: Array,
        required: true,
    },
    templates: {
        type: Array,
        required: true,
    },
    selectedCategoryKey: {
        type: String,
        required: true,
    },
    selectedTemplateId: {
        type: Number,
        required: true,
    },
    selectedTemplate: {
        type: Object,
        default: null,
    },
});

defineEmits(["select-category", "select-template"]);
</script>
