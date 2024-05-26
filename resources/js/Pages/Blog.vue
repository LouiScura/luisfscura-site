<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import { ref, computed, onMounted } from 'vue';
import {Head, Link } from "@inertiajs/vue3";
import PaginationControls from "@/Components/PaginationControls.vue";
import Categories from "@/Components/Categories.vue";

const props = defineProps({
    categories: {
        type: Object,
    },
    posts: {
        type: Object
    },
    selectedCategory: {}
});

const category = props.selectedCategory.data;

</script>

<template>
    <Head :title="category ? category.name : 'Blog and Articles'"/>
    <MainLayout>
        <section class="max-w-5xl mx-auto w-full md:px-8 py-8 md:py-10 px-6 sm:px-8">
            <div>
                <!-- Component title/description? for every page-->
                <h1 class="text-custom-grey text-xl font-semibold pb-6 md:text-2xl" v-text="category ? category.name : 'Blog and Articles'"></h1>
                <p class="text-custom-grey text-lg font-light md:text-lg">Take a peek at my articles!</p>
            </div>

<!--            <Categories-->
<!--                :categories="props.categories.data"-->
<!--                :currentCategory="selectedCategory"-->
<!--                @categorySelected="onCategorySelected"-->
<!--            />-->

            <!-- Component posts -->
            <div class="flex overflow-x-auto my-6 gap-4 md:grid md:grid-cols-3 md:gap-6">
                <div v-for="post in props.posts.data" :key="post.id" class="w-72 md:w-full flex-shrink-0 flex-grow-0">
                    <Link :href="route('post.show', post.slug)">
                        <img src="/images/placeholder-post.png" alt="Place Holder">
                        <div class="w-52 py-2 md:w-full md:px-2">
                              <h2 class="text-gray-300 font-semibold py-2 text-xl">{{ post.title }}</h2>
                              <p class="text-gray-300 font-light">{{ post.excerpt }}</p>
                        </div>
                    </Link>
                </div>
            </div>

            <PaginationControls
                :meta="props.posts.meta"
            />
        </section>
    </MainLayout>
</template>
