<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from "@/Layouts/MainLayout.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";
import ProjectTiles from "@/Components/ProjectTiles.vue";
import PostTiles from "@/Components/PostTiles.vue";
import {onMounted} from "vue";

const props = defineProps({
    tags: { type: Object },
    projects: { type: Object},
    posts: {type: Object}
});


onMounted(() => console.log(props.posts));
</script>

<template>
    <Head title="Web Developer" />
    <MainLayout classes="text-neutral-100 py-8 md:py-10">
        <div class="max-w-5xl mx-auto w-full px-6 mb-8 md:mb-10">
            <!-- Component title/description? for every page-->
            <section class="md:flex items-center">
                <div class="hidden md:block w-72 mr-16">
                    <img
                        src="/images/me.png"
                        class="rounded-[4rem] border-2 border-custom-orange/45"
                        alt="Photo of Luis Scura Web Developer"/>
                </div>
                <div class="text-custom-grey flex-1">
                    <h2 class="text-sub-title font-semibold">About me</h2>
                    <p class="font-light py-2">Hey I'm Luis! A passionate web developer, dabbling in technologies like WordPress, Laravel, Vue and Tailwind! I thrive on learning something new each day and love diving into fresh challenges.</p>
                    <PrimaryLink source-url="mailto:luisfscura@gmail.com" name="Let's Talk" classes="text-xl mt-2 px-6 md:mt-3"/>
                </div>
            </section>
        </div>
        <ProjectTiles :tags="tags" :projects="projects"/>
        <div class="max-w-5xl mx-auto w-full px-6 mb-8 py-8 md:mt-8">
            <!-- Component title/description? for every page-->
            <section class="md:flex items-center">
                <div class="text-custom-grey flex-1 pr-10">
                    <h2 class="text-sub-title font-semibold">The Not-So-Secret Life of Me.</h2>
                    <p class="font-light py-2">
                        Just me here, dabbling and juggling a few tech tools. Not exactly a tech guru, but I've got my hands on some interesting gadgets and gizmos in the tech world. Here’s a quick tour of what’s in my toolkit:
                    </p>
                    <ol class="list-disc list-inside marker:text-custom-orange">
                        <li>HTML (of course)</li>
                        <li>CSS / Tailwind</li>
                        <li>JavaScript / Vue JS</li>
                        <li>PHP / Laravel</li>
                        <li>API</li>
                        <li>MySQL</li>
                        <li>GIT</li>
                        <li>Linux Server</li>
                        <li>WordPress</li>
                        <li>Hosting </li>
                    </ol>
                </div>
                <div class="hidden md:block w-80 mr-16">
                    <img
                        src="/images/sushi-photo.jpg"
                        class="rounded-2xl"
                        alt="Just me here eating Korean Food."/>
                </div>
            </section>
        </div>
        <PostTiles :posts="posts"/>
    </MainLayout>
</template>
