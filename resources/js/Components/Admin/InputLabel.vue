<script setup>
defineProps({
    value: String,
    error: String,
});
</script>

<template>
    <label class="text-black font-roboto rem:text-[14px] text-left w-full" :class="{ '!text-error': error }">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
