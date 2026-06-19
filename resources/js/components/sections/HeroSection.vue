<template>
    <section class="relative overflow-hidden bg-[#f7f4ef] px-4 py-12 sm:px-6 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="grid items-center gap-10 lg:grid-cols-[0.9fr_1.1fr]">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#a67c3a]">{{ hero.eyebrow }}</p>
                    <h1 class="mt-5 max-w-3xl text-4xl font-semibold leading-tight tracking-tight text-[#1f1f1f] sm:text-5xl lg:text-6xl">{{ hero.title }}<span class="block text-[#a67c3a]">{{ hero.highlight }}</span></h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-black/60">{{ hero.description }}</p>
                    <div class="mt-8 grid gap-4 sm:grid-cols-3"><div v-for="item in hero.benefits" :key="item.title" class="rounded-2xl bg-white/80 p-5 shadow-sm ring-1 ring-black/5"><p class="text-sm font-semibold text-black">{{ item.title }}</p><p class="mt-2 text-sm leading-6 text-black/50">{{ item.description }}</p></div></div>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row"><a href="/modele-site" class="rounded-full bg-black px-7 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]">{{ hero.buttons.primary }}</a><a href="/preturi" class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-semibold text-black transition hover:border-black/30">{{ hero.buttons.secondary }}</a></div>
                </div>
                <div class="hidden lg:block"><div class="ml-auto max-w-xl rounded-[2rem] border border-black/10 bg-[#1f1f1f] p-3 shadow-2xl"><div class="rounded-[1.5rem] bg-[#f7f4ef] p-3"><div class="flex items-center gap-2 border-b border-black/10 pb-3"><span class="h-3 w-3 rounded-full bg-red-300"></span><span class="h-3 w-3 rounded-full bg-yellow-300"></span><span class="h-3 w-3 rounded-full bg-green-300"></span><div class="ml-auto h-2 w-32 rounded-full bg-black/10"></div></div><div class="mt-3 grid gap-3 md:grid-cols-2"><TemplateMiniPreview v-for="template in hero.previews" :key="template.name" :template="template" /></div></div></div></div>
            </div>
            <div class="mt-10 grid gap-4 rounded-[2rem] bg-white/80 p-4 shadow-sm sm:grid-cols-2 lg:grid-cols-4"><div v-for="item in hero.quick_stats" :key="item.title" class="flex items-center gap-3 border-black/10 lg:border-r last:border-r-0"><div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#f0e6d6] text-[#a67c3a]">✓</div><div><p class="text-sm font-semibold text-black">{{ item.title }}</p><p class="text-xs text-black/50">{{ item.description }}</p></div></div></div>
        </div>
    </section>
</template>
<script setup>
import TemplateMiniPreview from '../templates/TemplateMiniPreview.vue'
defineProps({ hero: { type: Object, required: true } })
</script>
