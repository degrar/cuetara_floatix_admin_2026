<template>
    <GuestLayout title="Promoción finalizada">
        <Intro end/>

        <div id="end" class="">
            <End />
        </div>

    </GuestLayout>
</template>

<script setup>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import Intro from "@/Partials/Public/Intro.vue";
import { OhVueIcon, addIcons } from "oh-vue-icons";
import { MdLocalplay, BiArrowDownShort } from "oh-vue-icons/icons";
import End from "@/Partials/Public/End.vue";
addIcons(BiArrowDownShort, MdLocalplay);

</script>

<style lang="scss">

</style>
