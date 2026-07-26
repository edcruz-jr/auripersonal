<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// Estado para os formulários de e-mail (simulando a captura de leads)
const form = ref({
    email: '',
});

const submitEmail = () => {
    console.log('E-mail enviado:', form.value.email);
    // Aqui no futuro você fará o post para o Laravel
};
</script>

<template>
    <Head title="Welcome" />

    <div class="min-h-screen bg-white font-sans text-gray-900 selection:bg-black selection:text-[#d4ff00]">
        
        <!-- SECTION 1: HERO (Fundo verde neon) -->
        <section class="flex min-h-[85vh] flex-col items-center justify-center bg-[#d4ff00] px-4 py-20 text-center">
            <div class="mb-6 flex items-center justify-center gap-2 font-bold uppercase tracking-widest">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                BODYSTACK
            </div>
            
            <h1 class="mb-6 text-7xl font-black uppercase tracking-tighter sm:text-8xl md:text-9xl lg:text-[10rem]">
                Long Live You
            </h1>
            
            <p class="mx-auto mb-10 max-w-xl text-lg font-medium sm:text-xl">
                Membership access to unprecedented benefits on some of the best products and services in the longevity industry.
            </p>

            <!-- Formulário -->
            <form @submit.prevent="submitEmail" class="mx-auto flex w-full max-w-md flex-col gap-2 sm:flex-row sm:gap-0">
                <input 
                    v-model="form.email"
                    type="email" 
                    placeholder="Email address" 
                    class="w-full rounded-full border-none px-6 py-4 text-black focus:ring-2 focus:ring-black sm:rounded-r-none"
                    required
                />
                <button type="submit" class="rounded-full bg-black px-8 py-4 font-bold text-white transition hover:bg-gray-800 sm:rounded-l-none">
                    Join BodyStack
                </button>
            </form>

            <div class="mt-6 flex items-center gap-3 text-sm font-semibold">
                <div class="flex -space-x-3">
                    <img class="h-8 w-8 rounded-full border-2 border-[#d4ff00]" src="https://i.pravatar.cc/100?img=1" alt="">
                    <img class="h-8 w-8 rounded-full border-2 border-[#d4ff00]" src="https://i.pravatar.cc/100?img=2" alt="">
                    <img class="h-8 w-8 rounded-full border-2 border-[#d4ff00]" src="https://i.pravatar.cc/100?img=3" alt="">
                </div>
                <span>1.5k+ others subscribed</span>
            </div>
        </section>

        <!-- SECTION 2: DEFINIÇÃO -->
        <section class="mx-auto max-w-4xl px-6 py-24 sm:py-32">
            <h2 class="mb-2 text-2xl font-bold lowercase">bodystack</h2>
            <p class="mb-8 text-sm text-gray-500">/ noun /</p>
            <p class="mb-8 text-3xl font-medium leading-tight sm:text-4xl md:text-5xl">
                The unique individual combination of routines and products that a person uses to live their longest, healthiest life.
            </p>
            <Link href="#" class="inline-block rounded-full border border-gray-300 px-6 py-2 text-sm font-semibold transition hover:bg-gray-50">
                Learn the BodyStack
            </Link>
        </section>

        <!-- SECTION 3: CARDS (Grid) -->
        <section class="mx-auto max-w-7xl px-6 py-12">
            <h2 class="mb-4 text-5xl font-black tracking-tight sm:text-6xl md:text-7xl">
                Go the distance.<br>Enjoy the ride.
            </h2>
            <p class="mb-12 max-w-2xl text-lg text-gray-600 sm:text-xl">
                BodyStack is your index of the products, people and practices that will make your life better and longer.
            </p>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <!-- Card 1 -->
                <div class="group relative h-96 w-full overflow-hidden rounded-2xl bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800&q=80" alt="Embrace" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 flex w-[calc(100%-3rem)] items-end justify-between">
                        <h3 class="text-2xl font-bold text-white sm:text-3xl">Embrace<br>the change</h3>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#d4ff00] text-black">↓</div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="group relative h-96 w-full overflow-hidden rounded-2xl bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=800&q=80" alt="Extend" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 flex w-[calc(100%-3rem)] items-end justify-between">
                        <h3 class="text-2xl font-bold text-white sm:text-3xl">Extend<br>your life</h3>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#00ff7f] text-black">↓</div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="group relative h-96 w-full overflow-hidden rounded-2xl bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&q=80" alt="Enjoy" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 flex w-[calc(100%-3rem)] items-end justify-between">
                        <h3 class="text-2xl font-bold text-white sm:text-3xl">Enjoy<br>every day</h3>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-400 text-black">↓</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: COMUNIDADE (Texto flutuante com avatares) -->
        <section class="relative flex min-h-[60vh] items-center justify-center overflow-hidden bg-[#22333b] py-32 text-center">
            <h2 class="relative z-10 max-w-5xl px-4 text-5xl font-black uppercase italic tracking-tight text-white sm:text-7xl md:text-8xl">
                COMPATIBLE WITH <span class="text-[#00ff7f]">EVERY PERSON</span> AND <span class="text-[#00ff7f]">EVERY GOAL</span>
            </h2>
            
            <!-- Avatares Flutuantes com Posicionamento Absoluto -->
            <img src="https://i.pravatar.cc/100?img=4" class="absolute left-[10%] top-[20%] h-12 w-12 rounded-full opacity-80 shadow-lg" alt="">
            <img src="https://i.pravatar.cc/100?img=5" class="absolute bottom-[20%] left-[20%] h-16 w-16 rounded-full opacity-80 shadow-lg" alt="">
            <img src="https://i.pravatar.cc/100?img=6" class="absolute right-[15%] top-[30%] h-10 w-10 rounded-full opacity-80 shadow-lg" alt="">
            <img src="https://i.pravatar.cc/100?img=7" class="absolute bottom-[25%] right-[20%] h-20 w-20 rounded-full opacity-80 shadow-lg" alt="">
            <img src="https://i.pravatar.cc/100?img=8" class="absolute right-[40%] top-[10%] h-14 w-14 rounded-full opacity-80 shadow-lg" alt="">
        </section>

        <!-- SECTION 5: CALL TO ACTION VERDE -->
        <section class="px-4 py-12 sm:px-12 md:py-24">
            <div class="mx-auto flex max-w-7xl flex-col justify-between gap-12 rounded-[2.5rem] bg-[#00ff7f] p-10 sm:p-20 md:flex-row md:items-end">
                <div class="max-w-xl">
                    <h2 class="mb-6 text-5xl font-black tracking-tight sm:text-6xl md:text-7xl">
                        Uniting a longer<br>living world.
                    </h2>
                    <p class="text-lg font-medium sm:text-xl">
                        We're on a mission to help everyone embrace change, extend their lives and seize every day.
                    </p>
                </div>
                
                <form @submit.prevent="submitEmail" class="flex w-full max-w-md flex-col gap-2 sm:flex-row sm:gap-0 md:w-auto">
                    <input 
                        v-model="form.email"
                        type="email" 
                        placeholder="Email address" 
                        class="w-full rounded-full border-none px-6 py-4 text-black focus:ring-2 focus:ring-black sm:rounded-r-none"
                    />
                    <button type="submit" class="rounded-full bg-black px-8 py-4 font-bold text-white transition hover:bg-gray-800 sm:rounded-l-none">
                        Join BodyStack
                    </button>
                </form>
            </div>
        </section>

        <!-- SECTION 6: FOOTER -->
        <footer class="bg-[#0b0f19] px-6 py-24 text-center text-white">
            <div class="mb-12 flex items-center justify-center gap-2 text-2xl font-bold uppercase tracking-widest text-white">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                BODYSTACK
            </div>
            
            <h2 class="mb-12 text-4xl font-black text-[#d4ff00] sm:text-5xl md:text-6xl">
                Live healthily ever after.
            </h2>
            
            <Link href="#" class="inline-block rounded-full bg-[#d4ff00] px-8 py-4 font-bold text-black transition hover:bg-[#bce600]">
                Apply to the beta today
            </Link>

            <div class="mt-24 flex flex-col items-center justify-between text-xs text-gray-500 sm:flex-row px-4">
                <p>© BodyStack 2024</p>
                <div class="flex gap-4">
                    <Link href="#" class="hover:text-white">Privacy Policy</Link>
                    <Link href="#" class="hover:text-white">Terms of Service</Link>
                </div>
            </div>
        </footer>
    </div>
</template>