<script setup>
    const props = defineProps({
        icon: {
            type: Boolean,
        },
    });
</script>

<template>
    <button
        class="inline-flex items-center px-4 py-2 bg-custom-orange text-custom-grey rounded-md font-semibold text-xs"
    >
        <slot />
    </button>
</template>
