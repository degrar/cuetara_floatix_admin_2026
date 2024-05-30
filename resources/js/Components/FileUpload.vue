<script setup>
import {reactive, ref} from "vue";
import SecondaryButton from  '@/Components/SecondaryButton.vue';
import {OhVueIcon, addIcons} from "oh-vue-icons";
import {BiUpload} from "oh-vue-icons/icons";
import {FaCircleNotch} from "oh-vue-icons/icons";
import ButtonFile from "@/Components/ButtonFile.vue";

addIcons(BiUpload, FaCircleNotch);

const placeholder = "Imagen de tu figura dorada*";
const emit = defineEmits(['update:select']);

const fileInput = ref(null);
let fileName = reactive({
    value: placeholder
});

const props = defineProps({
    label: {
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
        type: String,
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
    <div class="max-w-full w-full">
        <input ref="fileInput" type="file" class="hidden" @change="inputChange">
        <div class="text-brown font-bemio rem:text-[14px] std-input w-full rounded-[48px] appearance-none px-[10px] py-[8px] rem:h-[45px] rem:mt-[5px] rem:mb-[5px] border-[4px] border-white std-input px-4 py-2 rem:h-[45px] relative bg-white"
            :class="{ '!border-error': error }">
            <div class="text-ellipsis overflow-hidden whitespace-nowrap placeholder-brown opacity-40 focus:opacity-50" @click="openFileExplorer">{{
                    fileName.value
                }}
            </div>
            <ButtonFile @click.prevent="openFileExplorer" class="transition-all">{{ label }}</ButtonFile>
        </div>
        <div class="text-brown rem:text-[14px] mt-4">{{ help }}</div>
<!--        <div v-if="error" class="form-error text-error rem:text-[12px]">{{ error }}</div>-->
    </div>
</template>
