<script setup>
defineProps({
    value: String,
    error: {
        type: [String, Boolean],
        default: ''
    },
});
</script>

<template>
    <label class="rem:text-[21px] text-brown font-tekoRegular">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>


    </label>

</template>
