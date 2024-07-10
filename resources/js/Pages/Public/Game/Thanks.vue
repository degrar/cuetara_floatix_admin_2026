<template>
    <GuestLayout title="Datos recibidos" menu>
        <InsideHeaderPage />

        <div class="bg-yellow pb-[100px]">
            <div class="container mx-auto px-[15px] py-5 pb-[100px] lg:py-10">

                    <h1 class="mx-auto max-w-[780px] mx-auto font-hermes text-brown uppercase rem:text-[33px] leading-[35px] tracking-[-0.33px] lg:rem:text-[60px] lg:leading-[62px] lg:tracking-[.6px] text-center my-6">¡DATOS RECIBIDOS CORRECTAMENTE!</h1>
                    <p class="mx-auto max-w-[780px] mx-auto  font-tekoMedium text-brown rem:text-[31px] rem:leading-[31px] rem:tracking-[.35px] lg:rem:text-[35px] lg:rem:leading-[36px] lg:rem:tracking-[.35px] text-center ">Una vez validada tu participación te enviaremos tu fantástico premio en un plazo máximo de 20 días.</p>

            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";

</script>
