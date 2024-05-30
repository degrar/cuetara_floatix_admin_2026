<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="uppercase rem:text-[16px] font-bemio text-white tracking-widest  no-underline transition ease-in-out duration-150 absolute top-0 bottom-0 right-0 bg-grey px-[25px] py-[2px] rounded-[40px]">
        <slot />
    </button>
</template>
