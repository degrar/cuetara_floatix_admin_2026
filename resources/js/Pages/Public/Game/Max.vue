<template>
    <GuestLayout title="Máximo de participaciones" menu>

        <whitePatternInside />
        <div class="bg-whitePattern py-[50px]">
            <div class="container mx-auto px-[15px] py-5 pb-[100px] lg:py-10 flex flex-col-reverse lg:flex-row justify-center items-center lg:items-start">
                <div class="mx-auto w-5/12">
                    <img src="../../../../images/nutella/max.png" alt="Nutella" class="max-w-[484px] w-full mx-auto"/>
                </div>
                <div class="mx-auto w-7/12">
                    <h4 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[41px] rem:leading-[41px] rem:tracking-[0px]">MÁXIMO DE PARTICIPACIONES SUPERADO</h4>
                    <p class="max-w-[530px] w-full font-montserrat rem:text-[21px] rem:leading-[21px] uppercase font-medium mt-6">Lo sentimos, esta promoción está limitada a 5 participaciones diarias, pero no te preocupes, <span class="font-extrabold">puedes volver a intentarlo mañana.</span></p>
                    <p class="font-montserrat rem:text-[21px] rem:leading-[21px] uppercase font-medium mt-8 mb-4">¡Te esperamos!</p>

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
