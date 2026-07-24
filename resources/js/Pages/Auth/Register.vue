<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    full_name: '',
    email: '',
    phone_number: '',
    birth_date: '',
    gender_id: '',
    height: '',
    main_objective_id: '',
    activity_level_id: '',
    dietary_restrictions: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="full_name" value="Full Name" />

                <TextInput
                    id="full_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.full_name"
                    required
                    autofocus
                    autocomplete="full_name"
                />

                <InputError class="mt-2" :message="form.errors.full_name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="phone_number" value="Phone Number" />

                <TextInput
                    id="phone_number"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.phone_number"
                    required
                    autocomplete="phone_number"
                />

                <InputError class="mt-2" :message="form.errors.phone_number" />
            </div>

            <div class="mt-4">
                <InputLabel for="birth_date" value="Birth Date" />

                <TextInput
                    id="birth_date"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.birth_date"
                    required
                    autocomplete="birth_date"
                />

                <InputError class="mt-2" :message="form.errors.birth_date" />
            </div>

            <div class="mt-4">
                <InputLabel for="gender_id" value="Gender" />

                <select
                    id="gender_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="form.gender_id"
                    required
                >
                    <option value="0">Selecione um gênero</option>
                    <option value="1">Masculino</option>
                    <option value="2">Feminino</option>
                </select>

                <InputError class="mt-2" :message="form.errors.gender_id" />
            </div>

            <div class="mt-4">
                <InputLabel for="height" value="Height (cm)" />

                <TextInput
                    id="height"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.height"
                    required
                    autocomplete="height"
                    min="0"
                />

                <InputError class="mt-2" :message="form.errors.height" />
            </div>

            <div class="mt-4">
                <InputLabel for="main_objective_id" value="Main Objective" />

                <select
                    id="main_objective_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="form.main_objective_id"
                    required
                >
                    <option value="0">Selecione um Objetivo Principal</option>
                    <option value="1">Perda de Peso</option>
                    <option value="2">Ganho de Massa Muscular</option>
                    <option value="3">Manutenção</option>
                </select>

                <InputError class="mt-2" :message="form.errors.main_objective_id" />
            </div>

            <div class="mt-4">
                <InputLabel for="activity_level_id" value="Activity Level" />

                <select
                    id="activity_level_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="form.activity_level_id"
                    required
                >
                    <option value="0">Selecione o Nível de Atividade</option>
                    <option value="1">Sedentário</option>
                    <option value="2">Leve</option>
                    <option value="3">Moderado</option>
                    <option value="4">Ativo</option>
                    <option value="5">Muito Ativo</option>
                </select>

                <InputError class="mt-2" :message="form.errors.activity_level_id" />
            </div>

            <div class="mt-4">
                <InputLabel for="dietary_restrictions" value="Dietary Restrictions" />

                <TextInput
                    id="dietary_restrictions"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.dietary_restrictions"
                    autocomplete="dietary_restrictions"
                />

                <InputError class="mt-2" :message="form.errors.dietary_restrictions" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    :href="route('login')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Already registered?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
