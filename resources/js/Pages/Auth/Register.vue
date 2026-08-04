<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed, nextTick } from 'vue';

const form = useForm({
    full_name: '',
    email: '',
    phone_number: '',
    birth_date: '',
    gender_id: '',
    height: '',
    weight: '',
    main_objective_id: '',
    activity_level_id: '',
    dietary_restrictions: '',
    password: '',
    password_confirmation: '',
});

const currentStep = ref(0);
const localErrors = ref({});

const steps = [
    {
        title: 'Dados Pessoais',
        subtitle: 'Conte sobre você',
        fields: ['full_name', 'email', 'phone_number', 'birth_date', 'gender_id'],
    },
    {
        title: 'Perfil Físico',
        subtitle: 'Seus objetivos e rotina',
        fields: ['height', 'weight', 'main_objective_id', 'activity_level_id', 'dietary_restrictions'],
    },
    {
        title: 'Segurança',
        subtitle: 'Proteja sua conta',
        fields: ['password', 'password_confirmation'],
    },
];

const isLastStep = computed(() => currentStep.value === steps.length - 1);
const isFirstStep = computed(() => currentStep.value === 0);

const getError = (field) => {
    return localErrors.value[field] || form.errors[field] || '';
};

const clearError = (field) => {
    if (localErrors.value[field]) {
        delete localErrors.value[field];
    }
};

const validateStep = () => {
    localErrors.value = {};

    if (currentStep.value === 0 && form.full_name) {
        if (form.full_name.length < 10) {
            localErrors.value.full_name = 'O nome completo deve ter pelo menos 10 caracteres.';
            return false;
        }
    }
    if (currentStep.value === 0 && form.email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(form.email)) {
            localErrors.value.email = 'O e-mail deve ser válido.';
            return false;
        }
    }
    if (currentStep.value === 0 && form.phone_number) {
        const phonePattern = /^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/;
        if (!phonePattern.test(form.phone_number)) {
            localErrors.value.phone_number = 'O telefone deve ser válido.';
            return false;
        }
    }
    if (currentStep.value === 0 && form.birth_date) {
        const birthDate = new Date(form.birth_date);
        const today = new Date();
        const age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        if (age < 10) {
            localErrors.value.birth_date = 'Você deve ter pelo menos 10 anos.';
            return false;
        }
    }
    if (currentStep.value === 1 && form.height) {
        if (form.height <= 0 || form.height > 300) {
            localErrors.value.height = 'A altura deve ser um valor positivo e menor que 300 cm.';
            return false;
        }
    }
    if (currentStep.value === 1 && form.weight) {
        if (form.weight <= 0 || form.weight > 300) {
            localErrors.value.weight = 'O peso deve ser um valor positivo e menor que 300 kg.';
            return false;
        }
    }

    const stepFields = steps[currentStep.value].fields;
    const requiredFields = stepFields.filter(f =>
        f !== 'dietary_restrictions' &&
        f !== 'phone_number' &&
        f !== 'gender_id'
    );
    let valid = true;
    for (const field of requiredFields) {
        if (!form[field] || form[field] === '') {
            localErrors.value[field] = 'Este campo é obrigatório.';
            valid = false;
        }
    }
    if (currentStep.value === 2 && form.password && form.password !== form.password_confirmation) {
        localErrors.value.password_confirmation = 'As senhas não coincidem.';
        valid = false;
    }
    return valid;
};

const focusFirstErrorField = (stepIndex) => {
    for (const field of steps[stepIndex].fields) {
        if (form.errors[field] || localErrors.value[field]) {
            const el = document.getElementById(field);
            if (el) {
                el.focus();
                el.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            break;
        }
    }
};

const goToFirstErrorStep = () => {
    for (let i = 0; i < steps.length; i++) {
        const hasError = steps[i].fields.some(field => form.errors[field]);
        if (hasError) {
            if (currentStep.value !== i) {
                currentStep.value = i;
                // Aguarda a transição do <Transition> completar (300ms) + render do DOM
                nextTick(() => {
                    setTimeout(() => focusFirstErrorField(i), 350);
                });
            } else {
                // Já está no passo certo, só foca o campo
                nextTick(() => focusFirstErrorField(i));
            }
            break;
        }
    }
};

const nextStep = () => {
    if (validateStep() && currentStep.value < steps.length - 1) {
        currentStep.value++;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
};

const prevStep = () => {
    if (currentStep.value > 0) {
        currentStep.value--;
        localErrors.value = {};
    }
};

const submit = () => {
    if (!validateStep()) return;

    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onError: () => {
            goToFirstErrorStep();
        },
    });
};
</script>

<template>
    <Head title="Cadastro — Auri Souza Personal" />

    <div class="flex min-h-screen bg-white">
        <!-- Painel da imagem (Desktop only) -->
        <div class="relative hidden w-1/2 overflow-hidden lg:block">
            <img
                src="https://as1.ftcdn.net/v2/jpg/01/18/36/16/1000_F_118361641_fPDkpmCy724ZtsXEbL6ezNCF2poDfYVB.jpg"
                alt="Treino personalizado"
                class="absolute inset-0 h-full w-full object-cover"
            />
            <div class="absolute inset-0 bg-gradient-to-br from-[#22333b]/85 to-black/95"></div>

            <div class="relative z-10 flex h-full flex-col justify-between p-12">
                <!-- Topo -->
                <Link href="/" class="text-xs font-bold uppercase tracking-widest text-white/80 hover:text-[#00ff7f] transition">
                    Auri Souza Personal
                </Link>

                <!-- Centro -->
                <div>
                    <h2 class="mb-6 text-5xl font-black uppercase tracking-tighter text-white xl:text-6xl">
                        Viva mais<br>e melhor
                    </h2>
                    <p class="max-w-md text-lg font-medium leading-relaxed text-white/60">
                        Tenha acesso a um método de treino personalizado focado em longevidade, saúde e performance para transformar o seu dia a dia.
                    </p>
                </div>

                <!-- Rodapé -->
                <div class="flex items-center gap-3 text-white/40">
                    <span class="text-xs">© Auri Souza Personal 2026</span>
                    <Link :href="route('legal.privacy_policy')" class="text-xs text-white/40 hover:text-[#00ff7f] transition">
                        Política de Privacidade
                    </Link>
                    <Link :href="route('legal.terms')" class="text-xs text-white/40 hover:text-[#00ff7f] transition">
                        Termos de Serviço
                    </Link>
                </div>
            </div>
        </div>

        <!-- Painel do formulário -->
        <div class="flex w-full flex-col items-center justify-center px-4 py-8 sm:px-6 lg:w-1/2 lg:py-12">
            <div class="w-full max-w-md">
                <!-- Logo mobile -->
                <div class="mb-8 text-center lg:hidden">
                    <Link href="/" class="text-xs font-bold uppercase tracking-widest text-gray-400">
                        Auri Souza Personal
                    </Link>
                </div>

                <!-- Cabeçalho -->
                <header class="mb-6">
                    <h1 class="text-2xl font-black uppercase tracking-tighter text-black sm:text-3xl">
                        Criar Conta
                    </h1>
                    <p class="mt-2 text-sm font-medium text-gray-500">
                        Passo {{ currentStep + 1 }} de {{ steps.length }} — {{ steps[currentStep].subtitle }}
                    </p>
                </header>

                <!-- Barra de progresso -->
                <div class="mb-8 flex gap-2">
                    <div
                        v-for="(step, index) in steps"
                        :key="index"
                        class="h-1.5 flex-1 rounded-full transition-all duration-300"
                        :class="index <= currentStep ? 'bg-[#00ff7f]' : 'bg-gray-200'"
                    ></div>
                </div>

                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Passo 1: Dados Pessoais -->
                    <Transition name="step" mode="out-in">
                        <div v-if="currentStep === 0" key="step1" class="space-y-5">
                            <div>
                                <InputLabel for="full_name" value="Nome Completo" class="text-sm font-bold text-black" />
                                <TextInput
                                    id="full_name"
                                    type="text"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.full_name"
                                    required
                                    minlength="10"
                                    maxlength="255"
                                    autofocus
                                    autocomplete="full_name"
                                    placeholder="Seu nome completo"
                                    @input="clearError('full_name')"
                                />
                                <InputError class="mt-2" :message="getError('full_name')" />
                            </div>

                            <div>
                                <InputLabel for="email" value="E-mail" class="text-sm font-bold text-black" />
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.email"
                                    required
                                    autocomplete="username"
                                    placeholder="seu@email.com"
                                    @input="clearError('email')"
                                />
                                <InputError class="mt-2" :message="getError('email')" />
                            </div>

                            <div>
                                <InputLabel for="phone_number" value="Telefone" class="text-sm font-bold text-black" />
                                <TextInput
                                    id="phone_number"
                                    type="text"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.phone_number"
                                    autocomplete="phone_number"
                                    placeholder="(00) 00000-0000"
                                    @input="clearError('phone_number')"
                                />
                                <InputError class="mt-2" :message="getError('phone_number')" />
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <InputLabel for="birth_date" value="Data de Nascimento" class="text-sm font-bold text-black" />
                                    <TextInput
                                        id="birth_date"
                                        type="date"
                                        class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                        v-model="form.birth_date"
                                        required
                                        @input="clearError('birth_date')"
                                    />
                                    <InputError class="mt-2" :message="getError('birth_date')" />
                                </div>

                                <div>
                                    <InputLabel for="gender_id" value="Gênero" class="text-sm font-bold text-black" />
                                    <select
                                        id="gender_id"
                                        class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                        v-model="form.gender_id"
                                        @change="clearError('gender_id')"
                                    >
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminino</option>
                                    </select>
                                    <InputError class="mt-2" :message="getError('gender_id')" />
                                </div>
                            </div>
                        </div>

                        <!-- Passo 2: Perfil Físico -->
                        <div v-else-if="currentStep === 1" key="step2" class="space-y-5">
                            <div>
                                <InputLabel for="height" value="Altura (cm)" class="text-sm font-bold text-black" />
                                <TextInput
                                    id="height"
                                    type="number"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.height"
                                    required
                                    max="300"
                                    min="0"
                                    placeholder="Ex: 175"
                                    @input="clearError('height')"
                                />
                                <InputError class="mt-2" :message="getError('height')" />
                            </div>

                            <div>
                                <InputLabel for="weight" value="Peso (kg)" class="text-sm font-bold text-black" />
                                <TextInput
                                    id="weight"
                                    type="number"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.weight"
                                    max="300"
                                    min="0"
                                    placeholder="Ex: 70.5"
                                    @input="clearError('weight')"
                                />
                                <InputError class="mt-2" :message="getError('weight')" />
                            </div>

                            <div>
                                <InputLabel for="main_objective_id" value="Objetivo Principal" class="text-sm font-bold text-black" />
                                <select
                                    id="main_objective_id"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.main_objective_id"
                                    required
                                    @change="clearError('main_objective_id')"
                                >
                                    <option value="">Selecione um objetivo</option>
                                    <option value="1">Perda de Peso</option>
                                    <option value="2">Ganho de Massa Muscular</option>
                                    <option value="3">Manutenção</option>
                                </select>
                                <InputError class="mt-2" :message="getError('main_objective_id')" />
                            </div>

                            <div>
                                <InputLabel for="activity_level_id" value="Nível de Atividade" class="text-sm font-bold text-black" />
                                <select
                                    id="activity_level_id"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.activity_level_id"
                                    required
                                    @change="clearError('activity_level_id')"
                                >
                                    <option value="">Selecione o nível</option>
                                    <option value="1">Sedentário</option>
                                    <option value="2">Leve</option>
                                    <option value="3">Moderado</option>
                                    <option value="4">Ativo</option>
                                    <option value="5">Muito Ativo</option>
                                </select>
                                <InputError class="mt-2" :message="getError('activity_level_id')" />
                            </div>

                            <div>
                                <InputLabel for="dietary_restrictions" value="Restrições Alimentares" class="text-sm font-bold text-black" />
                                <TextInput
                                    id="dietary_restrictions"
                                    type="text"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.dietary_restrictions"
                                    placeholder="Ex: Sem glúten, vegetariano (opcional)"
                                />
                                <InputError class="mt-2" :message="getError('dietary_restrictions')" />
                            </div>
                        </div>

                        <!-- Passo 3: Segurança -->
                        <div v-else key="step3" class="space-y-5">
                            <div>
                                <InputLabel for="password" value="Senha" class="text-sm font-bold text-black" />
                                <TextInput
                                    id="password"
                                    type="password"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="••••••••"
                                    @input="clearError('password')"
                                />
                                <InputError class="mt-2" :message="getError('password')" />
                            </div>

                            <div>
                                <InputLabel for="password_confirmation" value="Confirmar Senha" class="text-sm font-bold text-black" />
                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    class="mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 shadow-sm transition focus:border-[#00ff7f] focus:bg-white focus:ring focus:ring-[#00ff7f]/30"
                                    v-model="form.password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="••••••••"
                                    @input="clearError('password_confirmation')"
                                />
                                <InputError class="mt-2" :message="getError('password_confirmation')" />
                            </div>
                        </div>
                    </Transition>

                    <!-- Navegação -->
                    <div class="flex gap-3 pt-2">
                        <button
                            v-if="!isFirstStep"
                            type="button"
                            @click="prevStep"
                            class="rounded-full border border-gray-200 px-6 py-3 text-sm font-bold text-black transition hover:bg-gray-50"
                        >
                            Voltar
                        </button>

                        <button
                            v-if="!isLastStep"
                            type="button"
                            @click="nextStep"
                            class="flex-1 rounded-full bg-black px-6 py-3 text-sm font-bold text-white transition hover:bg-[#22333b]"
                        >
                            Continuar
                        </button>

                        <button
                            v-if="isLastStep"
                            type="submit"
                            class="flex-1 rounded-full bg-[#00ff7f] px-6 py-3 text-sm font-bold text-black transition hover:bg-[#00cc65] disabled:opacity-25"
                            :disabled="form.processing"
                        >
                            {{ form.processing ? 'Cadastrando...' : 'Criar Conta' }}
                        </button>
                    </div>
                </form>

                <p class="mt-8 text-center text-sm font-medium text-gray-500">
                    Já tem conta?
                    <Link :href="route('login')" class="font-bold text-black underline hover:text-[#00ff7f] transition">
                        Faça login
                    </Link>
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.step-enter-active,
.step-leave-active {
    transition: all 0.3s ease;
}
.step-enter-from {
    opacity: 0;
    transform: translateX(20px);
}
.step-leave-to {
    opacity: 0;
    transform: translateX(-20px);
}
</style>