<template>
    <div>
        <section
            v-if="!activeProject"
            class="overflow-hidden bg-[#f7f4ef] px-4 py-16 sm:px-6 lg:py-24"
        >
            <div class="mx-auto max-w-7xl">
                <div
                    class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-end"
                >
                    <div>
                        <p
                            class="text-sm font-semibold uppercase tracking-[0.28em] text-[#a67c3a]"
                        >
                            {{ portfolio.hero.eyebrow }}
                        </p>

                        <h1
                            class="mt-5 max-w-4xl font-serif text-5xl leading-[0.98] tracking-tight text-black sm:text-6xl lg:text-7xl"
                        >
                            {{ portfolio.hero.title }}
                        </h1>

                        <p
                            class="mt-6 max-w-3xl text-lg leading-8 text-black/60"
                        >
                            {{ portfolio.hero.description }}
                        </p>
                    </div>

                    <div
                        class="grid gap-3 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3"
                    >
                        <div
                            v-for="item in portfolio.hero.stats"
                            :key="`${item.value}-${item.label}`"
                            class="rounded-[1.5rem] border border-black/10 bg-white p-5"
                        >
                            <p
                                class="text-3xl font-semibold tracking-tight text-black"
                            >
                                {{ item.value }}
                            </p>

                            <p class="mt-1 text-sm leading-5 text-black/50">
                                {{ item.label }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-14 grid gap-8 lg:grid-cols-2">
                    <article
                        v-for="project in projects"
                        :key="project.slug"
                        class="group overflow-hidden rounded-[2rem] border border-black/10 bg-white shadow-[0_28px_80px_rgba(23,23,23,0.08)]"
                    >
                        <div
                            class="relative aspect-[16/9] overflow-hidden bg-black/5"
                        >
                            <img
                                :src="project.image"
                                :alt="project.image_alt"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.025]"
                                loading="lazy"
                            />

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/45 via-transparent to-transparent"
                            ></div>

                            <span
                                class="absolute left-5 top-5 rounded-full border border-white/30 bg-black/45 px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-white backdrop-blur"
                            >
                                {{ project.status }}
                            </span>

                            <span
                                class="absolute bottom-5 left-5 rounded-full px-4 py-2 text-xs font-semibold"
                                :style="{
                                    backgroundColor: project.accent_soft,
                                    color: project.accent,
                                }"
                            >
                                {{ project.category }}
                            </span>
                        </div>

                        <div class="p-6 sm:p-8">
                            <div
                                class="flex flex-wrap items-center justify-between gap-3"
                            >
                                <p
                                    class="text-sm font-semibold uppercase tracking-[0.2em] text-black/35"
                                >
                                    {{ project.name }}
                                </p>

                                <p class="text-sm text-black/40">
                                    {{ project.year }}
                                </p>
                            </div>

                            <h2
                                class="mt-4 font-serif text-4xl leading-tight tracking-tight text-black"
                            >
                                {{ project.headline }}
                            </h2>

                            <p class="mt-5 leading-7 text-black/60">
                                {{ project.short_description }}
                            </p>

                            <div class="mt-6 flex flex-wrap gap-2">
                                <span
                                    v-for="tag in project.tags.slice(0, 5)"
                                    :key="tag"
                                    class="rounded-full border border-black/10 bg-[#f7f4ef] px-3 py-1.5 text-xs font-medium text-black/60"
                                >
                                    {{ tag }}
                                </span>
                            </div>

                            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                                <a
                                    :href="`/portofoliu/${project.slug}`"
                                    class="rounded-full bg-black px-6 py-3.5 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                                >
                                    {{ portfolio.labels.view_case }}
                                </a>

                                <a
                                    :href="project.url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="rounded-full border border-black/10 px-6 py-3.5 text-center text-sm font-semibold text-black transition hover:border-black/30 hover:bg-[#f7f4ef]"
                                >
                                    {{ portfolio.labels.view_live }}
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <template v-else>
            <section
                class="overflow-hidden bg-[#f7f4ef] px-4 py-10 sm:px-6 lg:py-16"
            >
                <div class="mx-auto max-w-7xl">
                    <a
                        href="/portofoliu"
                        class="inline-flex items-center gap-2 text-sm font-semibold text-black/55 transition hover:text-black"
                    >
                        <span aria-hidden="true">←</span>
                        {{ portfolio.labels.back }}
                    </a>

                    <div
                        class="mt-9 grid gap-10 lg:grid-cols-[0.92fr_1.08fr] lg:items-center"
                    >
                        <div>
                            <div class="flex flex-wrap items-center gap-3">
                                <span
                                    class="rounded-full px-4 py-2 text-xs font-semibold uppercase tracking-[0.16em]"
                                    :style="{
                                        backgroundColor:
                                            activeProject.accent_soft,
                                        color: activeProject.accent,
                                    }"
                                >
                                    {{ activeProject.category }}
                                </span>

                                <span
                                    class="rounded-full border border-black/10 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.16em] text-black/50"
                                >
                                    {{ activeProject.status }}
                                </span>
                            </div>

                            <p
                                class="mt-8 text-sm font-semibold uppercase tracking-[0.28em] text-[#a67c3a]"
                            >
                                {{ activeProject.name }} ·
                                {{ activeProject.year }}
                            </p>

                            <h1
                                class="mt-5 font-serif text-5xl leading-[0.98] tracking-tight text-black sm:text-6xl lg:text-7xl"
                            >
                                {{ activeProject.headline }}
                            </h1>

                            <p
                                class="mt-7 max-w-2xl text-lg leading-8 text-black/60"
                            >
                                {{ activeProject.description }}
                            </p>

                            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                                <a
                                    :href="activeProject.url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="rounded-full bg-black px-6 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                                >
                                    {{ portfolio.labels.view_live }}
                                </a>

                                <a
                                    href="/contact"
                                    class="rounded-full border border-black/10 bg-white px-6 py-4 text-center text-sm font-semibold text-black transition hover:border-black/30"
                                >
                                    {{ portfolio.cta.button }}
                                </a>
                            </div>

                            <p class="mt-3 text-xs text-black/35">
                                {{ portfolio.labels.external_note }}
                            </p>
                        </div>

                        <div
                            class="overflow-hidden rounded-[2rem] border border-black/10 bg-white p-2 shadow-[0_30px_90px_rgba(23,23,23,0.12)]"
                        >
                            <img
                                :src="activeProject.image"
                                :alt="activeProject.image_alt"
                                class="aspect-[16/9] w-full rounded-[1.55rem] object-cover"
                                loading="eager"
                            />
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white px-4 py-16 sm:px-6 lg:py-24">
                <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-3">
                    <article
                        class="rounded-[2rem] border border-black/10 bg-[#f7f4ef] p-7 sm:p-8"
                    >
                        <p
                            class="text-sm font-semibold uppercase tracking-[0.22em] text-[#a67c3a]"
                        >
                            {{ portfolio.labels.delivered }}
                        </p>

                        <ul class="mt-6 grid gap-4">
                            <li
                                v-for="feature in activeProject.features"
                                :key="feature"
                                class="flex gap-3 leading-7 text-black/65"
                            >
                                <span
                                    class="mt-2.5 h-2 w-2 shrink-0 rounded-full"
                                    :style="{
                                        backgroundColor: activeProject.accent,
                                    }"
                                ></span>

                                <span>{{ feature }}</span>
                            </li>
                        </ul>
                    </article>

                    <article
                        class="rounded-[2rem] bg-black p-7 text-white sm:p-8"
                    >
                        <p
                            class="text-sm font-semibold uppercase tracking-[0.22em] text-[#d8c3a5]"
                        >
                            {{ portfolio.labels.result }}
                        </p>

                        <p
                            class="mt-6 font-serif text-3xl leading-tight text-white"
                        >
                            {{ activeProject.result }}
                        </p>
                    </article>

                    <article
                        class="rounded-[2rem] border border-black/10 bg-white p-7 sm:p-8"
                    >
                        <p
                            class="text-sm font-semibold uppercase tracking-[0.22em] text-[#a67c3a]"
                        >
                            {{ portfolio.labels.technology }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span
                                v-for="tag in activeProject.tags"
                                :key="tag"
                                class="rounded-full px-3.5 py-2 text-sm font-medium"
                                :style="{
                                    backgroundColor: activeProject.accent_soft,
                                    color: activeProject.accent,
                                }"
                            >
                                {{ tag }}
                            </span>
                        </div>

                        <p class="mt-7 leading-7 text-black/55">
                            {{ activeProject.implementation }}
                        </p>
                    </article>
                </div>
            </section>

            <section
                v-if="nextProject"
                class="bg-[#f0ebe3] px-4 py-16 sm:px-6 lg:py-20"
            >
                <div class="mx-auto max-w-7xl">
                    <p
                        class="text-sm font-semibold uppercase tracking-[0.24em] text-[#a67c3a]"
                    >
                        {{ portfolio.labels.next_project }}
                    </p>

                    <a
                        :href="`/portofoliu/${nextProject.slug}`"
                        class="group mt-6 grid overflow-hidden rounded-[2rem] border border-black/10 bg-white lg:grid-cols-[0.95fr_1.05fr]"
                    >
                        <img
                            :src="nextProject.image"
                            :alt="nextProject.image_alt"
                            class="aspect-[16/9] h-full w-full object-cover"
                            loading="lazy"
                        />

                        <div class="flex flex-col justify-center p-7 sm:p-10">
                            <p
                                class="text-sm font-semibold uppercase tracking-[0.2em] text-black/35"
                            >
                                {{ nextProject.name }}
                            </p>

                            <h2
                                class="mt-4 font-serif text-4xl leading-tight tracking-tight text-black transition group-hover:text-[#8b6f47]"
                            >
                                {{ nextProject.headline }}
                            </h2>

                            <p class="mt-5 leading-7 text-black/55">
                                {{ nextProject.short_description }}
                            </p>

                            <span
                                class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-black"
                            >
                                {{ portfolio.labels.view_case }}
                                <span
                                    aria-hidden="true"
                                    class="transition group-hover:translate-x-1"
                                >
                                    →
                                </span>
                            </span>
                        </div>
                    </a>
                </div>
            </section>
        </template>

        <section class="bg-black px-4 py-16 text-white sm:px-6 lg:py-20">
            <div
                class="mx-auto flex max-w-7xl flex-col gap-8 rounded-[2rem] border border-white/10 bg-white/[0.06] p-8 sm:p-10 lg:flex-row lg:items-end lg:justify-between"
            >
                <div class="max-w-3xl">
                    <p
                        class="text-sm font-semibold uppercase tracking-[0.24em] text-[#d8c3a5]"
                    >
                        {{ portfolio.cta.eyebrow }}
                    </p>

                    <h2
                        class="mt-4 font-serif text-4xl leading-tight sm:text-5xl"
                    >
                        {{ portfolio.cta.title }}
                    </h2>

                    <p class="mt-5 max-w-2xl leading-7 text-white/60">
                        {{ portfolio.cta.description }}
                    </p>
                </div>

                <a
                    href="/contact"
                    class="shrink-0 rounded-full bg-white px-7 py-4 text-center text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                >
                    {{ portfolio.cta.button }}
                </a>
            </div>
        </section>
    </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    portfolio: {
        type: Object,
        required: true,
    },

    projectSlug: {
        type: String,
        default: "",
    },
});

const projects = computed(() => {
    return Object.values(props.portfolio.projects || {});
});

const activeProject = computed(() => {
    if (!props.projectSlug) {
        return null;
    }

    return (
        projects.value.find((project) => project.slug === props.projectSlug) ||
        null
    );
});

const nextProject = computed(() => {
    if (!activeProject.value || projects.value.length < 2) {
        return null;
    }

    const currentIndex = projects.value.findIndex(
        (project) => project.slug === activeProject.value.slug,
    );

    const nextIndex = (currentIndex + 1) % projects.value.length;

    return projects.value[nextIndex];
});
</script>
