<template>
    <div class="bg-yellow py-[100px] relative after:absolute after:top-[-92px]  after:right-0 after:left-0 after:w-full after:mx-auto after:bg-curveYellow after:bg-no-repeat after:bg-center after:bg-[length:2560px_92px] after:h-[92px]">
        <div class="container mx-auto px-[15px]">

            <div class="flex flex-row justify-center items-center mb-[40px] lg:mb-0">

                <div class="mx-auto w-6/12  ml-0 block lg:hidden">
                    <img src="../../../../resources/images/astro.png" alt="kinder" class="max-w-[200px] w-full mx-auto"/>
                </div>
                 <h1 class="w-full max-w-[870px] mx-auto mt-[5px] lg:mb-[60px] font-hermes text-brown text-[30px] leading-[35px] tracking-[-0.33px] md:text-[48px] md:leading-[50px] md:tracking-[-0.48px] uppercase text-center">
                    EL ESPACIO TE ESPERA, ¡SUERTE!
                </h1>
            </div>

            <div class="flex flex-row justify-center items-start">

                <div class="mx-auto w-12/12 md:w-5/12  ml-0 hidden lg:block">
                    <img src="../../../../resources/images/astro.png" alt="kinder" class="max-w-[520px] w-full mx-auto ml-0 pb-5"/>
                </div>
                <form @submit.prevent="submitForm" class="mx-auto w-full lg:w-6/12 ml-0">
                    <div class="grid gap-5 grid-cols-1 lg:grid-cols-2">
                        <TextInput type="text" v-model="form.nombre" label="Nombre*" :error="form.errors.nombre"  />

                        <TextInput type="text" v-model="form.first_surname" :key="0" label="Primer apellido*" :error="form.errors.first_surname" />

                        <TextInput type="text" v-model="form.second_surname" :key="1" label="Segundo apellido" :error="form.errors.second_surname" />

                        <TextInput type="text" v-model="form.email" label="Correo electrónico*" :error="form.errors.email" />

                        <div class="w-full lg:col-span-2">
                            <FileUpload v-model:select="form.file"  :error="form.errors.file" :form="form" label="Imagen de tu pack*"/>
                        </div>
                    </div>


                    <div id="legals" class="my-8 space-y-2 checkbox block">
                        <div class="wrapper-checkbox flex flex-row items-start justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.adult" :error="form.errors.adult" id="adult" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="adult" v-on:click="onClickLabel" :class="{ 'error': form.errors.adult }"></label>
                            <InputLabelCheckbox for="adult" class="" :error="form.errors.adult">Confirmo que soy mayor de 18 años*.</InputLabelCheckbox>
                        </div>
                        <div class="wrapper-checkbox flex flex-row items-start justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="legal" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="legal" v-on:click="onClickLabel" :class="{ 'error': form.errors.legal }"></label>
                            <InputLabelCheckbox for="legal" class="" :error="form.errors.legal">Acepto las <a class="underline hover:underline-none" target="_blank" :href="route('legal')">bases legales</a> de la promoción*</InputLabelCheckbox>
                        </div>

                        <div class="wrapper-checkbox flex flex-row items-start justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.privacy" :error="form.errors.privacy" id="privacy" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="privacy" v-on:click="onClickLabel" :class="{ 'error': form.errors.privacy }"></label>
                            <InputLabelCheckbox for="privacy" class="" :error="form.errors.privacy">Acepto la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a> de Ferrero Ibérica, S.A*</InputLabelCheckbox>
                        </div>

                        <div class="wrapper-checkbox flex flex-row items-start justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.ads" id="ads" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="ads" v-on:click="onClickLabel"></label>
                            <InputLabelCheckbox for="ads" >Deseo recibir comunicaciones comerciales de los productos de Ferrero Ibérica S.A.</InputLabelCheckbox>
                        </div>
                    </div>

                    <div id="legals" class="my-8 space-y-2 checkbox block">
                        <p class="rem:text-[16px] text-brown font-tekoRegular ml-[10px]">*Campos obligatorios</p>
                    </div>


                    <div class="mt-[25px] flex items-center lg:items-start lg:justify-start flex-row ">
                        <FormButton type="submit" class="mx-auto lg:mx-0" :disabled="form.processing">
                            Participa
                            <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                        </FormButton>
                    </div>


                </form>

            </div>

            <div class="mx-auto  w-12/12 lg:w-10/12 ">
                <div v-if="form.hasErrors" id="error" class="mx-auto text-center px-2 py-4 my-[15px] border-error bg-error border-[1px] mt-8 rounded-md">
                    <span class="text-white block font-hermes rem:text-[14px] rem:leading-[21px] uppercase">Formulario incompleto o erróneo.</span>
                    <span class="text-white block font-hermes rem:text-[14px] rem:leading-[21px]">Por favor, revisa o completa los campos remarcados. Gracias.</span>
                </div>
            </div>

            <div class="mx-auto  w-12/12 lg:w-10/12 my-[30px]">
                <p class="text-brown font-tekoRegular rem:text-[17px] rem:leading-[18px] mb-[15px] text-center"><span class="font-tekoSemiBold">Ferrero Ibérica, S.A.</span> (en adelante,<span>“Ferrero”</span>) tratará los datos personales que Ud. nos proporcione para la correcta gestión de su solicitud conforme a su consentimiento. Ud. tiene derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición. Puede ejercer sus derechos mediante petición escrita a <a href="mailto:privacy.es@ferrero.com" class="underline">privacy.es@ferrero.com</a>. En todo caso, si necesita más información, Ud. puede consultar la información adicional y detallada sobre la política de privacidad a través del siguiente <a :href="route('privacy')" class="font-tekoSemiBold">link</a></p>

            </div>
        </div>
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


addIcons(BiUpload, FaCircleNotch);

const form = useForm({
    nombre: null,
    first_surname: null,
    second_surname: null,
    email: null,
    phone: null,

    // File upload
    file: null,

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

</script>
