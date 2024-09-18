<template>
    <div class="relative nPattern w-full redPattern ">
        <div class="container mx-auto py-[150px]">
            <div class="flex items-center justify-center mb-8">
                <h4 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[28px] rem:leading-[32px] lg:rem:text-[41px] lg:rem:leading-[41px] rem:tracking-[0px]">Cómo participar</h4>
            </div>
            <div class="flex justify-center flex-wrap items-stretch w-full ">
                <div class="rem:max-w-[270px] lg:rem:max-w-[370px] w-full box rem:p-[10px] lg:rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                    <img src="../../../../resources/images/htw/1.png" alt="paso 1" class="max-w-[60px] lg:max-w-[80px] w-full mx-auto pb-1 lg:pb-2"/>
                    <img src="../../../../resources/images/htw/step1.png" alt="paso 1" class="max-w-[200px] lg:max-w-[300px] w-full mx-auto pb-1 lg:pb-2"/>
                    <p class="font-montserrat font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">Compra cualquier producto</p>
                    <p class="underline hover:no-underline cursor-pointer font-montserrat font-bold text-black rem:text-[15px] rem:leading-[22px] rem:tracking-[0.16px] text-center max-w-[270px] w-full mx-auto" @click="showListModal = true">¿Con qué productos puedo participar?</p>
                </div>

                <div class="rem:max-w-[270px] lg:rem:max-w-[370px] w-full box rem:p-[10px] lg:rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                    <img src="../../../../resources/images/htw/2.png" alt="paso 2" class="max-w-[60px] lg:max-w-[80px] w-full mx-auto pb-1 lg:pb-2"/>
                    <img src="../../../../resources/images/htw/step2.png" alt="paso 2" class="max-w-[200px] lg:max-w-[300px] w-full mx-auto pb-1 lg:pb-2"/>
                    <p class="font-montserrat font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">Sube tu ticket de compra o el código <span class="font-normal">que encontrarás en los </span>tarros navideños</p>
                </div>

                <div class="rem:max-w-[270px] lg:rem:max-w-[370px] w-full box rem:p-[10px] lg:rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                    <img src="../../../../resources/images/htw/3.png" alt="paso 3" class="max-w-[60px] lg:max-w-[80px] w-full mx-auto pb-1 lg:pb-2"/>
                    <img src="../../../../resources/images/htw/step3.png" alt="paso 3" class="max-w-[200px] lg:max-w-[300px] w-full mx-auto pb-1 lg:pb-2"/>
                    <p class="font-montserrat font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">Descubre al momento si has ganado</p>
                </div>

            </div>
            <div class="my-[50px]">
                <div class="flex justify-center">
                    <p class="font-montserrat font-extrabold text-white rem:text-[15px] rem:leading-[21px] max-w-[915px] w-full mx-auto text-center">Recuerda guardar el comprobante con el que has participado (ticket de compra o código promocional), podríamos solicitártelo si resultas ganador/a.</p>
                </div>
                <div class="flex justify-center py-4">
                    <PrimaryButton scroll="#participa" class="">Participa</PrimaryButton>
                </div>

            </div>
        </div>

        <DialogModal closeable :show="showListModal" @close="showListModal = false">
            <template #content>
                <div class="w-full mx-auto bg-white p-[20px] lg:pb-[10px] lg:p-[70px] lg:pb-[30px] shadow-custom rounded-[12px] relative">
                    <div class="absolute top-[0px] rem:right-[0px] lg:top-[25px] lg:right-[25px] cursor-pointer m-auto" @click="showListModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="51" height="50" viewBox="0 0 71 70" fill="none">
                            <g filter="url(#filter0_d_16_908)">
                                <rect x="10" y="6" width="51" height="50" rx="25" fill="#E30613"/>
                                <rect x="7" y="3" width="57" height="56" rx="28" stroke="white" stroke-width="6"/>
                                <path d="M41.875 24.75L29.125 37.25" stroke="#FAF5ED" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M29.125 24.75L41.875 37.25" stroke="#FAF5ED" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <filter id="filter0_d_16_908" x="0" y="0" width="71" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_16_908"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_16_908" result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                    </div>
                    <img src="../../../../resources/images/htw/productos.png" alt="Productos" class="max-w-[250px] lg:max-w-[520px] w-full mx-auto pb-2"/>
                    <h4 class="font-montserrat font-extrabold rem:text-[22px] rem:leading-[24px] lg:rem:text-[41px] lg:rem:leading-[45px] text-center text-black my-[15px] max-w-[630px] w-full mx-auto"><span class="text-red">¡Participa comprando</span> cualquier producto <span class="text-red">Nutella<sup>&reg;</sup>!</span></h4>
                    <ul class="text-center font-montserrat rem:text-[16px] rem:leading-[18px] text-black font-medium space-y-1">
                        <li><span class="font-extrabold">Nutella Cremas:</span> 200g, 350g, 400g, 450g, 600g, 750g, 825g, 1000g</li>
                        <li><span class="font-extrabold">Nutella Biscuits:</span> 41g, 193g, 207g, 304g</li>
                        <li><span class="font-extrabold">Nutella B-ready:</span> 44g, 132g</li>
                        <li><span class="font-extrabold">Nutella&Go:</span> 52g</li>
                        <li><span class="font-extrabold">Helado Nutella</span></li>
                    </ul>
                </div>
            </template>
        </DialogModal>

    </div>
</template>

<script setup>
import {ref} from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DialogModal from "@/Components/Admin/DialogModal.vue";

const showListModal = ref(false);

const getImagePath = (photo) => {
    return new URL(`/resources/images/htw/${photo}.png`, import.meta.url).href;
};

</script>

<style scoped>

</style>
