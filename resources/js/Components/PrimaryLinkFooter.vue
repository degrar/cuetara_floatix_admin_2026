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
    <a @click="onClick" class="font-tekoMedium text-[21px] leading-[21px] text-brown uppercase" :class="{ 'underline': active }">
        <slot />
    </a>
</template>
