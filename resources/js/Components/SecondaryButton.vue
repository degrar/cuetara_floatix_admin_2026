<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="font-tekoMedium uppercase bg-grey rounded-[6px] text-white cursor-pointer rem:text-[16px] leading-[20px] border-2 border-grey hover:bg-white hover:text-grey hover:bg-slate-300 rem:py-[10px] rem:px-[30px] tracking-[1px]">
        <slot />
    </button>
</template>
