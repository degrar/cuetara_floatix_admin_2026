<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="font-montserrat uppercase bg-slate-200 rounded-lg text-black cursor-pointer text-xs leading-0 font-bold rem:tracking-[0.15px] border-[1px] border-slate-200 hover:bg-grey hover:text-white hover:bg-slate-700 rem:py-[10px] rem:px-[30px] tracking-[1px]">
        <slot />
    </button>
</template>
