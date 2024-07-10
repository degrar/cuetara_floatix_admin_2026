<template>
    <div class="bg-[url('/resources/images/insideHeader-mobile.jpg')] lg:bg-[url('/resources/images/insideHeader.jpg')] bg-cover bg-right-top lg:bg-center bg-no-repeat min-h-[274px] bg-yellow"></div>
</template>

<script setup>
import {onMounted} from 'vue';

onMounted(() => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>