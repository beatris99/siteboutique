<template>
    <header class="sticky top-0 z-50 border-b border-black/5 bg-[#f7f4ef]/85 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6">
            <a href="/" class="flex shrink-0 items-center" @click="closeMenu">
                <img
                    :src="'/images/sitego-icon.svg'"
                    alt="SiteGo"
                    class="h-10 w-10 object-contain sm:hidden"
                />

                <img
                    :src="'/images/sitego-logo.svg'"
                    alt="SiteGo"
                    class="hidden h-11 w-auto object-contain sm:block lg:h-12"
                />
            </a>

            <!-- Desktop nav -->
            <nav class="hidden items-center gap-6 text-sm text-black/60 lg:flex">
                <a
                    v-for="item in navigation"
                    :key="item.href"
                    :href="item.href"
                    class="transition hover:text-black"
                >
                    {{ item.label }}
                </a>
            </nav>

            <div class="flex items-center gap-3">
                <a
                    href="#builder"
                    class="hidden rounded-full bg-black px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#8b6f47] sm:inline-flex"
                >
                    Configurează site-ul
                </a>

                <!-- Hamburger (mobile + tablet) -->
                <button
                    type="button"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-black/10 bg-white/70 text-black transition hover:bg-white lg:hidden"
                    :aria-expanded="isOpen"
                    aria-controls="mobile-menu"
                    aria-label="Deschide meniul"
                    @click="toggleMenu"
                >
                    <svg v-if="!isOpen" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                    <svg v-else viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu panel -->
        <Transition
            enter-active-class="transition duration-200 ease-out motion-reduce:transition-none"
            enter-from-class="-translate-y-3 opacity-0"
            enter-to-class="translate-y-0 opacity-100"
            leave-active-class="transition duration-150 ease-in motion-reduce:transition-none"
            leave-from-class="translate-y-0 opacity-100"
            leave-to-class="-translate-y-3 opacity-0"
        >
            <div
                v-show="isOpen"
                id="mobile-menu"
                class="border-t border-black/5 bg-[#f7f4ef]/95 backdrop-blur-xl lg:hidden"
            >
                <nav class="mx-auto flex max-w-7xl flex-col gap-1 px-4 py-4 sm:px-6">
                    <a
                        v-for="item in navigation"
                        :key="item.href"
                        :href="item.href"
                        class="rounded-2xl px-4 py-3 text-base font-medium text-black/70 transition hover:bg-white hover:text-black"
                        @click="closeMenu"
                    >
                        {{ item.label }}
                    </a>

                    <a
                        href="#builder"
                        class="mt-2 rounded-full bg-black px-5 py-3 text-center text-base font-semibold text-white transition hover:bg-[#8b6f47]"
                        @click="closeMenu"
                    >
                        Configurează site-ul
                    </a>
                </nav>
            </div>
        </Transition>
    </header>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

defineProps({
    brand: {
        type: Object,
        required: true,
    },
    navigation: {
        type: Array,
        required: true,
    },
})

const isOpen = ref(false)

const toggleMenu = () => {
    isOpen.value = !isOpen.value
}

const closeMenu = () => {
    isOpen.value = false
}

// Close on Escape for keyboard users
const onKeydown = (e) => {
    if (e.key === 'Escape') closeMenu()
}

onMounted(() => window.addEventListener('keydown', onKeydown))
onBeforeUnmount(() => window.removeEventListener('keydown', onKeydown))
</script>
