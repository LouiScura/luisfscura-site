<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <MainLayout>
        <section class="bg-body-bg">
            <div class="max-w-5xl mx-auto w-full md:px-8 px-6 sm:px-8">
                <!-- Component title/description? for every page-->
                <h1 class="text-custom-grey text-lg font-semibold pt-6 pb-2 md:text-2xl">Blog and Articles</h1>
                <p class="text-custom-grey text-sm font-normal md:text-lg md:font-light">Check out my coolest articles!</p>
            </div>
            <div class="max-w-5xl mx-auto w-full md:px-8 px-6 sm:px-8 mt-12">
                <ul class="leading-loose flex items-center gap-6">
                    <!-- Component category-->
                    <li class="text-custom-grey bg-primary rounded-2xl p-2 font-normal text-sm">Laravel</li>
                    <li>GIT</li>
                    <li>Linux Commands</li>
                    <li>Vue JS</li>
                    <li>Database</li>
                </ul>
            </div>
        </section>
    </MainLayout>
</template>
