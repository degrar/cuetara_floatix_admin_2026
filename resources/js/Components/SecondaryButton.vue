<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="font-roboto font-bold uppercase bg-white rounded-[4px] text-black cursor-pointer rem:text-[11px] rem:leading-[6px] rem:tracking-[0.15px] border-[1px] border-grey hover:bg-grey hover:text-white hover:bg-slate-300 rem:py-[10px] rem:px-[30px] tracking-[1px]">
        <slot />
    </button>
</template>
