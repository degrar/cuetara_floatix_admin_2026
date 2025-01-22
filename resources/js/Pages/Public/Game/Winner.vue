<template>
    <GuestLayout title="Tu compra está premiada" menu>
        <div class="container mx-auto p-4 py-20 flex flex-col lg:flex-row justify-center items-center lg:items-start text-white">
            <div class="mx-auto max-w-[750px] w-full">
                <template v-if="prize === 1">
                    <img  src="../../../../../resources/images/prizes/switch.png" alt="Nintendo" class="max-w-[220px] w-full mx-auto"/>
                    <h1 class="text-center text-red font-ferry uppercase text-4xl rem:tracking-[0.15px] mt-6">¡TU COMPRA ESTÁ PREMIADA CON UNA UNA NINTENDO SWITCH!</h1>
                    <p class="text-center font-ferry text-sm lg:text-lg mt-4 text-black">¡Enhorabuena!</p>
                </template>

                <template v-else-if="prize === 2">
                    <img src="../../../../../resources/images/prizes/cards.png" alt="Tarjetas" class="max-w-[220px] w-full mx-auto"/>
                    <h1 class="text-center text-red font-ferry uppercase text-4xl rem:tracking-[0.15px] mt-6">¡TU COMPRA ESTÁ PREMIADA CON UNA SUSCRIPCIÓN!</h1>
                    <p class="text-center font-ferry text-sm lg:text-lg mt-4 text-black">¡Enhorabuena! Has ganado una suscripción de 50 € a tu plataforma de streaming.</p>
                </template>

                <div class="mx-auto max-w-[580px] w-full">
                    <p class="text-center font-montserrat text-sm lg:text-base mb-4 text-black">Para proceder con la validación y la gestión de tu premio, necesitamos que nos facilites algunos datos. Si no puedes gestionarlo ahora, no te preocupes porque te acabamos de enviar un e-mail con la misma información.</p>
                    <p class="text-center font-montserrat text-sm lg:text-base mb-4 text-black">Recuerda que dispones de <span class="font-bold">7 días naturales para solicitar tu premio</span> si no, entenderemos que <span class="font-bold">renuncias al premio.</span></p>
                    <div class="text-center">
                        <PrimaryButton :href="route('more-info', { token })" class="inline-block">¡Vamos allá!</PrimaryButton>
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
import {usePage} from "@inertiajs/vue3";

const prize = usePage().props.prize;
const token = usePage().props.token;
</script>

