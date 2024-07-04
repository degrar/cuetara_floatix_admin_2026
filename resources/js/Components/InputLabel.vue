<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="rem:text-[21px] text-brown font-tekoRegular ml-[10px]  text-left w-full">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
