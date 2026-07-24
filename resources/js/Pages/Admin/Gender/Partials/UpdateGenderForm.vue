<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    'genders': Array
});

const form = useForm({
    'current_gender': '',
    'new_gender': ''
})

const updateGender = () => {
    if (!form.current_gender) {
        return;
    }
    
    form.put(route('genders.update', form.current_gender), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => form.reset('current_gender')
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Update Gender
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                Select gender on the list
            </p>
        </header>

        <form @submit.prevent="updateGender" class="mt-6 space-y-6">
            <div>
                <InputLabel for="current_gender" value="Current Gender"/>

                <select
                    id="current_gender"
                    v-model="form.current_gender"
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

                <InputError :message="form.errors.current_gender" class="mt-2" />
            </div>

            <div>
                <InputLabel for="new_gender" value="New Gender"/>

                <TextInput
                    id="new_gender"
                    v-model="form.new_gender"
                    class="mt-1 block w-full"
                />

                <InputError
                    :message="form.errors.new_gender"
                    class="mt-2"
                />
            </div>
            
            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>