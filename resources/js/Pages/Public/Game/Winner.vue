<template>
    <GuestLayout title="Ganador" menu>
        <InsideHeaderPage />

        <div class="bg-yellow pb-[100px]">
            <div class="container mx-auto px-[15px] py-5 pb-[100px] lg:py-10 flex flex-col-reverse lg:flex-row justify-center items-center lg:items-start">
                <div class="max-w-[230px] lg:max-w-[400px] w-full mx-auto">
                    <img src="../../../../images/winner.png" alt="Telescopio" class=" py-5"/>
                </div>
                <div class="max-w-[570px] w-full mx-auto">
                    <h1 class="font-hermes text-brown uppercase rem:text-[33px] leading-[35px] tracking-[-0.33px] lg:rem:text-[60px] lg:leading-[62px] lg:tracking-[.6px] text-center my-6">¡HAS GANADO!</h1>
                    <p class="max-w-[470px] w-full mx-auto  font-tekoMedium text-brown rem:text-[31px] rem:leading-[31px] rem:tracking-[.35px] lg:rem:text-[35px] lg:rem:leading-[36px] lg:rem:tracking-[.35px] text-center">¡Los astros te sonríen!</p>
                    <p class="max-w-[470px] w-full mx-auto  font-tekoMedium text-brown rem:text-[31px] rem:leading-[31px] rem:tracking-[.35px] lg:rem:text-[35px] lg:rem:leading-[36px] lg:rem:tracking-[.35px] text-center mt-2">Vamos a validar tu participación y, si todo es correcto, recibirás un correo electrónico con los detalles necesarios para recibir tu telescopio.</p>

                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";


</script>
