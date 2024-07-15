<template>
    <div class="user-list border-2 rounded-3xl">
        <div class="grid py-4 px-4 border-b" :class="`grid-cols-${header.length}`">
            <div class="items-center font-semibold" v-for="(item, key) in header" :key="key">{{ item }}</div>
        </div>

        <UserItem v-for="(item, key) in data" :data="item" :key="key" @dialog="imagesDialog" />
    </div>
</template>

<script setup>
import DialogModal from "@/Components/Admin/DialogModal.vue";
import {ref, defineProps} from "vue";
import UserItem from "@/Partials/Admin/Users/UserItem.vue";

const props = defineProps({
    data: Object,
    header: Array
})

const showImagesDialog = ref(false);
const files = ref([]);

const imagesDialog = (value) => {
    files.value = value;
    showImagesDialog.value = true;
};
</script>

<style scoped>

</style>
