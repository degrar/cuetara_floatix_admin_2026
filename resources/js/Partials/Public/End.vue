<template>

    <div class="container mx-auto px-[15px] py-8" :style="{ marginTop: headerHeight + 'px' }">
        <div class="box bg-[#FEDA1C] rounded-[40px] lg:rounded-full w-12/12 lg:w-9/12 mx-auto text-center py-4 shadow-lg px-8">
            <p class="font-ferry font-extrabold rem:text-[22px] rem:leading-[28px] text-red uppercase">PROMOCIÓN FINALIZADA</p>
            <p class="font-ferry rem:text-[22px] rem:leading-[28px] text-black">GRACIAS A TODOS POR PARTICIPAR. ¡OS ESPERAMOS EN LA PRÓXIMA!</p>
        </div>
    </div>

    <div class="relative nPatternReverse nPatternFull w-full redPattern">

        <div class="container mx-auto flex flex-col lg:flex-row items-center justify-center py-[100px]">
            <div class="w-12/12 lg:w-6/12">
                <img src="../../../../resources/images/nutella/puedes-ganar.png" alt="Puedes Ganar" class="max-w-[200px] lg:max-w-[360px] w-full mx-auto" />
                <h1 class="font-ferry rem:text-[59px] lg:rem:text-[99px] rem:tracking-[0.15px] rem:leading-[69px] lg:rem:leading-[99px] text-white uppercase text-center"><span class="rem:text-[89px] lg:rem:text-[119px]">2</span> jerséis</h1>
                <h2 class="font-ferry rem:text-[24px] lg:rem:text-[39px] rem:tracking-[0.15px] rem:leading-[40px] text-white uppercase font-bold text-center py-1 lg:py-4" >navideños NUTELLA<sup>&reg;</sup></h2>
                <div class="max-w-[440px] w-full mx-auto text-center">
                    <p class="font-ferry rem:text-[16px] rem:leading-[21px] lg:rem:text-[25px] lg:rem:leading-[28px] text-white font-bold">Uno para ti y otro para esa persona tan especial</p>
                    <p class="font-ferry rem:text-[16px] rem:leading-[21px] lg:rem:text-[25px] lg:rem:leading-[28px] text-white font-bold pt-2 lg:pt-4">¡Regalamos <span class="text-yellow">más de 1.000 jerséis!</span></p>
                </div>
            </div>

            <div class="w-12/12 lg:w-6/12 mx-auto">
                <img src="../../../../resources/images/nutella/jersey.png" alt="Jerseys" class="max-w-[303px] lg:max-w-[600px] w-full mx-auto" />
            </div>
        </div>

    </div>
</template>
<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props =
    defineProps({
        end: {
            type: Boolean,
            default: false
        },
    });

const screenResolution = ref(window.screen.width);
const imageToShow = ref('');

const handleResize = () => {
    screenResolution.value = window.screen.width;
    getHeaderHeight(screenResolution.value);
};

const headerHeight = ref(0);

const getHeaderHeight = (resolution) => {
    if (resolution < 768) {
        headerHeight.value = document.querySelector('#nutella-header').offsetHeight + 20;
    } else if (resolution >= 768 ) {
        headerHeight.value =  0;
    }
};

const setImageBasedOnResolution = (resolution) => {
    if (resolution < 768) {
        imageToShow.value = getImagePath('claim-mobile.png');
    } else if (resolution >= 768 && resolution < 1024) {
        imageToShow.value = getImagePath('claim-mobile.png');
    } else if (resolution >= 1024 && resolution < 1930) {
        imageToShow.value = getImagePath('claim.png');
    } else {
        imageToShow.value = getImagePath('claim.png');
    }
};

const getImagePath = (photo) => {
    return new URL(`/resources/images/${photo}`, import.meta.url).href;
};

watch(screenResolution, setImageBasedOnResolution);

onMounted(() => {
    getHeaderHeight(screenResolution.value);
    setImageBasedOnResolution(screenResolution.value);
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

