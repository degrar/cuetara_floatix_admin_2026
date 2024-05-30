<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="font-bemio uppercase bg-orange rounded-full text-white cursor-pointer rem:text-[21px] border-[1px] border-orange hover:bg-white hover:text-orange hover:border-orange rem:py-[10px] rem:px-[30px]">
        <slot />
    </button>
</template>
