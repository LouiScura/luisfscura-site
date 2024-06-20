<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";

const form = useForm({
    title: '',
    description: '',
    image: null,
    link: ''
})

const store = () => {
    form.post('/admin/projects');
};

</script>

<template>
    <Head title="Create a Project" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-12">

                <AsideLinks/>

                <div class="flex-1">
                    <div>
                        <h1 class="text-white text-xl font-semibold">Create a project!</h1>
                    </div>

                    <form @submit.prevent="store">
                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="title"> Title </label>

                            <input v-model="form.title" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96" type="text" name="title" id="title" required />

                            <div v-if="form.errors.title" v-text="form.errors.title" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="description"> Description </label>

                            <textarea v-model="form.description" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96"  name="description" id="description" rows="8" required />

                            <div v-if="form.errors.description" v-text="form.errors.description" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="link"> Link </label>

                            <input v-model="form.link" class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96" type="text" name="link" id="link" required />

                            <div v-if="form.errors.link" v-text="form.errors.link" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <input type="file" @input="form.image = $event.target.files[0]" required/>

                            <div v-if="form.errors.image" v-text="form.errors.image" class="text-red-500 text-xs mt-1"></div>
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>
                        </div>

                        <button :disabled="form.processing" class="flex items-center">
                            <button type="submit" class="bg-custom-orange text-white rounded py-2 px-4 w-52">Create</button>
                            <div v-if="form.processing" class="btn-spinner ml-2 text-custom-orange">
                                Creating...
                            </div>
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </AuthenticatedLayout>
</template>
