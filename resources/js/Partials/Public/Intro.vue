<template>
        <div class="container mx-auto flex flex-col items-center justify-center p-4">
            <div class="w-12/12 lg:w-6/12">
                <h1 class="font-roboto rem:text-[59px] lg:rem:text-[99px] rem:tracking-[0.15px] rem:leading-[69px] lg:rem:leading-[99px] text-white uppercase text-center">Gana 200€ cada día</h1>
                <div class="text-center pt-4 lg:pt-10">
                    <PrimaryButton scroll="#participa" class="inline-block">Participa</PrimaryButton>
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

const handleResize = () => {
    screenResolution.value = window.screen.width;
};

const headerHeight = ref(0);

const getHeaderHeight = () => {
    headerHeight.value = document.querySelector('#header').offsetHeight ;
};

const getImagePath = (photo) => {
    return new URL(`/resources/images/${photo}`, import.meta.url).href;
};


onMounted(() => {
    getHeaderHeight();
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

