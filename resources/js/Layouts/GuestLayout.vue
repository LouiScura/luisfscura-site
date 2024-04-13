<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-primary">
        <div>
            <h1 class="font-bold text-custom-grey lg:text-4xl">Luis Scura</h1>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-body-bg shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
