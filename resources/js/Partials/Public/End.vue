<template>
    <div class="bg-[url('/resources/images/nextEndMobile.jpg')] lg:bg-[url('/resources/images/nextEnd.jpg')] 2xl:bg-[url('/resources/images/image-xl.jpg')] bg-cover bg-center bg-no-repeat min-h-[1300px] lg:min-h-[1200px] bg-yellow" >
        <div :style="{ paddingTop: headerHeight + 'px' }"></div>
        <div class="container mx-auto">
            <img :src="imageToShow" alt="home" class=" max-w-[400px]  lg:max-w-[800px] w-full mx-auto pb-5" @load="handleResize"/>
        </div>


    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const imageToShow = ref('');

const props =
    defineProps({
        end: {
            type: Boolean,
            default: false
        },
    });


const screenResolution = ref(window.screen.width);

const handleResize = () => {
    screenResolution.value = window.screen.width;
};

const headerHeight = ref(0);

const getHeaderHeight = () => {
    headerHeight.value = document.querySelector('#header').offsetHeight ;
};


const setImageBasedOnResolution = (resolution) => {
    if (resolution < 768) {
        imageToShow.value = getImagePath('end-mobile.png');
    } else if (resolution >= 768 && resolution < 1024) {
        imageToShow.value = getImagePath('end-mobile.png');
    } else if (resolution >= 1024 && resolution < 1930) {
        imageToShow.value = getImagePath('end.png');
    } else {
        imageToShow.value = getImagePath('end.png');
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
});

onUnmounted(() => {
    window.removeEventListener('resize', getHeaderHeight);
    window.removeEventListener('resize', handleResize);
});


</script>