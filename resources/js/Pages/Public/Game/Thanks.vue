<template>
    <GuestLayout title="Datos recibidos" menu>
        <div class="container mx-auto p-4  flex flex-col lg:flex-row justify-center items-center lg:items-start">
            <div class="mx-auto w-12/12 lg:w-7/12">
                <h4 class="text-center lg:text-left stroke-text smooth-16 text-yellow font-roboto font-extrabold uppercase rem:text-[28px] rem:leading-[32px] lg:rem:text-[41px] lg:rem:leading-[41px] rem:tracking-[0px]">¡DATOS ENVIADOS CORRECTAMENTE!</h4>
                <p class="text-center lg:text-left font-roboto rem:text-[18px] rem:leading-[25px] lg:rem:text-[21px] lg:rem:leading-[26px] uppercase font-medium mt-6">Vamos a validarlos y te enviaremos un Correo electrónico confirmando el envío de tu premio. Revisa también la bandeja de spam, puedes haberlo recibido directamente ahí.</p>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import whitePatternInside from "@/Components/inside/whitePatternInside.vue";
import whitePatternInsideDown from "@/Components/inside/whitePatternInsideDown.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

</script>
