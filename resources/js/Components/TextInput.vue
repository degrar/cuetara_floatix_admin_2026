<template>
    <div :class="$attrs.class">
        <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
        <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="!text-brown font-bemio rem:text-[14px] std-input w-full rounded-[48px] appearance-none px-2 py-3 rem:h-[45px] rem:mt-[5px] rem:mb-[5px] border-[4px] border-white placeholder-brown placeholder-opacity-40 focus:placeholder-opacity-50 focus:outline-none focus:border-white focus:shadow-none"
               :class="{ '!border-error': error }" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder" />

        <div v-if="help" class="rem:text-[12px] text-brown">{{ help }}</div>
        <div v-if="error && !noErrorLabel" class="rem:text-[12px] form-error text-error">{{ error }}</div>


    </div>
</template>

<script>
import { v4 as uuid } from 'uuid'
export default {
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
