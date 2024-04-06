<script setup>
import { defineProps, defineEmits, watchEffect } from 'vue';

const props = defineProps({
   categories: Object,
   currentCategory: String
});

// Define the emit
const emit = defineEmits(['categorySelected']);

function selectCategory(category) {
    emit('categorySelected', category);
}

// Watch for changes in currentCategory
watchEffect(() => {
    console.log(props.currentCategory);
});


</script>

<template>
    <div>
        <ul class="flex overflow-x-auto my-6 gap-4">
            <li
                @click="selectCategory('all')"
                class="text-gray-400 shrink-0 w-32 rounded-2xl py-1 px-4 font-light text-lg text-center hover:bg-custom-orange cursor-pointer"
                :class="{'bg-custom-orange text-slate-200': 'all' === props.currentCategory, 'bg-primary': 'all' !== props.currentCategory}">
                All posts
            </li>
            <li v-for="category in categories"
                @click="selectCategory(category.name)"
                class="text-gray-400 shrink-0 w-32 rounded-2xl py-1 px-4 font-light text-lg text-center hover:bg-custom-orange cursor-pointer"
                :key="category.id"
                :class="{'bg-custom-orange text-slate-200': category.name === props.currentCategory, 'bg-primary': category.name !== props.currentCategory}">
                {{ category.name }}
            </li>
        </ul>
    </div>
</template>
