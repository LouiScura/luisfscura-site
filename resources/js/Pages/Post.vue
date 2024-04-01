<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import {onMounted} from "vue";

const props = defineProps({
    post: {
        type: Object
    }
});

onMounted(() => console.log(props.post));
</script>

<template>
    <MainLayout>
        <h2>{{ props.post.slug }}</h2>
    </MainLayout>
</template>
