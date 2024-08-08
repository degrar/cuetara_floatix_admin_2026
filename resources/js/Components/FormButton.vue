<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="cursor-pointer text-[22px] leading-[24px] font-montserrat font-extrabold bg-yellow rounded-lg text-black py-[15px] px-[50px] mx-2 uppercase transition-all hover:bg-black hover:text-yellow shadow-lg">
        <slot />
    </button>
</template>
