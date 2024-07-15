<template>
    <div :class="$attrs.class">
        <InputLabel v-if="label" class="form-label" :for="id">{{ label }}</InputLabel>
        <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="text-black bg-transparent font-roboto rem:text-[14px] w-full rounded-lg appearance-none px-2 py-3 rem:h-[45px] rem:mt-[5px] rem:mb-[5px] border-2 border-gray-200 placeholder-brown placeholder-opacity-40 focus:placeholder-opacity-50 focus:outline-none focus:border-gray-500 focus:shadow-none"
               :class="{ '!border-error': error }" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder" />
        <div v-if="help" class="rem:text-[12px] text-brown">{{ help }}</div>
        <div v-if="error && !noErrorLabel" class="rem:text-[12px] form-error text-error">{{ error }}</div>
    </div>
</template>

<script>
import { v4 as uuid } from 'uuid'
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
        error: String,
        noErrorLabel: Boolean,
        label: String,
        modelValue: String,
        help: {
            type: String,
            default: null
        },
        placeholder: String
    },
    emits: ['update:modelValue']
}
</script>
