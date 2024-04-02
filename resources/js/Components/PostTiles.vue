<script setup>

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <section class="max-w-5xl mx-auto w-full px-6 mb-8 md:mb-10 py-8">
        <div class="flex items-center space-x-3">
            <h2 class="text-xl font-semibold py-4">Review my latest articles!</h2>
            <Link href="/blog" class="text-custom-orange underline text-sm">Read more</Link>
        </div>

        <!-- Latest Post-->
        <div class="flex overflow-x-auto md:grid md:grid-cols-3 gap-6">
            <div class="py-2 md:w-full md:px-6 rounded-xl">
                <div class="">
                    <img src="/images/placeholder2.png" alt="Placeholder" class="h-full">
                </div>
                <div class="bg-primary p-4">
                    <h3 class="font-semibold py-2">Post title here.</h3>
                    <p class="font-light text-md">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
                </div>
            </div>
            <!-- Rest of posts-->
        </div>
    </section>
</template>
