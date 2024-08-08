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
        const headerHeight = document.querySelector('#nutella-header').offsetHeight;
        let nav = 0;
        if (window.innerWidth >= 1024) nav = document.querySelector('#duplex-header').offsetHeight;
        else  nav = document.querySelector('div.wrapper-mobile').offsetHeight;
        window.scrollTo({ top: sectionElement.offsetTop - (headerHeight+nav), behavior: 'smooth' });
    }
};
</script>

<template>
    <a @click="onClick" class="cursor-pointer text-[22px] leading-[24px] font-montserrat font-extrabold bg-yellow rounded-lg text-black py-[15px] px-[50px] mx-2 uppercase transition-all hover:bg-black hover:text-yellow" :class="{ 'underline': active }">
        <slot />
    </a>
</template>
