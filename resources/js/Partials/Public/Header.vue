<template>
    <div id='header'></div>
    <header id="duplex-header" class="" :class="{ '!sticky': inside, 'hidden': !menu }">

        <div class="wrapper-menu">
            <div class="wrapper-mobile">
                <div id="menu-btn" v-on:click="toggleMenu">
                    <div class="hamburger hamburger--squeeze js-hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="menu-header">
                    <li>
                        <PrimaryLink :href="route('home')">Inicio</PrimaryLink>
                    </li>
                    <li>
                        <PrimaryLink scroll="#como-participar">Cómo participar</PrimaryLink>
                    </li>
                    <li>
                        <PrimaryLink scroll="#participa">Participa</PrimaryLink>
                    </li>
                    <li>
                        <PrimaryLink scroll="#premio">Premio</PrimaryLink>
                    </li>
                </ul>
            </nav>
        </div>


    </header>

</template>

<script setup>

import PrimaryLink from "@/Components/PrimaryLink.vue";

defineProps({
    menu: Boolean,
    header: Boolean,
    inside: Boolean
});



const toggleMenu = (e) => {
    let menuBtn = e.target;
    let wrapperMenuNav = document.querySelector(".wrapper-menu nav");
    let header = document.querySelector("header");
    let hamburger = document.querySelector(".hamburger");

    if (menuBtn.classList.contains("active")) {
        wrapperMenuNav.classList.remove("active");
        header.classList.remove("active");
        menuBtn.classList.remove("active");
        hamburger.classList.remove("is-active");
    } else {
        wrapperMenuNav.classList.add("active");
        menuBtn.classList.add("active");
        hamburger.classList.add("is-active");
        header.classList.add("active");
    }
};
</script>


<style lang=scss scoped>

</style>
