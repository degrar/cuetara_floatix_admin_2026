<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="cursor-pointer text-[18px] leading-[21px] font-hermes bg-blue border-2 border-solid border-white rounded-full text-white py-[20px] px-[50px] mx-2 uppercase drop-shadow-menu hover:bg-gradient-to-b hover:from-[#FEE900] hover:to-[#F39B00]">
        <slot />
    </button>
</template>
