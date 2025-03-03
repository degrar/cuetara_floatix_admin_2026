<template>
    <div class="game-list border-2 rounded-3xl overflow-hidden">
        <div class="grid grid-flow-col py-2 px-2 border-b gap-2 " :class="`grid-cols-${header.length + 2}`">
            <div class=" font-semibold text-center px-2 rem:text-[14px] " v-for="(item, key) in header" :key="key" :class="{ '!col-span-2': key === 1 || key === 3  }">{{ item }}</div>
        </div>

        <GameItem :isRequestedGamesPage="checkIfRequestedGamesPage()" v-for="(item, key) in data" :data="item" :key="key" @dialog="imagesDialog" @deleted="onItemDeleted" />

        <div v-if="!props.data.length" class="text-center py-4 font-bold bg-gray-200">
            (No hay datos)
        </div>
    </div>

    <DialogModal :closeable="true" max-width="5xl" :show="showImagesDialog" @close="showImagesDialog = false" class="font-poppins">
        <template #title>
            <span class="flex decoration-dotted justify-start p-4 group-hover:text-charm transition font-bold uppercase">Archivos</span>
        </template>

        <template #content>
            <div class="flex gap-6 justify-center">
                <a v-for="(item, key) in files" :key="key" :href="route('admin.files.' + (item.hash.endsWith('.pdf') ? 'pdf' : 'image'), item.id)" target="_blank" class="w-1/4 group">
                    <div>
                        <span v-if="item.type === 1" class="flex decoration-dotted justify-center pt-2 group-hover:text-charm transition font-bold">Ticket</span>
                        <span v-if="item.type === 3" class="flex decoration-dotted justify-center pt-2 group-hover:text-charm transition font-bold">DNI/NIE Cara</span>
                        <span v-if="item.type === 4" class="flex decoration-dotted justify-center pt-2 group-hover:text-charm transition font-bold">DNI/NIE Dorso</span>
                        <span v-if="item.type === 2" class="flex decoration-dotted justify-center pt-2 group-hover:text-charm transition font-bold">Carta Aceptación</span>

<!--                        <span v-if="item.is_valid"  class="flex decoration-dotted justify-center pb-4 group-hover:text-charm text-[12px] transition">{{ statusText(item.is_valid)  }}</span>-->
                        <!-- PDF -->
                        <img v-if="item.hash.endsWith('.pdf')" class="mx-auto" src="data:image/png;base64,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">

                        <!-- Image -->
                        <img v-else :src="route('admin.files.image', item.id)" alt="" class="shadow-lg rounded-2xl mx-auto">

                        <span class="flex decoration-dotted justify-center py-2 group-hover:text-charm transition">
                            Nueva ventana
                            <img class="ml-2 h-[24px]" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC0UlEQVR4nO2ZP2/TQBjGr0HAN4jvHIJaBAtMHRFwRyX+Sh1aEBJCMCCBIgFFDAxMCSxhQMRXMVQwIL6CBRM7JXbTioGJgQ5ISGygJvhMkQ6d3QQ7SWl8vpyF5Ed6lSGx/Xvufe+98wWAXLly5RpFEOI6RHgTIsKlApJlkKUgwm1peBTG/50BJG+gUET4CkT4NUTkK0T492gPxJsCWuJ5EwbCS0oMFIvHDxiQrMmPGm6rgodJDQh4iMi3FPBJMzAxAA/xS1kDhejIG5B0IMRVYQqAS7sSjUQKeABAQcpAWPM9+J9FEx8dA/SO8OJLKQNbE7Z7s2pW8CkMiG4TXhSWTVyLn/jeRcdboA5rUoe1qevzpGE5jJ+//iQ2b85crXOr6XFxT8tl7+mKd0c2A71W2V/zT5c7JctlH2SgR4J347+VzcDQi8TI64Snqg1YDrurE56qNkAd5uiEp2PIwIZOeCprwIDE31oD/FgGNMNT1+dm+VRwjfgcPQMQ1w2Ivf6tgG546vp8fmGJ79t/OvgEaaUbnvaFVgOzNxpx+GuPU8FT3QbKU2el4ecjZZOZgS7E7E0r8cibkYmbmYE0ASOlJ2VAVRfKzIChcB3IJgNom61EbsDPMzCS8hJy80nMU3ah4e/EOrpQo+n14M3SjHQbHXoqocNA1f7cM3DoyAXZlZjYkXOamk4DF++96BnAcw8kV2KTXI6ezCF08pgOA/dfrQYbwO6zK423cgaCs1GEW39NYM9A5GHNXg9qVHXN1+z1YOSj8NOkMrCLTWIAGMaJqXSn0/Jx8PAcf/TmSwzectmPRAZCE2TSQHhFJ/w0qQzAh8Gk/yMrBHMCErs8ee67aG0qgc3STNBtxIQVNb/9y8+vWyCtah/5Hsthazq6EY2XT+t5i+8GKvRstWPqNGG5rNVotRFQKZGJhuvdFnUpe1r3T2iHbVgOeyfKRtnI5wLj0R/YMOzIDoSPAwAAAABJRU5ErkJggg==">
                        </span>
                    </div>
                </a>
            </div>
        </template>
    </DialogModal>
</template>

<script setup>
import GameItem from "@/Partials/Admin/Games/GameItem.vue";
import DialogModal from "@/Components/Admin/DialogModal.vue";
import {ref, defineProps} from "vue";

const emit = defineEmits(['deleted']);
function checkIfRequestedGamesPage() {
    return window.location.pathname.startsWith('/dashboard/games/requested');
}
const props = defineProps({
    data: Object,
    header: Array
})

const showImagesDialog = ref(false);
const files = ref([]);

const imagesDialog = (value) => {
    files.value = value;
    showImagesDialog.value = true;
};

const onItemDeleted = id => {
    emit('deleted', id);
}

</script>

<style scoped>

</style>
