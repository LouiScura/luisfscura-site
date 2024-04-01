<script setup>

import PrimaryLink from "@/Components/PrimaryLink.vue";
</script>

<template>
    <footer id="contact" class="bg-primary text-custom-grey text-center py-8 md:py-0.5">
        <section class="px-6 max-w-5xl mx-auto w-full md:px-8 md:flex md:items-center justify-between md:pt-10 md:pb-10">
            <div class="md:text-start max-w-2xl md:pt-0 w-80 mx-auto md:flex-1">
                <h2 class="text-xl font-bold pb-4 md:pb-1 md:text-2xl">Let's connect!</h2>
                <p class="font-light text-sm md:pt-4">
                    Find me on <a href="https://www.linkedin.com/in/scuraluis/" target="_blank" class="text-custom-orange">LinkedIn</a>,
                    drop me an <a href="mailto:luisfscura@gmail.com" class="text-custom-orange">email</a>,
                    or follow me on <a href="https://twitter.com/scura00" target="_blank" class="text-custom-orange">Twitter</a>. I'd love to hear from you!</p>
            </div>

            <div class="flex flex-col items-center md:items-start justify-center md:w-72 md:px-8">
                <PrimaryLink
                    name="Luis Scura"
                    source-url="https://www.linkedin.com/in/scuraluis/"
                    icon-url="/images/linkedin.svg"
                    icon-alt="LinkedIn"
                    classes="mt-6 md:mt-0"
                />

                <PrimaryLink
                    name="luisfscura@gmail.com"
                    source-url="mailto:luisfscura@gmail.com"
                    icon-url="/images/mail-icon.svg"
                    icon-alt="Mail Icon"
                    classes="mt-6 md:mt-4"
                />
            </div>
        </section>
    </footer>
</template>
