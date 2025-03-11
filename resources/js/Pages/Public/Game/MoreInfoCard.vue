<template>
    <GuestLayout title="¡HAS GANADO UNA SUSCRIPCIÓN de 50€ A UNA PLATAFORMA DE STREAMING!" menu useRecaptcha>
        <div class="container mx-auto p-4 pb-[100px]">
            <div class="w-12/12 lg:w-10/12 mx-auto">
                <div class="flex flex-col lg:flex-row items-center justify-center mb-10">
                    <div class="w-12/12 lg:w-3/12">
                        <img  src="../../../../../resources/images/prizes/cards.png" alt="Tarjetas" class="max-w-[220px] w-full"/>
                    </div>
                    <div class=" w-12/12 lg:w-9/12">
                        <h1 class="text-red font-ferry uppercase text-2xl lg:text-4xl rem:tracking-[0.15px] mt-6 text-center lg:text-left">¡HAS GANADO UNA SUSCRIPCIÓN de 50€ A UNA PLATAFORMA DE STREAMING!</h1>
                        <p class="font-ferry text-base mt-4 text-black text-center lg:text-left">COMPLETA ESTE FORMULARIO PARA SOLICITARLA</p>
                        <p class="font-montserrat text-base text-black text-center lg:text-left">Una vez hayamos validado tu participación, procederemos a la entrega de tu premio. Guarda el ticket de compra original, podríamos pedírtelo para validar tu participación.</p>
                    </div>
                </div>


                <div class="w-12/12 mx-auto">

                    <form @submit.prevent="submitForm" class="mx-auto">
                        <div class="grid gap-4 lg:grid-cols-2 block">
                            <FileUpload v-if="type == 0 || type == 3" v-model:select="form.front"  :error="form.errors.front" :form="form" label="Foto de DNI/NIE (cara)"/>
                            <FileUpload v-if="type == 0 || type == 3" v-model:select="form.back"  :error="form.errors.back" :form="form" label="Foto de tu DNI/NIE (dorso)"/>
                            <SelectInput v-if="type == 0" v-model:select="form.platforms" :options="platforms" :default-value="-1" :error="form.errors.platforms" value="id" placeholder="Plataforma de streaming" label="name" />
                        </div>

                        <p class="mt-4 text-sm text-black">Todos los campos son obligatorios</p>

                        <div class="my-6 flex flex-row justify-center">
                            <FormButton type="submit" class="mx-auto lg:mx-0" :disabled="form.processing">
                                Enviar
                                <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                            </FormButton>
                        </div>

                        <div class="mx-auto max-w-[720px] w-full"  v-if="type == 0">
                            <p class="text-center font-montserrat text-sm mb-4 text-black">Si ahora no puedes rellenarlo, no te preocupes porque <span class="font-bold">te hemos enviado un correo electrónico</span> con un enlace para que lo rellenes en otro momento. Recuerda que dispones de <span class="font-bold">7 días hábiles para solicitar tu premio</span> si no, entenderemos que <span class="font-bold">renuncias al premio.</span></p>
                        </div>


                        <div class="mx-auto" v-if="form.hasErrors">
                            <ErrorMessage />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import {addIcons, OhVueIcon} from "oh-vue-icons";
import {BiUpload, FaCircleNotch} from "oh-vue-icons/icons";
import FileUpload from "@/Components/FileUpload.vue";
import FormButton from "@/Components/FormButton.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputLabelCheckbox from "@/Components/InputLabelCheckbox.vue";
import ErrorMessage from "@/Components/ErrorMessage.vue";
import {nextTick, computed, onMounted} from "vue";
import SelectInput from "@/Components/SelectInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

addIcons(BiUpload, FaCircleNotch);

const provinces = usePage().props.provinces;
const vias = usePage().props.vias;
const platforms = usePage().props.platforms;
const type = usePage().props.type;

onMounted(() => {
    nextTick(() => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

const props = defineProps({
    token: String,
    type: {
        type: String,
        default: 0,
    },
});

const form = useForm({
    //User Data
    // front: null,
    // back: null,
    // letter: null,
    platforms: null,

    //Form
    type: 0,
    prize: 2,

    recaptcha: null,
});


const submitForm = () => {
    const siteKey = usePage().props.site_key;

    grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {action: 'submit'}).then(function(token) {
            form.recaptcha = token;
            form.type = props.type;
            form.post(route('more-info', props.token), {
                preserveScroll: true,
                onError:  () => {
                    //console.log('error');
                    //setTimeout(() => { scrollToError();}, 100);
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


const removeSpaces = (value) => {
    return value.replace(/\s+/g, '');
};

const updateIban = (value) => {
    form.iban = removeSpaces(value);
};

const handleInput = (event) => {
    const input = event.target;
    const cursorPosition = input.selectionStart;
    form.iban = removeSpaces(input.value);

    nextTick(() => {
        input.setSelectionRange(cursorPosition, cursorPosition);
    });
};

const handlePaste = (event) => {
    event.preventDefault();
    const pastedText = (event.clipboardData || window.clipboardData).getData('text');
    form.iban = removeSpaces(pastedText);
};

const showDniInput = computed(() => {
    return props.type == 3 || props.type == 4;
})
</script>
