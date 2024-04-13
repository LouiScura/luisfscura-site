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
    <Head title="Create a Post" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-12">

                <AsideLinks/>

                <!-- Form -->
                <div class="flex-1">
                    <div class="flex justify-between">
                        <h1 class="text-white text-xl font-semibold">Create an amazing post!</h1>
                    </div>

                </div>


<!--                <form @submit.prevent="store">-->
<!--                    <div class="flex flex-wrap -mb-8 -mr-6 p-8">-->
<!--                        <div class="pb-8 pr-6 w-full lg:w-1/2">-->
<!--                            <label class="form-label" for="title" >Title:</label>-->
<!--                            <input class="form-input" v-model="form.title" type="text">&lt;!&ndash;v-if&ndash;&gt;-->
<!--                        </div>-->
<!--                        <text-input v-model="form.title" label="Title" class="pb-8 pr-6 w-full lg:w-1/2">Title</text-input>-->
<!--                    </div>-->
<!--                    <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">   -->
<!--                        &lt;!&ndash; <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Organization</loading-button>&ndash;&gt;-->
<!--                    </div>-->
<!--                </form>-->
            </div>


<!--            &lt;!&ndash; Form Component &ndash;&gt;-->
<!--            <form>-->

<!--                <textarea id="editor" title="content"></textarea>-->
<!--            </form>-->
        </div>
    </AuthenticatedLayout>
</template>
