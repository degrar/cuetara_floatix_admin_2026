<template>
    <div :class="$attrs.class">
        <InputLabel v-if="label" :for="id">{{ label }}</InputLabel>
        <textarea :placeholder="placeholder" :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="text-grey font-montserrat rem:text-[14px] rem:leading-[16px] std-input w-full rounded-[6px] appearance-none px-2 py-3 rem:mt-[5px] rem:mb-[5px] border-[1px] border-softGrey placeholder-softGrey placeholder-opacity-100 focus:placeholder-opacity-50 focus:outline-none focus:border-softGrey focus:shadow-none resize-none"
                  :class="{ '!border-error': error }" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
        <div v-if="error" class="rem:text-[12px] font-semibold font-montserrat text-error inline-block">{{ error }}</div>
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
        label: String,
        modelValue: String,
        placeholder: String,
    },
    emits: ['update:modelValue'],
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
        setSelectionRange(start, end) {
            this.$refs.input.setSelectionRange(start, end)
        },
    },
}
</script>
