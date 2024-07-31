<template>
    <GuestLayout title="Ganador" menu useRecaptcha>
        <InsideHeaderPage />

        <div class="bg-yellow">
            <div class="container mx-auto">
                <div class=" w-12/12 lg:w-10/12 mx-auto pb-16 px-[15px]">
                    <div class="py-[30px]">
                        <h1 class="font-hermes text-brown uppercase rem:text-[33px] leading-[35px] tracking-[-0.33px] lg:rem:text-[60px] lg:leading-[62px] lg:tracking-[.6px] text-center my-2">¡ENHORABUENA!</h1>
                        <h2 class="font-tekoRegular text-brown uppercase rem:text-[33px] leading-[35px] tracking-[-0.33px] lg:rem:text-[60px] lg:leading-[62px] lg:tracking-[.6px] text-center mt-2 mb-4">¡EL TELESCOPIO YA CASI ES TUYO!</h2>
                        <p class="max-w-[800px] w-full mx-auto  font-tekoMedium text-brown rem:text-[31px] rem:leading-[31px] rem:tracking-[.35px] lg:rem:text-[35px] lg:rem:leading-[36px] lg:rem:tracking-[.35px] text-center">Completa este formulario y, si todo está correcto, realizaremos el envío de tu premio.</p>
                    </div>

                    <form @submit.prevent="submitForm" class="mx-auto py-[50px]">
                        <div class="space-y-4">
                            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-2 block">
                                <SelectInputStock v-model:select="form.stock1" :options="stock" :default-value="-1" :error="form.errors.stock1" value="id" placeholder="Talla 1*" label="name"  units="" used=""/>
                                <SelectInputStock v-model:select="form.stock2" :options="stock" :default-value="-1" :error="form.errors.stock2" value="id" placeholder="Talla 2*" label="name"  units="" used=""/>

                            </div>
                            <p class="font-tekoMedium text-brown rem:text-[25px] rem:leading-[26px] rem:tracking-[-0.25px] !mt-6 block">Dirección de entre de tu premio</p>
                            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4 block">

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

                            <div id="legals" class="my-8 space-y-2 checkbox block">


                                <div class="wrapper-checkbox flex flex-row items-start justify-start cursor-pointer">
                                    <Checkbox v-model:checked="form.privacy" :error="form.errors.privacy" id="privacy" />
                                    <label class="flex flex-row items-center justify-center cursor-pointer" for="privacy" v-on:click="onClickLabel" :class="{ 'error': form.errors.privacy }"></label>
                                    <InputLabelCheckbox for="privacy" class="" :error="form.errors.privacy">Acepto la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a> de Ferrero Ibérica, S.A*</InputLabelCheckbox>
                                </div>


                            </div>

                            <div id="legals" class="!mt-8">
                                <p class="text-brown font-tekoRegular rem:text-[17px] rem:leading-[18px] mb-[15px] text-justify">* Campos obligatorios</p>
                            </div>


                            <div class="mt-[25px] flex items-center justify-center flex-row ">
                                <FormButton type="submit" class="mx-auto lg:mx-0" :disabled="form.processing">
                                    Enviar
                                    <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                                </FormButton>
                            </div>

                            <div class="mx-auto block">
                                <div v-if="form.hasErrors" id="error" class="mx-auto text-center px-2 py-4 my-[15px] border-error bg-error border-[1px] mt-8 rounded-md">
                                    <span class="text-white block font-hermes rem:text-[14px] rem:leading-[21px] uppercase">Formulario incompleto o erróneo.</span>
                                    <span class="text-white block font-hermes rem:text-[14px] rem:leading-[21px]">Por favor, revisa o completa los campos remarcados. Gracias.</span>
                                </div>
                            </div>

                            <div class="mx-auto block w-12/12 !mt-[50px] my-[30px]">
                                <p class="text-brown font-tekoRegular rem:text-[17px] rem:leading-[18px] mb-[15px] text-justify"><span class="font-tekoSemiBold">Ferrero Ibérica, S.A.</span> (en adelante,<span>“Ferrero”</span>) tratará los datos personales que Ud. nos proporcione para la correcta gestión de su solicitud conforme a su consentimiento. Ud. tiene derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición. Puede ejercer sus derechos mediante petición escrita a <a href="mailto:privacy.es@ferrero.com" class="underline">privacy.es@ferrero.com</a>. En todo caso, si necesita más información, Ud. puede consultar la información adicional y detallada sobre la política de privacidad a través del siguiente <a :href="route('privacy')" class="font-tekoSemiBold">link</a></p>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";
import { useForm, usePage } from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import SelectInput from "@/Components/SelectInput.vue";
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {BiUpload, FaCircleNotch} from "oh-vue-icons/icons";
import FileUpload from "@/Components/FileUpload.vue";
import FormButton from "@/Components/FormButton.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputLabelCheckbox from "@/Components/InputLabelCheckbox.vue";
import SelectInputStock from "@/Components/SelectInputStock.vue";
addIcons(BiUpload, FaCircleNotch);

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
    stock1: null,
    stock2: null,

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
