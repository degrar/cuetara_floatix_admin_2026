<template>
    <div class="bg-yellow lg:bg-transparent bg-[url('/resources/images/mobile.jpg')] lg:bg-[url('/resources/images/image-lg.jpg')] xl:bg-[url('/resources/images/image-xl.jpg')] bg-contain bg-top md:bg-cover md:bg-center bg-no-repeat min-h-[980px]r bg-yellow">
        <div :style="{ paddingTop: headerHeight + 'px' }"></div>
        <div class="container mx-auto">
            <img :src="imageToShow" alt="home" class="max-w-[350px] md:max-w-[500px] lg:max-w-[800px] w-full mx-auto pb-5" @load="handleResize"/>
        </div>

        <div class="container mx-auto py-[30px] md:py-[50px] md:pb-[100px]">
            <div class="text-center mb-[100px]">
                <img src="../../../../resources/images/tele.png" alt="home" class="max-w-[177px] w-full mx-auto pb-5 mb-[25px] md:hidden" />
                <PrimaryButton scroll="#participa" class="text-[25px] py-[20px] px-[35px]">¡Participa ya!</PrimaryButton>

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
    headerHeight.value = document.querySelector('#header').offsetHeight ;
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

