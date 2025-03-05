<template>
    <GuestLayout title="Promoción finalizada">
        <div class="bg-black p-4">
            <h4 class="text-yellow text-center text-2xl lg:text-4xl mb-4 ">PROMOCIÓN FINALIZADA</h4>
            <p class="font-ferry text-white text-center text-sm lg:text-base rem:tracking-[0.15px]">Gracias por saborear el día a día con tus Yatekomo.<br>¡Te esperamos en nuestra próxima promoción!</p>
        </div>
        <Intro :end="true"/>
    </GuestLayout>
</template>

<script setup>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import End from "@/Partials/Public/End.vue";
import Intro from "@/Partials/Public/Intro.vue";

</script>

<style lang="scss">

</style>
