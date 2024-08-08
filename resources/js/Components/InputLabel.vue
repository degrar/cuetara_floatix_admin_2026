<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="rem:text-[13px] rem:leading-[18px] font-bold text-black font-montserrat text-left w-full">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
