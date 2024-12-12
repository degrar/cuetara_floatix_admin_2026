<template>
    <div class="container mx-auto p-4">
        <div class="flex flex-row justify-center items-start">

            <form @submit.prevent="submitForm" class="mx-auto w-full  ml-0">

                <h5 class="font-roboto rem:text-[18px] rem:leading-[25px] rem:tracking-[0.18px] text-black font-extrabold rem:mt-[25px] rem:mb-[10px]">Indica tus datos personales</h5>
                <div class="grid gap-4 grid-cols-1 lg:grid-cols-4">
                    <TextInput type="text" v-model="form.nombre" label="Nombre*" :error="form.errors.nombre"  />

                    <TextInput type="text" v-model="form.first_surname" :key="0" label="Apellido*" :error="form.errors.first_surname" />

                    <TextInput type="text" v-model="form.email" label="Correo electrónico*" :error="form.errors.email" />

                    <TextInput type="text" v-model="form.email_repeat" label="Repetir correo electrónico*" :error="form.errors.email_repeat" />

                </div>

                <h5 class="font-roboto rem:text-[18px] rem:leading-[25px] rem:tracking-[0.18px] text-black font-extrabold rem:mt-[25px] rem:mb-[10px]">Indica los datos de compra</h5>
                <div class="grid gap-4 grid-cols-1 lg:grid-cols-3">
                    <SelectInput v-model:select="form.retailer" :options="retailers" :default-value="-1" :error="form.errors.retailer" value="id" placeholder="Establecimiento de compra*" label="name" />
                    <TextInput v-if="form.retailer === '1'" type="text" v-model="form.other_retailer" label="Otro establecimiento*" :error="form.errors.other_retailer" />
                    <TextInput :error="form.errors.buydate"  type="date" :min="minDate" :max="maxDate" v-model="form.buydate" label="Fecha de ticket de compra*" />
                    <TextInput :error="form.errors.amount" type="number" v-model="form.amount" label="Importe de ticket de compra*" />
                    <FileUpload v-model:select="form.file"  :error="form.errors.file" :form="form" label="Imagen de ticket de compra*"/>
                    <SelectInput v-model:select="form.product" :options="products" :default-value="-1" :error="form.errors.product" value="id" placeholder="Producto comprado*" label="name" />
                </div>

                <div id="legals" class="my-8 space-y-2 checkbox block">

                    <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                        <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="legal" />
                        <label class="flex flex-row items-center justify-center cursor-pointer" for="legal" v-on:click="onClickLabel" :class="{ 'error': form.errors.legal }"></label>
                        <InputLabelCheckbox for="legal" class="" :error="form.errors.legal">Acepto las <a class="underline hover:underline-none" target="_blank" :href="route('legal')">bases legales</a> y la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a>*</InputLabelCheckbox>
                    </div>

                    <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                        <Checkbox v-model:checked="form.ads" id="ads" />
                        <label class="flex flex-row items-center justify-center cursor-pointer" for="ads" v-on:click="onClickLabel"></label>
                        <InputLabelCheckbox for="ads" >Quiero recibir notificaciones e información de FREUDENBERG HOME AND CLEANING SOLUTIONS IBERICA.</InputLabelCheckbox>
                    </div>
                </div>

                <div id="legals" class="my-8 space-y-2 checkbox block">
                    <p class="rem:text-[12px] text-grey font-roboto font-medium ml-[10px]">*Campos obligatorios</p>
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
    email_repeat: null,

    // Ticket
    retailer: null,
    other_retailer: null,
    buydate: null,
    amount: null,
    file: null,
    product: null,

    // Legals
    legal: null,
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

//DATE TICKET
const minDate = '2024-11-20';

let maxDate;
maxDate = new Date().toISOString().split('T')[0];

</script>

<style scoped>

</style>