<template>
    <section class="mt-10 rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="rounded-[1.5rem] bg-gradient-to-br from-[#111] to-[#8b6f47] p-6 text-white">
                <p class="text-sm text-white/60">
                    Template selectat
                </p>

                <h3 class="mt-4 text-4xl font-semibold">
                    {{ template.name }}
                </h3>

                <p class="mt-4 leading-7 text-white/70">
                    {{ template.description }}
                </p>

                <div class="mt-8 grid grid-cols-2 gap-4">
                    <div class="rounded-2xl bg-white/10 p-4">
                        <p class="text-sm text-white/50">Preț de bază</p>
                        <p class="mt-1 text-2xl font-semibold">
                            {{ template.basePrice }} lei
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white/10 p-4">
                        <p class="text-sm text-white/50">Livrare</p>
                        <p class="mt-1 text-2xl font-semibold">
                            {{ template.deliveryTime || 'Estimativ' }}
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                            Potrivit pentru
                        </p>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <span
                                v-for="item in template.idealFor || []"
                                :key="item"
                                class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60"
                            >
                                {{ item }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                            Pagini incluse
                        </p>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <span
                                v-for="page in template.pages || []"
                                :key="page"
                                class="rounded-full bg-[#f7f4ef] px-3 py-1 text-xs text-black/60"
                            >
                                {{ page }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Ce include
                    </p>

                    <ul class="mt-4 grid gap-3 text-sm text-black/60 md:grid-cols-2">
                        <li
                            v-for="item in template.includes || []"
                            :key="item"
                            class="flex gap-2"
                        >
                            <span class="text-[#8b6f47]">✓</span>
                            <span>{{ item }}</span>
                        </li>
                    </ul>
                </div>

                <a
                    href="#builder"
                    class="mt-8 inline-flex rounded-full bg-black px-6 py-4 text-sm font-medium text-white transition hover:bg-[#8b6f47]"
                >
                    Configurează acest template
                </a>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    template: {
        type: Object,
        required: true,
    },
})
</script>
