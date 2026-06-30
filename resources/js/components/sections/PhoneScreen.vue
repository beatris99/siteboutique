<template>
    <div class="px-4 pb-8 pt-12">
        <div class="mb-4 rounded-2xl bg-white px-4 py-3 shadow-sm ring-1 ring-black/5">
            <p class="text-[9px] font-bold uppercase tracking-[0.25em] text-black/35">Google</p>
            <p class="mt-1 truncate text-[12px] font-semibold text-black/65">{{ site.search }}</p>
        </div>

        <header class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="grid h-11 w-11 place-items-center rounded-2xl text-white shadow-sm" :style="{ background: theme.accent }">
                    <ScooterIcon v-if="isBrand" class="h-6 w-6" />
                    <span v-else class="text-lg">{{ theme.logoIcon }}</span>
                </div>
                <div>
                    <p class="font-serif text-[21px] leading-none text-[#171717]">{{ site.brand }}</p>
                    <p class="mt-1 text-[8px] font-bold uppercase tracking-[0.32em] text-black/40">{{ site.category }}</p>
                </div>
            </div>
            <button type="button" class="grid h-9 w-9 place-items-center rounded-full bg-white shadow-sm ring-1 ring-black/10">
                <span class="text-lg leading-none text-[#171717]">≡</span>
            </button>
        </header>

        <template v-if="isBrand">
            <section class="relative mt-5 overflow-hidden rounded-[1.8rem] p-6 text-white shadow-sm" :style="{ background: theme.brandHero }">
                <div class="pointer-events-none absolute -right-6 -top-8 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-10 -left-6 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>

                <div class="relative">
                    <p class="text-[9px] font-bold uppercase tracking-[0.3em] text-white/70">{{ site.eyebrow }}</p>
                    <h3 class="mt-3 max-w-[210px] font-serif text-[28px] leading-[1.06] tracking-[-0.02em]">{{ site.title }}</h3>
                    <p class="mt-3 max-w-[230px] text-[12px] leading-6 text-white/75">{{ site.description }}</p>

                    <span class="mt-5 inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-[12px] font-bold shadow-lg" :style="{ color: theme.accent }">
                        <WhatsappIcon class="h-3.5 w-3.5" /> {{ site.cta }}
                    </span>

                    <div class="mt-6 flex justify-end">
                        <ScooterIcon class="h-20 w-20 text-white/90" />
                    </div>
                </div>
            </section>

            <section class="mt-4">
                <p class="mb-3 px-1 text-[9px] font-bold uppercase tracking-[0.32em]" :style="{ color: theme.accent }">
                    {{ site.gallery_label }}
                </p>
                <div class="grid gap-3">
                    <article
                        v-for="item in site.gallery"
                        :key="item.title"
                        class="flex items-center justify-between rounded-2xl bg-white p-4 shadow-sm ring-1 ring-black/5"
                    >
                        <div>
                            <p class="text-[13px] font-bold text-[#171717]">{{ item.title }}</p>
                            <p class="mt-0.5 text-[10px] leading-4 text-black/50">{{ item.text }}</p>
                        </div>
                        <span class="grid h-8 w-8 place-items-center rounded-full text-white" :style="{ background: theme.accent }">→</span>
                    </article>
                </div>
            </section>
        </template>

        <template v-else-if="isCrm">
            <section class="mt-5 rounded-[1.8rem] bg-white p-4 shadow-sm ring-1 ring-black/5">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-[9px] font-bold uppercase tracking-[0.32em]" :style="{ color: theme.accent }">{{ site.eyebrow }}</p>
                        <h3 class="mt-2 max-w-[220px] font-serif text-[26px] leading-[1.05] tracking-[-0.02em] text-[#171717]">
                            {{ site.title }}
                        </h3>
                    </div>

                    <span class="rounded-xl px-3 py-2 text-[11px] font-bold text-white shadow-sm" :style="{ backgroundColor: theme.accent }">
                        {{ site.cta }}
                    </span>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-2.5">
                    <article
                        v-for="item in site.stats"
                        :key="item.label"
                        class="rounded-2xl bg-[#f8f7ff] p-3"
                    >
                        <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-black/45">{{ item.label }}</p>
                        <p class="mt-2 text-[20px] font-bold text-[#171717]">{{ item.value }}</p>
                    </article>
                </div>

                <div class="mt-4 rounded-[1.4rem] border border-black/6 p-4">
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <p class="text-[10px] font-bold uppercase tracking-[0.24em]" :style="{ color: theme.accent }">
                            {{ site.pipeline_label }}
                        </p>
                        <span class="text-[11px] font-semibold text-black/50">{{ site.pipeline_total }}</span>
                    </div>

                    <div class="grid gap-3">
                        <div
                            v-for="item in site.pipeline"
                            :key="item.stage"
                        >
                            <div class="flex items-center justify-between gap-3 text-[11px] font-semibold text-[#171717]">
                                <span>{{ item.stage }}</span>
                                <span>{{ item.count }}</span>
                            </div>
                            <div class="mt-1.5 h-2 rounded-full bg-black/6">
                                <div
                                    class="h-2 rounded-full"
                                    :style="{ width: `${item.progress}%`, backgroundColor: theme.accent }"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 rounded-[1.4rem] border border-black/6 p-4">
                    <p class="text-[10px] font-bold uppercase tracking-[0.24em]" :style="{ color: theme.accent }">
                        {{ site.tasks_label }}
                    </p>

                    <div class="mt-3 grid gap-2.5">
                        <article
                            v-for="item in site.tasks"
                            :key="item.title"
                            class="rounded-2xl bg-[#fafafa] p-3"
                        >
                            <p class="text-[12px] font-semibold text-[#171717]">{{ item.title }}</p>
                            <p class="mt-1 text-[10px] leading-5 text-black/50">{{ item.meta }}</p>
                        </article>
                    </div>
                </div>
            </section>
        </template>

        <template v-else>
            <section class="relative mt-5 overflow-hidden rounded-[1.8rem] shadow-sm ring-1 ring-black/5">
                <img :src="heroImage" :alt="site.brand" class="h-[300px] w-full object-cover" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-5 text-white">
                    <p class="text-[9px] font-bold uppercase tracking-[0.32em]" :style="{ color: theme.accentSoft }">{{ site.eyebrow }}</p>
                    <h3 class="mt-2 max-w-[230px] font-serif text-[28px] leading-[1.05] tracking-[-0.02em]">{{ site.title }}</h3>
                    <span class="mt-4 inline-flex rounded-xl px-4 py-2.5 text-[12px] font-bold text-white shadow-lg" :style="{ backgroundColor: theme.accent }">{{ site.cta }}</span>
                </div>
            </section>

            <section class="mt-4 rounded-[1.8rem] bg-white p-4 shadow-sm ring-1 ring-black/5">
                <div class="mb-3 flex items-center justify-between px-1">
                    <p class="text-[9px] font-bold uppercase tracking-[0.32em]" :style="{ color: theme.accent }">{{ site.gallery_label }}</p>
                    <span class="text-[10px] font-bold" :style="{ color: theme.accent }">→</span>
                </div>
                <div class="grid grid-cols-2 gap-2.5">
                    <figure
                        v-for="(item, index) in site.gallery"
                        :key="item.title"
                        class="relative overflow-hidden rounded-2xl"
                    >
                        <img :src="galleryImage(index)" :alt="item.title" class="h-24 w-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/55 to-transparent"></div>
                        <figcaption class="absolute bottom-2 left-2.5 text-[11px] font-bold text-white">{{ item.title }}</figcaption>
                    </figure>
                </div>
            </section>
        </template>

        <footer class="mt-4 grid grid-cols-3 gap-3 rounded-[1.8rem] bg-[#171717] p-5 text-white">
            <div>
                <p class="text-[9px] font-bold text-white/50">Program</p>
                <p class="mt-1 text-[11px] leading-5 text-white/80">{{ site.footer.program }}</p>
            </div>
            <div>
                <p class="text-[9px] font-bold text-white/50">Locație</p>
                <p class="mt-1 text-[11px] leading-5 text-white/80">{{ site.footer.location }}</p>
            </div>
            <div>
                <p class="text-[9px] font-bold text-white/50">Contact</p>
                <p class="mt-1 text-[11px] leading-5 text-white/80">{{ site.footer.contact }}</p>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import WhatsappIcon from '../icons/WhatsappIcon.vue'
import ScooterIcon from '../icons/ScooterIcon.vue'

const props = defineProps({
    site: { type: Object, required: true },
    theme: { type: Object, required: true },
})

const isBrand = computed(() => props.site.style === 'brand')
const isCrm = computed(() => props.site.style === 'crm')

const base = '/images/showcase/phone'
const heroImage = computed(() => `${base}/${props.site.key}-hero.jpg`)
const galleryImage = (index) => `${base}/${props.site.key}-g${index + 1}.jpg`
</script>
