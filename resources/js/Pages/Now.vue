<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <MainLayout>
        <section class="bg-body-bg">
            <div class="max-w-5xl mx-auto w-full md:px-8 px-6 sm:px-8">
                <!-- Component title/description? for every page-->
                <h1 class="text-custom-grey text-lg font-semibold pt-6 pb-2 md:text-2xl">Now</h1>
                <p class="text-custom-grey text-sm font-normal md:text-lg md:font-light">
                    This is a <a href="https://nownownow.com/about" class="text-custom-orange" target="_blank">now</a>
                    page.
                </p>
                <h2 class="text-custom-grey text-sm font-semibold pt-6 pb-2 md:text-lg">Right now, I am currently:</h2>
                <ol class="leading-loose text-custom-grey">
                    <li>Lorem impsum dolor</li>
                    <li>Lorem impsum dolor</li>
                    <li>Lorem impsum dolor</li>
                </ol>

                <span>Last updated 3/27/24</span>
            </div>
        </section>
    </MainLayout>
</template>
