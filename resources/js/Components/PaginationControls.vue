<script setup>
import {Link} from "@inertiajs/vue3";
import {computed} from "vue";

const props = defineProps(['meta']);

const previousUrl = computed(() => props.meta.links[0].url);
const nextUrl = computed(() => [...props.meta.links].reverse()[0].url);
</script>

<template>
    <!-- Pagination Controls -->
    <div class="flex justify-between">
        <Link :href="previousUrl"
              :class="{ 'cursor-not-allowed opacity-50' : previousUrl === null}"
              class="flex bg-custom-orange text-custom-grey rounded-xl p-2 px-3 font-semibold text-sm">
            <img src="/images/arrow-left.svg" alt="Previous" class="w-4"/>
            <span class="ml-1 hidden md:block">Previous</span>
        </Link>
        <Link :href="nextUrl"
            :class="{ 'cursor-not-allowed opacity-50' : nextUrl === null}"
            class="flex bg-custom-orange text-custom-grey rounded-xl p-2 px-3 font-semibold text-sm">
            <span class="mr-1 hidden md:block">Next</span>
            <img src="/images/arrow-right.svg" alt="Next" class="w-4"/>
        </Link>
    </div>
</template>
