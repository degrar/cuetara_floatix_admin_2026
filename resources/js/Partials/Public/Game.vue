<template>
    <div class="container mx-auto p-4 py-12 lg:py-20">
        <div class="flex flex-col lg:flex-row justify-center items-start">

            <div class="mx-auto w-12/12 lg:w-4/12 xl:w-5/12">
                <img src="../../../../resources/images/game/game.png" alt="Yatekomo" class="max-w-[200px] lg:max-w-[380px] w-full mx-auto px-4 pb-5"/>
            </div>
            <div class="mx-auto w-12/12 lg:w-8/12 xl:w-7/12">
                <form @submit.prevent="submitForm" >
                    <h1 class="font-ferry text-2xl lg:text-5xl text-black uppercase pb-4 text-center lg:text-left">¡Participa ahora!</h1>
                    <div class="grid gap-4">
                        <div class=" grid gap-4 grid-cols-1 lg:grid-cols-3">
                            <TextInput type="text" v-model="form.nombre" label="Nombre" :error="form.errors.nombre"  />
                            <TextInput type="text" v-model="form.first_surname" :key="0" label="Apellidos" :error="form.errors.first_surname" />
                            <TextInput type="text" v-model="form.email" label="E-mail" :error="form.errors.email" />

                        </div>
                        <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                            <FileUpload v-model:select="form.file"  :error="form.errors.file" :form="form" label="Imagen ticket de compra"/>
                            <TextInput :error="form.errors.buydate"  type="date" :min="minDate" :max="maxDate" v-model="form.buydate" label="Fecha de compra" />
                        </div>
                    </div>

                    <div id="legals" class="my-4 space-y-2.5 checkbox block">
                        <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.adult" :error="form.errors.adult" id="adult" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="adult" v-on:click="onClickLabel" :class="{ 'error': form.errors.adult }"></label>
                            <InputLabelCheckbox for="adult" :error="form.errors.adult"  >Confirmo que soy mayor de 18 años</InputLabelCheckbox>
                        </div>

                        <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                            <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="legal" />
                            <label class="flex flex-row items-center justify-center cursor-pointer" for="legal" v-on:click="onClickLabel" :class="{ 'error': form.errors.legal }"></label>
                            <InputLabelCheckbox for="legal" class="" :error="form.errors.legal">Acepto las <a class="underline hover:underline-none" target="_blank" :href="route('legal')">bases legales</a> y la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a></InputLabelCheckbox>
                        </div>

                        <p class="text-xs text-black">Le informamos que los datos personales que nos facilite serán tratados por GALLINA BLANCA, S.A., como Responsable del tratamiento, con la finalidad de gestionar su participación en la promoción. Puede obtener más información acerca del tratamiento, así sobre cómo puede ejercer sus derechos en nuestra Política de Privacidad</p>
                        <p class="text-sm text-black">Todos los campos son obligatorios</p>
                        <div class="box border-[1px] border-black rounded-xl p-2 lg:p-4 flex flex-col md:flex-row items-center justify-center">

                                <svg class="m-4" xmlns="http://www.w3.org/2000/svg" width="71" height="67" viewBox="0 0 71 67" fill="none">
                                    <g clip-path="url(#clip0_6014_1950)">
                                        <path d="M51.4715 25.9829L40.6763 29.9294C40.6763 29.9294 42.2185 37.7847 47.334 35.9055C52.3367 34.0638 51.4715 25.9829 51.4715 25.9829Z" fill="#CADEDE"/>
                                        <path d="M1.63281 13.467L2.87408 21.4727C6.40981 26.5467 17.2427 30.1925 30.0691 30.1925C43.046 30.1925 53.9918 26.434 57.377 21.3223L58.4678 13.5046H1.63281V13.467Z" fill="#CADEDE"/>
                                        <path d="M30.0691 25.7198C45.7741 25.7198 58.5055 20.234 58.5055 13.467C58.5055 6.6999 45.7741 1.21411 30.0691 1.21411C14.3642 1.21411 1.63281 6.6999 1.63281 13.467C1.63281 20.234 14.3642 25.7198 30.0691 25.7198Z" fill="#CADEDE"/>
                                        <path d="M30.0691 25.7198C45.7741 25.7198 58.5055 20.234 58.5055 13.467C58.5055 6.6999 45.7741 1.21411 30.0691 1.21411C14.3642 1.21411 1.63281 6.6999 1.63281 13.467C1.63281 20.234 14.3642 25.7198 30.0691 25.7198Z" stroke="#5B443B" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.20605 24.254L9.38123 53.984C10.472 58.795 18.5967 64.3952 29.9938 64.3952C41.3909 64.3952 49.7413 59.2084 50.6064 53.984L54.7439 24.4419" stroke="black" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M40.6387 29.9294C40.6387 29.9294 42.1809 37.7847 47.2964 35.9055C52.3367 34.0638 51.4716 25.9829 51.4716 25.9829" stroke="#5B443B" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.63281 13.467L2.87408 21.4727C6.40981 26.5467 17.2427 30.1925 30.0691 30.1925C43.046 30.1925 53.9918 26.434 57.377 21.3223L58.4678 13.5046" stroke="#5B443B" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_6014_1950">
                                            <rect width="70" height="66" fill="white" transform="translate(0.917969 0.5)"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            <div class="max-w-[420px] ">
                                <p class="text-black font-ferry text-base text-center md:text-left"><span class="text-red block md:inline">¡IMPORTANTE!</span> 1 YATEKOMO = 1 PARTICIPACIÓN </p>
                                <p class="text-black text-base font-montserrat text-center md:text-left">Guarda tu ticket de compra ya que, si resultas ganador, deberás enviárnoslo. Gracias.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-[25px] flex items-center lg:items-start lg:justify-start flex-row ">
                        <FormButton type="submit" class="mx-auto lg:mx-0" :disabled="form.processing">
                            Participa
                            <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                        </FormButton>
                    </div>

                    <div class="mx-auto w-12/12" v-if="form.hasErrors">
                        <ErrorMessage />
                    </div>

                </form>

            </div>
        </div>
    </div>
</template>

<script setup>
import FormButton from '@/Components/FormButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {BiUpload, FaCircleNotch} from "oh-vue-icons/icons";
import InputLabelCheckbox from "@/Components/InputLabelCheckbox.vue";
import ErrorMessage from "@/Components/ErrorMessage.vue";
import FileUpload from "@/Components/FileUpload.vue";
import SelectInput from "@/Components/SelectInput.vue";
import SelectInputStock from "@/Components/SelectInputStock.vue";

addIcons(BiUpload, FaCircleNotch);

const retailers = usePage().props.retailers;
const products = usePage().props.products;

const form = useForm({
    nombre: null,
    first_surname: null,
    email: null,

    // Ticket
    buydate: null,
    file: null,

    // Legals
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

//DATE TICKET
const minDate = '2024-11-20';

let maxDate;
maxDate = new Date().toISOString().split('T')[0];

</script>

<style scoped>

</style>