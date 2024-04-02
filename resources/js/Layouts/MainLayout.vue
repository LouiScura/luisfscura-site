<script setup>
import Header from "@/Components/Header/Header.vue";
import Footer from "@/Components/Footer/Footer.vue";
import {onMounted} from "vue";

const props = defineProps({
    classes: String
});
</script>

<template>
    <Header/>
        <main class="bg-body-bg flex flex-col flex-1 items-center" :class="props.classes">
            <slot/>
        </main>
    <Footer/>
</template>
