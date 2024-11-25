<script setup>
const props = defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    scroll: {
        type: String,
        default: null
    }
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
    <button @click="onClick" :type="type" class="font-roboto py-2 px-6 bg-duplex text-white rounded hover:opacity-80 focus:opacity-80" v-bind="$attrs">
        <slot />
    </button>
</template>
