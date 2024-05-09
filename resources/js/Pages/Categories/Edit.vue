<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";

const props = defineProps({
    category: Object,
    required: true
})

const form = useForm(props.category)

const update = () => {
    form.put('/admin/categories');
};

console.log(form)
</script>

<template>
    <Head title="Create a Category" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-12">

                <AsideLinks/>

                <div class="flex-1">
                    <div>
                        <h1 class="text-white text-xl font-semibold">Edit the category test: {{ form.name }} </h1>
                    </div>

                    <form @submit.prevent="store">
                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="name"> Name </label>

                            <input v-model="form.name" class="text-slate-400 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96" type="text" name="name" id="name" required />

                            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-sm text-gray-200 mt-6" for="name"> Slug </label>

                            <input v-model="form.slug" class="text-slate-400 bg-custom-admin-bg rounded-xl border border-custom-border my-2 p-3 w-96" type="text" name="slug" id="slug" required />

                            <div v-if="form.errors.slug" v-text="form.errors.slug" class="text-red-500 text-xs mt-1"></div>
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
