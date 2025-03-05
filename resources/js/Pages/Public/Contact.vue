<template>
    <GuestLayout title="Contacto" useRecaptcha menu>
        <div class="py-[20px] lg:py-[50px]">
            <template v-if="!sent">
                <form @submit.prevent="submitForm">
                    <div class="container mx-auto px-[15px] pt-10">
                        <div class="max-w-[600px] w-full mx-auto ">
                            <h1 class="text-center text-red font-ferry uppercase text-2xl lg:text-4xl  rem:tracking-[0.15px]">¿Tienes alguna duda sobre esta promoción?</h1>
                            <p class="text-center font-montserrat text-sm lg:text-lg my-6">Escríbenos y te contestaremos lo antes posible</p>
                            <div class="flex justify-center flex-col">
                                <div class="w-full mx-auto">
                                    <div class="grid grid-cols-1 gap-4">
                                        <TextInput type="text" v-model="form.nombre" label="Nombre" :error="form.errors.nombre" />
                                        <TextInput type="text" v-model="form.email" label="E-mail" class="" :error="form.errors.email" />
                                        <TextArea type="text" v-model="form.message" label="Mensaje"  rows="8" :error="form.errors.message" />
                                    </div>
                                    <div id="legals" class="my-8 space-y-2 checkbox block">
                                        <div class="wrapper-checkbox flex flex-row items-start justify-start rem:mt-[15px] cursor-pointer">
                                            <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="privacy" />
                                            <label class="flex flex-row items-center justify-center cursor-pointer" for="privacy" v-on:click="onClickLabel" :class="{ 'error': form.errors.legal }"></label>
                                            <InputLabelCheckbox for="legal" class="text-black" :error="form.errors.legal">Acepto la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de protección de datos </a></InputLabelCheckbox>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 flex">
                                <FormButton type="submit" class="mx-auto" :disabled="form.processing">
                                    Enviar
                                    <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                                </FormButton>
                            </div>
                            <div class="mx-auto w-12/12" v-if="form.hasErrors">
                                <ErrorMessage />
                            </div>
                        </div>
                    </div>
                </form>

            </template>
            <template v-else>

                <div class="container mx-auto px-[15px] py-4">
                    <div class="flex flex-col justify-center items-center h-[calc(100vh-30rem)]">
                        <div class="max-w-[600px] w-full mx-auto">
                            <img src="../../../../resources/images/game/yatekomo.png" alt="Yatekomo" class="max-w-[220px] w-full mx-auto"/>
                            <h1 class="text-center text-red font-ferry uppercase text-2xl lg:text-4xl  rem:tracking-[0.15px]">¡MENSAJE RECIBIDO!</h1>
                            <p class="text-center font-montserrat text-sm lg:text-lg my-6">Te contestaremos en un YA. ¡Muchas gracias!</p>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <whitePatternInsideDown />
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
import whitePatternInside from "@/Components/inside/whitePatternInside.vue";
import whitePatternInsideDown from "@/Components/inside/whitePatternInsideDown.vue";
import InputLabelCheckbox from "@/Components/InputLabelCheckbox.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import FormButton from "@/Components/FormButton.vue";
import ErrorMessage from "@/Components/ErrorMessage.vue";
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
                    //setTimeout(() => { scrollToError();}, 100);
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
    headerHeight.value = document.querySelector('#nutella-header').offsetHeight ;
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
