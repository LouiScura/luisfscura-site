<script setup>

import {Link} from "@inertiajs/vue3";

const props = defineProps({
    mobileMenu: {
        type: Boolean,
        required: true,
    }
});

</script>

<template>
    <Transition
        enter-from-class="translate-x-[150%] opacity-0"
        leave-to-class="translate-x-[150%] opacity-0"
        enter-active-class="transition duration-300"
        leave-active-class="transition duration-300">
        <nav v-show="mobileMenu" class="bg-custom-black flex flex-col justify-center text-sm text-custom-grey font-light">
            <Link href="/" class="border-b border-custom-border px-6 py-3" :class="{ 'text-custom-orange': $page.url === '/' }">Home</Link>
            <Link href="/blog" preserve-scroll class="border-b border-custom-border px-6 py-3" :class="{ 'text-custom-orange': $page.url.startsWith('/blog') }">Blog</Link>
            <a href="mailto:luisfscura@gmail.com" class="border-b border-custom-border px-6 py-3" target="_blank">Contact</a>
            <Link href="/now" preserve-scroll class="px-6 py-3">Now</Link>
        </nav>
    </Transition>
</template>
