<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps ({
    posts: Object
})
</script>

<template>
    <div class="flex overflow-x-auto my-6 gap-4 md:grid md:grid-cols-3 md:gap-6">
        <div v-for="post in props.posts.data" :key="post.id" class="w-72 md:w-full flex-shrink-0 flex-grow-0 border-2 border-gray-50 p-4 hover:bg-[#111]">
            <Link :href="route('post.show', post.slug)">
                <div class="w-52 py-2 md:w-full md:px-2 space-y-3">
                    <h2 class="text-gray-300 font-semibold py-2 text-xl">{{ post.title }}</h2>
                    <p class="text-gray-300 font-light">{{ post.excerpt }}</p>
                    <div class="flex gap-2">
                        <div class="flex gap-2">
                            <span class="text-white text-sm">Read article</span>
                            <img src="/images/arrow-right.svg" alt="Read next Article Arrow" class="w-3">
                        </div>
                        <span class="text-white text-sm">{{ post.created_at }}</span>
                    </div>
                </div>
            </Link>
        </div>
    </div>
</template>
