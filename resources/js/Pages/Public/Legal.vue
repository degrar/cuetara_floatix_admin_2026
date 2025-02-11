<template>
    <GuestLayout title="Bases legales" menu>
        <div class="container mx-auto px-4 flex justify-center items-center flex-col py-[40px] lg:flex-row lg:py-[80px] ">
            <div class="w-12/12  pt-4">
                <h1 class="text-center text-red font-ferry uppercase text-4xl rem:tracking-[0.15px]">Bases legales de la promoción</h1>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';

const getImagePath = (photo) => {
    return new URL(`/resources/images/${photo}.png`, import.meta.url).href;
};
</script>

<style scoped>
h4 {
    @apply text-black font-ferry rem:text-[22px] rem:leading-[24px] lg:rem:text-[24px] lg:rem:leading-[28px] p-0 mb-5 mt-10;
}

h5 {
    @apply text-black font-ferry rem:text-[20px] rem:leading-[22px] lg:rem:text-[22px] lg:rem:leading-[26px] p-0 mb-2 mt-8;
}

h6 {
    @apply text-black font-ferry rem:text-[18px] rem:leading-[22px] lg:rem:text-[20px] lg:rem:leading-[22px] p-0 mb-2 mt-5;
}

p, a {
    @apply text-black font-montserrat rem:text-[16px] rem:leading-[20px] lg:rem:text-[18px] lg:rem:leading-[26px] mb-2 mt-2;
}

a {
    @apply text-black font-montserrat underline ;
}

ul {
    list-style: disc;
    @apply pl-8;
}

ul > li {
    @apply text-black font-montserrat rem:text-[16px] rem:leading-[20px] lg:rem:text-[18px] lg:rem:leading-[26px] mb-2 mt-2;
}


</style>