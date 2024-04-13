<script setup>
import {Head, Link} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";

const props = defineProps({
    categories: Object
});

function destroy(id){
    if(confirm('Are you sure')){
        Inertia
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

                    <div class="flex justify-between">
                        <h1 class="text-white text-xl font-semibold">All categories</h1>
                        <Link href="/admin/categories/create" class="text-custom-orange underline">Create category</Link>
                    </div>

                    <div class="flex flex-col mt-8">
                        <div class="flex items-center justify-around" v-for="category in categories">
                            <p class="text-gray-200 bg-custom-admin-bg rounded-xl border border-custom-border my-4 p-2 w-96"> {{ category.name }} </p>
                            <button class="group/edit group-hover/item:visible h-6 w-6 flex-1" type="button">
                                <img src="/images/cross-circle.svg" class="h-full w-full" alt="Cross Icon"/>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
