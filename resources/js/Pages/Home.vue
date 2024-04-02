<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from "@/Layouts/MainLayout.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";
import ProjectTiles from "@/Components/ProjectTiles.vue";
import PostTiles from "@/Components/PostTiles.vue";

const props = defineProps({
    tags: { type: Object },
    projects: { type: Object},
    posts: {type: Object}
});
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
                        class="rounded-2xl"
                        alt="Photo of Luis Scura Web Developer"/>
                </div>
                <div class="text-custom-grey flex-1">
                    <h2 class="text-xl font-semibold">About me</h2>
                    <p class="font-light py-2">Hey I'm Luis! A passionate web developer, dabbling in technologies like WordPress, Laravel, Vue and Tailwind! I thrive on learning something new each day and love diving into fresh challenges.</p>
                    <PrimaryLink source-url="#contact" name="Let's Talk" classes="text-xl mt-2 px-6 md:mt-3"/>
                </div>
            </section>
        </div>
        <ProjectTiles :tags="tags" :projects="projects"/>
        <div class="max-w-5xl mx-auto w-full px-6 mb-8 md:mb-10 py-8">
            <!-- Component title/description? for every page-->
            <section class="md:flex items-center">
                <div class="text-custom-grey flex-1">
                    <h2 class="text-xl font-semibold">Some text here! Not sure if I'll keep this.</h2>
                    <p class="font-light py-2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.</p>
                </div>
                <div class="hidden md:block w-72 mr-16">
                    <img
                        src="/images/placeholder-post.png"
                        class="rounded-2xl"
                        alt="Place holder."/>
                </div>
            </section>
        </div>
        <PostTiles/>
    </MainLayout>
</template>
