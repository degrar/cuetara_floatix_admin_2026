<template>
    <GuestLayout title="404" menu>
        <whitePatternInside />
        <div class="bg-white">
            <div class="container mx-auto px-[15px] py-10">
                <div class="flex flex-col justify-center">
                    <div class="max-w-[200px] lg:max-w-[180px] w-full mx-auto ">
                        <img src="../../../images/nutella/404.png" alt="404" class="my-[50px] lg:my-0"/>
                    </div>
                    <div class="max-w-[600px] w-full mx-auto">
                        <h1 class="max-w-[460px] w-full mx-auto stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[41px] rem:leading-[41px] rem:tracking-[0px] text-center mb-12 block">EN ESTE ARMARIO NO HAY JERSÉIS</h1>
                        <p class="w-full mx-auto text-center font-montserrat rem:text-[21px] rem:leading-[21px] font-medium mb-6 ">Parece que la página que buscas no existe. <br>Vuelve al inicio e inténtalo de nuevo.</p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import whitePatternInside from "@/Components/inside/whitePatternInside.vue";

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
