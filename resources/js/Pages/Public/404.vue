<template>
    <GuestLayout title="404" menu>
        <div class="container mx-auto px-[15px] py-10">
            <div class="flex flex-col justify-center">
                <div class="max-w-[600px] w-full mx-auto">
                    <h1 class="max-w-[460px] w-full mx-auto stroke-text smooth-16 text-yellow font-roboto font-extrabold uppercase rem:text-[28px] rem:leading-[32px] lg:rem:text-[41px] lg:rem:leading-[41px] rem:tracking-[0px] text-center mb-4 lg:mb-12 block">404</h1>
                    <p class="w-full mx-auto text-center font-roboto rem:text-[18px] rem:leading-[25px] lg:rem:text-[21px] lg:rem:leading-[26px] font-medium mb-6 ">Parece que la página que buscas no existe. <br>Vuelve al inicio e inténtalo de nuevo.</p>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>

import GuestLayout from "@/Layouts/GuestLayout.vue";
</script>
