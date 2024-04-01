<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from "@/Layouts/MainLayout.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";
import {onMounted} from "vue";

const props = defineProps({
    tags: {
        type: Object
    }
});

onMounted(() => console.log(props.tags));
</script>

<template>
    <Head title="Web Developer" />
    <MainLayout>
        <main class="bg-body-bg text-neutral-100 py-8 md:py-10">
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
                        <p class="font-light py-2">Hey I'm Luis! A passionate web developer, dabbling in all sorts of tech. I thrive on learning something new each day and love diving into fresh challenges.</p>
                        <PrimaryLink source-url="#contact" name="Let's Talk" classes="text-xl mt-2 px-6 md:mt-3"/>
                    </div>
                </section>
            </div>
            <!-- Component projects -->
            <section class="max-w-5xl mx-auto w-full px-6 text-custom-grey">
                <h2 class="font-semibold text-xl">Featured Projects</h2>
                <div class="md:grid md:grid-cols-3 gap-6">
                    <div class="relative w-80">
                        <img src="/images/placeholder-post.png" class="h-full"/>
                        <ul class="flex absolute bottom-0 left-0">
                            <li v-for="tag in props.tags" class="mr-2 px-2 rounded-lg bg-blue-950">
                                {{ tag.name}}
                            </li>
                        </ul>
                    </div>
                    <div>
                        <img src="/images/placeholder-post.png"/>
                        <ul>
                            <li v-for="tag in props.tags">
                                {{ tag.name}}
                            </li>
                        </ul>
                    </div>
                    <div>
                        <img src="/images/placeholder-post.png"/>
                        <ul>
                            <li v-for="tag in props.tags">
                                {{ tag.name}}
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
    </MainLayout>
</template>
