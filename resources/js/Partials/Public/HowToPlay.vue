<template>

    <div class="container mx-auto p-4">
        <div class="flex items-center justify-center mb-8">
            <h4 class="text-white font-roboto font-extrabold uppercase rem:text-[28px] rem:leading-[32px] lg:rem:text-[41px] lg:rem:leading-[41px] rem:tracking-[0px]">Cómo participar</h4>
        </div>
        <div class="flex justify-center flex-wrap items-stretch w-full ">
            <div class="rem:max-w-[270px] lg:rem:max-w-[370px] w-full box rem:p-[10px] lg:rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                <p class="font-roboto font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">1</p>
                <p class="font-roboto font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">Compra cualquier producto</p>
            </div>

            <div class="rem:max-w-[270px] lg:rem:max-w-[370px] w-full box rem:p-[10px] lg:rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                <p class="font-roboto font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">2</p>
                <p class="font-roboto font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">Sube tu ticket de compra</p>
            </div>

            <div class="rem:max-w-[270px] lg:rem:max-w-[370px] w-full box rem:p-[10px] lg:rem:p-[30px] rem:mx-[15px] rem:mb-[10px] rounded-lg whitePattern">
                <p class="font-roboto font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">2</p>
                <p class="font-roboto font-extrabold text-black rem:text-[18px] rem:leading-[24px] lg:rem:text-[25px] lg:rem:leading-[28px] max-w-[270px] w-full mx-auto mb-[15px] text-center">Descubre al momento si has ganado</p>
            </div>

        </div>
        <div class="my-[50px]">
            <div class="flex justify-center py-4">
                <PrimaryButton scroll="#participa" class="">Participa</PrimaryButton>
            </div>

        </div>
    </div>

</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";

const getImagePath = (photo) => {
    return new URL(`/resources/images/htw/${photo}.png`, import.meta.url).href;
};

</script>

<style scoped>

</style>
