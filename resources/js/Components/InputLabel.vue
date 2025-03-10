<script setup>

const props = defineProps({
    value: String,
    letter: {
        type: Boolean,
        default: false
    },
});
</script>

<template>
    <label class="rem:text-[13px] rem:leading-[18px] font-bold text-black font-montserrat text-left w-full uppercase">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /> <a v-if="letter" class="underline cursor-pointer hover:no-underline inline-block" :href="route('carta')">Descargarla aquí</a></span>
    </label>
</template>
