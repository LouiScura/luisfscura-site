<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";

const props = defineProps({
    projects: Object
});

</script>

<template>
    <Head title="All Projects" />
    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-12">

                <AsideLinks/>

                <div class="flex-1">
                    <p v-if="$page.props.flash.success" class="text-green-300 pb-4">{{ $page.props.flash.success}}</p>
                    <p v-if="$page.props.flash.deletion" class="text-red-300 font-bold pb-4">{{ $page.props.flash.deletion}}</p>

                    <div class="flex justify-between">
                        <h1 class="text-white text-xl font-semibold">All projects</h1>
                        <Link :href="route('projects.create')" class="text-custom-orange underline">Create project</Link>
                    </div>

                    <div class="flex-col mt-8 flex-wrap items-start gap-4">
                        <div class="flex items-center w-5/12 border-b-2 border-slate-600" v-for="project in props.projects.data">

                            <div class="p-2 w-96">
                                <h3 class="text-gray-200 font-semibold"> {{ project.title }} </h3>
                                <span class="text-xs text-neutral-400 font-light block mb-4"> {{ project.created_at}}</span>
                            </div>

                            <div class="flex flex-1 items-center justify-center gap-4">
                                <Link :href="route('projects.edit', project)" class="" title="Edit Post">
                                    <img src="/images/edit-button.svg" class="h-6 w-6" alt="Edit Button"/>
                                </Link>
                                <button class="group/edit group-hover/item:visible h-6 w-6  my-6"
                                        type="button"
                                        @click="destroy(project.id)"
                                        title="Delete Project"
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
