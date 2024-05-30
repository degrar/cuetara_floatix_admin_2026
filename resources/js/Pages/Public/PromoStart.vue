<template>
    <GuestLayout title="Proximamente">
        <Intro end/>

        <div id="end" class="">
            <Start />
        </div>

    </GuestLayout>
</template>

<script setup>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import Intro from "@/Partials/Public/Intro.vue";
import { OhVueIcon, addIcons } from "oh-vue-icons";
import { MdLocalplay, BiArrowDownShort } from "oh-vue-icons/icons";
import Start from "@/Partials/Public/Start.vue";
addIcons(BiArrowDownShort, MdLocalplay);

</script>

<style lang="scss">

</style>
