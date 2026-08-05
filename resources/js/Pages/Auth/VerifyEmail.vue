<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'), {
        onFinish: () => form.reset(),
    });
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <GuestLayout>
        <Head title="Verifique seu e-mail — Auri Souza Personal" />

        <!-- Ícone -->
        <div class="mb-6 flex justify-center">
            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-brand-neon_green/10">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8 text-brand-neon_green"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                    />
                </svg>
            </div>
        </div>

        <!-- Cabeçalho -->
        <header class="mb-6 text-center">
            <h1 class="text-2xl font-black uppercase tracking-tighter text-black">
                Verifique seu e-mail
            </h1>
            <p class="mt-3 text-sm font-medium text-gray-500">
                Enviamos um link de confirmação para o seu e-mail.
                Clique no link para ativar sua conta.
            </p>
        </header>

        <!-- Mensagem de reenvio -->
        <div
            v-if="verificationLinkSent"
            class="mb-6 rounded-xl bg-brand-neon_green/10 px-4 py-3 text-center"
        >
            <p class="text-sm font-bold text-brand-neon_green">
                Link reenviado! Verifique sua caixa de entrada e spam.
            </p>
        </div>

        <!-- Ações -->
        <form @submit.prevent="submit">
            <div class="flex flex-col gap-4">
                <button
                    type="submit"
                    class="w-full rounded-full bg-black px-6 py-4 text-sm font-bold text-white transition hover:bg-[#22333b] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#00ff7f] focus-visible:ring-offset-2 disabled:opacity-25"
                    :disabled="form.processing"
                >
                    {{ form.processing ? 'Enviando...' : 'Reenviar link de verificação' }}
                </button>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="block w-full text-center text-sm font-bold text-gray-500 underline hover:text-black transition"
                >
                    Log out
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>