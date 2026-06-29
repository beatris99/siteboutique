<template>
    <header class="sticky top-0 z-50 border-b border-black/5 bg-[#f7f4ef]/90 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6">
            <a href="/" class="flex shrink-0 items-center gap-3" @click="closeMenu">
                <img :src="brand.icon" :alt="brand.logo_alt || brand.name" class="h-10 w-10 object-contain">
                <div class="leading-none">
                    <p class="text-xl font-bold tracking-tight text-black">
                        {{ brand.first_part }}<span class="text-[#a67c3a]">{{ brand.second_part }}</span>
                    </p>
                    <p class="mt-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-[#a67c3a]">{{ brand.tagline }}</p>
                </div>
            </a>
            <nav class="hidden items-center gap-6 text-sm text-black/60 lg:flex">
                <a v-for="item in navigation" :key="item.href" :href="item.href" class="transition hover:text-black">{{ item.label }}</a>
            </nav>
            <div class="flex items-center gap-3">
                <div class="hidden rounded-full border border-black/10 bg-white p-1 text-xs font-semibold sm:flex">
                    <a href="/language/ro" class="rounded-full px-3 py-2" :class="locale === 'ro' ? 'bg-black text-white' : 'text-black/50'">{{ header.language_ro }}</a>
                    <a href="/language/en" class="rounded-full px-3 py-2" :class="locale === 'en' ? 'bg-black text-white' : 'text-black/50'">{{ header.language_en }}</a>
                </div>
                <a href="/#contact" class="hidden rounded-full bg-black px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#8b6f47] sm:inline-flex">{{ header.cta }}</a>
                <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-black/10 bg-white/70 text-black transition hover:bg-white lg:hidden" :aria-expanded="isOpen" aria-controls="mobile-menu" :aria-label="isOpen ? header.menu_close_label : header.menu_open_label" @click="toggleMenu">
                    <svg v-if="!isOpen" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16" /></svg>
                    <svg v-else viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M6 6l12 12M18 6L6 18" /></svg>
                </button>
            </div>
        </div>
        <Transition enter-active-class="transition duration-200 ease-out motion-reduce:transition-none" enter-from-class="-translate-y-3 opacity-0" enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-150 ease-in motion-reduce:transition-none" leave-from-class="translate-y-0 opacity-100" leave-to-class="-translate-y-3 opacity-0">
            <div v-show="isOpen" id="mobile-menu" class="border-t border-black/5 bg-[#f7f4ef]/95 backdrop-blur-xl lg:hidden">
                <nav class="mx-auto flex max-w-7xl flex-col gap-1 px-4 py-4 sm:px-6">
                    <a v-for="item in navigation" :key="item.href" :href="item.href" class="rounded-2xl px-4 py-3 text-base font-medium text-black/70 transition hover:bg-white hover:text-black" @click="closeMenu">{{ item.label }}</a>
                    <div class="mt-3 flex gap-2 sm:hidden">
                        <a href="/language/ro" class="rounded-full px-4 py-2 text-sm font-semibold" :class="locale === 'ro' ? 'bg-black text-white' : 'bg-white text-black/50'" @click="closeMenu">{{ header.language_ro }}</a>
                        <a href="/language/en" class="rounded-full px-4 py-2 text-sm font-semibold" :class="locale === 'en' ? 'bg-black text-white' : 'bg-white text-black/50'" @click="closeMenu">{{ header.language_en }}</a>
                    </div>
                    <a href="/#contact" class="mt-2 rounded-full bg-black px-5 py-3 text-center text-base font-semibold text-white transition hover:bg-[#8b6f47]" @click="closeMenu">{{ header.cta }}</a>
                </nav>
            </div>
        </Transition>
    </header>
</template>
<script setup>
import { onBeforeUnmount, onMounted, ref } from 'vue'
defineProps({ brand: { type: Object, required: true }, header: { type: Object, required: true }, navigation: { type: Array, required: true }, locale: { type: String, default: 'ro' } })
const isOpen = ref(false)
function toggleMenu() { isOpen.value = !isOpen.value }
function closeMenu() { isOpen.value = false }
function onKeydown(event) { if (event.key === 'Escape') closeMenu() }
onMounted(() => window.addEventListener('keydown', onKeydown))
onBeforeUnmount(() => window.removeEventListener('keydown', onKeydown))
</script>
