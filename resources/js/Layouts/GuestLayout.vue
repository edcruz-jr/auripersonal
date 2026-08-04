<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const maxWidthClass = {
    sm: 'sm:max-w-sm',
    md: 'sm:max-w-md',
    lg: 'sm:max-w-lg',
    xl: 'sm:max-w-xl',
    '2xl': 'sm:max-w-2xl',
};

defineProps({
    maxWidth: {
        type: String,
        default: 'md',
    },
});
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center justify-center bg-white px-4 py-12 selection:bg-black selection:text-white"
    >
        <div class="mb-8 shrink-0">
            <Link href="/">
                <ApplicationLogo />
            </Link>
        </div>

        <div
            :class="['w-full overflow-hidden rounded-2xl bg-white px-6 py-8 shadow-xl ring-1 ring-black/5 lg:px-10 lg:py-10', maxWidthClass[maxWidth]]"
        >
            <slot />
        </div>
    </div>
</template>