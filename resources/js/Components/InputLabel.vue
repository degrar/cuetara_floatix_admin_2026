<script setup>
defineProps({
    value: String,
    error: String,
});
</script>

<template>
    <label class="text-brown font-tekoMedium rem:text-[21px] text-left w-full leading-[21px]" :class="{ '!text-error': error }">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>

</template>
