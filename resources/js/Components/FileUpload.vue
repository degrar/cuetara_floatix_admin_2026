<script setup>
import {reactive, ref} from "vue";
import SecondaryButton from  '@/Components/SecondaryButton.vue';
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {BiUpload} from "oh-vue-icons/icons";
import {FaCircleNotch} from "oh-vue-icons/icons";
import InputLabel from "@/Components/InputLabel.vue";

addIcons(BiUpload, FaCircleNotch);

const placeholder = "";
const emit = defineEmits(['update:select']);

const fileInput = ref(null);
let fileName = reactive({
    value: placeholder
});

const props = defineProps({
    label: {
        type: String,
        default: '',
    },
    button: {
        type: String,
        default: 'Adjuntar',
    },
    help: {
        type: String,
        default: 'Formatos válidos jpg, pdf o png. Peso máximo 8 Mb'
    },
    form: {
        type: Object,
        default: null
    },
    error: {
        type: [String, Boolean],
        default: null
    },
});

const inputChange = () => {
    const file = fileInput.value.files.length ?
        fileInput?.value.files[0] : null;

    fileName.value = file ? file.name : placeholder;

    emit('update:select', file);
};

const openFileExplorer = () => fileInput.value.click();
</script>


<template>
    <div class="relative">
        <input ref="fileInput" type="file" class="hidden" @change="inputChange">
        <InputLabel v-if="label">{{ label }}</InputLabel>
        <div class="">
            <div class="relative text-black font-century rem:text-[14px] bg-white std-input rounded-[6px] appearance-none px-2 py-2 rem:h-[45px] rem:mt-[5px] rem:mb-[5px] border-[4px] border-white placeholder-brown placeholder-opacity-100 focus:placeholder-opacity-50 focus:outline-none focus:border-white focus:shadow-none" :class="{ '!border-error text-error': error }">
                <div class="text-ellipsis overflow-hidden whitespace-nowrap placeholder-brown" @click="openFileExplorer">{{ fileName.value }} </div>
                <SecondaryButton @click.prevent="openFileExplorer" class="transition-all relative lg:absolute lg:top-0 lg:bottom-0 lg:right-0 m-auto hidden lg:block">{{ button }}</SecondaryButton>
            </div>
            <SecondaryButton @click.prevent="openFileExplorer" class="transition-all relative lg:absolute lg:top-0 lg:bottom-0 lg:right-0 m-auto block lg:hidden w-full" >{{ button }}</SecondaryButton>
            <div v-if="help" class="rem:text-[16px] text-brown font-tekoRegular mt-[5px]">{{ help }}</div>
            <div v-if="error" class="rem:text-[16px] font-tekoSemiBold text-error inline-block">{{ error }}</div>
        </div>
    </div>
</template>
