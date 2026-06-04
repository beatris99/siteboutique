<template>
    <section
        class="bg-[#f7f4ef] px-4 pb-16 pt-12 sm:px-6 sm:pb-20 sm:pt-16 lg:pb-24 lg:pt-20"
    >
        <div
            class="mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-[1fr_0.9fr]"
        >
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    {{ hero.eyebrow }}
                </p>

                <h1
                    class="mt-5 max-w-5xl text-4xl font-semibold leading-tight tracking-tight sm:text-5xl lg:text-7xl"
                >
                    {{ hero.title }}
                </h1>

                <p
                    class="mt-6 max-w-2xl text-base leading-8 text-black/60 sm:text-lg"
                >
                    {{ hero.description }}
                </p>

                <div class="mt-8 grid gap-3 sm:flex">
                    <a
                        href="#templates"
                        class="inline-flex items-center justify-center rounded-full bg-black px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                    >
                        Vreau site făcut pentru mine
                    </a>

                    <a
                        href="/pentru-developeri"
                        class="inline-flex items-center justify-center rounded-full border border-black/10 bg-white px-6 py-4 text-sm font-semibold text-black transition hover:border-black"
                    >
                        Sunt developer și vreau template
                    </a>
                </div>

                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div
                        v-for="item in hero.stats"
                        :key="item.label"
                        class="rounded-2xl border border-black/10 bg-white p-4"
                    >
                        <p class="text-2xl font-semibold">{{ item.value }}</p>
                        <p class="mt-1 text-sm text-black/50">
                            {{ item.label }}
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="rounded-[2rem] border border-black/10 bg-white p-4 shadow-2xl"
            >
                <div class="rounded-[1.5rem] bg-black p-5 text-white">
                    <div class="flex items-center gap-2">
                        <span class="h-3 w-3 rounded-full bg-red-300"></span>
                        <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                        <span class="h-3 w-3 rounded-full bg-green-300"></span>
                        <div
                            class="ml-auto h-2 w-28 rounded-full bg-white/20"
                        ></div>
                    </div>

                    <div class="mt-10">
                        <p
                            class="text-sm uppercase tracking-[0.25em] text-white/40"
                        >
                            Model + funcții
                        </p>

                        <h2 class="mt-4 text-4xl font-semibold leading-tight">
                            Site configurabil, fără pornire de la zero.
                        </h2>

                        <p class="mt-4 leading-7 text-white/60">
                            Alegi modelul, alegi funcțiile, apoi decizi dacă îl
                            construiesc eu sau îl folosești ca template.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-3">
                        <div class="rounded-2xl bg-white p-4 text-black">
                            <p class="text-sm text-black/50">
                                1. Alegi modelul
                            </p>
                            <p class="mt-1 font-semibold">
                                Beauty, închirieri, magazin, pensiune, servicii
                            </p>
                        </div>

                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-sm text-white/50">
                                2. Adaugi funcții
                            </p>
                            <p class="mt-1 font-semibold">
                                WhatsApp, formular, rezervare, produse, hartă
                            </p>
                        </div>

                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-sm text-white/50">
                                3. Alegi varianta
                            </p>
                            <p class="mt-1 font-semibold">
                                Ți-l fac eu sau cumperi template-ul
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    hero: {
        type: Object,
        required: true,
    },
});
</script>
