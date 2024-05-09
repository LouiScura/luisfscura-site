<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";

const props = defineProps({
    categories: Object
});

const form = useForm({});

function destroy(id) {
    if (confirm("Are you sure you want to Delete?")) {
        form.delete(route('category.destroy', id));
    }
}

</script>

<template>
    <Head title="All Categories" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-12">

                <AsideLinks/>

                <div class="flex-1">

                    <p v-if="$page.props.flash.success" class="text-green-300 pb-4">{{ $page.props.flash.success}}</p>
                    <p v-if="$page.props.flash.deletion" class="text-red-300 font-bold pb-4">{{ $page.props.flash.deletion}}</p>

                    <div class="flex justify-between">
                        <h1 class="text-white text-xl font-semibold">All categories</h1>
                        <Link href="/admin/categories/create" class="text-custom-orange underline">Create category</Link>
                    </div>

                    <div class="flex mt-8 flex-wrap">
                        <div class="flex items-center w-6/12" v-for="category in categories">
                            <p class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border p-2 w-96"> {{ category.name }} </p>

                            <div class="flex flex-1 items-center justify-center gap-4">
                                <Link :href="route('category.edit', category.id)" class="" title="Edit Category">
                                    <img src="/images/edit-button.svg" class="h-6 w-6" alt="Edit Button"/>
                                </Link>
                                <button class="group/edit group-hover/item:visible h-6 w-6  my-6"
                                        type="button"
                                        @click="destroy(category.id)"
                                        title="Delete Category"
                                >
                                    <img src="/images/cross-circle.svg" class="h-full w-full" alt="Cross Icon"/>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
