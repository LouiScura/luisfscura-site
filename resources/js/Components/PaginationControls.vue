<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps( {
    prevPage: String,
    nextPage: String,
});

</script>

<template>
    <!-- Pagination Controls -->
    <div class="flex justify-between">
        <Link :href="props.prevPage"
              :class="{ 'cursor-not-allowed opacity-50' : props.prevPage === null}"
              class="flex bg-custom-orange text-custom-grey rounded-xl p-2 px-3 font-semibold text-sm">
            <img src="/images/arrow-left.svg" alt="Previous" class="w-4"/>
            <span class="ml-1 hidden md:block">Previous</span>
        </Link>
        <Link
            :href="props.nextPage"
            :class="{ 'cursor-not-allowed opacity-50' : props.nextPage === null}"
            class="flex bg-custom-orange text-custom-grey rounded-xl p-2 px-3 font-semibold text-sm">
            <span class="mr-1 hidden md:block">Next</span>
            <img src="/images/arrow-right.svg" alt="Next" class="w-4"/>
        </Link>
    </div>
</template>
