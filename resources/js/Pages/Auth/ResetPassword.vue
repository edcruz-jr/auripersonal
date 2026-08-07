<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

// Toggle de visibilidade da senha
const showPassword = ref(false);
const showPasswordConfirmation = ref(false);

// Checklist de requisitos
const passwordChecks = computed(() => {
    const pw = form.password;
    return [
        { label: 'Mínimo 8 caracteres', passed: pw.length >= 8 },
        { label: 'Uma letra maiúscula', passed: /[A-Z]/.test(pw) },
        { label: 'Uma letra minúscula', passed: /[a-z]/.test(pw) },
        { label: 'Um número', passed: /[0-9]/.test(pw) },
        { label: 'Um caractere especial', passed: /[^A-Za-z0-9]/.test(pw) },
    ];
});

const allChecksPassed = computed(() =>
    passwordChecks.value.every((check) => check.passed)
);

const passwordsMatch = computed(() => {
    if (!form.password_confirmation) return null;
    return form.password === form.password_confirmation;
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Redefinir senha — Auri Souza Personal" />

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
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                    />
                </svg>
            </div>
        </div>

        <!-- Cabeçalho -->
        <header class="mb-6 text-center">
            <h1 class="text-2xl font-black uppercase tracking-tighter text-black">
                Nova senha
            </h1>
            <p class="mt-3 text-sm font-medium text-gray-500">
                Crie uma nova senha para acessar<br>sua conta na Auri Souza Personal.
            </p>
        </header>

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
                    class="mt-1 block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-medium text-black transition focus:border-brand-neon_green focus:bg-white focus:ring-2 focus:ring-brand-neon_green/20"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <!-- Nova senha com toggle -->
            <div>
                <InputLabel
                    for="password"
                    value="Nova senha"
                    class="mb-2 text-xs font-bold uppercase tracking-wide text-gray-700"
                />

                <div class="relative">
                    <TextInput
                        id="password"
                        :type="showPassword ? 'text' : 'password'"
                        class="mt-1 block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3.5 pr-12 text-sm font-medium text-black transition focus:border-brand-neon_green focus:bg-white focus:ring-2 focus:ring-brand-neon_green/20"
                        v-model="form.password"
                        required
                        autofocus
                        autocomplete="new-password"
                        placeholder="Mínimo 8 caracteres"
                    />

                    <button
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute right-3 top-1/2 -translate-y-1/2 mt-0.5 text-gray-400 transition hover:text-black"
                        :aria-label="showPassword ? 'Ocultar senha' : 'Mostrar senha'"
                    >
                        <!-- Olho aberto -->
                        <svg
                            v-if="showPassword"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243L9.88 9.88"
                            />
                        </svg>
                        <!-- Olho fechado -->
                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>
                    </button>
                </div>

                <!-- Checklist -->
                <div v-if="form.password" class="mt-3 space-y-1.5">
                    <div
                        v-for="check in passwordChecks"
                        :key="check.label"
                        class="flex items-center gap-2 transition"
                    >
                        <svg
                            v-if="check.passed"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-[#00cc65] transition"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-gray-300 transition"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.94 6.94a.75.75 0 11-1.06 1.06L6.5 6.5v4.75a.75.75 0 001.5 0V8.06l.94.94z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <span
                            :class="[
                                'text-xs font-medium transition',
                                check.passed ? 'text-[#00cc65]' : 'text-gray-400'
                            ]"
                        >
                            {{ check.label }}
                        </span>
                    </div>
                </div>

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <!-- Confirmar senha com toggle -->
            <div>
                <InputLabel
                    for="password_confirmation"
                    value="Confirmar senha"
                    class="mb-2 text-xs font-bold uppercase tracking-wide text-gray-700"
                />

                <div class="relative">
                    <TextInput
                        id="password_confirmation"
                        :type="showPasswordConfirmation ? 'text' : 'password'"
                        class="mt-1 block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3.5 pr-12 text-sm font-medium text-black transition focus:border-brand-neon_green focus:bg-white focus:ring-2 focus:ring-brand-neon_green/20"
                        :class="{
                            'border-green-300 focus:border-brand-neon_green': passwordsMatch === true,
                            'border-red-300 focus:border-red-400 focus:ring-red-400/20': passwordsMatch === false,
                        }"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Repita a nova senha"
                    />

                    <button
                        type="button"
                        @click="showPasswordConfirmation = !showPasswordConfirmation"
                        class="absolute right-3 top-1/2 -translate-y-1/2 mt-0.5 text-gray-400 transition hover:text-black"
                        :aria-label="showPasswordConfirmation ? 'Ocultar senha' : 'Mostrar senha'"
                    >
                        <svg
                            v-if="showPasswordConfirmation"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243L9.88 9.88"
                            />
                        </svg>
                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>
                    </button>
                </div>

                <!-- Feedback de match -->
                <div v-if="passwordsMatch === true" class="mt-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#00cc65]" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-xs font-bold text-[#00cc65]">As senhas coincidem</span>
                </div>
                <div v-else-if="passwordsMatch === false" class="mt-2 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-xs font-bold text-red-400">As senhas não coincidem</span>
                </div>

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <button
                type="submit"
                class="w-full rounded-full bg-black px-6 py-4 text-sm font-bold text-white transition hover:bg-[#22333b] focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-neon_green focus-visible:ring-offset-2 disabled:opacity-25"
                :disabled="form.processing"
            >
                {{ form.processing ? 'Redefinindo...' : 'Redefinir minha senha' }}
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