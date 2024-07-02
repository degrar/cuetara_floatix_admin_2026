<template>
    <GuestLayout title="Kinder" useRecaptcha menu>
        <Intro />

        <div class="" id="como-participar">
            <HowToPlay />
        </div>

        <div class="" id="participa">
            <Game />
        </div>

        <div class="" id="premio">
            <Prize />
        </div>

    </GuestLayout>
</template>

<script setup>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import Intro from "@/Partials/Public/Intro.vue";
import HowToPlay from "@/Partials/Public/HowToPlay.vue";
import Game from "@/Partials/Public/Game.vue";

import { OhVueIcon, addIcons } from "oh-vue-icons";
import { MdLocalplay, BiArrowDownShort } from "oh-vue-icons/icons";
import Prize from "@/Partials/Public/Prize.vue";
addIcons(BiArrowDownShort, MdLocalplay);

</script>

<style lang="scss">

</style>
