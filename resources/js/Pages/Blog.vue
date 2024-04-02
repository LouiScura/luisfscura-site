<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import { ref, toRefs } from 'vue';
import {Head, Link} from "@inertiajs/vue3";
import {onMounted} from "vue";

const props = defineProps({
    categories: {
        type: Object,
    },
    posts: {
        type: Object
    }
});

onMounted(() => console.log(props.posts.next_page_url));

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

            <!-- Component category-->
            <div>
                <ul class="flex overflow-x-auto my-6 gap-4">
                    <li v-for="category in props.categories"
                        :key="category.id"
                        class="text-gray-400 shrink-0 w-32 bg-primary rounded-2xl py-1 px-4 font-light text-lg text-center hover:bg-custom-orange cursor-pointer">
                        {{ category.name }}
                    </li>
                </ul>
            </div>

            <!-- Component posts -->
            <div class="flex overflow-x-auto my-6 gap-4 md:grid md:grid-cols-3 md:gap-6">
                <div v-for="post in props.posts.data" :key="post.id" class="w-72 md:w-full flex-shrink-0 flex-grow-0">
                    <img src="/images/placeholder-post.png" alt="Place Holder">
                    <div class="w-52 py-2 md:w-full md:px-6">
                        <h2 class="text-gray-300 font-semibold py-2 text-xl">{{ post.title }}</h2>
                        <p class="text-gray-300 font-light">{{ post.excerpt }}</p>
                    </div>
                </div>
            </div>

            <!-- Pagination Controls -->
             <div class="flex justify-between">
                 <Link v-if="props.posts.prev_page_url != null" :href="props.posts.prev_page_url"
                       class="flex bg-custom-orange text-custom-grey rounded-xl p-2 px-3 font-semibold text-sm">
                     <img src="/images/arrow-left.svg" alt="Previous" class="w-4"/>
                     <span class="ml-1 hidden md:block">Previous</span>
                 </Link>
                 <Link
                     v-if="props.posts.next_page_url != null" :href="props.posts.next_page_url"
                     class="flex bg-custom-orange text-custom-grey rounded-xl p-2 px-3 font-semibold text-sm">
                     <span class="mr-1 hidden md:block">Next</span>
                     <img src="/images/arrow-right.svg" alt="Next" class="w-4"/>
                 </Link>
             </div>
        </section>
    </MainLayout>
</template>
