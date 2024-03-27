<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps([
    'name'
])

</script>

<template>
    <Head title="Luis Scura - Web Developer" />
    <MainLayout>
        <main class="bg-body-bg text-neutral-100">
            <div class="max-w-5xl mx-auto w-full px-8">
                <!-- Component title/description? for every page-->
                <section class="px-6">
                    <h2>About me</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, '
                        quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </section>
            </div>
        </main>
    </MainLayout>
</template>
