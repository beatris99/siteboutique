<template>
    <article class="overflow-hidden rounded-[1.4rem] border border-black/10 bg-white shadow-sm" :class="previewClasses">
        <div class="flex items-center gap-2 border-b border-black/10 px-4 py-3"><span class="h-3 w-3 rounded-full bg-red-300"></span><span class="h-3 w-3 rounded-full bg-yellow-300"></span><span class="h-3 w-3 rounded-full bg-green-300"></span><div class="ml-auto h-2 w-20 rounded-full bg-black/10"></div></div>
        <div class="p-4"><div class="flex items-start justify-between gap-4"><div><p class="text-[11px] font-bold uppercase tracking-[0.28em]" :class="accentTextClass">{{ template.category }}</p><p class="mt-3 text-sm text-black/45">{{ template.name }}</p><h3 class="mt-2 max-w-[13rem] text-2xl font-semibold leading-tight text-black">{{ template.previewTitle || template.shortTitle || template.name }}</h3></div><div class="h-20 w-20 shrink-0 rounded-3xl" :class="accentBoxClass"></div></div><p class="mt-4 max-w-[13rem] text-sm leading-6 text-black/55">{{ template.previewDescription || template.description }}</p><div class="mt-5 flex flex-wrap gap-2"><span v-for="item in previewTags" :key="item" class="rounded-full bg-white/80 px-3 py-1 text-[11px] font-medium text-black/55 ring-1 ring-black/5">{{ item }}</span></div></div>
    </article>
</template>
<script setup>
import { computed } from 'vue'
const props = defineProps({ template: { type: Object, required: true } })
const previewTags = computed(() => (props.template.previewTags || props.template.features || props.template.pages || props.template.idealFor || []).slice(0, 5))
const theme = computed(() => props.template.categoryKey || 'presentation')
const previewClasses = computed(() => ({ presentation: 'bg-[#f8efe8]', sales: 'bg-[#e7f7ec]', booking: 'bg-[#dff2fb]', ecommerce: 'bg-[#f8edd8]', 'custom-platform': 'bg-[#ece8ff]' }[theme.value] || 'bg-[#f8efe8]'))
const accentTextClass = computed(() => ({ presentation: 'text-[#b86b7a]', sales: 'text-[#0f7a3d]', booking: 'text-[#08738c]', ecommerce: 'text-[#a67c3a]', 'custom-platform': 'text-[#5b4bb7]' }[theme.value] || 'text-[#a67c3a]'))
const accentBoxClass = computed(() => ({ presentation: 'bg-pink-200/70', sales: 'bg-green-200/70', booking: 'bg-sky-200/80', ecommerce: 'bg-yellow-100', 'custom-platform': 'bg-violet-200/70' }[theme.value] || 'bg-[#ead8b8]'))
</script>
