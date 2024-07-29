<template>
    <GuestLayout title="404" menu>
        <InsideHeaderPage />
        <div class="bg-yellow pb-[100px]">

                <div class="container mx-auto px-[15px] py-5 pb-[100px] lg:py-10 flex flex-col-reverse lg:flex-row justify-center items-center lg:items-start">
                    <div class="max-w-[230px] lg:max-w-[400px] w-full mx-auto">
                        <img src="../../../images/404.png" alt="kinder" class=""/>
                    </div>
                    <div class="max-w-[570px] w-full mx-auto">
                        <h1 class="font-hermes text-brown uppercase rem:text-[33px] leading-[35px] tracking-[-0.33px] lg:rem:text-[60px] lg:leading-[62px] lg:tracking-[.6px] text-center my-6">PÁGINA NO ENCONTRADA</h1>
                        <p class="max-w-[470px] w-full mx-auto  font-tekoMedium text-brown rem:text-[31px] rem:leading-[31px] rem:tracking-[.35px] lg:rem:text-[35px] lg:rem:leading-[36px] lg:rem:tracking-[.35px] text-center">La página que buscas no existe o ha sido eliminada. Por favor, ve al inicio y vuelve a intentarlo.</p>
                    </div>
                </div>

        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";

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
</script>
