<script setup>

import {ref} from "vue";

let dialog = ref(null);
let selectedProject = ref(null);

const props = defineProps(['projects', 'tags']);
const emit = defineEmits(['projectClick']);


function handleProjectClick(project){
    selectedProject.value = project;
    dialog.value.showModal(); // Show the dialog
    emit('projectClick', project);
}

</script>

<template>
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
</template>
