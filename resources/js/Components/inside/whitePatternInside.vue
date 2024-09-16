<template>
    <div :style="{ marginTop: headerHeight + 'px' }" class="bg-transparent relative before:absolute before:top-[-46px] before:right-0 before:left-0 before:w-full before:mx-auto before:bg-insidePattern before:bg-repeat before:bg-left before:bg-[length:77px_46px] before:h-[46px]"></div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';

const screenResolution = ref(window.screen.width);

const headerHeight = ref(0);

const handleResize = () => {
    screenResolution.value = window.screen.width;
    getHeaderHeight(screenResolution.value);
};

const getHeaderHeight = (resolution) => {
    headerHeight.value =  document.querySelector('#nutella-header').offsetHeight;

    if (resolution < 768) {
        headerHeight.value = document.querySelector('#nutella-header').offsetHeight + document.querySelector('#duplex-header').offsetHeight + 50;
    }else {
        headerHeight.value =  document.querySelector('#duplex-header').offsetHeight;
    }

};

onMounted(() => {
    getHeaderHeight(screenResolution.value);
    window.addEventListener('resize', handleResize);
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

onUnmounted(() => {
    window.removeEventListener('resize', getHeaderHeight);
    window.addEventListener('resize', handleResize);
});
</script>