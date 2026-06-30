<template>
    <div class="relative mx-auto w-full max-w-[360px] sm:max-w-[390px]">
        <div class="absolute left-1/2 top-2 z-30 -translate-x-1/2 rounded-full bg-white/95 px-4 py-2 text-sm font-semibold text-[#171717] shadow-xl ring-1 ring-black/10 sm:left-auto sm:top-14 sm:-translate-x-0 xl:-left-10 xl:top-14">
            {{ current.label }}
        </div>

        <div class="relative rounded-[3rem] bg-[#111111] p-[9px] shadow-[0_30px_80px_rgba(0,0,0,0.28)] ring-1 ring-black/15">
            <div class="absolute -left-[3px] top-28 h-14 w-[3px] rounded-l-full bg-black/70"></div>
            <div class="absolute -right-[3px] top-36 h-20 w-[3px] rounded-r-full bg-black/70"></div>
            <div class="absolute left-1/2 top-[7px] z-40 h-6 w-32 -translate-x-1/2 rounded-b-[1.2rem] bg-[#111111]"></div>

            <div class="relative overflow-hidden rounded-[2.5rem] bg-white">
                <div class="absolute left-0 right-0 top-0 z-30 flex items-center justify-between bg-white/95 px-6 pb-2 pt-4 text-[12px] font-bold text-black backdrop-blur">
                    <span>{{ currentTime }}</span>
                    <div class="flex items-center gap-1.5">
                        <span class="h-2.5 w-4 rounded-sm border border-black/70"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-black"></span>
                        <span class="h-2.5 w-3 rounded-sm bg-black"></span>
                    </div>
                </div>

                <div
                    ref="screenRef"
                    class="relative h-[640px] overflow-hidden"
                    :style="{ backgroundColor: theme.screenBg }"
                    @touchstart.passive="onTouchStart"
                    @touchend.passive="onTouchEnd"
                >
                    <div
                        class="flex h-full w-[200%]"
                        :class="phase === 'slide' ? 'transition-transform duration-700 ease-in-out' : ''"
                        :style="{ transform: phase === 'slide' ? 'translateX(-50%)' : 'translateX(0)' }"
                    >
                        <div
                            v-for="(pane, paneIndex) in panes"
                            :key="`${pane.key}-${paneIndex}`"
                            class="relative h-full w-1/2 overflow-hidden"
                            :style="{ backgroundColor: paneTheme(paneIndex).screenBg }"
                        >
                            <div
                                :ref="(el) => paneIndex === 0 && setCurrentPageRef(el)"
                                class="min-h-full will-change-transform"
                                :style="{
                                    backgroundColor: paneTheme(paneIndex).screenBg,
                                    transform: paneIndex === 0 ? `translateY(-${currentScroll}px)` : 'translateY(0)',
                                    transition: paneIndex === 0 && phase === 'scroll'
                                        ? `transform ${scrollDuration}ms cubic-bezier(0.22, 1, 0.36, 1)`
                                        : 'none',
                                }"
                            >
                                <PhoneScreen :site="pane" :theme="paneTheme(paneIndex)" />
                            </div>
                        </div>
                    </div>

                    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-16" :style="{ backgroundImage: `linear-gradient(to top, ${theme.screenBg}, transparent)` }"></div>
                </div>
            </div>

            <div class="mx-auto mt-2.5 h-1.5 w-24 rounded-full bg-white/20"></div>
        </div>

        <div class="mt-5 flex items-center justify-center gap-3">
            <button
                type="button"
                class="grid h-10 w-10 place-items-center rounded-full border border-black/10 bg-white text-[#171717] shadow-sm transition hover:bg-black hover:text-white"
                aria-label="Previous"
                @click="prevSlide"
            >
                ←
            </button>

            <div class="flex justify-center gap-2">
                <button
                    v-for="(item, index) in sites"
                    :key="item.key"
                    type="button"
                    class="h-2.5 rounded-full transition-all"
                    :class="index === currentIndex ? 'w-9 bg-[#171717]' : 'w-2.5 bg-black/20'"
                    :aria-label="item.label"
                    @click="goTo(index)"
                ></button>
            </div>

            <button
                type="button"
                class="grid h-10 w-10 place-items-center rounded-full border border-black/10 bg-white text-[#171717] shadow-sm transition hover:bg-black hover:text-white"
                aria-label="Next"
                @click="nextSlide"
            >
                →
            </button>
        </div>

        <p class="mt-4 text-center text-sm font-medium leading-6 text-black/60">
            {{ current.caption }}
        </p>
    </div>
</template>

<script setup>
import { computed, nextTick, onBeforeUnmount, onMounted, ref } from 'vue'
import PhoneScreen from './PhoneScreen.vue'

const props = defineProps({
    showcase: {
        type: Object,
        required: true,
    },
})

const themes = {
    rentride: {
        accent: '#2563eb',
        accentSoft: '#dbeafe',
        screenBg: '#f4f7ff',
        logoIcon: '⚡',
        brandHero: 'linear-gradient(150deg, #1d4ed8 0%, #2563eb 45%, #1e3a8a 100%)',
    },
    beauty: {
        accent: '#c97872',
        accentSoft: '#fbe4e0',
        screenBg: '#fff7f4',
        logoIcon: '✦',
    },
    crm: {
        accent: '#7c3aed',
        accentSoft: '#ede9fe',
        screenBg: '#f6f3ff',
        logoIcon: '◈',
    },
}

const defaultTheme = themes.beauty

const sites = computed(() => props.showcase.items || [])
const themeFor = (site) => themes[site?.key] || themes[site?.style] || defaultTheme

const currentIndex = ref(0)
const phase = ref('reset')
const currentScroll = ref(0)
const scrollDistance = ref(0)

const screenRef = ref(null)
const currentPageRef = ref(null)
const currentTime = ref('')
const touchStartX = ref(0)

const scrollDuration = 7000
const pauseBeforeScroll = 900
const pauseAfterScroll = 900
const slideDuration = 700

let timers = []
let clockTimer = null

const current = computed(() => sites.value[currentIndex.value] || {})
const theme = computed(() => themeFor(current.value))

const next = computed(() => {
    if (!sites.value.length) return {}
    const nextIndex = (currentIndex.value + 1) % sites.value.length
    return sites.value[nextIndex]
})

const panes = computed(() => [current.value, next.value])
const paneTheme = (paneIndex) => themeFor(panes.value[paneIndex])

const setCurrentPageRef = (el) => {
    if (el) currentPageRef.value = el
}

const clearTimers = () => {
    timers.forEach((timer) => clearTimeout(timer))
    timers = []
}

const wait = (ms) =>
    new Promise((resolve) => {
        const timer = setTimeout(resolve, ms)
        timers.push(timer)
    })

const measureScroll = () => {
    const viewportHeight = screenRef.value?.clientHeight || 0
    const pageHeight = currentPageRef.value?.scrollHeight || 0
    scrollDistance.value = Math.max(0, pageHeight - viewportHeight)
}

function updateCurrentTime() {
    const now = new Date()
    currentTime.value = now.toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit',
    })
}

const runCycle = async () => {
    if (sites.value.length < 1) return
    clearTimers()

    phase.value = 'reset'
    currentScroll.value = 0

    await nextTick()
    measureScroll()

    await wait(pauseBeforeScroll)

    phase.value = 'scroll'
    currentScroll.value = scrollDistance.value

    await wait(scrollDuration + pauseAfterScroll)

    if (sites.value.length < 2) {
        runCycle()
        return
    }

    phase.value = 'slide'
    await wait(slideDuration)

    currentIndex.value = (currentIndex.value + 1) % sites.value.length
    await nextTick()
    runCycle()
}

const goTo = async (index) => {
    if (index === currentIndex.value) return
    clearTimers()

    phase.value = 'reset'
    currentScroll.value = 0
    currentIndex.value = index

    await nextTick()
    measureScroll()
    runCycle()
}

const nextSlide = () => {
    const nextIndex = (currentIndex.value + 1) % sites.value.length
    goTo(nextIndex)
}

const prevSlide = () => {
    const prevIndex = (currentIndex.value - 1 + sites.value.length) % sites.value.length
    goTo(prevIndex)
}

function onTouchStart(event) {
    touchStartX.value = event.changedTouches?.[0]?.clientX || 0
}

function onTouchEnd(event) {
    const endX = event.changedTouches?.[0]?.clientX || 0
    const deltaX = endX - touchStartX.value

    if (Math.abs(deltaX) < 40) return

    if (deltaX < 0) {
        nextSlide()
    } else {
        prevSlide()
    }
}

onMounted(() => {
    updateCurrentTime()
    clockTimer = setInterval(updateCurrentTime, 30000)
    runCycle()
    window.addEventListener('resize', measureScroll)
})

onBeforeUnmount(() => {
    clearTimers()
    if (clockTimer) clearInterval(clockTimer)
    window.removeEventListener('resize', measureScroll)
})
</script>
