<script setup>
import {ref} from "vue";

let dialog = ref(null);
let selectedProject = ref(null);

const props = defineProps({
    projects: Object,
    tags: Object
})
function handleProjectClick(project){
    selectedProject.value = project;
    dialog.value.showModal(); // Show the dialog
}
</script>

<template>
    <section class="max-w-5xl mx-auto w-full px-6 text-custom-grey">
        <h2 class="font-semibold text-sub-title py-2">Featured Projects</h2>
        <p class="font-light text-base pb-4">Check some of the projects I've created! Where I share my good and no-so-good progress in
            <a href="https://github.com/LouiScura/" class="text-blue-600" target="_blank">GitHub</a> :D
        </p>

        <div class="flex overflow-x-auto md:grid md:grid-cols-3 gap-6 md:gap-10">
            <div v-for="project in props.projects"
                 :key="project.id"
                 class="w-48 md:w-full flex-shrink-0 flex-grow-0 relative cursor-pointer"
                 @click="handleProjectClick(project)"
            >
                <img src="/images/placeholder2.png" class="w-full rounded-2xl" alt="Placeholder"/>
                <ul class="flex absolute bottom-5 left-1/2 transform -translate-x-1/2 space-x-3">
                    <li v-for="tag in project.tags" :key="tag.id" class="rounded-lg bg-custom-black opacity-50 flex-shrink-0 flex-grow-0 py-1 px-1 md:px-2">
                        {{ tag.name}}
                    </li>
                </ul>
            </div>
        </div>

        <dialog ref="dialog" class="bg-primary space-y-4 focus:border-custom-orange">
            <div class="flex justify-between">
                <header class="flex flex-col">
                    <h2 class="text-2xl text-custom-orange" v-if="selectedProject" v-text="selectedProject.title"></h2>
                    <ul class="flex gap-4 text-sm">
                        <li v-if="selectedProject"  v-for="tag in selectedProject.tags" :key="tag.id" class="text-blue-600">
                            {{ tag.name}}
                        </li>
                    </ul>
                </header>

                <form method="dialog">
                    <button type="submit" autofocus class="focus:border-custom-orange h-4">
                        <span class="block h-0.5 w-6 bg-custom-grey -rotate-45 translate-y-2"></span>
                        <span class="block mt-1 h-0.5 w-6 bg-custom-grey rotate-45 translate-y-0.5"></span>
                    </button>
                </form>
            </div>

            <p class="font-light text-custom-grey text-md" v-if="selectedProject" v-text="selectedProject.description"></p>

            <footer>
                <a v-if="selectedProject"
                   :href="{ selectedProject  }"
                   target="_blank"
                   class="text-white underline text-sm">See code</a>
            </footer>
        </dialog>
    </section>
</template>

<style>
html:has(dialog[open]){
    overflow: hidden;
}
dialog {
    width: 100%;
    max-width: 80vh;
    position: fixed;
    inset: 0;
    background-color: #1a202c;
    border: none;
    border-radius: .5rem;
    padding: 1rem;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    display: block;
    z-index: 100;
    opacity: 0;
    pointer-events: none;
    transition: opacity .3s
}
dialog[open]{
    opacity: 1;
    pointer-events: auto;
    animation: slideUp .4s ease-in-out;
}

dialog:focus {
    border: 1px solid #e56823;
}
dialog::backdrop {
    background-color: rgba(0, 0, 0, .55);
    backdrop-filter: blur(4px);
}
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(100vh);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
