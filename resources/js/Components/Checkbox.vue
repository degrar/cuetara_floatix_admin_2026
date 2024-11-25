<script setup>
import { computed } from 'vue';
import { v4 as uuid } from 'uuid'

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    id: {
        type: String,
        default: `checkbox-${uuid()}`
    },
    error: {
        type: String,
        default: null
    },
    value: {
        type: String,
        default: null,
    },
    label: {
        type: String,
        default: null
    }
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>


<template>
    <input
        v-model="proxyChecked"
        type="checkbox"
        :value="value"
        :id="id"
        class="border-white border-[2px] font-roboto !rem:text-[16px] text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        :class="{ '!border-error': error }"
    >
    <label v-if="label" :for="id" class="font-roboto !rem:text-[16px] text-medium " :class="{ 'text-red': error }">&nbsp; {{ label }}</label>
</template>
