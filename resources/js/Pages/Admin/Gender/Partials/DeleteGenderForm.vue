<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

defineProps({
    'genders': Array
});

const confirmingGenderDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    'selected_gender': '',
    'password': ''
})

const confirmGenderDeletion = () => {
    if (!form.selected_gender) {
        return;
    }

    confirmingGenderDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
}

const deleteGender = () => {    
    form.delete(route('genders.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset(),
            closeModal()
        },
        onError: () => passwordInput.value.focus()
    });
};

const closeModal = () => {
    confirmingGenderDeletion.value = false;

    form.clearErrors();
    form.reset();
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Delete Gender
            </h2>
        </header>
        
        <div>
            <InputLabel for="selected_gender" value="Select Gender"/>

            <select
                id="selected_gender"
                v-model="form.selected_gender"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            >
                <option value="" disabled selected>Choice any option...</option>

                <option
                    v-for="gender in genders"
                    :key="gender.id"
                    :value="gender.id"
                >
                    {{ gender.description }}
                </option>
            </select>

            <InputError :message="form.errors.selected_gender" class="mt-2" />
        </div>

        <DangerButton
            class="mt-6"
            @click="confirmGenderDeletion"
        >
            Delete Gender
        </DangerButton>

        <Modal :show="confirmingGenderDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete this Gender?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once this gender is deleted, all of its resources and data
                    will be permanently deleted. Please enter your password to
                    confirm you would like to permanently delete your account.
                </p>

                <div class="mt-6">
                    <InputLabel
                        for="password"
                        value="Password"
                        class="sr-only"
                    />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        @keyup.enter="deleteGender"
                    />

                    <InputError :message="form.errors.password" class="mt-2"/>
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteGender"
                    >
                        Delete Gender
                    </DangerButton>
                </div>
            </div>
        </Modal>        
    </section>
</template>