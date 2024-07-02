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
    <a @click="onClick" class="cursor-pointer text-[16px] leading-[21px] font-hermes bg-blue border-2 border-solid border-white rounded-full text-white py-[15px] px-[25px] mx-2 uppercase drop-shadow-menu hover:bg-gradient-to-b hover:from-[#FEE900] hover:to-[#F39B00]" :class="{ 'underline': active }">
        <slot />
    </a>
</template>
