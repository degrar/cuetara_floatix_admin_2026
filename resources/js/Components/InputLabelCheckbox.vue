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
    <label class="rem:text-[12px] text-grey font-roboto font-medium">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>


    </label>

</template>
