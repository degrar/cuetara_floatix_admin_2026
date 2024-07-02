<template>
    <GuestLayout title="Participaciones máximas" menu>
        <InsideHeaderPage />

        <div class="bg-yellow">
            <div class="container mx-auto px-[15px] py-10 flex flex-row justify-center">
                <div class="max-w-[400px] w-full mx-auto">
                    <img src="../../../../images/astro.png" alt="kinder" class=" pb-5"/>
                </div>
                <div class="max-w-[570px] w-full mx-auto">
                    <h1 class="rem:text-[60px] font-hermes text-brown uppercase leading-[62px] tracking-[.6px] text-center my-6">NÚMERO DE PARTICIPACIONES SUPERADAS</h1>
                    <p class="max-w-[470px] w-full mx-auto rem:text-[35px] font-tekoMedium text-brown leading-[36px] tracking-[.35px] text-center ">Sabemos que quieres mirar las estrellas pero sólo puedes participar 1 vez al día. ¡Prueba suerte otra vez mañana!</p>

                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";


</script>
