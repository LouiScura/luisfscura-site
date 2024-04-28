<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import {onMounted} from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";

const form = useForm({
    title: '',
    category: '',
    body: '',
    slug: '',
    excerpt: '',
    image: ''
})

const props = defineProps({
    categories: Object
});

onMounted(() => {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error('There was a problem initializing the editor:', error);
        });
});

const store = () => {

    // console.log('hola');

    form.post('/admin/posts');
};

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

                    <form @submit.prevent="store">
                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="title"> Title </label>

                            <input v-model="form.title" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96" type="text" name="title" id="title" required />

                            <div v-if="form.errors.title" v-text="form.errors.title" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="categories">Choose a category:</label>

                            <select name="categories" id="categories" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96">
                                <option v-for="category in categories" :value="category.name">{{ category.name }}</option>
                            </select>

                            <div v-if="form.errors.categoryId" v-text="form.errors.categoryId" class="text-red-500 text-xs mt-1"></div>
                        </div>

<!--                        <div class="mb-6">-->
<!--                            <label class="block font-bold text-sm text-gray-200 mt-6" for="body">Body</label>-->

<!--                            <textarea id="editor" name="body"></textarea>-->

<!--                            <div v-if="form.errors.body" v-text="form.errors.body" class="text-red-500 text-xs mt-1"></div>-->
<!--                        </div>-->

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="title"> Slug </label>

                            <input v-model="form.slug" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96" type="text" name="slug" id="slug" required />

                            <div v-if="form.errors.slug" v-text="form.errors.slug" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="excerpt">Excerpt</label>

                            <textarea name="excerpt" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-3/4"></textarea>
                        </div>

<!--                        <div class="mb-6">-->
<!--                            <input type="file" @input="form.image = $event.target.files[0]" />-->
<!--                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">-->
<!--                                {{ form.progress.percentage }}%-->
<!--                            </progress>-->
<!--                        </div>-->

                        <div :disabled="form.processing" class="flex items-center mb-10">
                            <button type="submit" class="bg-custom-orange text-white rounded py-2 px-4 w-52">Create</button>
                            <div v-if="form.processing" class="btn-spinner ml-2 text-custom-orange">
                                Creating...
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </AuthenticatedLayout>
</template>
