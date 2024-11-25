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
        default: () => [],
    },

    label: {
        type: String,
        default: null
    },

    used: {
        type: Number,
        required: true
    },

    units: {
        type: Number,
        required: true
    }
});

let selected = props.defaultValue;

const isOutOfStock = (option) => {
    // Suponiendo que cada opción tiene propiedades `used` y `units` individuales
    return option.used >= option.units;
};

</script>

<template>
    <div>
        <InputLabel v-if="label">{{ placeholder }}</InputLabel>
        <select v-model="selected" @change="emit('update:select', $event.target.value)" class="text-grey font-roboto rem:text-[14px] rem:leading-[16px] std-input w-full rounded-[6px] appearance-none px-2 py-3 rem:h-[45px] rem:mt-[5px] rem:mb-[5px] border-[1px] border-softGrey placeholder-softGrey placeholder-opacity-100 focus:placeholder-opacity-50 focus:outline-none focus:border-softGrey focus:shadow-none" :class="{ '!border-error text-error': error }">
            <option v-for="option in options" :value="option[value]" :disabled="isOutOfStock(option)">
                <span v-if="isOutOfStock(option)" class="font-roboto text-black"> {{ option[label] }} (sin stock)</span>
                <span v-else class="font-roboto text-black">{{ option[label] }}</span>
            </option>
        </select>
        <div v-if="error" class="rem:text-[12px] font-semibold font-roboto text-error inline-block">{{ error }}</div>
    </div>
</template>
