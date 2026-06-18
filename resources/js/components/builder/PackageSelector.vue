<template>
    <section class="bg-[#f7f4ef] px-4 py-12 sm:px-6 lg:py-16">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    {{ section.eyebrow }}
                </p>

                <h2 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                    {{ section.title }}
                </h2>

                <p class="mt-4 leading-8 text-black/60">
                    {{ section.description }}
                </p>
            </div>

            <div class="-mx-4 mt-8 overflow-x-auto px-4 pb-4 sm:mx-0 sm:px-0">
                <div class="flex min-w-max gap-4 lg:grid lg:min-w-0 lg:grid-cols-3">
                    <article
                        v-for="packageItem in packages"
                        :key="packageItem.id"
                        class="w-[82vw] max-w-[360px] shrink-0 rounded-[2rem] border p-6 transition lg:w-auto lg:max-w-none"
                        :class="[
                            packageItem.key === 'premium'
                                ? 'border-black bg-black text-white'
                                : 'border-black/10 bg-white text-black',
                            selectedPackageId === packageItem.id
                                ? 'ring-2 ring-[#a67c3a]'
                                : ''
                        ]"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p
                                    class="text-sm uppercase tracking-[0.25em]"
                                    :class="packageItem.key === 'premium' ? 'text-white/40' : 'text-[#8b6f47]'"
                                >
                                    {{ packageItem.badge }}
                                </p>

                                <h3 class="mt-4 text-3xl font-semibold">
                                    {{ packageItem.name }}
                                </h3>
                            </div>

                            <span
                                v-if="selectedPackageId === packageItem.id"
                                class="rounded-full px-3 py-1 text-xs font-semibold"
                                :class="packageItem.key === 'premium' ? 'bg-white text-black' : 'bg-black text-white'"
                            >
                                {{ common.selected }}
                            </span>
                        </div>

                        <p
                            class="mt-5 min-h-[56px] leading-7"
                            :class="packageItem.key === 'premium' ? 'text-white/65' : 'text-black/60'"
                        >
                            {{ packageItem.description }}
                        </p>

                        <div
                            class="mt-6 rounded-2xl p-5"
                            :class="packageItem.key === 'premium' ? 'bg-white/10' : 'bg-[#f7f4ef]'"
                        >
                            <p
                                class="text-sm"
                                :class="packageItem.key === 'premium' ? 'text-white/50' : 'text-black/50'"
                            >
                                {{ common.realization }}
                            </p>

                            <p class="mt-2 text-4xl font-semibold">
                                {{ formatPrice(packageItem.price) }}
                            </p>
                        </div>

                        <ul
                            class="mt-6 grid gap-3 text-sm"
                            :class="packageItem.key === 'premium' ? 'text-white/80' : 'text-black/70'"
                        >
                            <li
                                v-for="feature in packageItem.features"
                                :key="feature"
                            >
                                ✓ {{ feature }}
                            </li>
                        </ul>

                        <button
                            type="button"
                            class="mt-8 w-full rounded-full px-6 py-4 text-sm font-semibold transition"
                            :class="packageItem.key === 'premium'
                                ? 'bg-white text-black hover:bg-[#d8c3a5]'
                                : 'bg-black text-white hover:bg-[#8b6f47]'"
                            @click="$emit('select-package', packageItem.id)"
                        >
                            {{ common.chooseTemplate }}
                        </button>
                    </article>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    section: {
        type: Object,
        required: true,
    },
    common: {
        type: Object,
        required: true,
    },
    packages: {
        type: Array,
        required: true,
    },
    selectedPackageId: {
        type: Number,
        required: true,
    },
});

defineEmits(["select-package"]);

function formatPrice(value) {
    return `${Number(value || 0).toLocaleString("ro-RO")} lei`;
}
</script>
