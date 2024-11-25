<template>
    <GuestLayout title="Vileda" useRecaptcha menu>
        <Intro />

        <div class="bg-white" id="como-participar">
            <HowToPlay />
        </div>

        <div class="!bg-yellow-50" id="participa">
            <Game />
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

addIcons(BiArrowDownShort, MdLocalplay);

</script>

<style lang="scss">

</style>
