<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="font-tekoSemiBold uppercase bg-grey rounded-[6px] text-white cursor-pointer rem:text-[14px] border-[1px] border-grey hover:bg-white hover:text-grey hover:border-grey rem:py-[10px] rem:px-[30px]">
        <slot />
    </button>
</template>
