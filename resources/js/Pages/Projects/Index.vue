<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import {onMounted} from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AsideLinks from "@/Components/AsideLinks.vue";
</script>

<template>
    <Head title="All Projects" />
    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-12">

                <AsideLinks/>

                <div class="flex-1">
                    <div class="flex justify-between">
                        <h1 class="text-white text-xl font-semibold">All projects</h1>
                        <Link href="/admin/project/create" class="text-custom-orange underline">Create project</Link>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
