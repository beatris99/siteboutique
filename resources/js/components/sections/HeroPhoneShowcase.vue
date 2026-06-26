<template>
    <section class="w-full" :aria-label="section.title">
        <div class="mx-auto grid max-w-5xl gap-6 lg:grid-cols-[0.86fr_1.14fr] lg:items-center">
            <div class="order-2 lg:order-1">
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#a67c3a]">
                    {{ section.eyebrow }}
                </p>
                <h2 class="mt-3 text-2xl font-semibold leading-tight tracking-[-0.04em] text-[#171717] sm:text-3xl">
                    {{ section.title }}
                </h2>
                <p class="mt-4 text-sm leading-7 text-black/60 sm:text-base">
                    {{ section.description }}
                </p>

                <div v-if="items.length" class="mt-6 grid gap-2" role="tablist" :aria-label="section.hint">
                    <button
                        v-for="(item, index) in items"
                        :key="item.key || item.label"
                        type="button"
                        class="group flex items-center justify-between rounded-2xl border px-4 py-3 text-left transition hover:-translate-y-0.5"
                        :class="index === activeIndex ? 'border-black bg-black text-white shadow-lg' : 'border-black/10 bg-white/70 text-[#171717] shadow-sm hover:border-black/20'"
                        role="tab"
                        :aria-selected="index === activeIndex"
                        @click="activeIndex = index"
                    >
                        <span>
                            <span class="block text-sm font-bold">{{ item.label }}</span>
                            <span class="mt-1 block text-xs" :class="index === activeIndex ? 'text-white/55' : 'text-black/45'">
                                {{ item.subtitle }}
                            </span>
                        </span>
                        <span class="text-lg">→</span>
                    </button>
                </div>
            </div>

            <div class="order-1 flex justify-center lg:order-2">
                <div class="relative w-full max-w-[360px] sm:max-w-[400px]">
                    <div class="absolute -left-4 top-14 z-20 hidden rounded-full bg-white px-4 py-2 text-xs font-bold text-[#171717] shadow-xl ring-1 ring-black/10 sm:block">
                        {{ activeItem.label }}
                    </div>

                    <div class="rounded-[3.2rem] bg-[#111111] p-[10px] shadow-[0_32px_80px_rgba(0,0,0,0.28)] ring-1 ring-black/15">
                        <div class="relative overflow-hidden rounded-[2.65rem] bg-white">
                            <div class="absolute left-1/2 top-0 z-30 h-7 w-32 -translate-x-1/2 rounded-b-[1.35rem] bg-[#111111]"></div>

                            <div class="relative h-[640px] overflow-hidden bg-[#f8fafc] pt-9">
                                <Transition
                                    mode="out-in"
                                    enter-active-class="transition duration-300 ease-out motion-reduce:transition-none"
                                    enter-from-class="translate-y-4 opacity-0"
                                    enter-to-class="translate-y-0 opacity-100"
                                    leave-active-class="transition duration-200 ease-in motion-reduce:transition-none"
                                    leave-from-class="translate-y-0 opacity-100"
                                    leave-to-class="-translate-y-3 opacity-0"
                                >
                                    <div :key="activeItem.key || activeItem.label" class="h-full overflow-y-auto px-4 pb-5 pt-5 no-scrollbar">
                                        <div class="mb-4 flex items-center justify-between rounded-2xl bg-white px-4 py-3 shadow-sm ring-1 ring-black/5">
                                            <span class="text-[11px] font-black text-[#171717]">9:41</span>
                                            <div class="flex items-center gap-1.5 text-black">
                                                <span class="h-2.5 w-4 rounded-sm border border-current"></span>
                                                <span class="h-2.5 w-2.5 rounded-full bg-current"></span>
                                                <span class="h-2.5 w-3 rounded-sm bg-current"></span>
                                            </div>
                                        </div>

                                        <article class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-black/5">
                                            <div class="relative min-h-[330px] p-5 text-white" :style="heroStyle">
                                                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.35),transparent_38%)]"></div>
                                                <div class="relative z-10">
                                                    <div class="mb-7 flex items-center justify-between">
                                                        <div class="flex items-center gap-3">
                                                            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-white/18 text-xl shadow-sm ring-1 ring-white/20">
                                                                {{ activeItem.type === 'rentride' ? 'R' : 'S' }}
                                                            </div>
                                                            <div>
                                                                <p class="text-[15px] font-black leading-none">{{ activeItem.label }}</p>
                                                                <p class="mt-1 text-[8px] font-bold uppercase tracking-[0.3em] text-white/55">
                                                                    {{ activeItem.subtitle }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <span class="rounded-full bg-white/18 px-3 py-1 text-[10px] font-bold ring-1 ring-white/20">Menu</span>
                                                    </div>

                                                    <p class="text-[10px] font-bold uppercase tracking-[0.32em] text-white/65">
                                                        {{ activeItem.subtitle }}
                                                    </p>
                                                    <h3 class="mt-4 text-[35px] font-semibold leading-[1.02] tracking-[-0.06em]">
                                                        {{ activeItem.title }}
                                                    </h3>
                                                    <p class="mt-5 text-[13px] leading-6 text-white/70">
                                                        {{ activeItem.description }}
                                                    </p>

                                                    <div class="mt-6 flex flex-wrap gap-2">
                                                        <span
                                                            v-for="badge in activeItem.badges || []"
                                                            :key="badge"
                                                            class="rounded-full bg-white/16 px-3 py-2 text-[10px] font-bold text-white ring-1 ring-white/15"
                                                        >
                                                            {{ badge }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                        <div class="mt-4 grid grid-cols-2 gap-3">
                                            <article
                                                v-for="card in activeItem.cards || []"
                                                :key="card.title"
                                                class="rounded-[1.5rem] bg-white p-4 shadow-sm ring-1 ring-black/5"
                                            >
                                                <div class="grid h-10 w-10 place-items-center rounded-2xl text-lg text-white" :style="{ backgroundColor: accent }">
                                                    {{ card.icon }}
                                                </div>
                                                <h4 class="mt-4 text-[17px] font-black leading-tight text-[#171717]">
                                                    {{ card.title }}
                                                </h4>
                                                <p class="mt-2 text-[12px] leading-5 text-black/55">
                                                    {{ card.text }}
                                                </p>
                                            </article>
                                        </div>

                                        <section class="mt-4 rounded-[2rem] bg-white p-5 shadow-sm ring-1 ring-black/5">
                                            <p class="text-[10px] font-bold uppercase tracking-[0.3em]" :style="{ color: accent }">
                                                {{ activeItem.label }}
                                            </p>
                                            <h4 class="mt-3 text-[25px] font-semibold leading-tight tracking-[-0.04em] text-[#171717]">
                                                {{ activeItem.cta }}
                                            </h4>
                                            <div class="mt-5 rounded-2xl px-4 py-3 text-center text-[12px] font-black text-white" :style="{ backgroundColor: accent }">
                                                {{ activeItem.cta }} →
                                            </div>
                                        </section>

                                        <footer class="mt-4 rounded-[2rem] p-5 text-white" :style="{ backgroundColor: dark }">
                                            <div class="flex items-center justify-between gap-4">
                                                <div>
                                                    <p class="text-[18px] font-black">{{ activeItem.label }}</p>
                                                    <p class="mt-1 text-[11px] text-white/55">SiteGo preview</p>
                                                </div>
                                                <span class="rounded-full bg-white/12 px-3 py-2 text-[11px] font-bold">Contact</span>
                                            </div>
                                        </footer>
                                    </div>
                                </Transition>
                            </div>
                        </div>
                    </div>

                    <div v-if="items.length > 1" class="mt-5 flex justify-center gap-2">
                        <button
                            v-for="(item, index) in items"
                            :key="`dot-${item.key || item.label}`"
                            type="button"
                            class="h-2.5 rounded-full transition-all"
                            :class="index === activeIndex ? 'w-8 bg-black' : 'w-2.5 bg-black/20'"
                            :aria-label="item.label"
                            @click="activeIndex = index"
                        ></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed, ref, watch } from 'vue'

const props = defineProps({
    section: {
        type: Object,
        default: () => ({ items: [] }),
    },
    locale: {
        type: String,
        default: 'ro',
    },
})

const activeIndex = ref(0)

const items = computed(() => Array.isArray(props.section?.items) ? props.section.items : [])

const activeItem = computed(() => {
    return items.value[activeIndex.value] || items.value[0] || {
        key: 'empty',
        label: 'SiteGo',
        title: 'SiteGo',
        subtitle: '',
        description: '',
        cta: 'Contact',
        accent: '#a67c3a',
        dark: '#171717',
        badges: [],
        cards: [],
    }
})

const accent = computed(() => activeItem.value.accent || '#a67c3a')
const dark = computed(() => activeItem.value.dark || '#171717')

const heroStyle = computed(() => ({
    background: `linear-gradient(135deg, ${dark.value} 0%, ${accent.value} 58%, #f7f4ef 135%)`,
}))

watch(items, (value) => {
    if (!value.length || activeIndex.value <= value.length - 1) return
    activeIndex.value = 0
})
</script>

<style scoped>
.no-scrollbar {
    scrollbar-width: none;
}

.no-scrollbar::-webkit-scrollbar {
    display: none;
}
</style>
