<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import { ref, computed, onMounted } from 'vue';
import {Head, Link } from "@inertiajs/vue3";
import PaginationControls from "@/Components/PaginationControls.vue";
import Categories from "@/Components/Categories.vue";
import BlogPostTiles from "@/Components/BlogPostTiles.vue";

const props = defineProps({
    categories: {
        type: Object,
    },
    posts: {
        type: Object
    },
    selectedCategory: {}
});
</script>

<template>
    <Head>
        <title>Blog and Articles</title>
        <meta name="description" content="Explore articles on WordPress, Laravel, Vue.js, Tailwind CSS, and more to stay updated with the latest trends and technologies in the industry.">
    </Head>
    <MainLayout>
        <section class="max-w-5xl mx-auto w-full md:px-8 py-8 md:py-10 px-6 sm:px-8">
            <div v-if="props.posts.data.length > 0">
                <div>
                    <h1 class="text-custom-grey text-xl font-semibold pb-6 md:text-2xl"
                        v-text="props.selectedCategory && props.selectedCategory.data ? props.selectedCategory.data.name : 'All Articles'">
                    </h1>
                    <p class="text-custom-grey text-lg font-light md:text-lg">Take a peek at my articles!</p>
                </div>

                <div>
                    <ul class="flex overflow-x-auto my-6 gap-4 whitespace-nowrap">
                        <li><Categories
                            :href="route('blog.index')"
                            :filled="! props.selectedCategory">
                            All posts
                        </Categories></li>
                        <li v-for="category in props.categories.data" :key="category.id">
                            <Categories
                                :filled="category.slug === props.selectedCategory?.data.slug"
                                :href="route('blog.index', category.slug)">
                                {{  category.name }}
                            </Categories></li>
                    </ul>

                    <BlogPostTiles :posts="props.posts"/>

                    <PaginationControls
                        :meta="props.posts.meta"
                    />
                </div>
            </div>

            <div v-else>
                <h2 class="text-slate-50">No posts yet! Check back again later</h2>
            </div>
        </section>
    </MainLayout>
</template>
