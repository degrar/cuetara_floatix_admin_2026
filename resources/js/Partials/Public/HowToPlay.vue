<template>
    <div class="relative nPattern w-full redPattern ">
        <div class="container mx-auto py-[150px]">
            <div class="flex items-center justify-center mb-8">
                <h4 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[41px] rem:leading-[41px] rem:tracking-[0px]">Cómo participar</h4>
            </div>
            <div class="flex justify-center flex-wrap items-stretch w-full ">
                <div class="rem:max-w-[370px] w-full box rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                    <img src="../../../../resources/images/htw/1.png" alt="paso 1" class="max-w-[80px] lg:max-w-[80px] w-full mx-auto pb-2"/>
                    <img src="../../../../resources/images/htw/step1.png" alt="paso 1" class="max-w-[200px] lg:max-w-[300px] w-full mx-auto pb-2"/>
                    <p class="font-montserrat font-extrabold text-black rem:text-[25px] rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px]">Compra cualquier producto</p>
                    <p class="font-montserrat font-bold text-black rem:text-[16px] rem:leading-[22px] rem:tracking-[0.16px] text-center max-w-[270px] w-full mx-auto">¿Con qué productos puedo participar?</p>
                </div>

                <div class="rem:max-w-[370px] w-full box rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                    <img src="../../../../resources/images/htw/2.png" alt="paso 2" class="max-w-[80px] lg:max-w-[80px] w-full mx-auto pb-2"/>
                    <img src="../../../../resources/images/htw/step2.png" alt="paso 2" class="max-w-[200px] lg:max-w-[300px] w-full mx-auto pb-2"/>
                    <p class="font-montserrat font-extrabold text-black rem:text-[25px] rem:leading-[28px] max-w-[300px] w-full mx-auto mb-[15px] text-center">Sube tu ticket de compra o el código <span class="font-normal">que encontrarás en los </span>tarros navideños</p>
                </div>

                <div class="rem:max-w-[370px] w-full box rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                    <img src="../../../../resources/images/htw/3.png" alt="paso 3" class="max-w-[80px] lg:max-w-[80px] w-full mx-auto pb-2"/>
                    <img src="../../../../resources/images/htw/step3.png" alt="paso 3" class="max-w-[200px] lg:max-w-[300px] w-full mx-auto pb-2"/>
                    <p class="font-montserrat font-extrabold text-black rem:text-[25px] rem:leading-[28px] max-w-[300px] w-full mx-auto mb-[15px] text-center">Descubre al momento si has ganado</p>
                </div>

            </div>
            <div class="my-[50px]">
                <div class="flex justify-center py-4">
                    <PrimaryButton scroll="#participa" class="">Participa</PrimaryButton>
                </div>
                <div class="flex justify-center">
                    <p class="font-montserrat font-extrabold text-white rem:text-[13px] rem:leading-[21px]">RECUERDA GUARDAR EL TICKET DE COMPRA ORIGINAL, PODRÍAMOS SOLICITÁRTELO SI RESULTAS GANADOR.</p>
                </div>
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
