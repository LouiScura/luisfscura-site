<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import {Head} from "@inertiajs/vue3";

const props = defineProps({
    post: {
        type: Object
    }
});

</script>

<template>

    <Head>
        <title>{{ props.post.title }}</title>
        <meta name="description" :content="props.post.excerpt">
    </Head>

    <MainLayout>
        <div class="max-w-5xl mx-auto w-full px-6 md:px-8 mt-10">
            <h2 class="text-neutral-100 text-xl md:text-2xl pb-4">{{ props.post.title }}</h2>
            <ul class="flex gap-4 text-sm pb-4">
                <li v-for="category in props.post.categories" :key="category.id" class="text-sky-300">
                    {{ category.name}}
                </li>
            </ul>
            <p class="text-neutral-400 text-xs"><time datetime="{{ props.post.created_at }}">{{ props.post.created_at }}</time></p>
            <div v-html="props.post.body" class="article-content my-10 text-md md:text-base"></div>
        </div>
    </MainLayout>
</template>

<style>
    .article-content {
        @apply text-slate-200
    }
    .article-content h3,
    .article-content h2 {
        @apply text-custom-orange
    }
    .article-content pre {
        @apply bg-custom-black p-3 relative rounded overflow-x-scroll
    }
    .article-content a {
        @apply text-custom-orange
    }
    .article-content ul {
        @apply list-disc list-inside
    }
    .article-content ol {
        @apply list-decimal list-inside
    }
    .article-content ul li::marker {
        @apply text-custom-orange
    }
</style>
