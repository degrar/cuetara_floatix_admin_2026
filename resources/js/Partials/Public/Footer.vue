<template>
    <footer class="bg-white py-8">
        <div class="container mx-auto px-[15px]">

            <nav>
                <ul>
                    <li>
                        <PrimaryLinkFooter :href="route('home')" :active="route().current('home')">Inicio</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter  :href="route('legal')" :active="route().current('legal')">Bases promocionales</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('privacy')" :active="route().current('privacy')">Política de privacidad</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('contact')" :active="route().current('contact')">Contacto</PrimaryLinkFooter>
                    </li>

                </ul>
            </nav>
            <p class="text-brown font-roboto rem:text-[14px] mt-[15px] text-center w-full max-w-[1024px] mx-auto">
                Promoción válida en España mayores de 18 años del 20/5/2024 al 7/07/2024. Imprescindible conservar el ticket de compra original. Máximo 1 participaciones diarias por persona. Limitada a 1 premio por momento ganador por persona en todo el período promocional. Se entregan 14 premios por momento ganador. <br>Consulta bases legales y detalles de la promoción <a class="underline font-robotoBold" :href="route('legal')">aquí</a>.
            </p>
            <p class="text-brown font-roboto rem:text-[14px] mt-[15px] text-center w-full max-w-[1024px] mx-auto">©Funko2024 ©WBEI<br>©Ferrero Group. All rights reserved.</p>
        </div>
    </footer>
</template>

<script setup>

import PrimaryLinkFooter from "@/Components/PrimaryLinkFooter.vue";
</script>

