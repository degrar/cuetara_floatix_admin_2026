<template>
    <GuestLayout title="Ganador" menu>
        <InsideHeaderPage />

        <div class="bg-yellow">
            <div class="container mx-auto px-[15px] py-10 flex flex-row justify-center">
                <div class="max-w-[400px] w-full mx-auto">
                    <img src="../../../../images/winner.png" alt="Telescopio" class=" pb-5"/>
                </div>
                <div class="max-w-[570px] w-full mx-auto">
                    <h1 class="rem:text-[60px] font-hermes text-brown uppercase leading-[62px] tracking-[.6px] text-center my-6">¡HAS GANADO!</h1>
                    <p class="max-w-[470px] w-full mx-auto rem:text-[55px] font-tekoMedium text-brown leading-[58px] tracking-[.35px] text-center ">¡Los astros te sonríen!</p>
                    <p class="max-w-[470px] w-full mx-auto rem:text-[35px] font-tekoMedium text-brown leading-[36px] tracking-[.35px] text-center ">Vamos a validar tu participación y, si todo es correcto, recibirás un correo electrónico con los detalles necesarios para recibir tu telescopio.</p>

                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";


</script>
