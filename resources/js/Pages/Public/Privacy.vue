<template>
    <GuestLayout title="Política de privacidad" menu>
        <div class="container mx-auto px-4 flex justify-center items-center flex-col py-[40px] lg:flex-row lg:py-[80px] ">
            <div class="w-12/12  pt-4">
                <h1 class="stroke-text smooth-16 text-yellow font-ferry font-extrabold uppercase rem:text-[41px] rem:leading-[41px] rem:tracking-[0px] text-center mb-6 block">Política de privacidad</h1>
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
    @apply text-black font-ferry font-extrabold rem:text-[22px] rem:leading-[24px] lg:rem:text-[24px] lg:rem:leading-[28px] p-0 mb-5 mt-10;
}

h5 {
    @apply text-black font-ferry font-extrabold rem:text-[20px] rem:leading-[22px] lg:rem:text-[22px] lg:rem:leading-[26px] p-0 mb-2 mt-8;
}

h6 {
    @apply text-black font-ferry font-semibold rem:text-[18px] rem:leading-[22px] lg:rem:text-[20px] lg:rem:leading-[22px] p-0 mb-2 mt-5;
}

p, a {
    @apply text-black font-ferry rem:text-[16px] rem:leading-[20px] lg:rem:text-[18px] lg:rem:leading-[26px] mb-2 mt-2;
}

a {
    @apply text-black font-ferry underline ;
}

ul {
    list-style: disc;
    @apply pl-8;
}

ul > li {
    @apply text-black font-ferry rem:text-[16px] rem:leading-[20px] lg:rem:text-[18px] lg:rem:leading-[26px] mb-2 mt-2;
}


</style>