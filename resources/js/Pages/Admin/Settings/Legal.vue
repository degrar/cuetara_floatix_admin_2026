<template>
    <Page title="Configuración">
        <template #title>
            Bases legales
        </template>

        <template #content>
            <h3 class="mb-8 text-center bg-gray-200 w-fit mx-auto px-8 py-3 rounded-xl">
                Puedes editar las bases legales aquí <img class="inline h-8" src="data:image/png;base64,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">
            </h3>

            <div class="shadow-lg border-t-2 border-gray-100 rounded-lg">
                <div id="editor" v-html="content || 'BBLLs...'">
                </div>
            </div>

            <div class="text-end mt-8">
                <PrimaryLink :href="route('legal')" target="_blank" class="bg-green-400 font-bold">
                    Ver
                </PrimaryLink>

                <PrimaryButton @click="save" class="ml-4">
                    Guardar
                </PrimaryButton>
            </div>
        </template>
    </Page>
</template>

<script setup>
import Page from "@/Partials/Admin/Page.vue";
import PrimaryButton from "@/Components/Admin/PrimaryButton.vue";
import PrimaryLink from "../../../Components/Admin/PrimaryLink.vue";
import {onMounted, ref} from "vue";
//import "../../../libs/ckeditor5/build/ckeditor.js";
import {useToast} from "vue-toastification";

defineProps({
    content: {
        type: String,
        required: true
    }
})

const toast = useToast();

let editor = null;

const save = async () => {
    let rsp = null;

    try {
        rsp = await axios.post(route('admin.settings.legal'), {
            content: editor.getData()
        });
    } catch (e) {
        toast.error('Error al guardar. (' + e + ')');
        return;
    }

    if (rsp.status === 200) {
        toast.success('Guardado correctamente');
        return;
    }

    toast.error('Error al guardar');
}

onMounted(() => {
    InlineEditor
        .create(document.querySelector('#editor'))
        .then((_editor) => {
            editor = _editor;
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            handleSampleError(error)
        });
});


function handleSampleError( error ) {
    const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

    const message = [
        'Oops, something went wrong!',
        `Please, report the following error on ${ issueUrl } with the build id "5ftnvm2lmifr-lql2h8msi5dx" and the error stack trace:`
    ].join( '\n' );

    console.error( message );
    console.error( error );
}
</script>

<style lang="scss">
#editor {
    h3 {
        @apply text-[24px] mb-2;
    }

    h4 {
        @apply text-[24px] mt-8 font-bold;
    }

    p {
        @apply text-[18px];
    }

    ul {
        list-style: disc;
        @apply pl-8;
    }

    ul > li {
        @apply text-[18px];
    }

    ol {
        list-style: decimal;
        @apply pl-8;
    }

    ol > li {
        @apply text-[18px];
    }

    a {
        color: blue !important;
    }
}
</style>
