<script setup>
import Modal from './../Modal.vue';

const emit = defineEmits(['close']);

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div>
            <div class=" relative ">
                <slot name="title" />

                <button @click="close" class="absolute right-4 top-4" v-if="$slots?.title">
                    <img class="h-8" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADxklEQVR4nO2Zz0tUURTHn7bsB6Hou3dA3VQUlptQaGDutUBB/NVMiFJQoRBBM6ItKpCyTRFk+WYILPuxUNq8hxs31S6i/oYgctWqWtlgyDAzN87oc97ceb/u+6GL5sCFNz449/M9991zz7lKUs1qVrP/05qa6IFA/ERi0eYIGZIkqU7aBatHiNyUEfmNMGUIk+/bk3syWY7dQJgWwRc8SyFbPUL09RZ4xSjKmKZEncmYJnX40kBkVtpNeBmRTa8iquHpl8bG6EH9vfE5FHj43dZGD8PEoiIc4OtkTN5t+SILMLdfeHC4UAlP3uiOZblnv4zJx0oRZNLKGcbkGg/f0NB1SH8Pz3yg/IgwjTzvEKLXfqTnq9NK8JGXEfls9ql0nuxbCUQEZBuryBuNaen7G2+fsnjsArNaCafI68a0TKKgzudujVytSBQY0ylJ1Mqp0joKAM+0NIORXX7CBqOJquzkNvJMyySYpuTAV0FV2HT8itHXTyF4mKA8If0LG9YO3k6EKDzbHutLc6yt5dyOL+GDEw4pqzRnBm8jQhg+y/mIdgwwpiqPhAQ04+5hs3RnB28F4AceR7rZ+9k7W+9FRcA3bBQB2QYmcBKgg9wdm2Azo+OFtWcPL7mB3+CSAcC/TKZ438NCIvgMMnAmzv4sz7kSUR4AmkkEAM+YqjwWEhC0CF/wmpJjK0qnsIBgRfiA18qruIciPMKrSlwKwviNDRnD7cZ2yjavUpPhwluJgGwjKuDexYm9gTcTMTM6ng9egBIevG4Yx3qhFfzx/EGCqcpmcJ+QEj48b0zN9IuK2DDZxC+SqXwo8AjR6wiTLEJ0VZJG9gUlImtRxYa6aTGmx00FmBxSey5C5uBlRD+ZrYBXeBamCB6eL6vt4PViDoZIATgYlAirctotvBFE5LDLmojwdHmGMF0LAj4QEYh+C6GldNeMwPAiYt1vSylj+suqqXcLDwcTDFERBa6pP3WsF/qAMSEBCNFps2sVL/X88vRUhQi7KraoKoy/Vlks+RIvp6sutk6f6FvNq/OuIs+DLSZTeacqtlB9nVL6DX8vlxiZLl9Xi1PnL+84FG1G7PqJoknkjXP5aSmrVgKiApvMdT1vWHqzfmJ9ac4h8j6aeisRrS1nPdfzvIhWgy9beFWZDfam2kcbWHVfim0+mwDgdauHi1a4q4TJoh397IN+6SQAr1tzhAzBIQW+2o/2FiHbhAlfYfC/Aaalb3uFr/KlWpTiYcAbrVKEv06K8SLCht+ZWEsPQ3oTzdFmBj5Kvjxmm5rVTBKzf0mBRvZBZPcSAAAAAElFTkSuQmCC">
                </button>
            </div>

            <div class="py-8 px-6">
                <slot name="content" />
            </div>
        </div>

        <div class="flex flex-row justify-end px-4 py-2 bg-gray-100 text-right" v-if="$slots?.footer">
            <slot name="footer" />
        </div>
    </Modal>
</template>
