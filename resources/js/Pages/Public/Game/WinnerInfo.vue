<template>
    <GuestLayout title="Ganador" menu useRecaptcha>
        <InsideHeaderPage />

        <FormGame class="relative" />
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InsideHeaderPage from "@/Components/inside/insideHeaderPage.vue";

import FormGame from "@/Partials/Public/FormGame.vue";

</script>
