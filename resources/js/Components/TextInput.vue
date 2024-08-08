<template>
    <div :class="$attrs.class">
        <InputLabel v-if="label" :for="id">{{ label }}</InputLabel>
        <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="text-grey font-montserrat rem:text-[14px] rem:leading-[16px] std-input w-full rounded-[6px] appearance-none px-2 py-3 rem:h-[45px] rem:mt-[5px] rem:mb-[5px] border-[1px] border-softGrey placeholder-softGrey placeholder-opacity-100 focus:placeholder-opacity-50 focus:outline-none focus:border-softGrey focus:shadow-none"
               :class="{ '!border-error text-error': error }" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder" />

        <div v-if="help" class="rem:text-[12px] text-black font-montserrat">{{ help }}</div>
        <div v-if="error && !noErrorLabel" class="rem:text-[12px] font-bold font-montserrat text-error inline-block">{{ error }}</div>


    </div>
</template>

<script>
import {v4 as uuid} from 'uuid'
import InputLabel from "@/Components/InputLabel.vue";

export default {
    components: {InputLabel},
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `text-input-${uuid()}`
            },
        },
        type: {
            type: String,
            default: 'text',
        },
        error: {
            type: [String, Boolean],
            default: null
        },
        noErrorLabel: Boolean,
        label: String,
        modelValue: String,
        help: {
            type: String,
            default: null
        },
        popup: {
            type: String,
            default: null
        },
        placeholder: String
    },
    emits: ['update:modelValue']
}
</script>
