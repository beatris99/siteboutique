<template>
    <section
        id="packages"
        class="bg-[#f7f4ef] px-4 py-16 sm:px-6 sm:py-20 lg:py-24"
    >
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    Pachete
                </p>

                <h2
                    class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl"
                >
                    Alegi cât de complet vrei site-ul.
                </h2>

                <p class="mt-5 text-base leading-8 text-black/60 sm:text-lg">
                    Start este pentru început. Pro este cel mai echilibrat.
                    Premium este pentru proiecte mai complexe sau cu imagine mai
                    puternică.
                </p>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                <article
                    v-for="packageItem in packages"
                    :key="packageItem.id"
                    class="cursor-pointer rounded-[2rem] border p-6 transition hover:-translate-y-1 hover:shadow-xl"
                    :class="cardClass(packageItem)"
                    @click="$emit('select-package', packageItem.id)"
                >
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p
                                class="text-sm uppercase tracking-[0.25em]"
                                :class="
                                    packageItem.key === 'premium'
                                        ? 'text-white/40'
                                        : 'text-[#8b6f47]'
                                "
                            >
                                {{ packageItem.badge }}
                            </p>

                            <h3 class="mt-3 text-3xl font-semibold">
                                {{ packageItem.name }}
                            </h3>
                        </div>

                        <div
                            v-if="selectedPackageId === packageItem.id"
                            class="rounded-full px-3 py-1 text-xs font-semibold"
                            :class="
                                packageItem.key === 'premium'
                                    ? 'bg-white text-black'
                                    : 'bg-black text-white'
                            "
                        >
                            Selectat
                        </div>
                    </div>

                    <p
                        class="mt-4 text-sm leading-6"
                        :class="
                            packageItem.key === 'premium'
                                ? 'text-white/60'
                                : 'text-black/60'
                        "
                    >
                        {{ packageItem.description }}
                    </p>

                    <div
                        class="mt-8 rounded-2xl p-5"
                        :class="
                            packageItem.key === 'premium'
                                ? 'bg-white/10'
                                : 'bg-[#f7f4ef]'
                        "
                    >
                        <p
                            class="text-sm"
                            :class="
                                packageItem.key === 'premium'
                                    ? 'text-white/50'
                                    : 'text-black/50'
                            "
                        >
                            Site făcut de mine
                        </p>

                        <p class="mt-2 text-4xl font-semibold">
                            {{ formatPrice(packageItem.price) }}
                        </p>

                        <p
                            class="mt-4 text-sm"
                            :class="
                                packageItem.key === 'premium'
                                    ? 'text-white/50'
                                    : 'text-black/50'
                            "
                        >
                            Template pentru developer:
                            {{ formatPrice(packageItem.developerPrice) }}
                        </p>
                    </div>

                    <ul
                        class="mt-6 space-y-3 text-sm"
                        :class="
                            packageItem.key === 'premium'
                                ? 'text-white/70'
                                : 'text-black/60'
                        "
                    >
                        <li
                            v-for="feature in packageItem.features"
                            :key="feature"
                            class="flex gap-2"
                        >
                            <span
                                :class="
                                    packageItem.key === 'premium'
                                        ? 'text-white'
                                        : 'text-[#8b6f47]'
                                "
                                >✓</span
                            >
                            <span>{{ feature }}</span>
                        </li>
                    </ul>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
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

function cardClass(packageItem) {
    const isSelected = props.selectedPackageId === packageItem.id;

    if (packageItem.key === "premium") {
        return isSelected
            ? "border-black bg-black text-white shadow-2xl"
            : "border-black bg-black text-white";
    }

    if (packageItem.key === "pro") {
        return isSelected
            ? "border-black bg-white shadow-2xl ring-2 ring-black"
            : "border-black bg-white";
    }

    return isSelected
        ? "border-black bg-white shadow-2xl"
        : "border-black/10 bg-white";
}
</script>
