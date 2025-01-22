<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="font-ferry uppercase bg-slate-200 rounded-[4px] text-black cursor-pointer rem:text-[11px] rem:leading-[6px] rem:tracking-[0.15px] border-[1px] border-slate-200 hover:bg-grey hover:text-white hover:bg-slate-700 rem:py-[10px] rem:px-[30px] tracking-[1px]">
        <slot />
    </button>
</template>
