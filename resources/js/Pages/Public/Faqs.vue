<template>
    <GuestLayout title="FAQS" menu inside>
        <InsideHeaderPage />
        <div class="bg-yellow pb-[100px]">
            <div class="container mx-auto px-[15px] flex justify-center items-center flex-col py-[40px] lg:flex-row lg:py-[80px] ">
                <div class="w-12/12  pt-[15px]">

                    <div class="px-4 font- font-tekoRegular text-grey">
                        <h1 class="rem:text-[60px] font-hermes text-brown uppercase rem:leading-[62px] tracking-[-0.6px] text-center mb-[50px] block">Preguntas Frecuentes</h1>

                        <h4 id="1" @click="toggleCollapsible(1)"><span>1- Normas de la promoci&oacute;n</span></h4>
                        <div class="collapsible" :class="{'active': active === 1}" data-parent="#1">
                            <h5>1.1.-Quién puede participar</h5>
                            <p>Pueden participar todos los mayores de 18 años residentes en España que hayan adquirido uno de los productos promocionales.</p>
                            <p>La participación debe ser realizada por el propio interesado. No está permitido participar en nombre de terceras personas.</p>
                            <p>Quedan excluidos de esta Promoción los propietarios, empleados, y otros colaboradores de FERRERO que hayan participado en el desarrollo y gestión de la presente promoción, así como sus respectivos familiares ascendientes, descendientes, cónyuges o parejas de hecho. Asimismo, el organizador se reserva el derecho a evitar que sobre esta Promoción se establezcan sistemas de especulación o de negocios, en cuyo caso, podrá ejercer aquellas acciones legales que estime oportunas.</p>

                            <h5>1.2.-Productos en promoción</h5>
                            <h6>1.2.1-Cuáles son los productos que entran en la promoción</h6>
                            <p>Los productos que dan derecho a participar en la presente Promoción son:</p>
                            <ul>
                                <li>Kinder® Sorpresa: T1, T3 y T3x2. Todos los formatos que participen en la promoción deben llevar la comunicación promocional de Space Mission.</li>
                                <li>Kinder® Chocolate: T4, T8, T12, T16 y T24. Los formatos de Kinder Chocolate no llevan la promoción anunciada en el pack.</li>
                            </ul>

                            <h6>1.2.2-Descripción</h6>
                            <p>Aquí tienes una imagen de nuestro producto para que puedas identificarlo fácilmente en el supermercado o tienda de alimentación.</p>

                            <h6>1.2.3-Dónde comprarlo</h6>
                            <p>Puedes adquirir los productos en los principales supermercados y tiendas de alimentación.</p>

                            <h5>1.3.-Fechas</h5>
                            <h6>1.3.1-Periodo de participación</h6>
                            <p>Podrás participar para conseguir uno de los regalos de la promoción a través de la web de la promoción entre el 9 de septiembre de 2024 y el 9 de noviembre de 2024, ambos incluidos.</p>
                            <p><strong>¿Quiero participar, pero dice “Promoción finalizada”?</strong></p>
                            <p>Este mensaje aparece en la web cuando la promoción ha concluido. Lo lamentamos, pero ya no puedes participar.</p>

                            <h6>1.3.2-Periodo de reclamación</h6>
                            <p>El plazo para realizar cualquier tipo de reclamación acerca de la participación es de dos (2) meses, tras la finalización de la promoción, es decir, hasta el 9 de enero de 2025 para la campaña promocional.</p>
                            <h5>1.4-Prueba de compra</h5>

                            <h6>1.4.1-Pack</h6>
                            <p>Los productos promocionales se deben comprar durante el plazo promocional, cada pack individual o multipack podrá ser utilizado una (1) sola vez por un (1) único participante y equivaldrá a una única (1) participación.</p>
                            <p>Debes el/los envoltorio/s original/es del pack con el que participas. La organizadora se reserva el derecho a solicitártelo.</p>
                            <p>El envoltorio debe mostrarse completo con todos sus elementos, debe permitir identificar el producto y el formato de manera clara y nítida. Sentimos informarte que si el pack de Kinder Sorpresa que dispones no lleva identificada la promoción no puedes participar en la promoción.</p>

                            <h6>1.4.2-Presentar pruebas de compra</h6>
                            <p>En el caso de tener que enviar los envoltorios, tiques y/o facturas originales a petición de FERRERO, es recomendable que conserves una fotocopia, para enviar el original a la siguiente dirección:</p>
                            <p>WTC Almeda Park,<br>Plaça de la Pau s/n Edificio 2, Planta 3ª,<br>08940 Cornellà de Llobregat (Barcelona) España.</p>
                            <p>No se devolverán al participante los envoltorios, tiques y/o pruebas de compra presentadas.</p>

                            <h5>1.5-Vías de participación</h5>
                            <p>La única vía para poder participar en la campaña promocional es a través de la página oficial de la Promoción: https://www.kinder.com/es/es/.</p>

                            <h5>1.6-Límites de participación</h5>
                            <p>El participante tiene derecho a una (1) participación diaria con packs/embalajes diferentes que no hayan sido utilizados anteriormente. Si tiene más packs debe esperar y utilizarlos los días siguientes o el día que considere, siempre que esté dentro del período promocional.</p>
                            <p>Una vez utilizado el pack quedará automáticamente invalidado.</p>
                            <p>Una misma persona podrá resultar ganadora de un (1) solo premio en toda la promoción.</p>

                            <h5>1.7-Reglamento completo Bases Legales</h5>
                            <p>Puedes consultar las Bases Legales de la promoción en el siguiente enlace: <a target="_blank" :href="route('legal')">https://www.kinder.com/es/es/</a>.</p>
                        </div>

                        <h4 id="2" @click="toggleCollapsible(2)"><span>2- Participaci&oacute;n </span></h4>
                        <div class="collapsible" :class="{'active': active === 2}" data-parent="#2">
                            <h5>2.1.-Participar</h5>
                            <h6>2.1.1- Completa el formulario</h6>

                            <p>Para participar en la promoción debes completar el formulario del apartado PARTICIPA. Estos son los datos personales que te solicitaremos en el formulario:</p>

                            <ul>
                                <li>Nombre</li>
                                <li>Primer apellido</li>
                                <li>Segundo apellido</li>
                                <li>Tu e-mail</li>
                                <li>Imagen de tu pack</li>
                            </ul>
                            <p>Para completar el formulario es imprescindible marcar:</p>
                            <ul>
                                <li>Checkbox conforme eres mayor de 18 años.</li>
                                <li>Checkbox en el que aceptas las <a target="_blank" :href="route('legal')">Bases Legales de la promoción</a>.</li>
                                <li>Checkbox en el que aceptas la <a target="_blank" :href="route('privacy')">política de protección de Privacidad</a>.</li>
                            </ul>
                            <p>Adicionalmente se ofrece el checkbox para que puedas manifestar si deseas o no RECIBIR comunicaciones comerciales de los productos de Ferrero Ibérica S.A.</p>

                            <ul>
                                <li>Botón "PARTICIPA" Si pulsas sobre el botón y has completado el formulario correctamente, has registrado tu participación correctamente y sabrás al instante si has resultado ganador.</li>
                            </ul>

                            <p>En caso de que no se complete el formulario, o se haga con datos incorrectos y/o incompletos se te informará. Lee detenidamente el error y revisa los datos.</p>

                            <h6>2.1.2 -No puedo completar el formulario</h6>

                            <p>Posibles errores que debes corregir si te sale este error en pantalla:</p>

                            <ul>
                                <li><strong>Datos incorrectos o erróneos.</strong> Este mensaje aparece por qué no está correctamente cumplimentado el formulario, te aparecerán resaltados los campos que están en conflicto para que los revises y corrijas.</li>
                                <li><strong>E-mail inválido.</strong> Comprueba que el campo “e-mail” está escrito correctamente, comprueba que no hay espacios en blanco ni delante ni detrás, sobretodo si participas desde el móvil, evitar utilizar la función "autocompletar del navegador", una vez esté bien escrito podrás finalizar el formulario.</li>
                                <li><strong>Cookies.</strong> Si no aceptas las cookies de la web, es posible que no puedas completar el registro, o que las funcionalidades de la web no se activen correctamente. Si tienes bloqueos generales de cookies y/o ventanas emergentes recomendamos acceder a la promoción a través de una ventana de incógnito.</li>
                                <li><strong>“PARTICIPA” no funciona.</strong> Seguramente algún programa de tu dispositivo esté bloqueado las cookies de la web y por lo tanto su correcto funcionamiento, te recomendamos utilizar el modo oculto/incógnito de tu navegador web y si persiste acceder desde un dispositivo diferente.</li>
                                <li><strong>Confirma que tienes más de 18 años.</strong> Si te sale esta alerta es porque no has marcado el checkbox confirmando que eres mayor de edad. Si no eres mayor de edad no podrás participar.</li>
                                <li><strong>Acepta las Bases Legales de la promoción.</strong> Si te sale esta alerta es porque no has marcado el checkbox confirmando que aceptas las Bases Legales de la promoción. Si tras leerlas estás conforme con ellas, marca el casillero y podrás participar.</li>
                                <li><strong>Acepta la política de privacidad de Ferrero.</strong> Si te sale esta alerta es porque no has marcado el checkbox confirmando que aceptas la política de privacidad de la promoción. Si tras leerlas estás conforme con ellas, marca el casillero y podrás participar.</li>
                            </ul>
                            <h6>2.1.3 - Modificación datos</h6>
                            <p>Si en el momento de completar el formulario has facilitado tu email de manera incorrecta, comunícalo en la mayor brevedad posible a través del siguiente formulario. No se permitirán cambios de datos cuando se soliciten a raíz de un incumplimiento de las bases legales o cuando se detecten indicios de finalidad fraudulenta relacionados con la solicitud del cambio.</p>

                            <h6>2.1.4.- Participar con tu pack</h6>
                            <p>Para participar en la promoción necesitas haber comprado un producto promocional y realizarle una fotografía.</p>
                            <p>En primer lugar, accede al apartado PARTICIPA de la web promocional.</p>
                            <p>En segundo lugar completa el formulario de participación de la web.</p>

                            <h5>2.2.- Resultado de la participación</h5>
                            <p>Una vez completes tu participación podrás entrar en el sorteo de un telescopio por momento ganador. Los momentos ganadores de esta promoción están compuestos de un día, una hora, minuto y segundo concretos.</p>

                            <h6>2.2.1.- ¿Cómo sé si he ganado?</h6>
                            <p>Si tu participación para intentar conseguir un telescopio coincide con un momento ganador se te informará en pantalla del premio conseguido y recibirás un email con la notificación correspondiente y la información de los pasos a seguir para poder disponer de tu premio. Revisa tu Bandeja de Entrada o de Correo no deseado (SPAM).</p>

                            <h6>2.2.2.- He ganado un premio</h6>
                            <p>Si has completado la participación y has resultado ganador de un telescopio, te mostrará el mensaje en pantalla y al mismo tiempo recibirás un email. Revisa tu Bandeja de Entrada o de Correo no deseado (SPAM). Dispones de un plazo de 10 días naturales desde el mismo día en que se te comunique que has resultado premiado para cargar la documentación solicitada a través de la plataforma habilitada y aceptar el premio.</p>

                            <h6>2.2.3.- No he ganado.</h6>
                            <p>Puedes volver a participar e intentar conseguir un telescopio. Debes haber comprado otro producto promocional. Recuerda que la participación está limitada a una (1) por día con packs diferentes. Si tienes más packs deberás acceder otro día, siempre, dentro del período promocional.</p>

                            <h6>2.2.4.- Invalidación de la participación</h6>
                            <p>FERRERO se reserva el derecho a descalificar a cualquier participante que manipule los procedimientos de registro y/o que viole cualquiera de las bases contenidas en el presente documento. Asimismo, FERRERO también se reserva el derecho a verificar por cualquier procedimiento que estime apropiado que el ganador cumple con todos los requisitos de las bases legales y que los datos que proporcione a FERRERO son exactos y verídicos. Entre otras cuestiones, FERRERO podrá pedir documentación a los participantes para que acrediten el cumplimiento de los requisitos para participar. La no aportación de esta documentación podrá dar lugar a la descalificación del participante requerido.</p>
                            <p>FERRERO descartará aquellas participaciones que sean abusivas o fraudulentas. Se entenderá, a título enunciativo, pero no limitativo, que se produce fraude cuando se detecta el supuesto uso de aplicaciones independientes al site de la Promoción; el abuso de consultas al servidor y todos aquellos comportamientos que puedan resultar aparentemente abusivos y/o malintencionados. La constatación de cualquiera de estas circunstancias durante la Promoción supondrá la descalificación automática, así como la pérdida del premio si se le hubiere otorgado.</p>

                        </div>

                        <h4 id="3" @click="toggleCollapsible(3)"><span>3- Premios</span></h4>
                        <div class="collapsible" :class="{'active': active === 3}" data-parent="#3">
                            <h5>3.1- Descripción y cantidades de premios</h5>

                            <h6>3.1.1- A través de la presente promoción se puede conseguir por momento ganador: un Telescopio Omegon AC 60/700 AZ-1 Set.</h6>

                            <p>En total se ponen a disposición de la promoción dieciocho (18) telescopiosl. Las especificaciones generales del premio son:</p>

                            <p>Sistema óptico</p>
                            <ul>
                                <li>Tipo: Refractor</li>
                                <li>Tipo de construcción: Achromat</li>
                                <li>Apertura (mm): 60</li>
                                <li>Distancia focal (mm): 700</li>
                                <li>Relación de apertura (f/): 11,7</li>
                                <li>Capacidad de resolución: 1,92</li>
                                <li>valor límite (mag): 10,7</li>
                                <li>Capacidad colectora de luz: 70</li>
                                <li>Ampliación útil máxima: 120</li>
                                <li>Construcción de tuboTubo completo</li>
                            </ul>
                            <p>Enfocador</p>
                            <ul>
                                <li>Tipo de construcción: Barra dentada</li>
                                <li>Conexión (lado de ocular): 1,25"</li>
                            </ul>

                            <p>Montura</p>
                            <ul>
                                <li>Tipo de construcción: AZ-1</li>
                                <li>Tipo de montura: altacimutal</li>
                                <li>GoTo: no</li>
                            </ul>

                            <p>Trípode</p>
                            <ul>
                                <li>Material: Aluminio</li>
                            </ul>

                            <p>Accesorios incluidos</p>
                            <ul>
                                <li>Oculares de 1,25": Super 20mm, Super 10mm</li>
                                <li>Sistema óptico de desviación: Espejo zenitar, 1,25" - 90o</li>
                                <li>Lente de Barlow: 2x</li>
                                <li>Lente de inversión: 1,5x</li>
                                <li>Telescopio visor: Visor de punto luminoso</li>
                                <li>Peso total (kg): 4</li>
                            </ul>

                            <p>Los participantes ganadores no pueden realizar el cambio del Premio por la percepción en metálico del valor económico del mismo ni por cualquier otro regalo ni tampoco se gestionarán cesiones del Premio a terceros.</p>

                            <p>Máximo de un (1) Premio por persona.</p>
                            <h5>3.2- Asignación premios</h5>
                            <p>El sistema de Momento Ganador establecerá dieciocho (18) momentos agraciados con un (1) telescopio valorado en 100 euros (IVA incluido) durante el PERIODO de la campaña promocional.</p>

                            <p>Dichos momentos se establecerán mediante una plataforma informática que habrá determinado, de forma aleatoria y con carácter previo al inicio de la Promoción, cuál será el Momento Ganador para cada uno de los dieciocho (18) Premios previstos.</p>
                            <h5>3.3- He ganado</h5>
                            <h6>3.3.1- Notificación del premio</h6>

                            <p>Si eres ganador, tu participación pasará un proceso de validación y, posteriormente, recibirás un email que te informará de la validación, y si todo está correcto, te indicaremos como canjear el premio.</p>

                            <p>El premio es personal e intransferible. No se aceptarán ni se gestionarán cesiones del premio a terceros distintos del participante ganador.</p>
                            <h6>3.3.2- Facilitar información adicional y aceptar el premio</h6>

                            <p>El ganador deberá facilitar a través de la plataforma habilitada documentación adicional a su participación como son: imagen del DNI (cara), así como la dirección donde desea recibir el premio, para tal efecto para la validación del premio.</p>
                            <h6>3.3.3- Plazo de aceptación del premio</h6>
                            <p>Tendrás hasta 10 días naturales para enviar la documentación solicitada a través de la plataforma habilitada para tal efecto para la obtención del premio. De no respetar este plazo, se entenderá que no desea acceder al Premio, quedando éste desierto.</p>
                            <h5>3.4- Fiscalidad premios</h5>
                            <p>De conformidad con la normativa del Impuesto sobre la Renta de las Personas Físicas, el premio concedido, no está sujeto a retención o ingreso a cuenta por ser su base de retención no superior a 300 Euros (trescientos euros) de acuerdo con el artículo 75.3.f) del Real Decreto 439/2007, por el que se aprueba el Reglamento del IRPF.</p>

                        </div>


                        <h4 id="4" @click="toggleCollapsible(4)"><span>4.-Política de datos</span></h4>
                        <div class="collapsible" :class="{'active': active === 4}" data-parent="#4">

                            <h5>4.1.- Resumen datos recogidos y motivos</h5>
                            <p>Para participar en la promoción se solicita un dato de contacto (email).</p>
                            <p>Además, se solicita identificación de la persona que participa: nombre y apellidos.</p>
                            <p>No está permitido utilizar nicknames, iniciales, nombre falsos, incompletos o erróneos puesto que la persona no queda correctamente identificada. En caso de resultar ganadora no se le podrá validar como participante y, por tanto, perderá el derecho al premio.</p>

                            <h5>4.2.- Solicitar borrado de datos personales.</h5>
                            <p>En cualquier momento, los participantes tienen derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición, mediante petición escrita a la siguiente dirección de correo electrónico; privacy.es@ferrero.com</p>

                            <h5>4.3.- Consulta política de privacidad completa.</h5>
                            <p>Link a la <a target="_blank" :href="route('privacy')">política de privacidad</a>.</p>

                        </div>

                        <h4 id="4" @click="toggleCollapsible(5)"><span>5.-Productos Kinder® Chocolate y Kinder® Sopresa</span></h4>
                        <div class="collapsible" :class="{'active': active === 5}" data-parent="#5">
                            <p>¿Quieres más información sobre los productos Kinder®? Accede al siguiente enlace: https://www.kinder.com/es/es/kinder-chocolate encontrarás las distintas variedades, ingredientes o tablas nutricionales.</p>
                        </div>

                        <p class="text-center my-[50px] block">¿Sigues teniendo dudas? <a target="_blank" :href="route('contact')">Contacta con nosotros</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>

h4 {
    @apply text-brown font-tekoSemiBold rem:text-[20px] rem:leading-[24px] lg:rem:text-[30px] tracking-[1px] p-0 my-5;
}

h5 {
    @apply text-brown font-tekoSemiBold rem:text-[18px] rem:leading-[24px] lg:rem:text-[24px] tracking-[1px] p-0 mb-2 mt-6;
}

h6 {
    @apply text-brown font-tekoMedium rem:text-[18px] rem:leading-[24px] lg:rem:text-[20px] tracking-[1px] p-0 mb-2 mt-5;
}

p {
    @apply text-brown font-tekoRegular rem:text-[20px] rem:leading-[18px] lg:rem:text-[20px] lg:rem:leading-[22px] tracking-[0.5px] mb-4 mt-2;
}

a {
    @apply text-brown font-tekoRegular rem:text-[20px] rem:leading-[18px] lg:rem:text-[20px] lg:rem:leading-[22px] tracking-[0.5px] underline;
}

ul {
    list-style: disc;
    @apply pl-8;
}

ul > li {
    @apply text-brown font-tekoRegular rem:text-[20px] rem:leading-[18px] lg:rem:text-[20px] lg:rem:leading-[22px] tracking-[0.5px] mb-2 mt-2;
}

.collapsible {
    @apply h-0 overflow-hidden transition;

    &.active {
        @apply h-auto;
        animation: slideDown 0.5s ease-in-out;
    }
}
table {
    @apply w-full mt-4;

    tr {
        @apply border border-brown;

        td {
            @apply p-2 border border-brown;
        }
    }
}

@keyframes slideDown {
    from {
        max-height: 0;
    }
    to {
        max-height: 100vh;
    }
}
</style>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { ref } from 'vue';
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";

const active = ref(null);

function toggleCollapsible(index) {
    if (active.value === index) {
        active.value = null;
    } else {
        active.value = index;
    }
}
</script>
