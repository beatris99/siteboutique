<template>
    <section class="bg-[#f7f4ef] py-24">
        <div class="mx-auto max-w-7xl px-6">
            <SectionTitle
                eyebrow="Pachete"
                title="Alege nivelul proiectului."
                description="Poți începe simplu sau poți alege un pachet mai complet, în funcție de ce vrei să obții cu site-ul."
                wrapper-class="mb-12 max-w-3xl"
            />

            <div class="grid gap-6 md:grid-cols-3">
                <article
                    v-for="packageItem in packages"
                    :key="packageItem.id"
                    class="cursor-pointer rounded-[2rem] border bg-white p-6 transition hover:-translate-y-1 hover:shadow-xl"
                    :class="selectedPackageId === packageItem.id ? 'border-black' : 'border-black/10'"
                    @click="$emit('select-package', packageItem.id)"
                >
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                                {{ packageItem.badge }}
                            </p>

                            <h3 class="mt-3 text-3xl font-semibold">
                                {{ packageItem.name }}
                            </h3>
                        </div>

                        <div
                            v-if="selectedPackageId === packageItem.id"
                            class="rounded-full bg-black px-3 py-1 text-xs font-semibold text-white"
                        >
                            Selectat
                        </div>
                    </div>

                    <p class="mt-4 text-sm leading-6 text-black/50">
                        {{ packageItem.description }}
                    </p>

                    <div class="mt-6">
                        <span class="text-sm text-black/50">
                            extra
                        </span>

                        <p class="mt-1 text-3xl font-semibold">
                            +{{ packageItem.price }} lei
                        </p>
                    </div>

                    <ul class="mt-6 space-y-3 text-sm text-black/60">
                        <li
                            v-for="feature in packageItem.features"
                            :key="feature"
                            class="flex gap-2"
                        >
                            <span class="text-[#8b6f47]">✓</span>
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
    packages: {
        type: Array,
        required: true,
    },
    selectedPackageId: {
        type: Number,
        required: true,
    },
})

defineEmits(['select-package'])
</script>
