<template>

    <div class="container mx-auto p-4 py-12 lg:py-20 ">
        <div class="flex items-center justify-center mb-8">
            <h4 class="text-yellow font-ferry uppercase text-2xl lg:text-5xl text-center">¡PARTICIPA EN UN YA!</h4>
        </div>
        <div class="w-12/12 md:w-8/12 mx-auto">
            <div class="flex flex-col gap-8 w-full">
                <div class="w-full flex-col md:flex-row flex items-center justify-center gap-4 rounded-lg bg-yellow p-4">
                    <p class="font-ferry text-stroke-2 lg:text-stroke-3 text-stroke-black text-white text-4xl lg:text-5xl">01</p>
                    <img src="../../../../resources/images/htw/1.png" alt="1" class="max-w-[150px] h-auto">
                    <p class="font-ferry text-black ttext-lg max-w-[360px] w-full leading-5 text-center md:text-left">
                        Compra tus <span class="text-red">Yatekomo.</span>
                    </p>
                </div>

                <div class="w-full flex flex-col md:flex-row items-center justify-center gap-4 rounded-lg bg-yellow p-4">
                    <p class="font-ferry text-stroke-2 lg:text-stroke-3 text-stroke-black text-white text-4xl lg:text-5xl">02</p>
                    <img src="../../../../resources/images/htw/2.png" alt="2" class="max-w-[150px] h-auto">
                    <p class="font-ferry text-black text-lg max-w-[360px] w-full leading-5 text-center md:text-left">
                        Introduce tus datos <span class="text-red">personales</span> y los de <span class="text-red">tu ticket de compra</span> en esta <span class="text-red">web.</span>
                    </p>
                </div>

                <div class="w-full flex flex-col md:flex-row items-center justify-center gap-4 rounded-lg bg-yellow p-4">
                    <p class="font-ferry text-stroke-2 lg:text-stroke-3 text-stroke-black text-white text-4xl lg:text-5xl">03</p>
                    <img src="../../../../resources/images/htw/3.png" alt="3" class="max-w-[150px] h-auto">
                    <p class="font-ferry text-black text-lg max-w-[360px] w-full leading-5 text-center md:text-left">
                        ¡Al momento sabrás si has ganado una <span class="text-red"><sup>©</sup>NINTENDO SWITCH</span> o una <span class="text-red">suscripción de 50€</span> a tu plataforma de streaming favorita!
                    </p>
                </div>

                <div class="w-full flex items-center justify-center bg-red p-6 rounded-lg relative overflow-hidden">
                    <!-- Imagen de la mujer -->
                    <img src="../../../../resources/images/htw/woman.png" alt="Mujer" class="absolute left-0 lg:left-[50px] top-1/2 transform -translate-y-1/2 max-w-[120px] h-auto">

                    <!-- Texto -->
                    <div class="flex flex-col ml-[120px]">
                        <p class="font-ferry text-black text-lg leading-5">Además, entrarás en el sorteo de <span class="font-ferry text-yellow text-lg lg:text-2xl font-bold leading-5 lg:block">UN VIAJE A JAPÓN.</span></p>

                    </div>

                </div>

            </div>

        </div>
        <div class="mt-[50px] lg:my-[50px]">
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
