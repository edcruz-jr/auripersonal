<script setup>
import {Head, Link} from '@inertiajs/vue3';
import { ref } from 'vue';

const form = ref({
    email: ''
});

const submitEmail = () => {
    console.log('E-mail enviado:', form.value.email);
};
</script>

<template>
    <Head title="Auri Souza Personal"/>

    <div class="min-h-screen bg-white font-sans text-gray-900 selection:bg-black selection:text-bg-brand-dark">
        <section class="flex min-h-[85vh] flex-col items-center justify-center bg-brand-neon px-4 py-20 text-center">
            <div class="mb-6 flex items-center justify-center gap-2 font-bold uppercase tracking-widest">
                AURI SOUZA PERSONAL
            </div>

            <h1 class="mb-6 text-7xl font-black uppercase tracking-tighter sm:text-8xl md:text-9xl lg:text-[10rem]">
                Viva mais e melhor
            </h1>

            <p class="mx-auto mb-10 max-w-xl text-lg font-medium sm:text-xl">
                Tenha acesso a um método de treino personalizado focado em longevidade, saúde e performance para transformar o seu dia a dia.
            </p>

            <Link :href="route('register')" class="rounded-full bg-black px-8 py-4 font-bold text-white transition hover:bg-brand-dark">
                Quero começar agora!
            </Link>
        </section>
    </div>
</template>