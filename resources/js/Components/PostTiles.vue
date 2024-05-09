<script setup>
import {Link} from "@inertiajs/vue3";
import {onMounted} from "vue";

const props = defineProps({
   posts: Object
});
</script>

<template>
    <section class="max-w-5xl mx-auto w-full px-6 mb-8 lg:py-8">
        <div class="flex items-center space-x-3">
            <h2 class="text-sub-title font-semibold py-4">Review my latest articles!</h2>
            <Link href="/blog" class="text-custom-orange underline text-sm">Read more</Link>
        </div>

        <div class="md:flex gap-4 md:gap-6">
            <!-- Latest post -->
            <div class="w-full md:w-96 py-2 md:relative md:overflow-hidden">
                <Link :href="`blog/${props.posts[0].slug}`">
                    <div class="md:h-2/4">
                        <img src="/images/placeholder2.png" alt="Placeholder" class="w-full object-cover">
                    </div>
                    <div class="bg-primary p-4 md:h-full">
                        <h3 class="font-semibold py-2">{{ props.posts[0].title}}</h3>
                        <p class="font-light text-md">{{ props.posts[0].excerpt }}</p>
                    </div>
                </Link>
            </div>

            <!-- Rest of posts -->
            <div class="flex flex-1 flex-wrap gap-4 md:gap-6 mt-2 md:w-full">
                <div v-for="post in props.posts.slice(1)" class="w-48 md:w-56">
                    <div class="">
                        <img src="/images/placeholder2.png" alt="Placeholder" class="w-full md:h-28 object-cover">
                    </div>
                    <div class="bg-primary p-4">
                        <h3 class="font-semibold py-2">{{ post.title }}</h3>
                        <p class="font-light text-md">{{ post.excerpt }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
