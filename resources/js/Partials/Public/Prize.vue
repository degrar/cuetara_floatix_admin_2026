<template>
    <div class="bg-orange py-[100px]  relative after:absolute after:top-[-92px] after:right-0 after:left-0 after:w-full after:mx-auto after:bg-curveOrange after:bg-no-repeat after:bg-center after:bg-[length:2560px_92px] after:h-[92px]">
        <div class="container mx-auto px-[15px] ">
            <div class="flex items-center justify-center mb-8">
                <h1 class="font-hermes text-white text-[48px] leading-[50px] tracking-[-0.48px] mb-8 uppercase text-center max-w-[760px] w-full mx-auto ">
                    EXPLORA EL ESPACIO CON ESTE <span class="text-blue">MAGNÍFICO TELESCOPIO</span>
                </h1>
            </div>


            <div class="grid md:grid-cols-2 grid-cols-1">
                <div class="max-w-[560px] w-full m-0">
                    <h4 class="max-w-[450px] w-full font-tekoMedium uppercase text-blue text-[48px] leading-[50px] tracking-[-0.48px]">¡Viaja por el espacio con este súper telescopio!</h4>
                    <p class="my-8 font-tekoRegular text-white text-[38px] leading-[50px] tracking-[-0.38px]">¡Descubre planetas, estrellas y galaxias como nunca antes! ¡Incluso los más peques disfrutarán observando las estrellas con él!</p>
                    <PrimaryButton  @click="toggleDiv" class="inline-block py-[20px] px-[35px]">{{ buttonText }}</PrimaryButton>
                </div>
                <img src="../../../../resources/images/telescopio.png" alt="Telescopio" class="max-w-[480px] w-full mx-auto mr-0 pb-5"/>
            </div>


            <div id="specs" >
                <div class="grid grid-cols-2 items-start justify-center relative" v-if="show">

                    <PrimaryButton  @click="toggleDiv" class="absolute py-[15px] px-[25px] top-0 right-[15px]">x</PrimaryButton>
                    <div>
                        <div>
                            <h6>Sistema óptico</h6>
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
                        </div>
                        <div>
                            <h6>Accesorios incluidos</h6>
                            <ul>
                                <li>Oculares de 1,25": Super 20mm, Super 10mm</li>
                                <li>Sistema óptico de desviación: Espejo zenitar, 1,25" - 90o</li>
                                <li>Lente de Barlow: 2x</li>
                                <li>Lente de inversión: 1,5x</li>
                                <li>Telescopio visor: Visor de punto luminoso</li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div>
                            <h6>Enfocador</h6>
                            <ul>
                                <li>Tipo de construcción: Barra dentada</li>
                                <li>Conexión (lado de ocular): 1,25"</li>
                            </ul>
                        </div>
                        <div>
                            <h6>Montura</h6>
                            <ul>
                                <li>Tipo de construcción: AZ-1</li>
                                <li>Tipo de montura: altacimutal</li>
                                <li>GoTo: no</li>
                            </ul>
                        </div>
                        <div>
                            <h6>Trípode</h6>
                            <ul>
                                <li>Material: Aluminio</li>
                            </ul>
                        </div>

                        <div>
                            <h6>En general</h6>
                            <ul>
                                <li>Peso total (kg): 4</li>
                            </ul>
                        </div>
                        <div>
                            <h6>Aplicaciones</h6>
                            <ul>
                                <li>Luna y planetas</li>
                                <li>Observación de la naturaleza</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>
<script setup>

import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref, computed, onMounted  } from 'vue';

const show = ref(false);
const telescopioRef = ref(null); // Referencia al elemento telescopio

function toggleDiv() {
    show.value = !show.value;

    // Hacer scroll al div specs cuando se muestra
    if (show.value) {
        scrollToSpecs();
    }
}

function scrollToSpecs() {
    console.log('dentro');
    if (telescopioRef.value) {
        const specsElement = telescopioRef.value.querySelector('#specs');
        if (specsElement) {
            specsElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
}

// Hacer scroll al div specs cuando se monta el componente
onMounted(() => {
    if (show.value) {
        scrollToSpecs();
    }
});

const buttonText = computed(() => {
    return show.value ? 'Menos detalles' : 'Más detalles';
});

</script>

<style scoped>

#specs{
    div{
        div{
            @apply max-w-[400px] w-full;
            ul{
                list-style-type: none;
                padding: 0;
                @apply marker:text-white list-outside list-disc ml-10 ;
                li{
                    @apply font-tekoRegular text-white text-[30px] leading-[31px] tracking-[-0.3px] mb-[5px];
                }
            }
            h6{
                @apply font-tekoSemiBold text-blue text-[30px] leading-[31px] tracking-[-0.3px] mb-4 uppercase mt-8;
            }
        }
    }
}
</style>