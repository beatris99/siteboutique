<template>
    <section class="bg-[#f7f4ef] px-6 py-24">
        <div class="mx-auto max-w-7xl">
            <div class="mb-12 max-w-4xl">
                <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                    Claritate înainte de ofertă
                </p>

                <h2 class="mt-4 text-4xl font-semibold tracking-tight md:text-5xl">
                    Ce se poate modifica și ce nu este inclus automat.
                </h2>

                <p class="mt-4 leading-7 text-black/60">
                    Asta ajută clientul să înțeleagă exact ce primește și reduce discuțiile inutile înainte de ofertare.
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <article class="rounded-[2rem] border border-black/10 bg-white p-6">
                    <h3 class="text-2xl font-semibold">
                        Se poate modifica
                    </h3>

                    <div class="mt-6 grid gap-3">
                        <div
                            v-for="item in info.canCustomize"
                            :key="item"
                            class="flex gap-3 rounded-2xl bg-[#f7f4ef] p-4 text-sm text-black/70"
                        >
                            <span class="text-[#8b6f47]">✓</span>
                            <span>{{ item }}</span>
                        </div>
                    </div>
                </article>

                <article class="rounded-[2rem] border border-black/10 bg-black p-6 text-white">
                    <h3 class="text-2xl font-semibold">
                        Nu este inclus automat
                    </h3>

                    <div class="mt-6 grid gap-3">
                        <div
                            v-for="item in info.notIncluded"
                            :key="item"
                            class="flex gap-3 rounded-2xl bg-white/10 p-4 text-sm text-white/70"
                        >
                            <span class="text-white">!</span>
                            <span>{{ item }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    info: {
        type: Object,
        required: true,
    },
})
</script>
