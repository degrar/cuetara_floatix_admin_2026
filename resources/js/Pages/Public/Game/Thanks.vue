<template>
    <GuestLayout title="Datos recibidos" menu>
        <whitePatternInside />
        <div class="bg-whitePattern py-[50px]">
            <div class="container mx-auto px-[15px] py-5 pb-[100px] lg:py-10 flex flex-col-reverse lg:flex-row justify-center items-center lg:items-start">
                <div class="mx-auto w-5/12">
                    <img src="../../../../images/nutella/max.png" alt="Nutella" class="max-w-[484px] w-full mx-auto"/>
                </div>
                <div class="mx-auto w-7/12">
                    <h4 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[41px] rem:leading-[41px] rem:tracking-[0px]">¡DATOS ENVIADOS CORRECTAMENTE!</h4>

                    <p class="font-montserrat rem:text-[21px] rem:leading-[26px] uppercase font-medium mt-6">Vamos a validarlos y te enviaremos un Correo electrónico confirmando el envío de tu premio. Revisa también la bandeja de spam, puedes haberlo recibido directamente ahí.</p>
                    <div class="box bg-red rounded-2xl flex flex-row justify-end relative py-[10px] px-[25px] my-[25px]">
                        <img src="../../../../images/nutella/instagram.png" alt="Instagram" class="max-w-[90px] w-full mx-auto absolute left-[30px] m-auto top-0 bottom-0"/>
                        <div>
                            <p class="font-montserrat uppercase text-yellow rem:text-[16px] font-extrabold">¡COMPARTE UNA FOTO LUCIENDO TU PREMIO!</p>
                            <p class="font-montserrat font-medium text-white rem:text-[16px]">Etiquétanos <span class="text-yellow font-extrabold">@nutella.es</span> y añade el hashtag #nutellawithlove</p>
                        </div>
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
