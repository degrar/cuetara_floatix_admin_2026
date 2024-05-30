<template>
    <div class="bg-white" :style="{ marginTop: headerHeight + 'px' }"></div>
    <PrimaryLink scroll="#participa"><img :src="imageToShow" @load="handleResize" alt="Harry Potter" class="w-full h-full object-cover"/></PrimaryLink>
    <div class="bg-white my-8 px-[15px]">
        <p class="text-brown font-roboto rem:text-[14px] mt-[15px] text-center w-full max-w-[1024px] mx-auto">
            Promoción válida en España mayores de 18 años del 20/5/2024 al 7/07/2024. Imprescindible conservar el ticket de compra original. Máximo 1 participaciones diarias por persona. Limitada a 1 premio por momento ganador por persona en todo el período promocional. Se entregan 14 premios por momento ganador. <br>Consulta bases legales y detalles de la promoción <a class="underline font-robotoBold" :href="route('legal')">aquí</a>.
        </p>
        <p class="text-brown font-roboto rem:text-[14px] mt-[15px] text-center w-full max-w-[1024px] mx-auto">©Funko2024 ©WBEI<br>©Ferrero Group. All rights reserved.</p>
    </div>
<!--    <div class="background bg-center bg-no-repeat">-->
<!--        <div class="container mx-auto px-[15px] py-[100px] lg:py-[150px]">-->
<!--            <div class="flex flex-row items-center justify-center lg:items-end lg:justify-end relative">-->
<!--                <div class="w-12/12 md:w-8/12 lg:w-7/12 text-center relative lg:top-[130px]">-->
<!--                    <img :src="getImagePath('logos')" alt="Harry Potter" class="max-w-[300px] w-full mx-auto sm:max-w-[468px] pb-[15px] lg:hidden "/>-->
<!--                    <h2 class="font-bemio text-brown rem:text-[18px] rem:leading-[24px] tracking-[.36px] sm:rem:text-[22px] sm:rem:leading-[28px] sm:tracking-[.45px] lg:rem:text-[26px] lg:rem:leading-[30px] lg:tracking-[.52px] uppercase m-0 p-0">ENCUENTRA LA FIGURA DORADA</h2>-->
<!--                    <h2 class="font-bemio text-brown rem:text-[30px] rem:leading-[36px] tracking-[0.6px] uppercase mt-1 mb-2 sm:rem:text-[48px] sm:rem:leading-[54px] sm:tracking-[1px] lg:rem:text-[59px] lg:rem:leading-[62px] lg:tracking-[1px]">PODRÁS GANAR</h2>-->
<!--                    <h1 class="font-bemio text-orange rem:text-[45px] rem:leading-[50px] tracking-[0.9px] sm:rem:text-[62px] sm:rem:leading-[68px] sm:tracking-[1.1px] lg:rem:text-[76px] lg:rem:leading-[80px] lg:tracking-[1.52px] uppercase m-0 p-0">UNA VITRINA</h1>-->
<!--                    <div class="text-center rem:mt-[25px] block" :class="{ 'hidden': end }">-->
<!--                        <PrimaryButton scroll="#participa" class="">Participa</PrimaryButton>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>
<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { OhVueIcon, addIcons } from "oh-vue-icons";
import { BiArrowDownShort } from "oh-vue-icons/icons";
import PrimaryLink from "@/Components/PrimaryLink.vue";
addIcons(BiArrowDownShort);

const props =
    defineProps({
        end: {
            type: Boolean,
            default: false
        },
    });


const getImagePath = (photo) => {
    return new URL(`/resources/images/${photo}`, import.meta.url).href;
};

const screenResolution = ref(window.screen.width);
const imageToShow = ref('');

const handleResize = () => {
    screenResolution.value = window.screen.width;
};

const setImageBasedOnResolution = (resolution, end) => {
    if (end) {
        if (resolution < 769) {
            imageToShow.value = getImagePath('backgroundNoPromoMobile.jpg');
        } else if (resolution > 769 && resolution < 1024) {
            imageToShow.value = getImagePath('backgroundNoPromoDesktop.jpg');
        } else if (resolution >= 1024 && resolution < 1930) {
            imageToShow.value = getImagePath('backgroundNoPromoDesktop.jpg');
        } else {
            imageToShow.value = getImagePath('backgroundNoPromoDesktop.jpg');
        }
    } else{
        if (resolution < 769) {
            imageToShow.value = getImagePath('backgroundPromoMobile.jpg');
        } else if (resolution > 769 && resolution < 1024) {
            imageToShow.value = getImagePath('backgroundPromoDesktop.jpg');
        } else if (resolution >= 1024 && resolution < 1930) {
            imageToShow.value = getImagePath('backgroundPromoDesktop.jpg');
        } else {
            imageToShow.value = getImagePath('backgroundPromoDesktop.jpg');
        }
    }
};

watch(screenResolution, setImageBasedOnResolution);

const headerHeight = ref(0);

const getHeaderHeight = () => {
    headerHeight.value = document.querySelector('#header').offsetHeight ;
};

onMounted(() => {
    getHeaderHeight();
    setImageBasedOnResolution(screenResolution.value, props.end);
    window.addEventListener('resize', handleResize);
    window.addEventListener('resize', getHeaderHeight);
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

onUnmounted(() => {
    window.removeEventListener('resize', getHeaderHeight);
    window.removeEventListener('resize', handleResize);
});

</script>

<style scoped>

</style>

