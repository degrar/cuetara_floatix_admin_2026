<template>
    <Page title="Participaciones" :pagination-links="links">
        <template #title>
            Participaciones
        </template>

        <template #content>
            <div class="mb-4">
                Mostrando {{ items.data.length }} de {{ items?.total }}
            </div>

            <div class="border rounded-xl border-dark shadow-sm p-6">
                <div class="inline-flex items-center">
                    <span class="size-2 inline-block bg-green-200 rounded-full me-2"></span>
                    <span class="text-gray-600">Ganadora</span>
                </div>
                <br>
                <div class="inline-flex items-center">
                    <span class="size-2 inline-block bg-rose-200 rounded-full me-2"></span>
                    <span class="text-gray-600">Rechazada</span>
                </div>
            </div>

            <div class="flex justify-end mt-8 py-4 border-t-gray-100 border-t-2" v-if="showExportActions">
                <PrimaryLink class="flex gap-2 items-center text-xl bg-green-500" :href="route('admin.games.export')">
                    <img class="w-[24px]" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADFUlEQVR4nO2ZTWsTQRjHl+IL+AHMbJKmLyiUIhSMilLdTYP1UIrgGwHxFFEQobQiOdTGFgUlglroSbCtbealBw+eeu1FW7DaQ2Q3vhzFLyD24MWRZ1PSTbtJdrM7yRZ24GEgmcz+f/P8Z57NriQFLWhBs9Hi+xFSJ0JI3Qgh9S+SVW4nQkh5L8vxQ+aZEFJX4TtZVtYlSWqTRLfe3t4DSFbW7IreBRE6l6wAMH+P1FnhELDyDYu3ysDOcUgwBNhm+2LKPbCTm/ksYZEyJwzC7Hmwk9v5qmYMCYIwX8T8OdbpXaLTH1ij/4jOuN0wz3fp9h3xEFYAeY2mnYiuBoA1Kh7CCoBodM0LAKIz8RBWAFhjvxoFiLQny/O9/rggHsJrgJOJq7aPYblU7PwFMDGfc1RLJL8BQDyYy/FTA9cq7FQtcHFpwHcAzjY63XQF0XoABvEHf13q38sAHGusuKcBiM4a29ABgB5kgAcWQjY2cWpkhPf0DfPsm1zVzfnk7TQ/Fr/Ih27c8t8m7ukbNsZEY0mj0lqJ7zwyWBrTkeT5L9RfALDyIN4KwixejiT42PSU/zJAAGLhmbG6MBbuc8Znn/LcuxnedfTCtviXU/6uA1kzRDTJY13nHYknOuPH+y8bv4G+JYUMICJbdjLEh+2LJzrjr1bnDJtB3xIAsE2su7TyEOFIwrBTI0WNNBugwvPhBI9EExV7wtcAOYsNa7Wx6wmd38jzR/S50TcNYOdROfpi2/NwpJqPWPhbWQvgzGDKGAt90wCgwlqJt4IA0FqFTA6XbAd90wDg9gCsUqtIwcqD+LND1/1ZB/I1VtXJGNQqAK8CBQB1Hq+LzMBiAZczAMeuawuFkPq5nFKk3gcIUQCLBcxvPsyUAU6oV9wDHJaV8XpPz0RFeiLjHmDrDeWHZos/PZjiiwXiBUAJAjIRkpVPTl6zOo1Ie9KwTTqb2SXeJUBlwxpbF3mMEqvQ2E/PAPI6HW06gM5yngFM8sk2orPHRKO/xQunm1ijM8vflw96BmAGwRruIN9It4hgRda5srKyr5aI/78g8Nh7Mx/wAAAAAElFTkSuQmCC">
                    Exportar
                </PrimaryLink>
            </div>

            <div class="w-3/4 my-4">
                <form @submit="doSearch" class="grid grid-cols-4 gap-4">
                    <TextInput v-model="search.idGame" placeholder="[Id participacion]..." />
                    <TextInput v-model="search.idUser" placeholder="[Id user]..." />
                    <TextInput v-model="search.email" placeholder="[Email]..." />
                    <div class="flex items-center">
                        <PrimaryButton type="submit" :class="{'oscilate-opacity cursor-wait': processing}">
                            Buscar
                        </PrimaryButton>
                    </div>
                </form>
            </div>

            <GameList :data="data" :header="tableHeader" @deleted="onItemDeleted" />

            <div class="flex justify-end mt-8 py-4 border-t-gray-100 border-t-2" v-if="showExportActions">
                <PrimaryLink class="flex gap-2 items-center text-xl bg-green-500" :href="route('admin.games.export')">
                    <img class="w-[24px]" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADFUlEQVR4nO2ZTWsTQRjHl+IL+AHMbJKmLyiUIhSMilLdTYP1UIrgGwHxFFEQobQiOdTGFgUlglroSbCtbealBw+eeu1FW7DaQ2Q3vhzFLyD24MWRZ1PSTbtJdrM7yRZ24GEgmcz+f/P8Z57NriQFLWhBs9Hi+xFSJ0JI3Qgh9S+SVW4nQkh5L8vxQ+aZEFJX4TtZVtYlSWqTRLfe3t4DSFbW7IreBRE6l6wAMH+P1FnhELDyDYu3ysDOcUgwBNhm+2LKPbCTm/ksYZEyJwzC7Hmwk9v5qmYMCYIwX8T8OdbpXaLTH1ij/4jOuN0wz3fp9h3xEFYAeY2mnYiuBoA1Kh7CCoBodM0LAKIz8RBWAFhjvxoFiLQny/O9/rggHsJrgJOJq7aPYblU7PwFMDGfc1RLJL8BQDyYy/FTA9cq7FQtcHFpwHcAzjY63XQF0XoABvEHf13q38sAHGusuKcBiM4a29ABgB5kgAcWQjY2cWpkhPf0DfPsm1zVzfnk7TQ/Fr/Ih27c8t8m7ukbNsZEY0mj0lqJ7zwyWBrTkeT5L9RfALDyIN4KwixejiT42PSU/zJAAGLhmbG6MBbuc8Znn/LcuxnedfTCtviXU/6uA1kzRDTJY13nHYknOuPH+y8bv4G+JYUMICJbdjLEh+2LJzrjr1bnDJtB3xIAsE2su7TyEOFIwrBTI0WNNBugwvPhBI9EExV7wtcAOYsNa7Wx6wmd38jzR/S50TcNYOdROfpi2/NwpJqPWPhbWQvgzGDKGAt90wCgwlqJt4IA0FqFTA6XbAd90wDg9gCsUqtIwcqD+LND1/1ZB/I1VtXJGNQqAK8CBQB1Hq+LzMBiAZczAMeuawuFkPq5nFKk3gcIUQCLBcxvPsyUAU6oV9wDHJaV8XpPz0RFeiLjHmDrDeWHZos/PZjiiwXiBUAJAjIRkpVPTl6zOo1Ie9KwTTqb2SXeJUBlwxpbF3mMEqvQ2E/PAPI6HW06gM5yngFM8sk2orPHRKO/xQunm1ijM8vflw96BmAGwRruIN9It4hgRda5srKyr5aI/78g8Nh7Mx/wAAAAAElFTkSuQmCC">
                    Exportar
                </PrimaryLink>
            </div>
        </template>
    </Page>
</template>

<script setup>
import GameList from "@/Partials/Admin/Games/GameList.vue";
import Page from "@/Partials/Admin/Page.vue";
import {ref, shallowRef} from "vue";
import PrimaryLink from "@/Components/Admin/PrimaryLink.vue";
import TextInput from "@/Components/Admin/TextInput.vue";
import PrimaryButton from "@/Components/Admin/PrimaryButton.vue";

const props = defineProps({
    items: Object,
    tableHeader: Array,
    showExportActions: {
        type: Boolean,
        default: false
    }
});

const processing = ref(false);
const search = ref({
    idGame: null,
    idUser: null,
    email: null
});

const data = shallowRef([...props.items.data]);
const links = shallowRef(props.items.links);

const onItemDeleted = id => {
    data.value = props.items.data.splice(props.items.data.findIndex(e => e.id !== id));
}

const doSearch = async (e) => {
    if (processing.value) return;

    e.preventDefault();
    processing.value = true;

    const resp = await axios.get(route('admin.games.search', search.value));

    processing.value = false;

    data.value = resp?.data?.items ?? [];
    links.value = resp?.data?.links ?? [];
}
</script>
<style>
.oscilate-opacity {
    animation: oscilate-opacity 1s infinite;
}
@keyframes oscilate-opacity {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
    100% {
        opacity: 1;
    }
}
</style>
