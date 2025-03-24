<template>
    <footer class="bg-black py-[30px]">
        <div class="container mx-auto px-4">
            <nav class="">
                <ul class="flex justify-center items-center flex-col m-0 p-0 xl:flex-row">
                    <li>
                        <PrimaryLinkFooter  :href="route('legal')" :active="route().current('legal')" target="_blank">Bases legales</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('privacy')" :active="route().current('privacy')" target="_blank">Política de privacidad</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('cookies')" :active="route().current('cookies')">Política de cookies</PrimaryLinkFooter>
                    </li>
                    <li>
                        <PrimaryLinkFooter :href="route('nota-legal')" :active="route().current('nota-legal')" target="_blank">Aviso legal</PrimaryLinkFooter>
                    </li>

<!--                    <li>-->
<!--                        <PrimaryLinkFooter id="ot-sdk-btn">Modificar cookies</PrimaryLinkFooter>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <PrimaryLinkFooter :href="route('contact')" :active="route().current('contact')">Contacto</PrimaryLinkFooter>-->
<!--                    </li>-->

                </ul>
            </nav>
            <p class="text-center mt-[20px] font-montserrat text-sm tracking-tighter text-white mx-auto max-w-6xl w-full">
                © 2017 Nintendo Co., Ltd. Nintendo Switch is a trademark of Nintendo.<br><br>
                Promoción dirigida a residentes en España mayores de 18 años, válida del 1 de abril al 15 de mayo de 2025, ambos inclusive. Sorteo de 44 códigos de 50 € para suscripciones a plataformas y 9 consolas a través de momentos ganadores, así como un sorteo ante notario de un viaje a Japón para 4 personas valorado en 12.000 €. El sorteo se realizará la primera quincena de junio de 2025. Premio limitado a uno por mecánica de participación. Se requiere conservar el tique original de compra empleado para participar. Bases legales depositadas ante notario y disponibles <a class="hover:underline" :href="route('legal')">aquí</a>.
            </p>
        </div>
    </footer>
</template>

<script setup>

import PrimaryLinkFooter from "@/Components/PrimaryLinkFooter.vue";

const showCcPrefs = () => window.cc.showPreferences();
</script>

