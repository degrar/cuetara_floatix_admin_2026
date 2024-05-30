<template>
    <GuestLayout title="Contacto" useRecaptcha menu>

        <template v-if="!sent">
            <div class="bg-white" :style="{ marginTop: headerHeight + 'px' }">
                <div class="container mx-auto px-[15px]">
                    <div class="flex justify-center flex-wrap items-stretch w-full">
                        <img :src="getImagePath('logos')" alt="50%" class="w-[620px] mx-auto pb-[15px]"/>
                    </div>
                </div>
            </div>
            <div class="backgroundpattern bg-center bg-no-repeat"></div>
            <div class="bg-yellow">
                <div class="container mx-auto px-[15px] py-8">
                    <h1 class="text-brown uppercase font-bemio text-center uppercase rem:text-[26px] rem:leading-[30px] lg:rem:text-[50px] lg:rem:leading-[54px] tracking-[1px] py-8">¿Tienes dudas?<br>¡Escríbenos!</h1>
                    <div class="flex justify-center flex-col">
                        <div class="w-full lg:w-4/12 mx-auto">
                            <form @submit.prevent="submitForm">
                                <div class="space-y-2">
                                <TextInput type="text" v-model="form.nombre" placeholder="Nombre" :error="form.errors.nombre" />
                                <TextInput type="text" v-model="form.email" placeholder="E-mail" class="" :error="form.errors.email" />
                                <TextArea type="text" v-model="form.message" placeholder="Mensaje" class="w-full" rows="8" :error="form.errors.message" />
                                </div>
                                <div class="text-sm mt-4 mb-6 flex flex-start">
                                    <div>
                                        <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="legal"  />
                                    </div>
                                    <InputLabel for="legal" class="text-white text-[14px] tracking-[-0.18px]" :error="form.errors.legal">Acepto el tratamiento de mis datos personales de conformidad con la <a class="underline font-extrabold hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a> de Ferrero</InputLabel>

                                </div>
                                <div class="mt-2 flex">
                                    <SubmitButton type="submit" class="mx-auto" :disabled="form.processing">
                                        Enviar
                                        <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                                    </SubmitButton>
                                </div>
                            </form>
                        </div>
                        <div v-if="form.hasErrors" id="error" class="mx-auto text-center px-2 py-4 border-error bg-error border-[1px] mt-8">
                            <span class="text-white block font-bold uppercase">Formulario incompleto o erróneo.</span>
                            <span class="text-white block font-normal">Por favor, revisa o completa los campos remarcados. Gracias.</span>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-else>
            <div class="bg-white" :style="{ marginTop: headerHeight + 'px' }">
                <div class="container mx-auto px-[15px]">
                    <div class="flex justify-center flex-wrap items-stretch w-full">
                        <img :src="getImagePath('logos')" alt="50%" class="w-[620px] mx-auto pb-[15px]"/>
                    </div>
                </div>
            </div>
            <div class="backgroundpattern bg-center bg-no-repeat"></div>
            <div class="bg-yellow">
                <div class="container mx-auto px-[15px] py-8">
                    <h1 class="text-brown uppercase font-bemio text-center uppercase rem:text-[26px] rem:leading-[30px] lg:rem:text-[50px] lg:rem:leading-[54px] tracking-[1px] py-8">Mensaje enviado correctamente</h1>
                    <p class="text-brown uppercase font-bemio uppercase rem:text-[18px] rem:leading-[20px] lg:rem:text-[21px] lg:rem:leading-[24px] text-center pb-4">Te contestaremos lo antes posible. ¡Gracias!</p>
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
</script>
