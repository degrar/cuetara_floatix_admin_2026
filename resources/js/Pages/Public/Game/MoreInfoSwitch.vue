<template>
    <GuestLayout title="¡HAS GANADO UNA NINTENDO SWITCH!" menu useRecaptcha>
        <div class="container mx-auto p-4 pb-[100px]">
            <div class="w-12/12 lg:w-10/12 mx-auto">
                <div class="flex flex-col lg:flex-row items-center justify-center mb-10">
                    <div class="w-12/12 lg:w-3/12">
                        <img  src="../../../../../resources/images/prizes/switch.png" alt="Nintendo" class=" max-w-[150px] lg:max-w-[220px] w-full"/>
                    </div>
                    <div class=" w-12/12 lg:w-9/12">
                        <h1 class="text-red font-ferry uppercase text-2xl lg:text-4xl rem:tracking-[0.15px] mt-6 text-center lg:text-left">¡HAS GANADO UNA NINTENDO SWITCH!</h1>
                        <p class="font-ferry text-base mt-4 text-black text-center lg:text-left">COMPLETA ESTE FORMULARIO PARA SOLICITARLA</p>
                        <p class="font-montserrat text-base text-black text-center lg:text-left">Una vez hayamos validado tu participación, procederemos a la entrega de tu premio. Guarda el ticket de compra original, podríamos pedírtelo para validar tu participación.</p>
                    </div>
                </div>


                <div class="w-12/12 mx-auto">

                    <form @submit.prevent="submitForm" class="mx-auto">
                        <h4  v-if="type == 0" class="w-full font-ferry text-base lg:text-lg mt-4 text-black border-black border-b-[1px] mt-3 mb-4 text-center text-left">Dirección postal donde quieres recibirla</h4>
                        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 mb-10"  v-if="type == 0">
                            <SelectInput v-model:select="form.via" :options="vias" :default-value="-1" :error="form.errors.via" value="id" placeholder="Tipo de vía*" label="name" />
                            <TextInput type="text" v-model="form.name" label="Nombre de la vía*" :error="form.errors.name"  />
                            <TextInput type="text" v-model="form.number" label="Número*" :error="form.errors.number"  />
                            <TextInput type="text" v-model="form.stair" label="Escalera" :error="form.errors.stair"  />
                            <TextInput type="text" v-model="form.floor" label="Piso" :error="form.errors.floor"  />
                            <TextInput type="text" v-model="form.door" label="Puerta" :error="form.errors.door"  />
                            <TextInput type="text" v-model="form.zipNumber" label="Código Postal*" :error="form.errors.zipNumber"  />
                            <TextInput type="text" v-model="form.city" label="Población*" :error="form.errors.city"  />
                            <SelectInput v-model:select="form.province" :options="provinces" :default-value="-1" :error="form.errors.province" value="id" placeholder="Provincia*" label="name" />
                        </div>

                        <h4 class="w-full font-ferry text-base lg:text-lg mt-4 text-black border-black border-b-[1px] mt-3 mb-4 text-center text-left">Tus datos personales</h4>
                        <div class="grid gap-4 lg:grid-cols-2 block">
                            <FileUpload v-if="type == 0 || type == 3" v-model:select="form.front"  :error="form.errors.front" :form="form" label="Foto de tu DNI (cara)*"/>
                            <FileUpload v-if="type == 0 || type == 3" v-model:select="form.back"  :error="form.errors.back" :form="form" label="Foto de tu DNI (dorso)*"/>
                            <FileUpload v-if="type == 0 || type == 2" v-model:select="form.letter"  :error="form.errors.letter" :letter="true" :form="form" label="Carta de aceptación del premio.*"/>
                            <TextInput v-if="type == 0" type="text" v-model="form.phone" label="Teléfono de contacto*" :error="form.errors.phone"  />
                        </div>

                        <p class="mt-4 text-sm text-black">* Campos obligatorios</p>

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

onMounted(() => {
    nextTick(() => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

const provinces = usePage().props.provinces;
const vias = usePage().props.vias;
const props = defineProps({
    token: String,
    type: {
        type: String,
        default: '',
    },
});

const form = useForm({
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

    //User Data
    front: null,
    back: null,
    letter: null,
    phone: null,

    //Form
    type: 0,
    prize: 1,

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
