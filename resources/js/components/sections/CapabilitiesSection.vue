<template>
    <section id="capabilities" class="bg-white px-4 py-20 sm:px-6 lg:py-28">
        <div class="mx-auto max-w-7xl">
            <!-- Header -->
            <div class="max-w-3xl">
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#a67c3a]">
                    {{ t.eyebrow }}
                </p>
                <h2 class="mt-5 font-serif text-4xl font-medium leading-[1.08] tracking-[-0.03em] text-[#171717] sm:text-5xl">
                    {{ t.title }}
                </h2>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-black/55">
                    {{ t.description }}
                </p>
            </div>

            <!-- Cards -->
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="(item, index) in t.items"
                    :key="item.title"
                    class="group flex flex-col rounded-[1.75rem] border border-black/10 bg-[#f7f4ef] p-7 transition duration-300 hover:-translate-y-1.5 hover:border-[#a67c3a]/30 hover:bg-white hover:shadow-xl"
                >
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-white text-[#a67c3a] shadow-sm ring-1 ring-black/5 transition group-hover:bg-[#a67c3a] group-hover:text-white">
                        <component :is="icons[item.icon] || icons.globe" class="h-6 w-6" />
                    </div>

                    <h3 class="mt-6 text-lg font-bold text-[#171717]">
                        {{ item.title }}
                    </h3>

                    <p class="mt-3 flex-1 text-sm leading-6 text-black/55">
                        {{ item.description }}
                    </p>

                    <span class="mt-6 text-[11px] font-bold uppercase tracking-[0.2em] text-black/25 transition group-hover:text-[#a67c3a]">
                        0{{ index + 1 }}
                    </span>
                </article>
            </div>
        </div>
    </section>
</template>

<script setup>
import { h } from 'vue'

defineProps({
    t: { type: Object, required: true },
})

const stroke = {
    fill: 'none',
    stroke: 'currentColor',
    'stroke-width': '1.6',
    'stroke-linecap': 'round',
    'stroke-linejoin': 'round',
    viewBox: '0 0 24 24',
}

const icons = {
    globe: () => h('svg', stroke, [
        h('circle', { cx: 12, cy: 12, r: 9 }),
        h('path', { d: 'M3 12h18' }),
        h('path', { d: 'M12 3a14 14 0 0 1 0 18a14 14 0 0 1 0-18' }),
    ]),
    cart: () => h('svg', stroke, [
        h('circle', { cx: 9, cy: 20, r: 1.4 }),
        h('circle', { cx: 18, cy: 20, r: 1.4 }),
        h('path', { d: 'M3 4h2l2.2 11.2a1 1 0 0 0 1 .8h8.6a1 1 0 0 0 1-.8L20 8H6' }),
    ]),
    calendar: () => h('svg', stroke, [
        h('rect', { x: 3.5, y: 5, width: 17, height: 16, rx: 2 }),
        h('path', { d: 'M3.5 10h17M8 3v4M16 3v4' }),
        h('path', { d: 'M8 15h3' }),
    ]),
    layers: () => h('svg', stroke, [
        h('path', { d: 'M12 3l9 5-9 5-9-5 9-5Z' }),
        h('path', { d: 'M3 13l9 5 9-5' }),
    ]),
}
</script>
