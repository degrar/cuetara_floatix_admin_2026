<template>


</template>
<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';

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

