<template>
    <GuestLayout title="Contacto" useRecaptcha menu>
        <InsideHeaderPage />
        <template v-if="!sent">

            <div class="bg-yellow">
                <div class="container mx-auto px-[15px] py-10">
                    <div class="flex flex-col-reverse lg:flex-row justify-center items-center lg:items-start">
                        <div class="max-w-[200px] lg:max-w-[380px] w-full mx-auto ">
                            <img src="../../../images/contact.png" alt="kinder" class="mt-[50px] lg:mt-0"/>
                        </div>
                        <div class="max-w-[600px] w-full mx-auto ">
                            <h1 class="font-hermes text-brown uppercase rem:text-[33px] leading-[35px] tracking-[-0.33px] lg:rem:text-[60px] lg:rem:leading-[62px] lg:rem:tracking-[-0.6px] text-center mb-6">¿EN QUÉ PODEMOS AYUDARTE?</h1>
                            <p class="w-full mx-auto  font-tekoMedium text-brown rem:text-[31px] rem:leading-[31px] rem:tracking-[-0.35px] lg:rem:text-[35px] lg:rem:leading-[36px] lg:rem:tracking-[-0.35px] text-center mb-6 ">Escríbenos y te contestaremos lo antes posible</p>
                            <div class="flex justify-center flex-col">
                                <div class="w-full mx-auto">
                                    <form @submit.prevent="submitForm">
                                        <div class="grid grid-cols-2 gap-4">
                                            <TextInput type="text" v-model="form.nombre" label="Nombre" :error="form.errors.nombre" />
                                            <TextInput type="text" v-model="form.email" label="E-mail" class="" :error="form.errors.email" />
                                            <TextArea type="text" v-model="form.message" label="Mensaje" class="w-full col-span-2" rows="8" :error="form.errors.message" />
                                        </div>
                                        <div id="legals" class="my-8 space-y-2 checkbox block">
                                            <div class="wrapper-checkbox flex flex-row items-start justify-start rem:mt-[15px] cursor-pointer">
                                                <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="privacy" />
                                                <label class="flex flex-row items-center justify-center cursor-pointer" for="privacy" v-on:click="onClickLabel" :class="{ 'error': form.errors.legal }"></label>
                                                <InputLabelCheckbox for="legal" class="" :error="form.errors.legal">Acepto el tratamiento de mis datos personales de conformidad con la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a> de Ferrero</InputLabelCheckbox>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex">
                                            <FormButton type="submit" class="mx-auto" :disabled="form.processing">
                                                Enviar
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


                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto px-[15px] pb-10 flex flex-row justify-center">
                    <div class="mx-auto  w-12/12 lg:w-10/12 my-[30px]">
                        <p class="text-brown font-tekoRegular rem:text-[17px] rem:leading-[18px] mb-[15px] text-center"><span class="font-tekoSemiBold">Ferrero Ibérica, S.A.</span> (en adelante, “Ferrero”) tratará los datos personales que Ud. nos proporcione para la correcta gestión de su solicitud conforme a su consentimiento. Ud. tiene derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición. Puede ejercer sus derechos mediante petición escrita a <a href="mailto:privacy.es@ferrero.com" class="underline">privacy.es@ferrero.com</a>. En todo caso, si necesita más información, Ud. puede consultar la información adicional y detallada sobre la política de privacidad a través del siguiente <a :href="route('privacy')" class="font-tekoSemiBold">link</a></p>

                    </div>
                </div>

            </div>
        </template>
        <template v-else>
            <div class="bg-yellow">
                <div class="container mx-auto px-[15px] py-10">
                    <div class="flex flex-col-reverse lg:flex-row justify-center">
                        <div class="max-w-[200px] lg:max-w-[380px] w-full mx-auto ">
                            <img src="../../../images/contact.png" alt="kinder" class="my-[50px] lg:my-0"/>
                        </div>
                        <div class="max-w-[600px] w-full mx-auto">
                            <h1 class="font-hermes text-brown uppercase rem:text-[33px] leading-[35px] tracking-[-0.33px] lg:rem:text-[60px] lg:rem:leading-[62px] lg:rem:tracking-[-0.6px] text-center mb-6">¡Mensaje recibido!</h1>
                            <p class="w-full mx-auto  font-tekoMedium text-brown rem:text-[31px] rem:leading-[31px] rem:tracking-[-0.35px] lg:rem:text-[35px] lg:rem:leading-[36px] lg:rem:tracking-[-0.35px] text-center mb-6 ">Te contestaremos lo antes posible. ¡Gracias!</p>
                        </div>
                    </div>
                </div>
            </div>

        </template>
    </GuestLayout>
</template>

<script setup>
import {Link, useForm, usePage} from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Checkbox from "@/Components/Checkbox.vue";
import SubmitButton from "@/Components/SubmitButton.vue";
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {BiUpload, FaCircleNotch} from "oh-vue-icons/icons";
import { useToast } from "vue-toastification";
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";
import InputLabelCheckbox from "@/Components/InputLabelCheckbox.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import FormButton from "@/Components/FormButton.vue";
addIcons(BiUpload, FaCircleNotch);

const form = useForm({
    nombre: null,
    email: null,
    message: null,
    legal: null,
    token: null
});

const toast = useToast();
const sent = ref(false);


const submitForm = () => {
    const siteKey = usePage().props.site_key;

    grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {action: 'submit'}).then(function(token) {
            form.token = token;
            form.post(route('contact'),{
                preserveScroll: true,
                onError:  () => {
                    //console.log('error');
                    setTimeout(() => { scrollToError();}, 100);
                },
                onSuccess: () => {
                    form.reset();
                    sent.value = true;
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
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

const headerHeight = ref(0);

const getHeaderHeight = () => {
    headerHeight.value = document.querySelector('#header').offsetHeight ;
};

onMounted(() => {
    getHeaderHeight();
    window.addEventListener('resize', getHeaderHeight);
});

onUnmounted(() => {
    window.removeEventListener('resize', getHeaderHeight);
});

const getImagePath = (photo) => {
    return new URL(`/resources/images/${photo}.png`, import.meta.url).href;
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
