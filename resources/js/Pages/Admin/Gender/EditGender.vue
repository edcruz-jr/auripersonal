<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateGenderForm from '@/Pages/Admin/Gender/Partials/CreateGenderForm.vue';
import UpdateGenderForm from '@/Pages/Admin/Gender/Partials/UpdateGenderForm.vue';
import DeleteGenderForm from '@/Pages/Admin/Gender/Partials/DeleteGenderForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    'genders': Array
})

</script>

<template>
    <Head title="Register Gender" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Gender
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <CreateGenderForm/>
                </div>

                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <UpdateGenderForm :genders="genders"/>
                </div>

                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <DeleteGenderForm :genders="genders"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
