<template>
    <GuestLayout title="404" menu>
        <InsideHeaderPage />
        <div class="bg-yellow">
            <div class="container mx-auto px-[15px] py-10">
                <div class="flex flex-col-reverse lg:flex-row justify-center">
                    <div class="max-w-[420px] w-full mx-auto">
                        <img src="../../../images/404.png" alt="kinder" class=""/>
                    </div>
                    <div class="max-w-[600px] w-full mx-auto">
                        <h1 class="rem:text-[60px] font-hermes text-brown uppercase leading-[62px] tracking-[-0.6px] text-center mb-6">PÁGINA NO ENCONTRADA</h1>
                        <p class="w-full mx-auto rem:text-[35px] font-tekoMedium text-brown leading-[36px] tracking-[-0.35px] text-center mb-6 ">La página que buscas no existe o ha sido eliminada. Por favor, ve al inicio y vuelve a intentarlo.</p>
                    </div>
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
    headerHeight.value = document.querySelector('#header').offsetHeight ;
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
