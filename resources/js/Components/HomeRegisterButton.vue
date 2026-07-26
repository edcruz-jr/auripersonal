<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="route('register')" class="rounded-full bg-black px-8 py-4 font-bold text-white transition hover:bg-brand-dark">
        <slot/>
    </Link>
</template>