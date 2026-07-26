<script setup>
import HomeRegisterButton from '@/Components/HomeRegisterButton.vue';
import {Head, Link} from '@inertiajs/vue3';
HomeRegisterButton
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
        <section class="relative flex min-h-[85vh] flex-col items-center justify-center bg-brand-neon px-4 py-20 text-center">
            <div class="flex gap-2 absolute right-6 top-6 sm:right-9 sm:top-9">
                <Link :href="route('register')" class="rounded-full bg-black px-6 p-3 text-sm font-bold text-white transition hover:bg-brand-dark">
                    Registrar
                </Link>
                <Link :href="route('login')" class="rounded-full bg-black px-6 p-3 text-sm font-bold text-white transition hover:bg-brand-dark">
                    Login
                </Link>
            </div>

            <div class="mb-6 flex items-center justify-center gap-2 font-bold uppercase tracking-widest">
                AURI SOUZA PERSONAL
            </div>

            <h1 class="mb-6 text-7xl font-black uppercase tracking-tighter sm:text-8xl md:text-9xl lg:text-[10rem]">
                Viva mais e melhor
            </h1>

            <p class="mx-auto mb-10 max-w-xl text-lg font-medium sm:text-xl">
                Tenha acesso a um método de treino personalizado focado em longevidade, saúde e performance para transformar o seu dia a dia.
            </p>

            <HomeRegisterButton>
                Quero começar agora!
            </HomeRegisterButton>
        </section>

        <section class="mx-auto max-w-4xl px-6 py-24 sm:py-32">
            <h2 class="mb-2 text-2xl font-bold lowercase">Auri Souza Personal</h2>
            <p class="mb-8 text-sm text-gray-500">/ corpo / • / mente /</p>
            <p class="mb-8 text-3xl font-medium leading-tight sm:text-4xl md:text-5xl">
                O equilíbrio ideal entre rotina, saúde e movimento. A combinação única de treinos e hábitos feita sob medida para você viver com mais energia, disposição e autonomia por toda a vida.
            </p>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-12">
            <h2 class="mb-4 text-5xl font-black tracking-tight sm:text-6xl md:text-7xl">
                Vá mais longe.<br>Curta a jornada.
            </h2>
            <p class="mb-12 max-w-2xl text-lg text-gray-600 sm:text-xl">
                Nossos métodos, colaboradores e práticas irão tornar a sua vida melhor e mais longa.
            </p>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="group relative h-96 w-full overflow-hidden rounded-2xl bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800&q=80" alt="Embrace" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 flex w-[calc(100%-3rem)] items-end justify-between">
                        <h3 class="text-2xl font-bold text-white sm:text-3xl">Abrace<br>a mudança</h3>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#d4ff00] text-black">↓</div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="group relative h-96 w-full overflow-hidden rounded-2xl bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1571008840902-28bf8f9cd71a?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Extend" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 flex w-[calc(100%-3rem)] items-end justify-between">
                        <h3 class="text-2xl font-bold text-white sm:text-3xl">Extenda<br>sua longevidade</h3>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#00ff7f] text-black">↓</div>
                    </div>
                </div>
                <div class="group relative h-96 w-full overflow-hidden rounded-2xl bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&q=80" alt="Enjoy" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 flex w-[calc(100%-3rem)] items-end justify-between">
                        <h3 class="text-2xl font-bold text-white sm:text-3xl">Curta<br>cada dia</h3>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-400 text-black">↓</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative flex min-h-[60vh] items-center justify-center overflow-hidden bg-[#22333b] py-32 text-center">
            <h2 class="relative z-10 max-w-5xl px-4 text-5xl font-black uppercase italic tracking-tight text-white sm:text-7xl md:text-8xl">
                ADAPTADO PARA <span class="text-[#00ff7f]">CADA PESSOA</span> E <span class="text-[#00ff7f]">CADA META</span>
            </h2>
            
            <!-- Avatares Flutuantes com Posicionamento Absoluto -->
            <!-- <img src="https://i.pravatar.cc/100?img=4" class="absolute left-[10%] top-[20%] h-12 w-12 rounded-full opacity-80 shadow-lg" alt="">
            <img src="https://i.pravatar.cc/100?img=5" class="absolute bottom-[20%] left-[20%] h-16 w-16 rounded-full opacity-80 shadow-lg" alt="">
            <img src="https://i.pravatar.cc/100?img=6" class="absolute right-[15%] top-[30%] h-10 w-10 rounded-full opacity-80 shadow-lg" alt="">
            <img src="https://i.pravatar.cc/100?img=7" class="absolute bottom-[25%] right-[20%] h-20 w-20 rounded-full opacity-80 shadow-lg" alt="">
            <img src="https://i.pravatar.cc/100?img=8" class="absolute right-[40%] top-[10%] h-14 w-14 rounded-full opacity-80 shadow-lg" alt=""> -->
        </section>

        <section class="px-4 py-12 sm:px-12 md:py-24">
            <div class="mx-auto flex max-w-7xl flex-col justify-between gap-12 rounded-[2.5rem] bg-[#00ff7f] p-10 sm:p-20 md:flex-row md:items-end">
                <div class="max-w-xl">
                    <h2 class="mb-6 text-5xl font-black tracking-tight sm:text-6xl md:text-7xl">
                        Melhorando<br>sua qualidade de vida.
                    </h2>
                    <p class="text-lg font-medium sm:text-xl">
                        Estamos em uma missão para ajudar você a abraçar novas rotinas, ganhar autonomia, cuidar da saúde e aproveitar o melhor de cada dia com disposição.
                    </p>
                </div>
                
                <HomeRegisterButton>
                    Quero começar agora!
                </HomeRegisterButton>
            </div>
        </section>

        <footer class="bg-[#0b0f19] px-6 py-24 text-center text-white">
            <div class="mb-12 flex items-center justify-center gap-2 text-2xl font-bold uppercase tracking-widest text-white">
                AURI SOUZA PERSONAL
            </div>
            
            <h2 class="mb-12 text-4xl font-black text-[#d4ff00] sm:text-5xl md:text-6xl">
                Viva com saúde para sempre.
            </h2>
            
            <HomeRegisterButton>
                Quero começar agora!
            </HomeRegisterButton>

            <div class="mt-24 flex flex-col items-center justify-between text-xs text-gray-500 sm:flex-row px-4">
                <p>© Auri Souza Personal 2026</p>
                <div class="flex gap-4">
                    <Link href="#" class="hover:text-white">Política de Privacidade</Link>
                    <Link href="#" class="hover:text-white">Termos de Serviço</Link>
                </div>
            </div>
        </footer>
    </div>
</template>