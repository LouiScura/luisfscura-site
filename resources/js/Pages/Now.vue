<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Head} from "@inertiajs/vue3";
</script>

<template>
    <Head title="Now" />
    <MainLayout classes="justify-center">
        <div class="max-w-5xl mx-auto w-full md:px-8 px-6 sm:px-8">
            <!-- Component title/description? for every page-->
            <h1 class="text-custom-grey text-2xl font-semibold pt-6 pb-2 md:text-2xl">Now</h1>
            <p class="text-custom-grey text-md font-normal md:text-lg md:font-light">
                This is a <a href="https://nownownow.com/about" class="text-custom-orange" target="_blank">now</a>
                page.
            </p>
            <h2 class="text-custom-grey text-sm font-semibold pt-6 pb-2 md:text-lg">Right now, I am currently:</h2>
            <ol class="leading-loose text-custom-grey list-disc list-inside">
                <li class="text-md md:text-lg">Working as a web developer at <a href="https://creatingdigital.com" target="_blank" class="text-custom-orange">Creating Digital LLC</a></li>
                <li class="text-md md:text-lg">Transforming beautiful designs into pixel-perfect websites with <a href="https://tailwindcss.com/" class="text-blue-400" target="_blank">Tailwind CSS.</a></li>
                <li class="text-md md:text-lg">Embarking on side projects with <a href="https://laravel.com" class="text-red-800" target="_blank">Laravel</a> and <a href="https:/vuejs.org" target="_blank" class="text-green-800">Vue JS</a>  🚀</li>
                <li class="text-md md:text-lg">Creating spanish <a href="https://www.youtube.com/@scuraluis" target="_blank" class="underline decoration-custom-orange">YouTube Videos</a> about Laravel, Vue, Inertia</li>
                <li class="text-md md:text-lg">Boxing as a hobby. 🥊</li>
            </ol>
            <span class="block text-gray-300 font-light italic py-8">Last updated 6/10/24</span>
        </div>
    </MainLayout>
</template>
