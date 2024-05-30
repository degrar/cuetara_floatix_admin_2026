<script setup>
// import "vue-select/dist/vue-select.css";

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
        type: String,
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
        <select v-model="selected" @change="emit('update:select', $event.target.value)" class="w-full std-input"
                :class="{ 'error': error }">
            <option :value="defaultValue" disabled>{{ placeholder }}</option>
            <option :value="option[value]" v-for="option in options">{{ option[label] }}</option>
        </select>
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>


    <!-- <vue-select :options="provinces()" label="name"-->
    <!-- v-model="form.province"-->
    <!-- placeholder="Provincia*"-->
    <!-- class="vs-custom" />-->
</template>
