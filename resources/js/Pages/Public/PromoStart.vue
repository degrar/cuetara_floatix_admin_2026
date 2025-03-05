<template>
    <GuestLayout title="Proximamente">

        <div class="bg-black p-4">
            <h4 class="text-yellow text-center text-2xl lg:text-4xl">Próximamente</h4>
        </div>

        <Intro :start="true"/>
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
