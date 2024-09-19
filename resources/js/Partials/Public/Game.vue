<template>
    <div class="bg-whitePattern nPattern py-[50px] relative">
        <div class="container mx-auto px-[15px]">
            <div class="flex flex-row justify-center items-start">

                <div class="mx-auto w-12/12 md:w-5/12  ml-0 hidden lg:block">
                    <img src="../../../../resources/images/nutella/game.png" alt="Nutella" class="max-w-[520px] w-full mx-auto ml-0 pb-5"/>
                </div>
                <form @submit.prevent="submitForm" class="mx-auto w-full lg:w-6/12 ml-0">

                    <h4 class="text-center lg:text-left stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[28px] rem:leading-[32px] lg:rem:text-[41px] lg:rem:leading-[41px] rem:tracking-0">Participa</h4>
                    <h4 class="text-center lg:text-left font-montserrat rem:text-[21px] rem:leading-[25px] rem:tracking-[0.21px] text-black uppercase font-extrabold mt-2 mx-auto max-w-[320px] lg:max-w-max lg:mx-0 ">Y Descubre al momento si has ganado</h4>

                    <h5 class="font-montserrat rem:text-[18px] rem:leading-[25px] rem:tracking-[0.18px] text-black font-extrabold rem:mt-[25px] rem:mb-[10px]">Indica tus datos personales</h5>
                    <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                        <TextInput type="text" v-model="form.nombre" label="Nombre*" :error="form.errors.nombre"  />

                        <TextInput type="text" v-model="form.first_surname" :key="0" label="Primer apellido*" :error="form.errors.first_surname" />

                        <TextInput type="text" v-model="form.second_surname" :key="1" label="Segundo apellido" :error="form.errors.second_surname" />

                        <TextInput type="text" v-model="form.email" label="Correo electrónico*" :error="form.errors.email" />

                        <TextInput type="text" v-model="form.email_repeat" label="Repetir correo electrónico*" :error="form.errors.email_repeat" />

                        <TextInput type="text" v-model="form.phone" label="Teléfono*" :error="form.errors.phone" />
                    </div>
                    <h5 class="font-montserrat rem:text-[18px] rem:leading-[25px] rem:tracking-[0.18px] text-black font-extrabold rem:mt-[25px] rem:mb-[10px]">¿Cómo quieres participar?</h5>
                    <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                        <div class="w-full lg:col-span-2">
                            <div class="radiobutton line flex flex-col items-start  justify-start">

                                    <div class="wrapper-radiobutton flex flex-row items-center justify-center cursor-pointer mb-[5px] " >
                                        <RadioButton v-model:checked="form.option" :value=1 :id ="1"/>
                                        <label class="flex flex-row items-center justify-center cursor-pointer " :for="1" v-on:click="onClickLabel"></label>
                                        <span class="radio-text font-montserrat rem:text-[18px] rem:leading-[25px] rem:tracking-[0.18px] text-black font-medium" v-on:click="onClickText" @click="form.option = 1">Código promocional </span>
                                        <VTooltip :distance="9" :placement="'right-start'" :triggers="['hover', 'focus', 'touch', 'click']">
                                            <a><img src="../../../images/nutella/informacion.png" alt="i" class="max-w-[18px] w-full mx-auto ml-2"/></a>
                                            <template #popper>
                                                <div class="flex flex-row items-center justify-center">
                                                    <p class="font-montserrat text-white rem:text-[11px] font-semibold max-w-[180px] w-full">
                                                        Despega el adhesivo humedeciéndolo y participa con el código de 10 dígitos que encontrarás en la tapa de los tarros navideños de Nutella®
                                                    </p>
                                                    <img src="../../../images/nutella/product-tooltip.png" alt="Código" class="max-w-[97px] w-full mx-auto"/>
                                                </div>
                                            </template>
                                        </VTooltip>
                                    </div>



                                    <div class="wrapper-radiobutton flex flex-row items-center justify-center cursor-pointer mb-[5px]" >
                                        <RadioButton v-model:checked="form.option" :value=2 :id ="2"/>
                                        <label class="flex flex-row items-center justify-center cursor-pointer " :for="2" v-on:click="onClickLabel"></label>
                                        <span class="radio-text font-montserrat rem:text-[18px] rem:leading-[25px] rem:tracking-[0.18px] text-black font-medium" v-on:click="onClickText" @click="form.option = 2">Ticket de compra</span>
                                        <VTooltip :distance="9" :placement="'right-start'" :triggers="['hover', 'focus', 'touch', 'click']">
                                            <a><img src="../../../images/nutella/informacion.png" alt="i" class="max-w-[18px] w-full mx-auto ml-2"/></a>

                                            <template #popper>
                                                <div class="flex flex-row items-center justify-center">
                                                    <p class="font-montserrat text-white rem:text-[11px] font-semibold max-w-[180px] w-full mr-2">Participa subiendo una imagen del ticket de compra en el que se indique el producto Nutella adquirido y la fecha de compra.</p>
                                                    <img src="../../../images/nutella/tooltip-ticket.png" alt="ticket" class="max-w-[43px] w-full mx-auto"/>
                                                </div>
                                                <!-- You can put other components too -->
                                                <ExampleComponent char="=" />
                                            </template>
                                        </VTooltip>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <Transition
                            enter-active-class="transition ease-out duration-200"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95">
                            <div id="ticket" class="space-y-4" v-show="form.option === 2">
                                <div class="relative">
                                    <div class="grid gap-5 grid-cols-1 lg:grid-cols-2">
                                        <div class="w-full lg:col-span-2">
                                            <FileUpload v-model:select="form.file"  :error="form.errors.file" :form="form" label="Imagen de ticket de compra*"/>
                                        </div>
                                        <div class="">
                                            <TextInput :error="form.errors.buydate"  type="date" :min="minDate" :max="maxDate" v-model="form.buydate" label="Fecha de ticket de compra*" />
                                        </div>
                                        <div class="">
                                            <TextInput type="text" :error="form.errors.amount" v-model="form.amount" label="Importe*" help="Ejemplo: 6,51€"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </Transition>

                        <Transition
                            enter-active-class="transition ease-out duration-200"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95">
                            <div id="ticket" class="space-y-4" v-show="form.option === 1">
                                <div class="relative">
                                    <div class="grid gap-5 grid-cols-1 lg:grid-cols-2">
                                        <div class="w-full lg:col-span-2">
                                            <TextInput type="text" :error="form.errors.code" v-model="form.code" label="Código*" help="¿Dónde está el código?"  :modal="true" @trigger="handleTrigger"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </Transition>

                    </div>







                    <div id="legals" class="my-8 space-y-2 checkbox block">
                        <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.adult" :error="form.errors.adult" id="adult" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="adult" v-on:click="onClickLabel" :class="{ 'error': form.errors.adult }"></label>
                            <InputLabelCheckbox for="adult" class="" :error="form.errors.adult">Confirmo que soy mayor de 18 años*.</InputLabelCheckbox>
                        </div>
                        <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="legal" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="legal" v-on:click="onClickLabel" :class="{ 'error': form.errors.legal }"></label>
                            <InputLabelCheckbox for="legal" class="" :error="form.errors.legal">Acepto las <a class="underline hover:underline-none" target="_blank" :href="route('legal')">bases legales</a> de la promoción*</InputLabelCheckbox>
                        </div>

                        <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.privacy" :error="form.errors.privacy" id="privacy" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="privacy" v-on:click="onClickLabel" :class="{ 'error': form.errors.privacy }"></label>
                            <InputLabelCheckbox for="privacy" class="" :error="form.errors.privacy">Acepto la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a> de Ferrero Ibérica, S.A*</InputLabelCheckbox>
                        </div>

                        <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.ads" id="ads" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="ads" v-on:click="onClickLabel"></label>
                            <InputLabelCheckbox for="ads" >Deseo recibir comunicaciones comerciales de los productos de Ferrero Ibérica S.A.</InputLabelCheckbox>
                        </div>
                    </div>

                    <div id="legals" class="my-8 space-y-2 checkbox block">
                        <p class="rem:text-[12px] text-grey font-montserrat font-medium ml-[10px]">*Campos obligatorios</p>
                    </div>


                    <div class="mt-[25px] flex items-center lg:items-start lg:justify-start flex-row ">
                        <FormButton type="submit" class="mx-auto lg:mx-0" :disabled="form.processing">
                            Enviar
                            <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                        </FormButton>
                    </div>


                </form>

            </div>

            <div class="mx-auto w-12/12 lg:w-10/12" v-if="form.hasErrors">
                <ErrorMessage />
            </div>

            <div class="mx-auto  w-12/12 lg:w-10/12 my-[30px]">
                <p class="rem:text-[12px] text-grey font-montserrat font-medium mb-[15px] text-center">Ferrero Ibérica, S.A. (en adelante, “Ferrero”) tratará los datos personales que Ud. nos proporcione para la correcta gestión de su solicitud conforme a su consentimiento. Ud. tiene derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición. Puede ejercer sus derechos mediante petición escrita a <a href="mailto:privacy.es@ferrero.com" class="underline">privacy.es@ferrero.com</a>. En todo caso, si necesita más información, Ud. puede consultar la información adicional y detallada sobre la política de privacidad a través del siguiente <a :href="route('privacy')" class="underline">link</a></p>

            </div>
        </div>

        <DialogModal closeable :show="showCodeModal" @close="showCodeModal = false">
            <template #content>
                <div class="w-full mx-auto bg-white p-[70px] pb-[30px] shadow-custom rounded-[12px] relative">
                    <div class="absolute top-[25px] right-[25px] cursor-pointer m-auto" @click="showCodeModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="51" height="50" viewBox="0 0 71 70" fill="none">
                            <g filter="url(#filter0_d_16_908)">
                                <rect x="10" y="6" width="51" height="50" rx="25" fill="#E30613"/>
                                <rect x="7" y="3" width="57" height="56" rx="28" stroke="white" stroke-width="6"/>
                                <path d="M41.875 24.75L29.125 37.25" stroke="#FAF5ED" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M29.125 24.75L41.875 37.25" stroke="#FAF5ED" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <filter id="filter0_d_16_908" x="0" y="0" width="71" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_16_908"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_16_908" result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                    </div>
                    <img src="../../../../resources/images/nutella/codigo.png" alt="paso 1" class="max-w-[200px] lg:max-w-[510px] w-full mx-auto pb-2"/>
                    <h4 class="font-montserrat font-extrabold rem:text-[41px] rem:leading-[45px] text-center text-red my-[15px] max-w-[630px] w-full mx-auto">¿Dónde está el código?</h4>
                    <div class="max-w-[524px] w-full mx-auto">
                        <p class="text-center font-montserrat text-[16px] leading-[18px] text-black font-medium"><span class="font-extrabold">Lo encontrarás en los tarros navideños de Nutella<sup>®</sup></span> 200g, 350g, 450g, 750g y 1000g</p>
                        <p class="text-center font-montserrat text-[16px] leading-[18px] text-black font-extrabold mt-[15px]">¿No tienes un código?</p>
                        <p class="text-center font-montserrat text-[16px] leading-[18px] text-black font-medium">Participa con tu ticket de compra</p>
                    </div>
                </div>
            </template>
        </DialogModal>

    </div>
</template>

<script setup>
import FormButton from '@/Components/FormButton.vue';
import TextInput from '@/Components/TextInput.vue';
import FileUpload from '@/Components/FileUpload.vue';
import SelectInput from '@/Components/SelectInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {BiUpload, FaCircleNotch} from "oh-vue-icons/icons";
import InputLabel from "@/Components/InputLabel.vue";
import InputLabelCheckbox from "@/Components/InputLabelCheckbox.vue";
import RadioButton from "@/Components/RadioButton.vue";
import { Dropdown, Tooltip, Menu, vTooltip } from 'floating-vue'


import DialogModal from "@/Components/Admin/DialogModal.vue";
import {ref} from 'vue';
import ErrorMessage from "@/Components/ErrorMessage.vue";

const showCodeModal = ref(false);

const handleTrigger = () => {
    showCodeModal.value = true;
}

addIcons(BiUpload, FaCircleNotch);

const form = useForm({
    nombre: null,
    first_surname: null,
    second_surname: null,
    email: null,
    email_repeat: null,
    phone: null,
    option: null,

    // Ticket
    file: null,
    buydate: null,
    amount: null,

    // Code
    code: null,

    // Legals
    privacy: null,
    legal: null,
    adult: null,
    ads: false,

    recaptcha: null
});

const submitForm = () => {
    const siteKey = usePage().props.site_key;
    grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {action: 'submit'}).then(function(token) {
            form.recaptcha = token;
            form.post(route('game'), {
                preserveScroll: true
            });
        });
    });
};

//RADIOBUTTON
const onClickText = (e) => {
    e.target.classList.toggle('active');
    let radio = e.target.parentElement.querySelector('[type="radio"]');
    if (!radio.checked) {
        radio.checked = true;
        let event = new Event('change');
        radio.dispatchEvent(event);
    }
};

const onClickLabel = (e) => {
    let parent = e.target.parentElement;
    let radioButtonTextElements = parent.querySelectorAll('.radio-text');

    radioButtonTextElements.forEach(function (element) {
        element.classList.toggle('active');
    });
}

//DATE TICKET
const minDate = '2024-05-01';

let maxDate;
if (new Date().getMonth() === 8) {
    maxDate = '2024-08-31';
} else {
    maxDate = new Date().toISOString().split('T')[0];
}


</script>

<style scoped>
.v-popper__inner {
    max-width: 100px;
}
</style>