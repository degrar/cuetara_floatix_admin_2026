<template>

    <div class="bg-orange py-[100px]  relative after:absolute after:top-[-92px] after:right-0 after:left-0 after:w-full after:mx-auto after:bg-curveOrange after:bg-no-repeat after:bg-center after:bg-[length:2560px_92px] after:h-[92px]">
        <div class="container mx-auto px-[15px] ">
            <div class="flex items-center justify-center mb-8">
                <h1 class="font-hermes text-white text-[48px] leading-[50px] tracking-[-0.48px] uppercase text-center ">
                    <span class="text-blue">PARTICIPAR</span> ES MUY FÁCIL
                </h1>
            </div>
            <div class="flex justify-center flex-wrap items-stretch w-full">
                <div class="rem:max-w-[340px] w-full box rem:mx-[15px] rem:mb-[10px]">
                    <img src="../../../../resources/images/htw/step01.png" alt="paso 1" class="max-w-[300px] w-full mx-auto pb-5"/>
                    <p class="font-tekoMedium text-white rem:text-[35px] rem:leading-[40px] tracking-[-0.35px] text-center max-w-[300px] w-full mx-auto">Compra tu pack de <span class="text-blue">Kinder Sorpresa</span> o <span class="text-blue">Kinder Chocolate.</span></p>
                </div>

                <div class="rem:max-w-[340px] w-full box rem:mx-[15px] rem:mb-[10px]">
                    <img src="../../../../resources/images/htw/step02.png" alt="paso 1" class="max-w-[300px] w-full mx-auto pb-5"/>
                    <p class="font-tekoMedium text-white rem:text-[35px] rem:leading-[40px] tracking-[-0.35px] text-center max-w-[300px] w-full mx-auto">Sube una <span class="text-blue">foto de tu pack.</span></p>
                </div>

                <div class="rem:max-w-[340px] w-full box rem:mx-[15px] rem:mb-[10px]">
                    <img src="../../../../resources/images/htw/step03.png" alt="paso 3" class="max-w-[300px] w-full mx-auto pb-5"/>
                    <p class="font-tekoMedium text-white rem:text-[35px] rem:leading-[40px] tracking-[-0.35px] text-center max-w-[300px] w-full mx-auto">¡Al momento sabrás si has ganado un <span class="text-blue">telescopio!</span> ¡2 cada semana!</p>
                </div>

            </div>

            <div class="flex justify-center">
                <PrimaryButton scroll="#participa" class="">Participa</PrimaryButton>
            </div>
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
