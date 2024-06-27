<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from "@/Layouts/MainLayout.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";
import ProjectTiles from "@/Components/ProjectTiles.vue";
import TechTools from "@/Components/TechTools.vue";
import HomePostTiles from "@/Components/HomePostTiles.vue";

const props = defineProps({
    projects: { type: Object},
    posts: {type: Object}
});
</script>

<template>
    <Head>
        <title>Laravel & WordPress Developer | Vue.js and Tailwind CSS Expertise</title>
        <meta name="description" content="I am a full-stack developer specializing in WordPress, Laravel, Tailwind CSS, and Vue.js. I help companies succeed by building and enhancing modern, responsive web applications.">
    </Head>
    <MainLayout classes="text-neutral-100 py-8 md:py-10 relative">
        <div class="max-w-5xl mx-auto w-full px-6 mb-8 md:mb-10">
            <section class="md:flex items-center">
                <div class="hidden md:block w-72 mr-16">
                    <img
                        src="/images/me.png"
                        class="rounded-[4rem] border-2 border-custom-orange/45"
                        alt="Professional portrait of a web developer specializing in Laravel and WordPress"/>
                </div>
                <div class="text-custom-grey flex-1">
                    <h2 class="text-sub-title font-semibold">About me</h2>
                    <p class="font-light py-2">Hey I'm Luis! A passionate web developer, dabbling in technologies like WordPress, Laravel, Vue and Tailwind! I thrive on learning something new each day and love diving into fresh challenges.</p>
                    <PrimaryLink source-url="mailto:luisfscura@gmail.com" name="Let's Talk" classes="text-xl mt-2 px-6 md:mt-3"/>
                </div>
            </section>
        </div>

        <ProjectTiles v-if="props.projects.data.length > 0" :projects="props.projects.data"/>

        <div class="max-w-5xl mx-auto w-full px-6 lg:mb-8 py-8 md:mt-8">
            <section class="md:flex items-center">
                <div class="text-custom-grey flex-1 pr-10">
                    <h2 class="text-sub-title font-semibold">Few tech tools I know</h2>
                    <p class="font-light py-2">
                        Not exactly a tech guru, but I've got my hands on some interesting gadgets and gizmos in the tech world. Here’s a quick tour of what’s in my toolkit:
                    </p>
                    <TechTools/>
                </div>
                <div class="hidden md:block w-80 mr-16">
                    <img
                        src="/images/sushi-photo.jpg"
                        class="rounded-2xl"
                        alt="Casual photo of Luis Scura Web Developer"/>
                </div>
            </section>
        </div>

        <HomePostTiles v-if="props.posts.data.length > 0" :posts="props.posts.data"/>
    </MainLayout>
</template>
