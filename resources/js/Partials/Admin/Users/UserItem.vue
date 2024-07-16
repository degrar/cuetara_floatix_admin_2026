<template>
    <div class="grid grid-cols-5 py-4 px-4 border-b last:border-none group relative">

        <div class="field scrollbar overflow-x-auto">
            {{ data.id }}
        </div>

        <div class="field scrollbar overflow-x-auto">
            {{ data.name }} {{ data.surname }}
        </div>

        <div class="field scrollbar overflow-x-auto">
            <a :href="emailLink" class="underline">{{ data.email }}</a>
        </div>


        <div class="field scrollbar overflow-x-auto">
            <span class="bg-fuchsia-300 rounded-3xl px-4 py-1.5" :class="ads.bg">{{ ads.value }}</span>
        </div>

        <div class="field scrollbar overflow-x-auto">{{ formatDate(data.created_at) }}</div>
    </div>
</template>

<script setup>
import {computed} from "vue";

import dayjs from 'dayjs';

function formatDate (dateString)  {
    const date = dayjs(dateString);
    return date.format('D-MM-YYYY HH:MM:s');
}


const props = defineProps({
    data: Object
});

const emailLink = computed(() => `mailto:${props.data.email}`);

const ads = computed(() => {
    return {
        1: {
            bg: 'bg-[#A5D6A7]',
            value: 'Sí'
        },
        0: {
            bg: 'bg-[#FCEAFF]',
            value: 'No'
        }
    }[props.data.ads ?? 0]
});
</script>

<style scoped>
.profile-img {
    @apply rounded-full h-[42px] mr-2
}

.field {
    @apply flex items-center;
}
</style>
