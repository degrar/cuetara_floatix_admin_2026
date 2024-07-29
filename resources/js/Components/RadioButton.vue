<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Number,String],
        default: '',
    },

    value: {
        type: [Number,Boolean],
        default: null,
    },

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
        type="radio"
        :value="value"
        class=""
    >
</template>