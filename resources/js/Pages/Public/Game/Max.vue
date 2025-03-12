<template>
    <GuestLayout title="Máximo de participaciones" menu>
        <div class="container mx-auto p-4 py-20 flex flex-col lg:flex-row justify-center items-center lg:items-start text-white">
            <div class="mx-auto max-w-[420px] w-full">
                <img src="../../../../../resources/images/game/yatekomo.png" alt="Yatekomo" class="max-w-[220px] w-full mx-auto"/>
                <h1 class="text-center text-red font-ferry uppercase text-2xl lg:text-4xl rem:tracking-[0.15px] drop-shadow-xl">Participa el próximo mes</h1>
                <p class="text-center font-ferry text-sm lg:text-lg mt-4 lg:mt-6 text-black">YA has superado el límite de 5 participaciones por mes.</p>
                <p class="text-center font-montserrat text-sm lg:text-base my-2 text-black">¡Pero no te preocupes! El próximo mes seguro que es tu oportunidad.</p>
                <p class="text-center font-montserrat text-sm lg:text-base mt-6 text-black">¡Gracias!</p>
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
