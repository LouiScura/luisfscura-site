<script setup>

import {onMounted} from "vue";

const props = defineProps({
    projects: Object,
    tags: Object
})
</script>

<template>
    <section class="max-w-5xl mx-auto w-full px-6 text-custom-grey">
        <h2 class="font-semibold text-sub-title py-2">Featured Projects</h2>
        <p class="font-light text-base pb-4">Check some of the projects I've created! Where I share my good and no-so-good progress in <a href="https://github.com/LouiScura/" class="text-blue-600" target="_blank">GitHub</a> :D</p>
        <div class="flex overflow-x-auto md:grid md:grid-cols-3 gap-6 md:gap-10">
            <div v-for="project in props.projects" class="w-48 md:w-full flex-shrink-0 flex-grow-0 relative">
                <img src="/images/placeholder2.png" class="w-full rounded-2xl" alt="Placeholder"/>
                <ul class="flex absolute bottom-5 left-1/2 transform -translate-x-1/2 space-x-3">
                    <li v-for="tag in project.tags" class="rounded-lg bg-custom-black opacity-50 flex-shrink-0 flex-grow-0 py-1 px-1 md:px-2">
                        {{ tag.name}}
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>
