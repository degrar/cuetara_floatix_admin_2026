<template>
    <footer id="duplex" class="bg-white py-[60px]">
        <div class="container mx-auto px-[15px]">
            <p class="text-center w-full max-w-[1024px] mx-auto mt-[20px] ">
                Promoción válida para residentes en España mayores de 18 años del 17/10/2024 al 8/01/2025. Imprescindible conservar el ticket de compra original. Máximo 5 participaciones diarias por persona. Limitada a 1 premio de 2 jerséis por persona en todo el período promocional. Se entregan 650 premios por momento ganador de 2 jerséis, en total se ofrecen 1.300 jerséis. Consulta bases legales y detalles de la promoción <a class="underline text-black font-bold" :href="route('legal')">aquí</a>.
            </p>
            <nav class="mt-5">
                <ul>
                    <li>
                        <PrimaryLinkFooter :href="route('home')" :active="route().current('home')">Inicio</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter  :href="route('legal')" :active="route().current('legal')">Bases promocionales</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('faqs')" :active="route().current('faqs')">FAQS</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('contact')" :active="route().current('contact')">Contacto</PrimaryLinkFooter>
                    </li>

                </ul>
            </nav>

        </div>
    </footer>
</template>

<script setup>

import PrimaryLinkFooter from "@/Components/PrimaryLinkFooter.vue";
</script>

