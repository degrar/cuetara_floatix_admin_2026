<template>
    <div class="container mx-auto px-[15px]">
        <h1 class="w-full max-w-[870px] mx-auto text-center font-bemio text-brown rem:text-[35px] rem:leading-[35px] tracking-[0.7px] lg:rem:text-[50px] lg:rem:leading-[50px] lg:tracking-[1px] uppercase mb-[50px] p-0">
            PUEDES GANAR LA VITRINA CON LA COLECCIÓN COMPLETA
        </h1>
        <form @submit.prevent="submitForm" class="mx-auto  w-12/12 lg:w-8/12 mb-[25px]">
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                <TextInput type="text" v-model="form.nombre" placeholder="Nombre*" :error="form.errors.nombre"  />

                <TextInput type="text" v-model="form.first_surname" :key="0" placeholder="Primer apellido*" class="md:mb-4" :error="form.errors.first_surname" />

                <TextInput type="text" v-model="form.second_surname" :key="1" placeholder="Segundo apellido" :error="form.errors.second_surname" />
            </div>
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <TextInput type="text" v-model="form.email" placeholder="Correo electrónico*" :error="form.errors.email" />

                <TextInput type="text" v-model="form.phone" placeholder="Teléfono*" maxlength="9"  class="md:mb-4" :error="form.errors.phone" />
            </div>

            <div class="justify-items-center mt-5 md:mt-0">
                <div class="w-full col-span-3">
                    <FileUpload v-model:select="form.file"  :error="form.errors.file" :form="form" />
                </div>
            </div>

            <div id="legals" class="mt-8 space-y-2 text-sm">
                <div>
                    <Checkbox v-model:checked="form.adult" :error="form.errors.adult" id="adult" />
                    <InputLabel for="legal" class="" :error="form.errors.adult">Confirmo que soy mayor de 18 años*.</InputLabel>
                </div>
                <div>
                    <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="legal" />
                    <InputLabel for="legal" class="" :error="form.errors.legal">Acepto las <a class="underline font-robotoBold hover:underline-none" target="_blank" :href="route('legal')">bases legales</a> de la promoción*</InputLabel>
                </div>
                <div>
                    <Checkbox v-model:checked="form.privacy" :error="form.errors.privacy" id="legal" />
                    <InputLabel for="legal" class="" :error="form.errors.privacy">Acepto la <a class="underline font-robotoBold hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a> de Ferrero Ibérica, S.A*</InputLabel>
                </div>
                <div>
                    <p class="text-brown font-roboto rem:text-[14px] text-left w-full mt-[25px]">* Campos obligatorios.</p>
                </div>
            </div>

            <div class="my-[25px] flex block">
                <SecondaryButton type="submit" class="mx-auto" :disabled="form.processing">
                    Participa
                    <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                </SecondaryButton>
            </div>

            <div v-if="form.hasErrors" id="error" class="mx-auto text-center px-2 py-4 border-error bg-error border-[1px] mt-8">
                <span class="text-white block font-bold uppercase">Formulario incompleto o erróneo.</span>
                <span class="text-white block font-normal">Por favor, revisa o completa los campos remarcados. Gracias.</span>
            </div>
        </form>
        <pre>
            {{ form }}
        </pre>
        <div class="mx-auto  w-12/12 lg:w-8/12 ">
            <p class="text-brown font-roboto rem:text-[14px] rem:leading-[18px] mb-[15px]"><span class="font-robotoBold">Ferrero Ibérica, S.A.</span> (en adelante,<span class="font-robotoBold">“Ferrero”</span>) tratará los datos personales que Ud. nos proporcione para la correcta gestión de su solicitud conforme a su consentimiento. Ud. tiene derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición. Puede ejercer sus derechos mediante petición escrita a <a href="mailto:privacy.es@ferrero.com" class="underline">privacy.es@ferrero.com</a>. En todo caso, si necesita más información, Ud. puede consultar la información adicional y detallada sobre la política de privacidad a través del siguiente <a :href="route('privacy')" class="font-robotoBold">link</a></p>
            <p class="text-brown font-roboto rem:text-[14px] rem:leading-[18px]"><span class="font-robotoBold">Warner Bros. Discovery</span> no está afiliada a este sorteo y no asume responsabilidad alguna relacionada con el mismo. Los participantes reconocen que Warner Bros. Discovery no es responsable de la organización, gestión ni resultados del sorteo.</p>
        </div>
    </div>
</template>

<script setup>
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import FileUpload from '@/Components/FileUpload.vue';
import SelectInput from '@/Components/SelectInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {BiUpload, FaCircleNotch} from "oh-vue-icons/icons";
import InputLabel from "@/Components/InputLabel.vue";

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
</script>
