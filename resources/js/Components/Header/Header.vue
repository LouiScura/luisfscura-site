<script setup>

import {Link} from "@inertiajs/vue3";
import {ref} from "vue";
import MobileMenu from "@/Components/Header/MobileMenu.vue";

const mobileMenu = ref(false);
</script>

<template>
    <header class="bg-custom-black font-albert">
        <div class="max-w-5xl mx-auto w-full md:px-8">
            <div class="flex items-center justify-between text-xl px-6 md:px-0">
                <div class="py-4">
                    <Link href="/">
                        <h1 class="font-bold text-custom-grey lg:text-2xl">Luis Scura</h1>
                    </Link>
                </div>

                <div @click="mobileMenu = !mobileMenu" class="cursor-pointer md:hidden">
                    <span class="block h-0.5 w-6 bg-custom-grey transition ease transform duration-300" :class="{'-rotate-45 translate-y-2' : mobileMenu}"></span>
                    <span class="block mt-1 h-0.5 w-6 bg-custom-grey transition ease transform duration-300" :class="{'rotate-45 translate-y-0.5' : mobileMenu}"></span>
                </div>

                <nav class="hidden text-custom-grey font-normal text-sm md:flex">
                    <Link href="/blog" class="px-7" preserve-scroll :class="{ 'text-custom-orange': $page.url.startsWith('/blog') }">Blog</Link>
                    <Link href="#contact" class="px-7">Contact</Link>
                    <Link href="/now" class="px-7" preserve-scroll :class="{ 'text-custom-orange': $page.url === '/now' }">Now</Link>
                </nav>
            </div>

            <MobileMenu :mobileMenu="mobileMenu"/>
        </div>
    </header>
</template>
