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
        let nav = 0;
        if (window.innerWidth >= 1024) nav = document.querySelector('header').offsetHeight;
        else  nav = document.querySelector('div.wrapper-mobile').offsetHeight;
        window.scrollTo({ top: sectionElement.offsetTop - (nav), behavior: 'smooth' });
    }
};
</script>

<template>
    <a @click="onClick" class="cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none">
            <g filter="url(#filter0_d_4002_1048)">
                <path d="M31.3333 54.0001C46.061 54.0001 58.0002 42.061 58.0002 27.3333C58.0002 12.6056 46.061 0.666443 31.3333 0.666443C16.6056 0.666443 4.6665 12.6056 4.6665 27.3333C4.6665 42.061 16.6056 54.0001 31.3333 54.0001Z" fill="#201E29"/>
            </g>
            <path d="M20.5986 27.3333L31.3337 38.0684L42.0688 27.3333" fill="#201E29"/>
            <path d="M20.5986 27.3333L31.3337 38.0684L42.0688 27.3333" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M31.3335 16.5981V38.0684" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
            <defs>
                <filter id="filter0_d_4002_1048" x="0.666504" y="0.666443" width="61.3335" height="61.3337" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4002_1048"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4002_1048" result="shape"/>
                </filter>
            </defs>
        </svg>
    </a>
</template>
