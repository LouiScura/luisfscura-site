<script setup>
defineProps({
    name: { type: String, required: true },
    sourceUrl: { type: String, required: true },
    iconUrl: { type: String, default: '' },
    iconAlt: { type: String, default: 'icon' },
    classes: { type: String, default: '' }
});
</script>

<template>
    <a
        :href="sourceUrl"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center px-4 py-2 bg-custom-orange text-custom-grey rounded-md font-semibold md:m-0"
        :class="classes">
        <img v-if="iconUrl" :src="iconUrl" :alt="iconAlt" class="mr-3"/>
        <span class="text-base">{{ name }}</span>
    </a>
</template>
