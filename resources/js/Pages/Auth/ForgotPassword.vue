<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'), {
        onFinish: () => form.reset('email'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Esqueci minha senha — Auri Souza Personal" />

        <!-- Ícone -->
        <div class="mb-6 flex justify-center">
            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-[#00ff7f]/10">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8 text-[#00ff7f]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 15.75h-3v-3l1.408-1.408c.404-.404.527-1 .43-1.563A6 6 0 0115.75 5.25z"
                    />
                </svg>
            </div>
        </div>

        <!-- Cabeçalho -->
        <header class="mb-6 text-center">
            <h1 class="text-2xl font-black uppercase tracking-tighter text-black">
                Esqueceu a senha?
            </h1>
            <p class="mt-3 text-sm font-medium text-gray-500">
                Sem problemas. Informe seu e-mail e enviaremos<br>
                um link para você criar uma nova senha.
            </p>
        </header>

        <!-- Mensagem de sucesso -->
        <div
            v-if="status"
            class="mb-6 rounded-xl bg-[#00ff7f]/10 px-4 py-3 text-center"
        >
            <p class="text-sm font-bold text-[#00cc65]">
                ✅ Link enviado! Verifique sua caixa de entrada e spam.
            </p>
        </div>

        <!-- Formulário -->
        <form @submit.prevent="submit" class="space-y-5">
            <div>
                <InputLabel
                    for="email"
                    value="E-mail"
                    class="mb-2 text-xs font-bold uppercase tracking-wide text-gray-700"
                />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-medium text-black transition focus:border-[#00ff7f] focus:bg-white focus:ring-2 focus:ring-[#00ff7f]/20"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="seu@email.com"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <button
                type="submit"
                class="w-full rounded-full bg-black px-6 py-4 text-sm font-bold text-white transition hover:bg-[#22333b] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#00ff7f] focus-visible:ring-offset-2 disabled:opacity-25"
                :disabled="form.processing"
            >
                {{ form.processing ? 'Enviando...' : 'Enviar link de redefinição' }}
            </button>
        </form>

        <!-- Voltar para login -->
        <div class="mt-6 text-center">
            <Link
                :href="route('login')"
                class="text-sm font-bold text-gray-500 underline hover:text-black transition"
            >
                Voltar para o login
            </Link>
        </div>
    </GuestLayout>
</template>