<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import {onMounted} from "vue";
import {Head} from "@inertiajs/vue3";

const props = defineProps({
    post: {
        type: Object
    }
});

onMounted(() => console.log(props.post));
</script>

<template>

    <Head :title="props.post.title" />

    <MainLayout>
        <div class="max-w-5xl mx-auto w-full px-6 md:px-8 mt-10">
            <h2 class="text-neutral-100 text-xl md:text-2xl pb-4">{{ props.post.title }}</h2>
            <p class="text-neutral-400 text-xs"><time datetime="{{ props.post.created_at }}">{{ props.post.created_at }}</time></p>
            <div v-html="props.post.body" class="article-content my-10 md:mb-0"></div>
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
</style>
