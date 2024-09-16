<script setup>
// import "vue-select/dist/vue-select.css";

import InputLabel from "@/Components/InputLabel.vue";

const emit = defineEmits(['update:select']);

const props = defineProps({
    defaultValue: {
        type: [String, Number],
        default: false,
    },

    value: {
        type: String,
        default: null
    },

    error: {
        type: [String, Boolean],
        default: null
    },

    placeholder: {
        type: String,
        default: null
    },

    options: {
        type: Array,
        default: null,
    },

    label: {
        type: String,
        default: null
    }
});

let selected = props.defaultValue;
</script>


<template>
    <div>
        <InputLabel v-if="label">{{ placeholder }}</InputLabel>
        <select v-model="selected" @change="emit('update:select', $event.target.value)" class="text-grey font-montserrat rem:text-[14px] rem:leading-[16px] std-input w-full rounded-[6px] appearance-none px-2 py-3 rem:h-[45px] rem:mt-[5px] rem:mb-[5px] border-[1px] border-softGrey placeholder-softGrey placeholder-opacity-100 focus:placeholder-opacity-50 focus:outline-none focus:border-softGrey focus:shadow-none" :class="{ '!border-error text-error': error }">
            <option :value="defaultValue" disabled></option>
            <option :value="option[value]" v-for="option in options">{{ option[label] }}</option>
        </select>
        <div v-if="error" class="rem:text-[12px] font-semibold font-montserrat text-error inline-block">{{ error }}</div>
    </div>

</template>
