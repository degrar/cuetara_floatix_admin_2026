<template>
    <GuestLayout title="¡Ya tenemos lo que necesitábamos!" menu>
        <div class="container mx-auto p-4 py-20 flex flex-col lg:flex-row justify-center items-center lg:items-start text-white">
            <div class="mx-auto max-w-[820px] w-full">
                <img src="../../../../../resources/images/game/yatekomo.png" alt="Yatekomo" class="max-w-[220px] w-full mx-auto"/>
                <h1 class="text-center text-red font-ferry uppercase text-2xl lg:text-4xl  rem:tracking-[0.15px] drop-shadow-xl">¡Ya tenemos lo que necesitábamos!</h1>
                <p class="mx-auto max-w-[650px] w-full text-center font-montserrat text-sm lg:text-base my-2 text-black">Ahora vamos a validar tu participación y, si todo es correcto, recibirás tu premio en un plazo máximo de 30 días.</p>
                <p class="mx-auto max-w-[650px] w-full text-center font-ferry text-sm lg:text-lg mt-6 text-black">Y recuerda, ¡puedes seguir sumando participaciones para el viajazo a Japón!</p>
                <p class="mx-auto max-w-[650px] w-full text-center font-montserrat text-sm lg:text-base mt-6 text-black">Gracias y ¡a seguir disfrutando de tus Yatekomo!</p>
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
