<template>
    <GuestLayout title="Politica de cookies" menu>
        <div class="container mx-auto px-4 flex justify-center items-center flex-col py-[40px] lg:flex-row lg:py-[80px] ">
            <div class="w-12/12  pt-4" >
                <h1 class="text-center text-red font-ferry uppercase text-2xl lg:text-4xl rem:tracking-[0.15px] mb-8">Política de cookies</h1>


                <p>Desde THE GB FOODS, S.A. le informamos de que la presente página web usa cookies según se describe en la presente Política.</p>

                <div id="ot-sdk-cookie-policy" class="">

                </div>

                <h4>¿CÓMO CAMBIAR LA CONFIGURACIÓN DE LAS COOKIES?</h4>
                <p>Puede ajustar su configuración de cookies o rechazar el uso de las cookies por grupo denegando su instalación accediendo al Panel de configuración uso de cookies /siguiente botón.</p>
                <div class="flex justify-center py-4">
                    <button id="ot-sdk-btn" class="ot-sdk-show-settings">Cookie Settings</button>
                </div>
                <p>Asimismo, puede permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones del navegador en cualquier momento, siguiendo los pasos que encontrará en los siguientes enlaces:</p>
                <ul>
                    <li>Para más información sobre Mozilla Firefox, pulse <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias?redirectslug=habilitar-y-deshabilitar-cookies-que-los-sitios-we&redirectlocale=es" target="_blank">aquí</a></li>
                    <li>Para más información sobre Google Chrome, pulse <a href="https://support.google.com/chrome/answer/95647?hl=es" target="_blank">aquí</a>.</li>
                    <li>Para más información sobre Internet Explorer, pulse <a href="https://support.microsoft.com/es-es/windows/administrar-cookies-en-microsoft-edge-ver-permitir-bloquear-eliminar-y-usar-168dab11-0753-043d-7c16-ede5947fc64d" target="_blank">aquí</a>.</li>
                    <li>Para más información sobre Microsoft Edge, pulse <a href="https://support.microsoft.com/es-es/windows/microsoft-edge-datos-de-exploraci%C3%B3n-y-privacidad-bb8174ba-9d73-dcf2-9b4a-c582b4e640dd" target="_blank">aquí</a>.</li>
                    <li>Para más información sobre Safari, pulse <a href="https://support.apple.com/es-es/HT201265" target="_blank">aquí</a></li>
                    <li>Para más información sobre Opera, pulse <a href="https://help.opera.com/en/latest/web-preferences/#cookies" target="_blank">aquí</a>.</li>
                </ul>

                <p>El usuario puede revocar su consentimiento para el uso de cookies en su navegador siguiendo las indicaciones anteriores o mediante un sistema de rechazo (“opt-out”) en su navegador web.</p>
                <ul>
                    <li>Facebook: <a href="https://www.facebook.com/ads/settings" target="_blank">preferencias de anuncios, configuración de anuncios</a></li>
                    <li>Google: <a href="https://chrome.google.com/webstore/detail/iba-opt-out-by-google/gbiekjoijknlhijdjbaadobpkdhmoebb?hl=es" target="_blank">complemento de inhabilitación de Google Analytics, desactivar personalización de anuncios, extensión de Google Chrome para "opt-out" de las cookies publicitarias de DoubleClick</a></li>
                </ul>
                <p>Sin perjuicio de lo anterior, debe tener en cuenta que deshabilitar las cookies podría afectar al correcto funcionamiento de determinadas secciones y contenidos del sitio web. Si decide no aceptar o bloquear determinadas cookies, puede que esto afecte, total o parcialmente, al funcionamiento normal del sitio web o que impida el acceso a algunos servicios de este.</p>

                <h4>INFORMACIÓN SOBRE PROTECCIÓN DE DATOS PERSONALES</h4>
                <p>A continuación le facilitamos información sobre el tratamiento de datos personales. Para más información sobre el tratamiento de datos puedes consultar nuestra Política de Privacidad (pendiente ).</p>

                <h5>Base jurídica del tratamiento</h5>
                <p>La base jurídica del tratamiento es el consentimiento prestado para el uso de cookies. Como indicado, puede revocar este consentimiento según se indica en el apartado “¿CÓMO CAMBIAR LA CONFIGURACIÓN DE LAS COOKIES?”.</p>

                <h5>Elaboración de perfiles</h5>
                <p>Si usted acepta el uso de cookies de publicidad comportamental, se creará un perfil para mostrarle publicidad personalizada, según se describe en el apartado “QUÉ COOKIES UTILIZAMOS”. Las categorías de datos que se utilizan para la creación de perfiles se especifican en el subapartado anterior. Consulte la información adicional que ofrecen los terceros en dicho apartado.</p>

                <h5>Destinatarios de los datos</h5>
                <p>Si acepta el uso de cookies, las entidades identificadas en el apartado “QUÉ COOKIES UTILIZAMOS” tratarán los datos recabados por medio de dichas tecnologías para los fines que ahí se indican. En ese mismo apartado, puede consultar a su vez la información que ofrecen estos terceros sobre sus destinatarios.</p>

                <h5>Transferencias a terceros países</h5>
                <p>Le informamos que THE GB FOODS, S.A. no realiza transferencias de datos personales fuera del Espacio Económico Europeo.</p>
                <p>Respecto de las cookies de terceros, por parte de Google/Youtube y Facebook se realizan transferencias internacionales de datos a los Estados Unidos de América. Puedes identificar en los siguientes enlaces los mecanismos establecidos para asegurar un nivel de protección adecuado al Reglamento General Europeo de Protección de Datos personales.</p>
                <ul>
                    <li>Información sobre transferencias internacionales de datos por Google/Youtube <a href="https://policies.google.com/privacy/frameworks?hl=es-419" target="_blank">(marcos de transferencias de datos)</a>.</li>
                    <li>Información sobre transferencias internacionales de datos por Facebook <a href="https://es-es.facebook.com/privacy/explanation" target="_blank">(transferencias de datos)</a>.</li>
                </ul>

                <h4>ACTUALIZACIONES Y CAMBIOS EN LA POLÍTICA DE COOKIES</h4>
                <p>Podemos modificar esta política de cookies para adecuarla a las cookies que utilizamos, así como en función de nuevas exigencias legislativas, reglamentarias, o con la finalidad de adaptar dicha política a las instrucciones dictadas por las autoridades competentes.</p>
                <p>Cuando se produzcan cambios significativos en esta política de cookies se comunicará al usuario mediante un aviso informativo en el sitio web. Si desea más información sobre qué uso hacemos de las cookies, puede enviarnos un e-mail a dataprivacy@thegbfoods.com</p>
                <p class="text-right">Última actualización: marzo de 2025</p>


            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";


</script>

<style scoped>
h4, h3 {
    @apply text-black font-ferry text-xl p-0 mb-5 mt-10;
}

h5 {
    @apply text-black font-ferry text-lg p-0 mb-2 mt-8;
}

h6 {
    @apply text-black font-ferry text-lg p-0 mb-2 mt-5;
}

p, a {
    @apply text-black font-montserrat text-base mb-2 mt-2;
}

a {
    @apply text-black font-montserrat underline ;
}

ul {
    list-style: disc;
    @apply pl-8;
}

ul > li {
    @apply text-black font-montserrat text-base mb-2 mt-2;
}


</style>