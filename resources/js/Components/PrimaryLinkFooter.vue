<script setup>
const props = defineProps({
    scroll: {
        type: String,
        default: null
    },
    active: Boolean
});

const onClick = e => {
    if (props.scroll !== null) {
        e.preventDefault();

        if (!route().current('logeado'))
        {
            window.location = route('logeado') + props.scroll;
            return;
        }

        document.querySelector(props.scroll).scrollIntoView({
           'behavior': 'smooth'
        });
    }
}
</script>

<template>
    <a @click="onClick" class="font-roboto font-bold text-[13px] leading-[16px] text-black" :class="{ 'underline': active }">
        <slot />
    </a>
</template>
