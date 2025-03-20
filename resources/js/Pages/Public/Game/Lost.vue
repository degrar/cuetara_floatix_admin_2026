<template>
    <GuestLayout title="Tu compra no está premiada" menu>
        <div class="container mx-auto p-4 py-20 flex flex-col lg:flex-row justify-center items-center lg:items-start text-white">
            <div class="mx-auto max-w-[750px] w-full">
                <img src="../../../../../resources/images/game/yatekomo.png" alt="Yatekomo" class="max-w-[220px] w-full mx-auto"/>
                <h1 class="text-center text-red font-ferry uppercase text-2xl lg:text-4xl rem:tracking-[0.15px]">¡YA TIENES UNA PARTICIPACIÓN PARA EL VIAJE A JAPÓN!</h1>
                <div class="mx-auto max-w-[580px] w-full">
                    <p class="text-center font-ferry text-sm lg:text-lg mt-4 text-black">Tu compra no está premiada con uno de los regalos diarios que entregamos cada día.</p>
                    <p class="text-center font-montserrat text-sm lg:text-base mb-4 text-black">¡Pero no te preocupes! Puedes volver a participar con otros Yatekomo.</p>
                    <p class="text-center font-ferry text-sm lg:text-lg text-black">Además, con cada Yatekomo tienes una participación más para el VIAJAZO A JAPÓN.</p>
                    <p class="text-center font-montserrat text-sm lg:text-base my-4 text-black">¿TIENES OTRO TICKET?</p>
                    <div class="text-center">
                        <PrimaryButton :secondary="true" :href="route('home')" class="inline-block">Participa</PrimaryButton>
                    </div>
                </div>
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
