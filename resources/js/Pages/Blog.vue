<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import { ref, computed } from 'vue';
import {Head } from "@inertiajs/vue3";
import PaginationControls from "@/Components/PaginationControls.vue";
import Categories from "@/Components/Categories.vue";

const props = defineProps({
    categories: {
        type: Object,
    },
    posts: {
        type: Object
    }
});

// Reactivate data
const selectedCategory = ref(null);

function onCategorySelected(category) {
    selectedCategory.value = category;
}

// Computed property to filter posts based on the selected category
const filteredPosts = computed(() => {
    if (!selectedCategory.value || selectedCategory.value === 'all') {
        return props.posts.data;
    }
    return props.posts.data.filter(post =>
        post.categories.some(category => category.name === selectedCategory.value)
    );
});

</script>

<template>
    <Head title="Blog and Articles" />
    <MainLayout>
        <section class="max-w-5xl mx-auto w-full md:px-8 py-8 md:py-10 px-6 sm:px-8">
            <div>
                <!-- Component title/description? for every page-->
                <h1 class="text-custom-grey text-xl font-semibold pb-6 md:text-2xl">Blog and Articles</h1>
                <p class="text-custom-grey text-lg font-light md:text-lg">Take a peek at my articles!</p>
            </div>

            <Categories
                :categories="props.categories"
                :currentCategory="selectedCategory"
                @categorySelected="onCategorySelected"
            />

            <!-- Component posts -->
            <TransitionGroup
                enter-active-class="transition-opacity duration-300 ease-out"
                leave-active-class="transition-opacity duration-300 ease-out"
                enter-from-class="opacity-0 translate-y-10"
                leave-to-class="opacity-0 translate-y-10"
                class="flex overflow-x-auto my-6 gap-4 md:grid md:grid-cols-3 md:gap-6"
                tag="div"
            >
                <div v-for="post in filteredPosts" :key="post.id" class="w-72 md:w-full flex-shrink-0 flex-grow-0">
                    <img src="/images/placeholder-post.png" alt="Place Holder">
                    <div class="w-52 py-2 md:w-full md:px-2">
                        <h2 class="text-gray-300 font-semibold py-2 text-xl">{{ post.title }}</h2>
                        <p class="text-gray-300 font-light">{{ post.excerpt }}</p>
                    </div>
                </div>
            </TransitionGroup>

            <PaginationControls
                :prev-page="props.posts.prev_page_url"
                :next-page="props.posts.next_page_url"
            />
        </section>
    </MainLayout>
</template>
