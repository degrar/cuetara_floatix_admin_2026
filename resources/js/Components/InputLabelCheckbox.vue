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
    <label class="text-sm text-black font-montserrat">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>


    </label>

</template>
