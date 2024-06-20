<script setup>
import { defineProps } from 'vue';
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        required: true
    },
    filled: {
        default: false,
    }
});

console.log(props.filled);
</script>

<template>
    <Link
        :href="props.href"
        class="text-gray-400 shrink-0 rounded-2xl font-light text-[15px] text-center hover:bg-custom-orange hover:text-slate-50 cursor-pointer py-1 px-4 leading-loose bg-primary"
        :class="{ '!bg-custom-orange !text-slate-50': filled }">
        <slot></slot>
    </Link>
</template>
