<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="rem:text-[21px] text-brown font-tekoRegular text-left w-full">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
