<template>
    <GuestLayout title="Bases legales de la promoción" menu>
        <InsideHeaderPage />
        <div class="bg-yellow">
            <div class="container mx-auto px-[15px] flex justify-center items-center flex-col py-[40px] lg:flex-row lg:py-[80px]">
                <div class="w-12/12  pt-[15px]">
                    <h1 class="rem:text-[60px] font-hermes text-brown uppercase leading-[62px] tracking-[-0.6px] text-center mb-6">Bases legales</h1>
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

<style scoped>
h4 {
    @apply text-brown font-bemio rem:text-[20px] rem:leading-[24px] lg:text-[24px] md:rem:leading-[28px] tracking-[1px] p-0 mb-5 mt-10;
}
p {
    @apply text-brown rem:text-[16px] rem:leading-[18px] lg:rem:text-[18px] lg:rem:leading-[22px] font-roboto mb-2 mt-2;
}

ul {
    list-style: disc;
    @apply pl-8;
}

ul > li {
    @apply text-brown rem:text-[16px] rem:leading-[18px] lg:rem:text-[18px] lg:rem:leading-[22px] font-roboto mb-2 mt-2;
}
</style>