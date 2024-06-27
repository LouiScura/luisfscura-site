<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted, ref, watch } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";
import MultiSelect from 'primevue/multiselect';
import FileUpload from 'primevue/fileupload';

// Define props to include the post to be edited and categories
const props = defineProps({
    post: Object,
    categories: Object
});


// Setup selected categories from the post data
const selectedCategories = ref(props.post.categories.map(cat => ({
    name: cat.name,
    id: cat.id
})));


// Initialize the form using the useForm hook with the post data
const form = useForm({
    title: props.post.title,
    categories: selectedCategories.value.map(cat => cat.id),
    body: props.post.body,
    slug: props.post.slug,
    excerpt: props.post.excerpt,
    image: ''  // Assuming you handle images separately and the initial image isn't directly editable
});

// Category options for MultiSelect
const categoryOptions = ref([]);

if (props.categories) {
    categoryOptions.value = Object.keys(props.categories.data).map(key => ({
        name: props.categories.data[key].name,
        id: props.categories.data[key].id
    }));
}

// Function to handle file upload events
function handleUpload(event) {
    form.image = 'something here'; // Customize based on how you handle image uploads
}

// Initialize ClassicEditor and keep the body in sync
onMounted(() => {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            window.editor = editor;
            editor.setData(form.body);
            editor.model.document.on('change:data', () => {
                form.body = editor.getData();
            });
        })
        .catch(error => {
            console.error('There was a problem initializing the editor:', error);
        });
});

// Watch for changes in selected categories
watch(selectedCategories, (newVal) => {
    form.categories = newVal.map(item => item.id);
}, { deep: true });

// Function to handle the form submission
const update = () => {
    form.put(`/admin/posts/${props.post.id}`); // Assuming you have the ID and using PUT for updates
};

</script>


<template>
    <Head title="Edit a Post" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-12">

                <AsideLinks/>

                <!-- Form -->
                <div class="flex-1">

                    <p v-if="$page.props.flash.success" class="text-green-300 pb-4">{{ $page.props.flash.success}}</p>
                    <p v-if="$page.props.flash.deletion" class="text-red-300 font-bold pb-4">{{ $page.props.flash.deletion}}</p>

                    <div class="flex justify-between">
                        <h1 class="text-white text-xl font-semibold">Update post!</h1>
                    </div>

                    <form @submit.prevent="update">
                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="title"> Title </label>

                            <input v-model="form.title" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96" type="text" name="title" id="title" required />

                            <div v-if="form.errors.title" v-text="form.errors.title" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="categories">Choose a category:</label>

                            <MultiSelect v-model="selectedCategories" display="chip" :options="categoryOptions" optionLabel="name" placeholder="Select Categories"
                                         :maxSelectedLabels="3" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-1 w-96"
                                         :pt="{list: {class: 'bg-primary text-white'},
                                        header: {class: 'bg-primary flex text-white justify-between border-0 mt-5'}}"
                            />

                            <div v-if="form.errors.categories" v-text="form.errors.categories" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="body">Body</label>

                            <textarea id="editor" name="body"></textarea>

                            <div v-if="form.errors.body" v-text="form.errors.body" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="title"> Slug </label>

                            <input v-model="form.slug" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96" type="text" name="slug" id="slug" required />

                            <div v-if="form.errors.slug" v-text="form.errors.slug" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="excerpt">Excerpt</label>

                            <textarea name="excerpt" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-3/4"></textarea>
                        </div>

                        <div class="mb-6">
                            <FileUpload mode="basic"
                                        name="image"
                                        accept="image/*"
                                        :maxFileSize="1000000"
                                        @upload="handleUpload"
                                        :auto="false"
                                        :chooseLabel="'Choose'" />
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>
                        </div>

                        <div :disabled="form.processing" class="flex items-center mb-10">
                            <button type="submit" class="bg-custom-orange text-white rounded py-2 px-4 w-52">Update</button>
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

<style scoped>
.custom-multiselect .p-multiselect-panel .p-multiselect-panel .p-multiselect-items {
    @apply bg-blue-500 text-white;  /* Change 'bg-blue-500' and 'text-white' to your preferred Tailwind classes */
}

</style>
