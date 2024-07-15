<template>
    <AppLayout :title="pageTitle" class="font-poppins">
        <div>
            <div class="md:col-span-1 flex justify-between md:my-4 pt-8">
                <div class="px-4 sm:px-0">
                    <h1 class="text-4xl font-medium text-gray-900 font-poppins text-police">
                        <slot name="title" />
                    </h1>
                </div>
            </div>

            <div class="bg-snow min-h-[50vh] px-8 py-8 rounded-3xl">
                <div>
                    <slot name="content" />
                </div>
                <div class="justify-end flex mt-4" v-if="paginationLinks">
                    <Pagination :links="paginationLinks" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionTitle from "@/Components/Admin/SectionTitle.vue";
import Pagination from "@/Components/Admin/Pagination.vue";

defineProps({
    paginationLinks: Object,
    pageTitle: String
});
</script>
