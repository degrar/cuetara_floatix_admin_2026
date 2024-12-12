<template>
    <GuestLayout title="Ganador" menu useRecaptcha>
        <div class="container mx-auto p-4 pb-[100px] lg:py-10 flex flex-col lg:flex-row justify-center items-center lg:items-start">
            <div class=" w-12/12 lg:w-7/12 mx-auto ">
                <form @submit.prevent="submitForm" class="mx-auto">
                    <div class="space-y-4">
                        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 block">
                            <div v-if="!showDniInput">
                            <TextInput
                                type="text"
                                :modelValue="form.iban"
                                @update:modelValue="updateIban"
                                @input="handleInput"
                                @paste="handlePaste"
                                label="Número de IBAN en el que quieres que ingresemos tu premio"
                                :error="form.errors.iban"
                            />
                            </div>
                            <FileUpload v-model:select="form.front"  :error="form.errors.front" :form="form" label="Foto de tu DNI (cara)"/>
                            <FileUpload v-model:select="form.back"  :error="form.errors.back" :form="form" label="Foto de tu DNI (dorso)"/>


                        </div>

                        <div id="legals" class="my-8 space-y-2 checkbox block">

                            <div class="wrapper-checkbox flex flex-row items-center justify-start cursor-pointer">
                                <Checkbox v-model:checked="form.privacy" :error="form.errors.privacy" id="privacy" />
                                <label class="flex flex-row items-center justify-center cursor-pointer" for="privacy" v-on:click="onClickLabel" :class="{ 'error': form.errors.privacy }"></label>
                                <InputLabelCheckbox for="privacy" class="" :error="form.errors.privacy">Acepto la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de privacidad</a>*</InputLabelCheckbox>
                            </div>


                        </div>
                        <div class="mt-[25px] flex flex-row justify-center lg:justify-start">
                            <FormButton type="submit" class="mx-auto lg:mx-0" :disabled="form.processing">
                                Enviar
                                <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                            </FormButton>
                        </div>

                        <div class="mx-auto" v-if="form.hasErrors">
                            <ErrorMessage />
                        </div>

                    </div>
                </form>
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
import {nextTick, computed} from "vue";

addIcons(BiUpload, FaCircleNotch);

const props = defineProps({
    token: String,
    type: {
        type: String,
        default: 0,
    },
});

const form = useForm({
    // Data
    iban: '',
    front: 'null',
    back: null,
    type: 0,

    // Legals
    privacy: null,
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
