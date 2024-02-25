<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col  pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 text-gray-200">
        <slot />
    </div>
</template>
