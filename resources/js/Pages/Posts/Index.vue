<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";
import PaginationControls from "@/Components/PaginationControls.vue";

const props = defineProps({
    posts: Object
});

const form = useForm({});

function destroy(id) {
    if (confirm("Are you sure you want to Delete?")) {
        form.delete(route('posts.destroy', id));
    }
}

</script>

<template>
    <Head title="All Posts" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-12">

                <AsideLinks/>

                <div class="flex-1">
                    <p v-if="$page.props.flash.success" class="text-green-300 pb-4">{{ $page.props.flash.success}}</p>
                    <p v-if="$page.props.flash.deletion" class="text-red-300 font-bold pb-4">{{ $page.props.flash.deletion}}</p>

                    <div class="flex justify-between">
                        <h1 class="text-white text-xl font-semibold">
                            <Link :href="route('dashboard')">
                                All posts
                            </Link>
                        </h1>
                        <Link :href="route('posts.create')" class="text-custom-orange underline">Create post</Link>
                    </div>

                    <div class="flex mt-8 flex-wrap items-start gap-4">
                        <div class="flex items-center w-5/12" v-for="post in props.posts.data">

                            <div class="p-2 w-96">
                                <h3 class="text-gray-200 font-semibold"> {{ post.title }} </h3>
                                <span class="text-xs text-neutral-400 font-light block mb-4"> {{ post.created_at}}</span>
                                <p class="text-neutral-400">{{ post.excerpt }}</p>
                            </div>

                            <div class="flex flex-1 items-center justify-center gap-4">
                                <Link :href="route('posts.edit', post.id)" class="" title="Edit Post">
                                    <img src="/images/edit-button.svg" class="h-6 w-6" alt="Edit Button"/>
                                </Link>
                                <button class="group/edit group-hover/item:visible h-6 w-6  my-6"
                                        type="button"
                                        @click="destroy(post.id)"
                                        title="Delete Post"
                                >
                                    <img src="/images/cross-circle.svg" class="h-full w-full" alt="Cross Icon"/>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="my-5">
                        <PaginationControls
                            :meta="props.posts.meta"
                        />
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
