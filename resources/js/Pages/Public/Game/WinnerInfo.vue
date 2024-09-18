<template>
    <GuestLayout title="Ganador" menu useRecaptcha>
        <whitePatternInside />

        <div class="bg-whitePattern lg:py-[20px] lg:py-[50px]">
            <div class="container mx-auto px-[15px] py-5 pb-[100px] lg:py-10 flex flex-col lg:flex-row justify-center items-center lg:items-start">

                <div class="mx-auto w-5/12">
                    <img src="../../../../images/nutella/jerseis.png" alt="Nutella" class="max-w-[384px] w-full mx-auto"/>
                </div>

                <div class=" w-12/12 lg:w-7/12 mx-auto ">
                    <h4 class="text-center lg:text-left stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[28px] rem:leading-[36px] lg:rem:text-[41px] lg:rem:leading-[46px] rem:tracking-[0.5px] mb-6">¡HAS GANADO 2 JERSÉIS NAVIDEÑOS NUTELLA<sup class="rem:text-[25px]">®</sup>!</h4>
                    <h5 class="text-center lg:text-left font-montserrat uppercase text-black font-extrabold rem:text-[18px] rem:leading-[25px] lg:rem:text-[21px] lg:rem:leading-[25px] rem:tracking-[0.21px] mb-6">COMPLETA ESTOS DATOS PARA RECIBIRLOS</h5>
                    <h5 class="text-center lg:text-left font-montserrat rem:text-[16px] lg:rem:text-[18px] text-black font-extrabold rem:leading-[25px] rem:tracking-[0.18px] mb-6">Indica las tallas de tus 2 jerséis navideños</h5>
                    <form @submit.prevent="submitForm" class="mx-auto">
                        <div class="space-y-4">
                            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 block">
                                <SelectInputStock v-model:select="form.stock1" :options="stock" :default-value="-1" :error="form.errors.stock1" value="id" placeholder="Jersey 1*" label="name"  units="" used=""/>
                                <SelectInputStock v-model:select="form.stock2" :options="stock" :default-value="-1" :error="form.errors.stock2" value="id" placeholder="Jersey 2*" label="name"  units="" used=""/>
                            </div>
                            <p class="text-[#666666] font-montserrat underline hover_no-underline cursor-pointer rem:text-[12px] block" @click="showListModal = true">Guia de tallas</p>
                            <h5 class="text-center lg:text-left font-montserrat rem:text-[16px] lg:rem:text-[18px] text-black font-extrabold rem:leading-[25px] rem:tracking-[0.18px] !mt-8 !mb-6 block">Indica la dirección donde quieres recibir tu premio</h5>
                            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 block">

                                <SelectInput v-model:select="form.via" :options="vias" :default-value="-1" :error="form.errors.via" value="id" placeholder="Tipo de vía*" label="name" />

                                <TextInput type="text" v-model="form.name" label="Nombre de la vía*" :error="form.errors.name"  />

                                <TextInput type="text" v-model="form.number" label="Número*" :error="form.errors.number"  />

                                <TextInput type="text" v-model="form.stair" label="Escalera" :error="form.errors.stair"  />

                                <TextInput type="text" v-model="form.floor" label="Piso" :error="form.errors.floor"  />

                                <TextInput type="text" v-model="form.door" label="Puerta" :error="form.errors.door"  />

                                <TextInput type="text" v-model="form.zipNumber" label="Código Postal*" :error="form.errors.zipNumber"  />

                                <TextInput type="text" v-model="form.city" label="Población*" :error="form.errors.city"  />

                                <SelectInput v-model:select="form.province" :options="provinces" :default-value="-1" :error="form.errors.province" value="id" placeholder="Provincia*" label="name" />

                                <TextInput type="text" v-model="form.phone" label="Teléfono*" :error="form.errors.phone"  />

                            </div>

                            <div id="legals" class="!my-8">
                                <p class="text-[#6B6B6B] font-montserrat font-semibold rem:text-[12px] rem:leading-[18px] text-justify">* Campos obligatorios</p>
                            </div>


                            <div class="mt-[25px] flex flex-row justify-center lg:justify-start">
                                <FormButton type="submit" class="mx-auto lg:mx-0" :disabled="form.processing">
                                    Enviar
                                    <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                                </FormButton>
                            </div>

                            <div class="mx-auto" v-if="form.hasErrors">
                                <ErrorMessage />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="container mx-auto px-[15px] max-w-[970px]">
                <p class="rem:text-[12px] text-grey font-montserrat font-medium mb-[15px] text-center">Ferrero Ibérica, S.A. (en adelante, “Ferrero”) tratará los datos personales que Ud. nos proporcione para la correcta gestión de su solicitud conforme a su consentimiento. Ud. tiene derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición. Puede ejercer sus derechos mediante petición escrita a <a href="mailto:privacy.es@ferrero.com" class="underline">privacy.es@ferrero.com</a>. En todo caso, si necesita más información, Ud. puede consultar la información adicional y detallada sobre la política de privacidad a través del siguiente <a :href="route('privacy')" class="underline">link</a></p>
            </div>
        </div>
        <whitePatternInsideDown />

        <DialogModal closeable :show="showListModal" @close="showListModal = false">
            <template #content>
                <div class="w-full mx-auto bg-white p-[70px] pb-[30px] shadow-custom rounded-[12px] relative">
                    <div class="absolute top-[25px] right-[25px] cursor-pointer m-auto" @click="showListModal = false">
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

                    <h4 class="font-montserrat font-extrabold rem:text-[41px] rem:leading-[45px] text-center text-black my-[15px] max-w-[630px] w-full mx-auto"><span class="text-red">Guía de tallas</span></h4>


                    <table class="bg-red table-auto w-full text-center rounded-2xl table-auto text-center font-montserrat text-[16px] leading-[18px] text-black font-medium gap-4">
                        <thead class="text-black rem:text-[21px] rem:leading-[28px] font-bold p-4">
                            <tr class="bg-white">
                                <th class="px-6 py-3 tracking-wider rem:text-[16px]">Talla</th>
                                <th class="px-6 py-3 tracking-wider">XS</th>
                                <th class="px-6 py-3 tracking-wider">S</th>
                                <th class="px-6 py-3 tracking-wider">M</th>
                                <th class="px-6 py-3 tracking-wider">L</th>
                                <th class="px-6 py-3 tracking-wider">XL</th>
                            </tr>
                        </thead>
                        <tbody class="rounded-2xl text-white rem:text-[20px] rem:leading-[28px] font-bold">
                            <tr>
                                <td class="px-6 py-3 tracking-wider rem:text-[16px]">Ancho</td>
                                <td class="px-6 py-3 tracking-wider">44 cm</td>
                                <td class="px-6 py-3 tracking-wider">47 cm</td>
                                <td class="px-6 py-3 tracking-wider">50 cm</td>
                                <td class="px-6 py-3 tracking-wider">53 cm</td>
                                <td class="px-6 py-3 tracking-wider">58 cm</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 tracking-wider rem:text-[16px]">Largo</td>
                                <td class="px-6 py-3 tracking-wider">66 cm</td>
                                <td class="px-6 py-3 tracking-wider">68 cm</td>
                                <td class="px-6 py-3 tracking-wider">70 cm</td>
                                <td class="px-6 py-3 tracking-wider">72 cm</td>
                                <td class="px-6 py-3 tracking-wider">75 cm</td>
                            </tr>
                        </tbody>
                    </table>
                    <img src="../../../../../resources/images/nutella/talla.png" alt="Tallas" class="max-w-[200px] lg:max-w-[300px] w-full mx-auto mt-[40px] mb-[20px]"/>
                </div>
            </template>
        </DialogModal>

    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import whitePatternInside from "@/Components/inside/whitePatternInside.vue";
import whitePatternInsideDown from "@/Components/inside/whitePatternInsideDown.vue";
import { useForm, usePage } from '@inertiajs/vue3';
import {ref} from 'vue';
import TextInput from "@/Components/TextInput.vue";
import SelectInput from "@/Components/SelectInput.vue";
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {BiUpload, FaCircleNotch} from "oh-vue-icons/icons";
import FileUpload from "@/Components/FileUpload.vue";
import FormButton from "@/Components/FormButton.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputLabelCheckbox from "@/Components/InputLabelCheckbox.vue";
import SelectInputStock from "@/Components/SelectInputStock.vue";
import DialogModal from "@/Components/Admin/DialogModal.vue";
import ErrorMessage from "@/Components/ErrorMessage.vue";
addIcons(BiUpload, FaCircleNotch);

const showListModal = ref(false);

const provinces = usePage().props.provinces;
const vias = usePage().props.vias;
const stock = usePage().props.stock;

const props = defineProps({
    token: String,
    type: {
        type: Number,
        default: 0,
    },
});

const form = useForm({
    // Tallas
    stock1: "",
    stock2: "",

    //Address
    via: null,
    name: null,
    number: null,
    stair: null,
    floor: null,
    door: null,
    zipNumber: null,
    city: null,
    province: null,
    phone: null,

    // Legals
    privacy: null,

    recaptcha: null,
});

const submitForm = () => {
    const siteKey = usePage().props.site_key;

    grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {action: 'submit'}).then(function(token) {
            form.recaptcha = token;
            form.post(route('more-info', props.token), {
                preserveScroll: true,
                onError:  () => {
                    //console.log('error');
                    setTimeout(() => { scrollToError();}, 100);
                },
                onSuccess: () => {
                    //console.log('great');
                },
            });
        });
    });
};

const scrollToError = () => {
    const errorMessageElement = document.getElementById('error');
    if (errorMessageElement) {
        errorMessageElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
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

</script>
