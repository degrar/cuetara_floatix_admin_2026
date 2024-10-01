<template>
    <GuestLayout title="FAQS" menu inside>
        <whitePatternInside />
        <div class="bg-white py-[50px]">
            <div class="container mx-auto px-[15px] flex justify-center items-center flex-col py-[40px] lg:flex-row lg:py-[80px] ">
                <div class="w-12/12  pt-[15px]">

                    <div class="px-4 font- font-tekoRegular text-grey">
                        <h1 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[41px] rem:leading-[41px] rem:tracking-[0px] text-center mb-6 block">Preguntas frecuentes</h1>

                        <h4 id="1" @click="toggleCollapsible(1)"><span>1- Normas de la promoci&oacute;n</span></h4>
                        <div class="collapsible" :class="{'active': active === 1}" data-parent="#1">
                            <h5>1.1.-Quién puede participar</h5>
                            <p>Pueden participar todos los mayores de 18 años residentes en España que hayan adquirido uno de los productos promocionales.</p>
                            <p>La participación debe ser realizada por el propio interesado. No está permitido participar en nombre de terceras personas.</p>
                            <p>Quedan excluidos de esta Promoción los propietarios, empleados, y otros colaboradores de FERRERO que hayan participado en el desarrollo y gestión de la presente promoción, así como sus respectivos familiares ascendientes, descendientes, cónyuges o parejas de hecho. Asimismo, el organizador se reserva el derecho a evitar que sobre esta Promoción se establezcan sistemas de especulación o de negocios, en cuyo caso, podrá ejercer aquellas acciones legales que estime oportunas.</p>

                            <h5>1.2.-Productos en promoción</h5>
                            <h6>1.2.1-Cuáles son los productos que entran en la promoción</h6>
                            <p>Los productos que dan derecho a participar en la presente Promoción serán:</p>
                            <ul>
                                <li>Todos los tarros de la marca Nutella® (200G, 350G, 400G, 450G, 600G, 750G, 825G, 1000G),</li>
                                <li>Nutella® B-ready, Nutella® Biscuits, Nutella® &GO, Nutella® Helado.</li>
                            </ul>
                            <p>Es requisito indispensable que se conserve el ticket de compra original o factura correspondiente a la compra del producto indicado en este punto durante el período promocional.</p>


                            <h6>1.2.2-Descripción</h6>
                            <p>Aquí tienes una imagen de nuestro producto para que puedas identificarlo fácilmente en el supermercado o tienda de alimentación.</p>

                            <div class="flex items-center justify-evenly ">
                                <img src="../../../images/Imagen1.png" alt="Kinder Sorpresa" class="max-w-[89px] w-full" />
                                <img src="../../../images/Imagen2.png" alt="Kinder Sorpresa" class="max-w-[153px] w-full" />
                                <img src="../../../images/Imagen3.png" alt="Kinder Sorpresa" class="max-w-[289px] w-full" />
                            </div>



                            <h6>1.2.3-Dónde comprarlo</h6>
                            <p>Puedes adquirir los productos en los principales supermercados y tiendas de alimentación.</p>

                            <h5>1.3.-Fechas</h5>
                            <h6>1.3.1-Periodo de participación</h6>
                            <p>Podrás participar para conseguir uno de los regalos de la promoción a través de la web de la promoción entre el 17 de octubre de 2024 y el 8 de enero de 2025, ambos incluidos.</p>
                            <p><strong>¿Quiero participar, pero dice “Promoción finalizada”?</strong></p>
                            <p>Este mensaje aparece en la web cuando la promoción ha concluido. Lo lamentamos, pero ya no puedes participar.</p>

                            <h6>1.3.2-Periodo de reclamación</h6>
                            <p>El plazo para realizar cualquier tipo de reclamación acerca de la participación es de dos (2) meses, tras la finalización de la promoción, es decir, hasta el 8 de marzo de 2025.</p>

                            <h6>1.3.3-Periodo de entrega de regalos</h6>
                            <p>En circunstancias normales, la entrega de los premios a los ganadores se realizará en el plazo máximo de veinte (20) días desde la fecha que el participante ganador facilita la información requerida para la entrega del premio.</p>
                            <p>En caso de que por alguna circunstancia excepcional y ajena al control de FERRERO no sea posible cumplir este plazo se comunicará debidamente a los ganadores.</p>

                            <h5>1.4-Prueba de compra</h5>
                            <p>Para poder acceder a participar en la promoción debes conservar el/los justificantes de compra originales del producto promocional.</p>
                            <p>En el caso de tener que enviar el código o ticket de compra original de tu bote a petición de FERRERO, es recomendable que conserves una copia antes de enviar los originales a la siguiente dirección:</p>
                            <p>WTC Almeda Park,<br>Plaça de la Pau s/n Edificio 2, Planta 3ª,<br>08940 Cornellà de Llobregat (Barcelona) España.</p>
                            <p>No se devolverán al participante las pruebas de compra presentadas.</p>

                            <h6>1.4.1-Código</h6>
                            <p>Los productos que llevan el adhesivo promocional en la tapa comunicando la promoción incluyen también un código alfanumérico en el interior del adhesivo que da derecho a participar en la promoción.</p>
                            <p>En concreto, los botes de nutella® formatos 200G, 350G, 450G, 750G, 1000G contienen un único código alfanumérico.</p>
                            <p>El código alfanumérico está formado por una combinación de diez (10) caracteres que combina letras y números.</p>
                            <p>Si tienes dificultades para ver tu código humedece ligeramente el adhesivo y podrás retirarlo mejor para ver tu código.</p>
                            <p>Debes conservar la tapa con el adhesivo original y el código hasta el término de la promoción. La organizadora se reserva el derecho a solicitártelo.</p>
                            <p>Si la tapa de tu bote no lleva adhesivo promocional y, por tanto, no incluye código alfanumérico, puedes participar en la promoción a través de tu tiquet de compra.</p>

                            <h6>1.4.2-Presentar pruebas de compra</h6>

                            <h7>Compra en establecimiento físico</h7>
                            <p>La prueba de compra que te facilitarán en el establecimiento físico es el tique de compra o factura simplificada. La compra debe ser realizada dentro del período promocional y es imprescindible que en el tique aparezca el comercio, la fecha y hora de compra, el producto Nutella® y su importe. No serán válidos los tiques que no muestren claramente dichos elementos. Conserva la prueba de compra original.</p>
                            <p>La imagen el justificante de pago con tarjeta bancaria no se considera una prueba de compra válida.</p>

                            <h7>Compra en establecimiento on-line</h7>
                            <p>Si has realizado tu compra en un establecimiento on-line, el comercio te facilitará la factura una vez te haya hecho entrega del artículo adquirido. Para participar en la promoción es imprescindible haber recibido el pedido y disponer de la factura de compra.</p>
                            <p>La imagen del pedido, el albarán, o del justificante de pago con tarjeta bancaria no son considerados justificantes de compra válidos. La mera realización de un pedido en un establecimiento online no da derecho a participar en la promoción. Es imprescindible disponer de la factura y/o acreditar la recepción de la mercancía correspondiente.</p>
                            <p>Es imprescindible que en la foto que subas aparezca el comercio, la fecha de emisión, el producto promocional y el importe del producto.</p>

                            <h5>1.5-Vías de participación</h5>
                            <p>La única vía para poder participar en la promoción es a través de la página oficial de la Promoción: https://www.nutella.com/es/es/</p>

                            <h5>1.6-Límites de participación</h5>
                            <p>El participante tiene derecho a cinco (5) participaciones diarias con tickets de compra diferentes o códigos que no hayan sido utilizados anteriormente. Una vez utilizado el ticket de compra quedará automáticamente invalidado.</p>
                            <p>Un mismo ticket de compra únicamente podrá ser utilizado una vez, por un único consumidor.</p>

                            <h5>1.7-Reglamento completo Bases Legales</h5>
                            <p>Puedes consultar las Bases Legales de la promoción en el siguiente enlace: <a target="_blank" :href="route('legal')">http://www.nutella.com/es/es/</a></p>

                        </div>

                        <h4 id="2" @click="toggleCollapsible(2)"><span>2- Participaci&oacute;n </span></h4>
                        <div class="collapsible" :class="{'active': active === 2}" data-parent="#2">
                            <h5>2.1.-Participar</h5>
                            <p>Para crear una participación debes completar el formulario de participación con tus datos y tu código alfanumérico o tu tiquet de compra/factura. Cada vez que desees introducir un nuevo código o ticket de compra/factura debes completar un nuevo formulario.</p>

                            <h6>2.1.1- Completa el formulario</h6>
                            <p>Para participar en la promoción debes completar el formulario del apartado PARTICIPA. Estos son los datos personales que te solicitaremos en el formulario:</p>
                            <ul>
                                <li>Tu nombre</li>
                                <li>Tu primer apellido</li>
                                <li>Segundo apellido</li>
                                <li>Tu e-mail</li>
                                <li>Debes seleccionar si deseas participar con código o bien con ticket de compra.
                                    <ul>
                                        <li>Introducir el código alfanumérico de 10 dígitos o la fecha de compra y subir una imagen completa de tu ticket de compra.</li>
                                    </ul>
                                </li>
                            </ul>
                            <p>Para completar el formulario es imprescindible marcar:</p>
                            <ul>
                                <li>Checkbox conforme eres mayor de 18 años.</li>
                                <li>Checkbox en el que aceptas las <a target="_blank" :href="route('legal')">Bases Legales de la promoción</a>.</li>
                                <li>Checkbox en el que aceptas la <a target="_blank" :href="route('privacy')">política de protección de Privacidad</a>.</li>
                            </ul>
                            <p>Adicionalmente se ofrece el checkbox para que puedas manifestar si deseas o no RECIBIR comunicaciones comerciales de los productos de Ferrero Ibérica S.A.</p>

                            <ul>
                                <li>Botón "Enviar" Si pulsas sobre el botón y has completado el formulario correctamente, has registrado tu participación correctamente y sabrás al instante si has resultado ganador.</li>
                            </ul>

                            <p>En caso de que no se complete el formulario, o se haga con datos incorrectos y/o incompletos se te informará. Lee detenidamente el error y revisa los datos.</p>

                            <h6>2.1.2 -No puedo participar</h6>

                            <p>Posibles errores que debes corregir si te sale este error en pantalla:</p>

                            <ul>
                                <p><strong>Datos incorrectos o erróneos.</strong> Este mensaje aparece por qué no está correctamente cumplimentado el formulario, te aparecerán resaltados los campos que están en conflicto para que los revises y corrijas.</p>
                                <p><strong>E-mail inválido.</strong> Comprueba que el campo “e-mail” o “repetir e-mail” están escritos correctamente, comprueba que no hay espacios en blanco ni delante ni detrás, sobretodo si participas desde el móvil, evita utilizar la función "autocompletar del navegador", una vez estén bien escritos podrás finalizar el registro.</p>
                                <p><strong>Cookies.</strong> Si no aceptas las cookies de la web, es posible que no puedas completar el registro, o que las funcionalidades de la web no se activen correctamente. Si tienes bloqueos generales de cookies y/o ventanas emergentes recomendamos acceder a la promoción a través de una ventana de incógnito.</p>
                                <p><strong>“Enviar” no funciona.</strong> Seguramente algún programa de tu dispositivo esté bloqueando las cookies de la web y por lo tanto su correcto funcionamiento, te recomendamos utilizar el modo oculto/incógnito de tu navegador web y si persiste, acceder desde un dispositivo diferente.</p>
                                <p><strong>Confirma que no eres un robot.</strong> Este mensaje aparece porque no has finalizado correctamente el CAPTCHA, una vez lo completes podrás finalizar tu solicitud.</p>
                                <p><strong>Confirma que tienes más de 18 años.</strong> Si te sale esta alerta es porque no has marcado el checkbox confirmando que eres mayor de edad. Si no eres mayor de edad no podrás participar.</p>
                                <p><strong>Acepta las Bases Legales de la promoción.</strong> Si te sale esta alerta es porque no has marcado el checkbox confirmando que aceptas las Bases Legales de la promoción. Si tras leerlas estás conforme con ellas, marca el casillero y podrás participar.</p>
                                <p><strong>Acepta la política de protección de datos de la promoción.</strong> Si te sale esta alerta es porque no has marcado el checkbox confirmando que aceptas la política de protección de datos de la promoción. Si tras leerlas estás conforme con ellas, marca el casillero y podrás participar.</p>
                            </ul>
                            <h6>2.1.3- Modificación datos</h6>
                            <p>Si en el momento de completar el formulario has facilitado algún dato incorrecto, comunícalo en la mayor brevedad posible a través del siguiente formulario. No se permitirán cambios de datos cuando se soliciten a raíz de un incumplimiento de las bases legales o cuando se detecten indicios de finalidad fraudulenta relacionados con la solicitud del cambio.</p>

                            <h5>2.2.- Participar con tu código o ticket de compra o factura</h5>
                            <p>Para participar en la promoción se te solicita:</p>
                            <ul>
                                <li>El código alfanumérico que encontrarás en los botes especificados en el apartado de productos en promoción o,</li>
                                <li>La fecha de tu tique de compra, y además, debes adjuntar una imagen del mismo.</li>
                            </ul>
                            <p>La imagen del tique de compra debe mostrar el tique de compra completo de manera clara y nítida.</p>
                            <p>El archivo con la imagen del tique de compra debe tener formato jpg, png o pdf. Máximo 8 Mb.</p>

                            <h5>2.3.- Resultado de la participación</h5>
                            <p>Una vez completes tú participación quedarás registrado de cara a los momentos ganadores de la promoción que están compuestos de un día, una hora, minuto y segundo concretos. </p>

                            <h6>2.5.1.- ¿Cómo sé si he ganado?</h6>
                            <p>Si tu participación coincide con un momento ganador se te informará en pantalla del premio conseguido y recibirás un email con la notificación correspondiente y la información de los pasos a seguir para poder recibirlo. Revisa tu Bandeja de Entrada o de Correo no deseado (SPAM).</p>

                            <h6>2.5.2.- He ganado un premio</h6>
                            <p>Si tu participación es a través de ticket de compra, tu participación será revisada para comprobar que cumple los requisitos establecidos en las bases legales.</p>
                            <p>Una vez revisada, si todo está correcto recibirás un email para facilitar la información adicional: la selección de tallas deseada y la dirección de envío. Dispones de un plazo de 6 días laborables desde el mismo día en que se te comunique que tu participación ha sido validada para responder y aceptar correctamente el premio.</p>

                            <h6>2.5.3.- No he ganado</h6>
                            <p>Puedes volver a participar e intentar conseguir uno de los premios que ofrecemos. Debes haber comprado otro producto promocional y disponer del ticket de compra correspondiente. Recuerda que la participación está limitada a cinco (5) por día con códigos o tickets de compra diferente. Si tienes más compras realizadas con otros tickets de compra del producto promocional, deberás acceder otro día, siempre, dentro del período promocional. </p>

                            <h6>2.5.4.- Invalidación de la participación ganadora</h6>
                            <p>FERRERO se reserva el derecho a descalificar a cualquier participante que manipule los procedimientos de registro y/o que viole cualquiera de las bases contenidas en el presente documento. Asimismo, FERRERO también se reserva el derecho a verificar por cualquier procedimiento que estime apropiado que el ganador cumple con todos los requisitos de las bases legales y que los datos que proporcione a FERRERO son exactos y verídicos. Entre otras cuestiones, FERRERO podrá pedir documentación a los participantes para que acrediten el cumplimiento de los requisitos para participar. La no aportación de esta documentación podrá dar lugar a la descalificación del participante requerido.</p>
                            <p>FERRERO descartará aquellas participaciones que sean abusivas o fraudulentas. Se entenderá, a título enunciativo, pero no limitativo, que se produce fraude cuando se detecta el supuesto uso de aplicaciones independientes al site de la Promoción; el abuso de consultas al servidor y todos aquellos comportamientos que puedan resultar aparentemente abusivos y/o malintencionados. La constatación de cualquiera de estas circunstancias durante la Promoción supondrá la descalificación automática, así como la pérdida del premio si se le hubiere otorgado.</p>

                        </div>

                        <h4 id="3" @click="toggleCollapsible(3)"><span>3- Premios</span></h4>
                        <div class="collapsible" :class="{'active': active === 3}" data-parent="#3">
                            <h5>3.1- Descripción y cantidades de premios</h5>
                            <p>El premio objeto de la presente Promoción son dos (2) jerséis navideños nutella®.</p>
                            <p>Los premios disponibles alcanzarán un total de 1.300 jerséis navideños nutella®, que se entregarán a 650 ganadores a razón de 2 jerséis para cada ganador durante el período promocional.</p>
                            <p>Hay un único modelo de jersey disponible en tallas XS, S, M, L y XL.</p>
                            <p>La cantidad de jerséis de cada talla está limitado. En el mismo apartado disponible para los ganadores se irá actualizando el stock automáticamente, quedando indicada como AGOTADA cuando no queden más unidades disponibles de alguna talla.</p>
                            <p>En cuanto una talla quede agotada el ganador deberá elegir jerséis de otras tallas que si haya disponibilidad.</p>
                            <p>Una vez el ganador notifique a través del formulario oportuno la talla deseada de los dos jerséis, no se aceptarán peticiones de cambio de talla por parte del ganador.</p>
                            <p>Los participantes ganadores no pueden realizar el cambio del Premio por la percepción en metálico del valor económico del mismo ni por cualquier otro regalo.</p>


                            <h5>3.2- Asignación premios</h5>
                            <p>El sistema de Momento Ganador establecerá seiscientos cincuenta (650) momentos agraciados con 2 jerséis navideños nutella® durante el PERIODO PROMOCIONAL. Dichos momentos se establecerán mediante una plataforma informática que habrá determinado, de forma aleatoria y con carácter previo al inicio de la Promoción, cuál será el Momento Ganador cada uno de los seiscientos cincuenta (650) premios previstos.</p>
                            <p>Los premios se encuentran limitados a un máximo de un (1) premio por persona.</p>

                            <h5>3.3- He ganado un premio</h5>
                            <h6>3.3.1- Notificación del premio</h6>
                            <p>Si eres ganador recibirás un email que te informará del premio conseguido y si tu participación es con tiquet de compra deberá pasar un proceso de validación. Una vez completada la validación, recibirás un email que te informará al respecto y si todo está bien, contendrá un link a través del cual accederás al formulario habilitado únicamente para los ganadores, a efectos de gestionar la información adicional y el envío del Premio.</p>
                            <p>El premio es personal e intransferible. No se aceptarán ni se gestionarán cesiones del premio a terceros distintos del participante ganador.</p>


                            <h6>3.3.2- Facilitar información adicional y aceptar el premio</h6>
                            <p>A través del link que incluye el email de ganador deberás facilitar:</p>
                            <ul>
                                <li>las tallas para tus 2 jerséis. En función de la disponibilidad, podrás elegir entre talla XS, S, M, L y XL. Una vez completada la solicitud no se permitirán realizar cambios de tallas.</li>
                                <li>la dirección donde deseas recibir el premio: tipo de vía, dirección, número, código postal, ciudad, provincia y teléfono. Los dos jerséis se entregarán en la misma dirección y en un único envío.</li>
                            </ul>
                            <p>Una vez notifiques a través del formulario las tallas de tus jerséis, no se aceptarán peticiones de cambio de talla por parte del ganador.</p>

                            <h6>3.3.3- Plazo de aceptación del premio</h6>
                            <p>Tendrás hasta seis (6) días laborales para enviar la información solicitada a través de la plataforma habilitada para tal efecto para la obtención del premio. De no respetar este plazo, se entenderá que no deseas acceder al Premio, quedando éste desierto.</p>

                            <h6>3.3.4- Envío del premio</h6>
                            <p>En circunstancias normales, la entrega de los premios a los ganadores se realizará en el plazo máximo de veinte (20) días desde la fecha que el participante ganador facilita la información requerida para la entrega del premio.</p>
                            <p>En caso de que por alguna circunstancia excepcional y ajena al control de FERRERO no sea posible cumplir este plazo se comunicará debidamente a los ganadores y se acordará otro plazo para la entrega del Premio.</p>
                            <p>Únicamente se realizarán envíos dentro del territorio de España.</p>

                            <h5>3.4- Fiscalidad premios</h5>
                            <p>De conformidad con la normativa del Impuesto sobre la Renta de las Personas Físicas, el premio concedido, dos jerséis navideños nutella®, no está sujeto a retención o ingreso a cuenta.</p>

                        </div>


                        <h4 id="4" @click="toggleCollapsible(4)"><span>4.-Política de datos</span></h4>
                        <div class="collapsible" :class="{'active': active === 4}" data-parent="#4">

                            <h5>4.1.- Resumen datos recogidos y motivos</h5>
                            <p>Para participar en la promoción se solicitan los datos personales para identificar la persona participante (nombre completo) así como datos de contacto (email).</p>
                            <p>A través del email se genera un registro único e identifica a un único usuario.</p>
                            <p>No está permitido utilizar nicknames, iniciales, nombre falsos, incompletos o erróneos puesto que la persona no queda correctamente identificada. En caso de resultar ganadora no se le podrá validar como participante y, por tanto, perderá el derecho al premio.</p>

                            <h5>4.2.- Solicitar borrado de datos personales.</h5>
                            <p>En cualquier momento, los participantes tienen derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición, mediante petición escrita a la siguiente dirección de correo electrónico: privacy.es@ferrero.com</p>

                            <h5>4.3.- Consulta política de privacidad completa.</h5>
                            <p>Link a la <a target="_blank" :href="route('privacy')">política de privacidad</a>.</p>

                        </div>

                        <h4 id="4" @click="toggleCollapsible(5)"><span>5.-Productos nutella®</span></h4>
                        <div class="collapsible" :class="{'active': active === 5}" data-parent="#5">
                            <p>¿Quieres más información sobre los productos nutella®? Accede al siguiente enlace: https://www.nutella.com/es/es/productos encontrarás las distintas variedades, ingredientes o tablas nutricionales.</p>
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
    @apply text-black font-montserrat font-extrabold rem:text-[22px] rem:leading-[24px] lg:rem:text-[24px] lg:rem:leading-[28px] p-0 mb-5 mt-10;
}

h5 {
    @apply text-black font-montserrat font-extrabold rem:text-[20px] rem:leading-[22px] lg:rem:text-[22px] lg:rem:leading-[26px] p-0 mb-2 mt-8;
}

h6 {
    @apply text-black font-montserrat font-semibold rem:text-[18px] rem:leading-[22px] lg:rem:text-[20px] lg:rem:leading-[22px] p-0 mb-2 mt-5;
}

p {
    @apply text-black font-montserrat rem:text-[16px] rem:leading-[20px] lg:rem:text-[18px] lg:rem:leading-[22px] mb-2 mt-2;
}

a {
    @apply text-black font-montserrat underline ;
}

ul {
    list-style: disc;
    @apply pl-8;
}

ul > li {
    @apply text-black font-montserrat rem:text-[16px] rem:leading-[20px] lg:rem:text-[18px] lg:rem:leading-[22px] mb-2 mt-2;
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
import whitePatternInside from "@/Components/inside/whitePatternInside.vue";

const active = ref(null);

function toggleCollapsible(index) {
    if (active.value === index) {
        active.value = null;
    } else {
        active.value = index;
    }
}
</script>
