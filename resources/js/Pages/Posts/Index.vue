<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import {onMounted} from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import AsideLinks from "@/Components/AsideLinks.vue";

const form = useForm({
    title: '',
    body: '',
    slug: '',
    excerpt: '',
    image: ''

})

onMounted(() => {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error('There was a problem initializing the editor:', error);
        });
});

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
                        <h1 class="text-white text-xl font-semibold">All posts</h1>
                        <Link href="/admin/posts/create" class="text-custom-orange underline">Create post</Link>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
