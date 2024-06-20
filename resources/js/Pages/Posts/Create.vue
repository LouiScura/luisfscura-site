<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import {onMounted, ref, watch} from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";
import MultiSelect from 'primevue/multiselect';
import FileUpload from 'primevue/fileupload';

const selectedCategories = ref([]);

const form = useForm({
    title: '',
    categories: selectedCategories,
    body: '',
    slug: '',
    excerpt: '',
    image: null
})

const props = defineProps({
    categories: Object
});

const categoryOptions = ref([]);
if (props.categories.data) {
    categoryOptions.value = Object.keys(props.categories.data).map(key => ({
        name: props.categories.data[key].name,
        id: props.categories.data[key].id
    }));
}

onMounted(() => {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            window.editor = editor;
            editor.model.document.on('change:data', () => {
                form.body = editor.getData();
            });
        })
        .catch(error => {
            console.error('There was a problem initializing the editor:', error);
        });
});

watch(selectedCategories, (newVal) => {
    form.categories = newVal.map(item => item.id);
}, { deep: true });

const store = () => {
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

                    <p v-if="$page.props.flash.success" class="text-green-300 pb-4">{{ $page.props.flash.success}}</p>
                    <p v-if="$page.props.flash.deletion" class="text-red-300 font-bold pb-4">{{ $page.props.flash.deletion}}</p>

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

                            <textarea name="excerpt" v-model="form.excerpt" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-3/4" required></textarea>

                            <div v-if="form.errors.excerpt" v-text="form.errors.excerpt" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <input type="file" @input="form.image = $event.target.files[0]" />

                            <div v-if="form.errors.image" v-text="form.errors.image" class="text-red-500 text-xs mt-1"></div>
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>
                        </div>

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

<style scoped>
    .custom-multiselect .p-multiselect-panel .p-multiselect-panel .p-multiselect-items {
        @apply bg-blue-500 text-white;  /* Change 'bg-blue-500' and 'text-white' to your preferred Tailwind classes */
    }

</style>
