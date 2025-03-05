<template>
    <GuestLayout title="404" menu>
        <div class="container mx-auto p-4 py-20 flex flex-col lg:flex-row justify-center items-center lg:items-start text-white">
            <div class="mx-auto max-w-[420px] w-full">
                <img src="../../../../resources/images/game/yatekomo.png" alt="Yatekomo" class="max-w-[220px] w-full mx-auto"/>
                <h1 class="text-center text-red font-ferry uppercase text-2xl lg:text-4xl rem:tracking-[0.15px] drop-shadow-xl">UPS, PARECE QUE AQUÍ NO HAY NADA</h1>
                <p class="text-center font-montserrat text-sm lg:text-base my-2 text-black">La página que buscas no existe o ha cambiado de ubicación.</p>
                <p class="text-center font-montserrat text-sm lg:text-base mt-6 text-black">Vuelve a intentarlo de nuevo. Gracias.</p>
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
