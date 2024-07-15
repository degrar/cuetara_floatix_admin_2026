<script setup>
const props = defineProps({
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
    <a @click="onClick" class="font-poppins py-1 px-4 bg-pink-600 text-white rounded hover:bg-opacity-80 transition-all shadow-lg hover:shadow-none">
        <slot />
    </a>
</template>
