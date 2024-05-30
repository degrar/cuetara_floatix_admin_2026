<template>
    <div class="backgroundpattern"></div>
    <div class="container mx-auto px-[15px] py-[50px]">
        <div class="flex mb-8">
            <h1 class="w-full text-center font-bemio text-brown rem:text-[35px] rem:leading-[35px] tracking-[0.7px] lg:rem:text-[50px] lg:rem:leading-[50px] lg:tracking-[1px] uppercase m-0 p-0">
                ¿CÓMO PARTICIPAR?
            </h1>
        </div>
        <div class="flex justify-center flex-wrap items-stretch w-full">
            <div class="rem:w-[340px] box rem:mx-[15px] rem:mb-[10px] rem:rounded-[12px] text-center rem:px-[20px] rem:py-[10px] md:rem:px-[15px] md:rem:py-[10px]">
                <img src="../../../images/htw/1.png" alt="50%" class="w-[350px] mx-auto pb-[15px]"/>
                <p class="font-bemio text-brown rem:text-[21px] rem:leading-[24px] text-center uppercase">Encuentra <span class="text-orange">la figura dorada.</span></p>
            </div>

            <div class="rem:w-[340px] box rem:mx-[15px] rem:mb-[10px] rem:rounded-[12px] text-center rem:px-[20px] rem:py-[10px] md:rem:px-[15px] md:rem:py-[10px]">
                <img src="../../../images/htw/2.png" alt="70%" class="w-[350px] mx-auto pb-[15px]"/>
                <p class="font-bemio text-brown rem:text-[21px] rem:leading-[24px] text-center max-w-[250px] w-full mx-auto uppercase">Sube <span class="text-orange">una foto</span> de tu figura dorada.</p>
            </div>
            <div class="rem:w-[340px] box rem:mx-[15px] rem:mb-[30px] rem:rounded-[12px] text-center rem:px-[20px] rem:py-[10px] md:rem:px-[15px] md:rem:py-[10px]">
                <img src="../../../images/htw/3.png" alt="70%" class="w-[350px] mx-auto pb-[15px]"/>
                <p class="font-bemio text-brown rem:text-[21px] rem:leading-[24px] text-center w-full max-w-[250px] mx-auto uppercase">Y entrarás en el sorteo de <span class="text-orange">vitrinas,</span> ¡2 cada semana!</p>
            </div>
        </div>

        <div class="text-center block">
            <PrimaryButton scroll="#participa" class="">Participa</PrimaryButton>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const getImagePath = (photo) => {
    return new URL(`/resources/images/htw/${photo}.png`, import.meta.url).href;
};

</script>

<style scoped>

</style>
