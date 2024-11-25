<script setup>
import {ref} from 'vue';
import { Head, usePage } from '@inertiajs/vue3';
import Header from "@/Partials/Public/Header.vue";
import Footer from "@/Partials/Public/Footer.vue";

const siteKey = usePage().props.site_key;

defineProps({
    title: String,
    useRecaptcha: Boolean,
    menu: Boolean,
    header: Boolean,
    inside: Boolean,
    end: Boolean
});


</script>

<template>
    <div class="min-h-screen flex flex-col" :class="{ 'image': inside, 'end': end }">
        <Head :title="title"/>

        <Header :menu="menu"/>

        <main class="flex-grow">
            <slot/>
        </main>

        <Footer/>

    </div>

    <!-- Recaptcha -->
    <component is="script" v-if="useRecaptcha" :src="'https://www.google.com/recaptcha/api.js?render=' + siteKey"></component>
</template>

<style scoped>


</style>
