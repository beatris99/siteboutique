<template>
    <div class="bg-[#f8f1ea] text-[#171717]">
        <section class="relative overflow-hidden px-4 py-14 sm:px-6 sm:py-20 lg:py-24">
            <div class="absolute right-0 top-0 h-80 w-80 rounded-full bg-[#d8b99a]/40 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-80 w-80 rounded-full bg-[#f1d8c4]/70 blur-3xl"></div>

            <div class="relative mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <a
                        href="/#templates"
                        class="text-sm text-black/50 transition hover:text-black"
                    >
                        ← Înapoi la template-uri
                    </a>

                    <p class="mt-8 inline-flex rounded-full border border-black/10 bg-white/70 px-4 py-2 text-sm text-black/60">
                        {{ content.hero.eyebrow }}
                    </p>

                    <h1 class="mt-6 max-w-4xl text-4xl font-semibold tracking-tight sm:text-5xl lg:text-7xl">
                        {{ content.hero.title }}
                    </h1>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-black/60 sm:text-lg">
                        {{ content.hero.description }}
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="#booking-demo"
                            class="rounded-full bg-black px-7 py-4 text-center text-sm font-semibold text-white transition hover:bg-[#8b6f47]"
                        >
                            {{ content.hero.primaryButton }}
                        </a>

                        <a
                            href="#services-demo"
                            class="rounded-full border border-black/10 bg-white px-7 py-4 text-center text-sm font-semibold transition hover:border-black/30"
                        >
                            {{ content.hero.secondaryButton }}
                        </a>
                    </div>

                    <div class="mt-8 grid gap-3 sm:grid-cols-3">
                        <div
                            v-for="stat in content.stats"
                            :key="stat.label"
                            class="rounded-2xl border border-black/10 bg-white/70 p-4"
                        >
                            <p class="text-2xl font-semibold">
                                {{ stat.value }}
                            </p>

                            <p class="mt-1 text-sm text-black/50">
                                {{ stat.label }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-black/10 bg-white p-3 shadow-2xl sm:p-4">
                    <div class="overflow-hidden rounded-[1.5rem] bg-black text-white">
                        <div class="flex items-center gap-2 border-b border-white/10 bg-white/10 px-4 py-3">
                            <span class="h-3 w-3 rounded-full bg-red-300"></span>
                            <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                            <span class="h-3 w-3 rounded-full bg-green-300"></span>

                            <div class="ml-3 flex-1 rounded-full bg-white/10 px-3 py-1 text-[10px] text-white/40">
                                glowbeauty.ro
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-[#2b1c16] via-[#8b6f47] to-[#d8b99a] p-5 sm:p-6">
                            <p class="text-sm text-white/60">
                                Brașov
                            </p>

                            <h2 class="mt-16 text-4xl font-semibold sm:mt-20">
                                Glow Beauty Studio
                            </h2>

                            <p class="mt-4 max-w-md leading-7 text-white/70">
                                Programări rapide pentru tratamente, make-up, nails și servicii premium.
                            </p>

                            <div class="mt-8 grid grid-cols-2 gap-3">
                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Programări</p>
                                    <p class="mt-1 text-xl font-semibold">Online</p>
                                </div>

                                <div class="rounded-2xl bg-white/15 p-4">
                                    <p class="text-xs text-white/50">Rating</p>
                                    <p class="mt-1 text-xl font-semibold">4.9</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 bg-white p-4 text-black sm:p-5">
                            <div
                                v-for="service in services.slice(0, 3)"
                                :key="service.title"
                                class="rounded-2xl bg-[#f8f1ea] p-4"
                            >
                                <div class="flex items-center justify-between gap-3">
                                    <p class="font-semibold">
                                        {{ service.title }}
                                    </p>

                                    <p class="text-xs text-black/50">
                                        {{ service.price }}
                                    </p>
                                </div>

                                <div class="mt-3 flex gap-2">
                                    <span class="h-2 flex-1 rounded-full bg-black/10"></span>
                                    <span class="h-2 w-16 rounded-full bg-black/10"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services-demo" class="bg-white px-4 py-14 sm:px-6 sm:py-20">
            <div class="mx-auto max-w-7xl">
                <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                            Servicii
                        </p>

                        <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
                            Clientul vede rapid ce poate programa.
                        </h2>
                    </div>

                    <a
                        href="#booking-demo"
                        class="inline-flex w-fit rounded-full bg-black px-6 py-3 text-sm font-semibold text-white"
                    >
                        Programează-te
                    </a>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <article
                        v-for="service in services"
                        :key="service.title"
                        class="rounded-[1.5rem] border border-black/10 bg-[#f8f1ea] p-5 transition hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div
                            class="h-28 rounded-[1.25rem]"
                            :class="service.gradient"
                        ></div>

                        <h3 class="mt-5 text-xl font-semibold">
                            {{ service.title }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-black/60">
                            {{ service.description }}
                        </p>

                        <div class="mt-5 flex items-center justify-between gap-3">
                            <p class="font-semibold text-[#8b6f47]">
                                {{ service.price }}
                            </p>

                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-black/50">
                                {{ service.duration }}
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-[#f8f1ea] px-4 py-14 sm:px-6 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Galerie
                    </p>

                    <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
                        Poze, atmosferă și rezultate.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        În loc de mult text, template-ul lasă imaginile și serviciile să convingă.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div
                        v-for="item in gallery"
                        :key="item.title"
                        class="min-h-48 rounded-[2rem] p-5 text-white shadow-sm"
                        :class="item.gradient"
                    >
                        <p class="text-xs uppercase tracking-[0.25em] text-white/60">
                            {{ item.subtitle }}
                        </p>

                        <h3 class="mt-24 text-2xl font-semibold">
                            {{ item.title }}
                        </h3>
                    </div>
                </div>
            </div>
        </section>

        <section id="booking-demo" class="bg-white px-4 py-14 sm:px-6 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Programare
                    </p>

                    <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
                        Formular simplu, exact ce trebuie.
                    </h2>

                    <p class="mt-4 leading-7 text-black/60">
                        Clientul nu se pierde în întrebări. Alege serviciul, data și trimite cererea.
                    </p>
                </div>

                <form class="rounded-[2rem] border border-black/10 bg-[#f8f1ea] p-5 sm:p-6">
                    <div class="grid gap-3 sm:grid-cols-2">
                        <input
                            type="text"
                            placeholder="Nume"
                            class="rounded-2xl border border-black/10 bg-white px-4 py-3 text-sm outline-none"
                        />

                        <input
                            type="text"
                            placeholder="Telefon"
                            class="rounded-2xl border border-black/10 bg-white px-4 py-3 text-sm outline-none"
                        />

                        <select class="rounded-2xl border border-black/10 bg-white px-4 py-3 text-sm outline-none">
                            <option>Alege serviciul</option>
                            <option>Tratament facial</option>
                            <option>Make-up</option>
                            <option>Manichiură</option>
                        </select>

                        <input
                            type="date"
                            class="rounded-2xl border border-black/10 bg-white px-4 py-3 text-sm outline-none"
                        />
                    </div>

                    <button
                        type="button"
                        class="mt-4 w-full rounded-full bg-black px-6 py-4 text-sm font-semibold text-white"
                    >
                        Trimite cererea de programare
                    </button>
                </form>
            </div>
        </section>

        <section class="bg-[#f8f1ea] px-4 py-14 sm:px-6 sm:py-20">
            <div class="mx-auto max-w-7xl">
                <div class="mb-8 max-w-3xl">
                    <p class="text-sm uppercase tracking-[0.25em] text-[#8b6f47]">
                        Recenzii
                    </p>

                    <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
                        Încredere rapidă, fără pagini lungi.
                    </h2>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <article
                        v-for="testimonial in testimonials"
                        :key="testimonial.name"
                        class="rounded-[2rem] border border-black/10 bg-white p-6"
                    >
                        <p class="text-lg text-[#8b6f47]">★★★★★</p>

                        <p class="mt-4 leading-7 text-black/60">
                            “{{ testimonial.text }}”
                        </p>

                        <p class="mt-6 font-semibold">
                            {{ testimonial.name }}
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="bg-black px-4 py-14 text-white sm:px-6 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[1fr_0.8fr] lg:items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.25em] text-white/40">
                        Template concret
                    </p>

                    <h2 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-6xl">
                        Potrivit pentru saloane care vor programări și imagine premium.
                    </h2>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/60 sm:text-lg">
                        Include structură pentru servicii, galerie, recenzii, programare și contact rapid.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-white/10 p-6">
                    <p class="text-sm text-white/50">
                        Potrivit pentru
                    </p>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="item in ['Beauty', 'Wellness', 'Nails', 'Cosmetică']"
                            :key="item"
                            class="rounded-full bg-white/10 px-3 py-1 text-xs text-white/70"
                        >
                            {{ item }}
                        </span>
                    </div>

                    <a
                        href="#builder"
                        class="mt-8 inline-flex rounded-full bg-white px-6 py-4 text-sm font-semibold text-black transition hover:bg-[#d8c3a5]"
                    >
                        Configurează acest model
                    </a>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
defineProps({
    content: {
        type: Object,
        required: true,
    },
})

const services = [
    {
        title: 'Tratament facial',
        description: 'Curățare, hidratare și îngrijire personalizată.',
        price: 'de la 180 lei',
        duration: '60 min',
        gradient: 'bg-gradient-to-br from-pink-200 to-orange-100',
    },
    {
        title: 'Make-up eveniment',
        description: 'Machiaj elegant pentru evenimente și ședințe foto.',
        price: 'de la 250 lei',
        duration: '75 min',
        gradient: 'bg-gradient-to-br from-[#d8b99a] to-[#8b6f47]',
    },
    {
        title: 'Manichiură premium',
        description: 'Design curat, culori premium și finisaj rezistent.',
        price: 'de la 120 lei',
        duration: '90 min',
        gradient: 'bg-gradient-to-br from-rose-100 to-pink-200',
    },
    {
        title: 'Pachet mireasă',
        description: 'Consultanță, probă și make-up în ziua evenimentului.',
        price: 'de la 650 lei',
        duration: 'pachet',
        gradient: 'bg-gradient-to-br from-stone-200 to-[#d8b99a]',
    },
]

const gallery = [
    {
        title: 'Atmosferă premium',
        subtitle: 'Studio',
        gradient: 'bg-gradient-to-br from-[#2b1c16] to-[#d8b99a]',
    },
    {
        title: 'Rezultate vizibile',
        subtitle: 'Beauty',
        gradient: 'bg-gradient-to-br from-pink-300 to-orange-100',
    },
    {
        title: 'Servicii clare',
        subtitle: 'Prețuri',
        gradient: 'bg-gradient-to-br from-[#8b6f47] to-[#f1d8c4]',
    },
    {
        title: 'Programări rapide',
        subtitle: 'Contact',
        gradient: 'bg-gradient-to-br from-black to-[#8b6f47]',
    },
]

const testimonials = [
    {
        name: 'Andreea M.',
        text: 'Am găsit rapid serviciile și am trimis programarea direct din site.',
    },
    {
        name: 'Ioana P.',
        text: 'Pagina arată premium și îți dă încredere din primele secunde.',
    },
    {
        name: 'Maria D.',
        text: 'Mi-a fost clar ce servicii există, cât costă și cum mă programez.',
    },
]
</script>
