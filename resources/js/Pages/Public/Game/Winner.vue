<template>
    <GuestLayout title="Has Ganado" menu>

        <whitePatternInside />
        <div class="bg-whitePattern py-[50px]">
            <div class="container mx-auto px-[15px] py-5 pb-[100px] lg:py-10 flex flex-col-reverse lg:flex-row justify-center items-center lg:items-start">
                <div class="mx-auto w-5/12">
                    <img src="../../../../images/nutella/jerseis.png" alt="Nutella" class="max-w-[447px] w-full mx-auto"/>
                </div>
                <div class="mx-auto w-7/12">
                    <h4 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[41px] rem:leading-[41px] rem:tracking-[0px]">¡HAS GANADO 2 JERSÉIS NAVIDEÑOS NUTELLA®!</h4>
                    <div class="max-w-[535px] w-full">
                        <p class="font-montserrat rem:text-[21px] rem:leading-[26px] uppercase font-extrabold mt-6">¡Feliz Navidad por adelantado!</p>
                        <p class="font-montserrat rem:text-[21px] rem:leading-[26px] uppercase font-medium my-8">Vamos a validar tu participación y, si todo es correcto, recibirás un correo electrónico con los detalles necesarios para recibir tus jerseys.</p>
                        <p class="font-montserrat rem:text-[21px] rem:leading-[26px] uppercase font-extrabold">CONSERVA EL TICKET DE COMPRA ORIGINAL, PODRÍAMOS PEDÍRTELO PARA VALIDAR TU PARTICIPACIÓN.</p>
                    </div>
                </div>
            </div>
        </div>
        <whitePatternInsideDown />

    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import whitePatternInside from "@/Components/inside/whitePatternInside.vue";
import whitePatternInsideDown from "@/Components/inside/whitePatternInsideDown.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

</script>
