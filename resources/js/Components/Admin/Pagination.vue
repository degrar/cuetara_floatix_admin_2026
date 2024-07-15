<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap font-poppins">
            <template v-for="(link, key) in links">
                <div v-if="link.url === null" :key="key" class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4 border rounded-full font-bold" v-html="link.label" />
                <Link v-else :key="`link-${key}`" class="mb-1 mr-1 px-4 py-3 focus:border-indigo-500 focus:text-indigo-500 text-sm leading-4 hover:bg-indigo-800 hover:text-white border rounded-full font-bold"
                      :class="{ 'bg-indigo-500 text-white': link.active }"
                      :href="link.url"
                      v-html="link.label" />
            </template>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    links: Array
});
</script>
