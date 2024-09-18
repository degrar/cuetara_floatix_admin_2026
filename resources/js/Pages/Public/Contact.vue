 <template>
    <GuestLayout title="Contacto" useRecaptcha menu>
        <whitePatternInside />

        <template v-if="!sent">

            <div class="bg-whitePattern py-[20px] lg:py-[50px]">
                <form @submit.prevent="submitForm">
                    <div class="container mx-auto px-[15px] pt-10">
                        <h1 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[28px] rem:leading-[32px] lg:rem:text-[41px] lg:rem:leading-[41px] rem:tracking-[0px] text-center mb-0 lg:mb-12 block">¿Tienes alguna duda?</h1>

                        <div class="flex flex-col lg:flex-row justify-center items-center lg:items-start">
                            <div class="max-w-[200px] lg:max-w-[460px] w-full mx-auto ">
                                <img src="../../../images/nutella/contact.png" alt="Nutella" class="lg:mt-0"/>
                            </div>
                            <div class="max-w-[600px] w-full mx-auto ">
                                <p class="text-center lg:text-left w-full mx-auto  font-montserrat rem:text-[18px] rem:leading-[25px] lg:rem:text-[21px] lg:rem:leading-[21px] font-medium mb-6 ">Escríbenos y te contestaremos lo antes posible</p>
                                <div class="flex justify-center flex-col">
                                    <div class="w-full mx-auto">
                                        <div class="grid grid-cols-2 gap-4">
                                            <TextInput type="text" v-model="form.nombre" label="Nombre" :error="form.errors.nombre" />
                                            <TextInput type="text" v-model="form.email" label="E-mail" class="" :error="form.errors.email" />
                                            <TextArea type="text" v-model="form.message" label="Mensaje" class="w-full col-span-2" rows="8" :error="form.errors.message" />
                                        </div>
                                        <div id="legals" class="my-8 space-y-2 checkbox block">
                                            <div class="wrapper-checkbox flex flex-row items-start justify-start rem:mt-[15px] cursor-pointer">
                                                <Checkbox v-model:checked="form.legal" :error="form.errors.legal" id="privacy" />
                                                <label class="flex flex-row items-center justify-center cursor-pointer" for="privacy" v-on:click="onClickLabel" :class="{ 'error': form.errors.legal }"></label>
                                                <InputLabelCheckbox for="legal" class="text-black" :error="form.errors.legal">Acepto el tratamiento de mis datos personales de conformidad con la <a class="underline hover:underline-none" target="_blank" :href="route('privacy')">política de protección de datos </a> de Ferrero</InputLabelCheckbox>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mx-auto px-[15px] flex flex-row justify-center">
                        <div class="mx-auto  w-12/12 lg:w-10/12 my-[15px]">
                            <p class="rem:text-[12px] text-grey font-montserrat font-medium mb-[15px] text-center">Ferrero Ibérica, S.A. (en adelante, “Ferrero”) tratará los datos personales que Ud. nos proporcione para la correcta gestión de su solicitud conforme a su consentimiento. Ud. tiene derecho a ejercer sus derechos de acceso, rectificación y supresión, limitación del tratamiento, portabilidad, oposición. Puede ejercer sus derechos mediante petición escrita a <a href="mailto:privacy.es@ferrero.com" class="underline">privacy.es@ferrero.com</a>. En todo caso, si necesita más información, Ud. puede consultar la información adicional y detallada sobre la política de privacidad a través del siguiente <a :href="route('privacy')" class="underline">link</a></p>

                        </div>
                    </div>
                    <div class="container mx-auto px-[15px] flex flex-row justify-center">
                        <div class="mt-2 flex">
                            <FormButton type="submit" class="mx-auto" :disabled="form.processing">
                                Enviar
                                <OhVueIcon v-if="form.processing" name="fa-circle-notch" animation="spin" />
                            </FormButton>
                        </div>
                    </div>
                    <div class="container mx-auto px-[15px] flex flex-row justify-center">
                        <div class="mx-auto w-12/12 lg:w-10/12" v-if="form.hasErrors">
                            <ErrorMessage />
                        </div>

                    </div>
                </form>
            </div>
        </template>
        <template v-else>
            <div class="bg-whitePattern py-[10px] lg:py-[20px]">
                <div class="container mx-auto px-[15px] py-4">
                    <div class="flex flex-col justify-center">
                        <div class="max-w-[200px] lg:max-w-[380px] w-full mx-auto ">
                            <img src="../../../images/nutella/contact.png" alt="kinder" class="my-0"/>
                        </div>
                        <div class="max-w-[600px] w-full mx-auto">
                            <h1 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[28px] rem:leading-[32px] lg:rem:text-[41px] lg:rem:leading-[41px] rem:tracking-[0px] text-center mb-4 lg:mb-12 block">¡Mensaje recibido!</h1>
                            <p class="w-full mx-auto text-center font-montserrat rem:text-[18px] rem:leading-[25px] lg:rem:text-[21px] lg:rem:leading-[21px] font-medium mb-6 ">Te contestaremos lo antes posible. ¡Gracias!</p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
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
