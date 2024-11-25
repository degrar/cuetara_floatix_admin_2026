<template>
    <footer id="duplex" class="bg-white py-[60px]">
        <div class="container mx-auto px-[15px]">
            <p class="text-center w-full max-w-[1024px] mx-auto mt-[20px] ">
                Promoción válida del 3 de marzo al 27 de abril de 2025 para mayores de 18 años y residentes en España. La compra de un producto Vileda en promoción da derecho a una única participación. Máximo 5 participaciones por persona al mes. Entrega de un  premio  de 200 € al día por momento ganador. Premio limitado a 1 por persona e IBAN. Imprescindible conservar el tique de compra original. Bases depositadas ante notario y disponibles <a class="underline text-black font-bold" :href="route('legal')">aquí</a>.
            </p>
            <nav class="mt-5">
                <ul>
                    <li>
                        <PrimaryLinkFooter :href="route('home')" :active="route().current('home')">Inicio</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter  :href="route('legal')" :active="route().current('legal')">Bases legales</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('privacy')" :active="route().current('faqs')">Política de privacidad</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('legal')" :active="route().current('faqs')">Aviso legal</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('contact')" :active="route().current('contact')">Contacto</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter @click="showCcPrefs">Modificar cookies</PrimaryLinkFooter>
                    </li>
                </ul>
            </nav>

        </div>
    </footer>
</template>

<script setup>

import PrimaryLinkFooter from "@/Components/PrimaryLinkFooter.vue";

const showCcPrefs = () => window.cc.showPreferences();
</script>

