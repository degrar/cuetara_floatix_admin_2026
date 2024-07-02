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

        if (!route().current('home'))
        {
            window.location = route('home') + props.scroll;
            return;
        }

        scrollToSection(props.scroll.replace("#", ""));
    }
}

const scrollToSection = (scroll) => {

    const sectionElement = document.getElementById(scroll);
    if (sectionElement) {
        const headerHeight = document.querySelector('#header').offsetHeight;
        let nav = 0;
        if (window.innerWidth >= 1024) nav = document.querySelector('#duplex-header').offsetHeight;
        else  nav = document.querySelector('div.wrapper-mobile').offsetHeight;
        window.scrollTo({ top: sectionElement.offsetTop - (headerHeight+nav), behavior: 'smooth' });
    }
};
</script>

<template>
    <a @click="onClick" class="font-EuclidCircularMedium text-white cursor-pointer rem:text-[14px]">
        <slot />
    </a>
</template>
