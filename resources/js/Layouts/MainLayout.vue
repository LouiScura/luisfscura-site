<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue'

const mobileMenu = ref(false);

</script>

<template>

    <!-- Component/partial? header -->
    <header class="bg-custom-black font-albert">
        <div class="max-w-5xl mx-auto w-full md:px-8">
            <div class="flex items-center justify-between text-xl px-6 md:px-0">
                <div class="py-4">
                    <Link href="/">
                        <h1 class="font-bold text-custom-grey lg:text-2xl">Luis Scura</h1>
                    </Link>
                </div>

                <div @click="mobileMenu = !mobileMenu" class="cursor-pointer md:hidden">
                    <img alt="Hamburger Icon" src="/images/hamburger-icon.svg"/>
                    <!-- <img alt="Cross Icon" src=""-->
                </div>

                <nav class="hidden text-custom-grey font-normal text-sm md:flex">
                    <Link href="/blog" class="px-7" :class="{ 'text-custom-orange': $page.url === '/blog' }">Blog</Link>
                    <Link href="/contact" class="px-7">Contact</Link>
                    <Link href="/now" class="px-7" :class="{ 'text-custom-orange': $page.url === '/now' }">Now</Link>
                </nav>
            </div>

            <Transition
                enter-from-class="translate-x-[150%] opacity-0"
                leave-to-class="translate-x-[150%] opacity-0"
                enter-active-class="transition duration-200"
                leave-active-class="transition duration-200">
                <nav v-show="mobileMenu" class="bg-custom-black flex flex-col justify-center text-sm text-custom-grey font-light">
                    <Link href="/" class="border-b border-custom-border px-6 py-3" :class="{ 'text-custom-orange': $page.url === '/' }">Home</Link>
                    <Link href="/blog" class="border-b border-custom-border px-6 py-3" :class="{ 'text-custom-orange': $page.url === '/blog' }">Blog</Link>
                    <Link href="/contact" class="border-b border-custom-border px-6 py-3" :class="{ 'text-custom-orange': $page.url === '/now' }">Contact</Link>
                    <Link href="/now" class="px-6 py-3">Now</Link>
                </nav>
            </Transition>
        </div>
    </header>

        <slot/>

    <!-- Component/partial? footer -->
    <footer class="bg-primary text-custom-grey text-center">
        <section class="px-6 max-w-5xl mx-auto w-full md:px-8 md:flex justify-between md:pt-8 md:pb-8">
            <div class="md:text-start max-w-2xl">
                <h2 class="text-xl font-semibold md:text-2xl">Ways To Contact Me</h2>
                <p class="font-light text-sm md:pt-4">Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper.</p>
            </div>

            <div class="flex flex-col items-center md:items-start justify-center flex-1">
                <!-- Component orange button -->
                <a href="#" target="_blank" class="inline-flex items-center px-4 py-2 bg-custom-orange text-custom-grey rounded-md font-semibold text-xs    ">
                    <img src="/images/linkedin.svg" alt="LinkedIn Icon" class="mr-3"/>
                    <span class="font-normal">Luis Scura</span>
                </a>

                <!-- Component orange button -->
                <a href="mailto:luisfscura@gmail.com"  target="_blank" class="inline-flex items-center px-4 py-2 bg-custom-orange text-custom-grey rounded-md font-semibold text-xs">
                    <img src="/images/mail-icon.svg" alt="Mail Icon" class="mr-3"/>
                    <span class="font-normal">luisfscura@gmail.com</span>
                </a>
            </div>
        </section>
    </footer>
</template>
