<template>
    <div class="relative nPattern w-full redPattern mt-[15px]">

        <div class="container mx-auto flex flex-row items-center justify-center py-[100px]">
            <div class="w-6/12">
                <img src="../../../../resources/images/nutella/puedes-ganar.png" alt="Puedes Ganar" class="max-w-[360px] w-full mx-auto" />
                <h1 class="font-nutella rem:text-[99px] rem:tracking-[0.15px] rem:leading-[99px] text-white uppercase text-center">2 jerséis</h1>
                <h2 class="font-montserrat rem:text-[39px] rem:tracking-[0.15px] rem:leading-[40px] text-white uppercase font-bold text-center py-4" >navideños NUTELLA<sup>&reg;</sup></h2>
                <div class="max-w-[440px] w-full mx-auto text-center">
                    <p class="font-montserrat rem:text-[25px] rem:leading-[28px] text-white font-bold">Uno para ti y otro para esa persona tan especial</p>
                    <p class="font-montserrat rem:text-[25px] rem:leading-[28px] text-white font-bold pt-4">¡Regalamos <span class="text-yellow">más de 1.000 jerséis!</span></p>
                </div>
                <div class="text-center pt-10">
                    <PrimaryButton scroll="#participa" class="inline-block">Participa</PrimaryButton>
                </div>
            </div>

            <div class="w-6/12">
                <img src="../../../../resources/images/nutella/jersey.png" alt="Jerseys" class="max-w-[600px] w-full mx-auto" />
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
};

const headerHeight = ref(0);

const getHeaderHeight = () => {
    headerHeight.value = document.querySelector('#nutella-header').offsetHeight ;
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
    getHeaderHeight();
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

