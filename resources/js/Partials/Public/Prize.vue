<template>
    <div class="container mx-auto px-[15px] py-[50px]">
        <div class="flex mb-8">
            <h1 class="w-full max-w-[780px] mx-auto text-center font-bemio text-brown rem:text-[35px] rem:leading-[35px] tracking-[0.7px] lg:rem:text-[50px] lg:rem:leading-[50px] lg:tracking-[1px] uppercase m-0 p-0">
                PUEDES GANAR ESTA VITRINA
            </h1>
        </div>
        <div class="flex justify-center flex-wrap items-stretch w-full">
            <img :src="getImagePath('vitrina')" alt="50%" class="w-[620px] mx-auto pb-[15px]"/>
        </div>
    </div>
</template>
<script setup>

const getImagePath = (photo) => {
    return new URL(`/resources/images/${photo}.png`, import.meta.url).href;
};

</script>