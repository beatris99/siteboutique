<template>
    <section id="maintenance" class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-6">
            <SectionTitle
                :eyebrow="section.eyebrow"
                :title="section.title"
                :description="section.description"
                wrapper-class="mb-12 max-w-3xl"
            />

            <div class="grid gap-6 md:grid-cols-3">
                <article
                    v-for="plan in section.plans"
                    :key="plan.name"
                    class="rounded-[2rem] border p-6 transition hover:-translate-y-1 hover:shadow-xl"
                    :class="plan.highlighted ? 'border-black bg-black text-white' : 'border-black/10 bg-[#f7f4ef] text-black'"
                >
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-3xl font-semibold">
                                {{ plan.name }}
                            </h3>

                            <p
                                class="mt-3 text-sm leading-6"
                                :class="plan.highlighted ? 'text-white/60' : 'text-black/60'"
                            >
                                {{ plan.description }}
                            </p>
                        </div>

                        <span
                            v-if="plan.highlighted"
                            class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-black"
                        >
                            Popular
                        </span>
                    </div>

                    <p class="mt-8 text-3xl font-semibold">
                        {{ plan.price }}
                    </p>

                    <ul
                        class="mt-6 space-y-3 text-sm"
                        :class="plan.highlighted ? 'text-white/70' : 'text-black/60'"
                    >
                        <li
                            v-for="feature in plan.features"
                            :key="feature"
                            class="flex gap-2"
                        >
                            <span :class="plan.highlighted ? 'text-white' : 'text-[#8b6f47]'">✓</span>
                            <span>{{ feature }}</span>
                        </li>
                    </ul>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
import SectionTitle from '../ui/SectionTitle.vue'

defineProps({
    section: {
        type: Object,
        required: true,
    },
})
</script>
