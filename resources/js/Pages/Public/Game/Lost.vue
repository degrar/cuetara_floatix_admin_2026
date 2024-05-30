<template>
    <GuestLayout title="Perdido" menu>
        <div class="bg-white" :style="{ marginTop: headerHeight + 'px' }">
            <div class="container mx-auto px-[15px]">
                <div class="flex justify-center flex-wrap items-stretch w-full">
                    <img :src="getImagePath('logos')" alt="50%" class="w-[620px] mx-auto pb-[15px]"/>
                </div>
            </div>
        </div>
        <div class="backgroundpattern bg-center bg-no-repeat"></div>
        <div class="bg-yellow">
            <div class="container mx-auto px-[15px] flex justify-center items-center flex-col py-[40px] lg:flex-row lg:py-[80px]">

                    <div class="w-12/12 lg:w-6/12">
                        <img :src="getImagePath('quidditch')" alt="quidditch" class="w-[570px] mx-auto"/>
                    </div>
                    <div class="w-12/12 lg:w-5/12">
                        <h1 class="text-orange uppercase font-bemio uppercase rem:text-[26px] rem:leading-[30px] lg:rem:text-[58px] lg:rem:leading-[54px] text-center lg:text-left p-0 m-0">LO SENTIMOS, NO HAS GANADO</h1>
                        <p class="text-brown uppercase font-bemio uppercase rem:text-[18px] rem:leading-[20px] lg:rem:text-[21px] lg:rem:leading-[24px] text-center lg:text-left pt-4 pb-1">LA PARTICIPACIÓN ESTÁ LIMITADA A UN INTENTO. ¡GRACIAS POR PARTICIPAR!</p>
                     </div>

            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from  '@/Components/PrimaryButton.vue';

const headerHeight = ref(0);

const getHeaderHeight = () => {
    headerHeight.value = document.querySelector('#header').offsetHeight ;
};

onMounted(() => {
    getHeaderHeight();
    window.addEventListener('resize', getHeaderHeight);
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

onUnmounted(() => {
    window.removeEventListener('resize', getHeaderHeight);
});

const getImagePath = (photo) => {
    return new URL(`/resources/images/${photo}.png`, import.meta.url).href;
};
</script>
