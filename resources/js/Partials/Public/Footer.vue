<template>
    <footer class="bg-white py-8 relative after:absolute after:top-[-92px] after:right-0 after:left-0 after:w-full after:mx-auto after:bg-curveYellow after:bg-no-repeat after:bg-center after:bg-[length:2560px_92px] after:h-[92px]">
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
                        <PrimaryLinkFooter :href="route('faqs')" :active="route().current('faqs')">FAQS</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('contact')" :active="route().current('contact')">Contacto</PrimaryLinkFooter>
                    </li>

                </ul>
            </nav>
            <p class="text-center w-full max-w-[1024px] mx-auto mt-[20px]">
                Promoción válida en España para mayores de 18 años del 9/9/2024 al 9/11/2024. Máximo 1 participación al día por persona durante la promoción. Se entregan por momento ganador 2 premios cada semana. Limitada a 1 premio por persona. Consulta bases legales y detalles de la promoción <a class="underline" :href="route('legal')">aquí</a>.
            </p>
        </div>
    </footer>
</template>

<script setup>

import PrimaryLinkFooter from "@/Components/PrimaryLinkFooter.vue";
</script>

