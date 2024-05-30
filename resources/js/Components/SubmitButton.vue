<script setup>
const props = defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    scroll: {
        type: String,
        default: null
    },
    active: {
        type: Boolean,
    },
});

const onClick = e => {
    if (props.scroll !== null) {
        e.preventDefault();
        document.querySelector(props.scroll).scrollIntoView({
            'behavior': 'smooth'
        });
    }
}
</script>

<template>
    <button @click="onClick" :type="type" class="font-bemio uppercase bg-orange rounded-full text-white cursor-pointer rem:text-[21px] border-[1px] border-orange hover:bg-white hover:text-orange hover:border-orange rem:py-[10px] rem:px-[30px]" :class="{ '!bg-hardBlue': active }">
        <slot />
    </button>
</template>

<style lang="scss">
.__btn {
    position: relative;

    &:hover {
        // color: theme('colors.red');

        &:after {
            display: block;
        }
    }
}
</style>
