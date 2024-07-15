<template>
    <Page title="Configuración">
        <template #title>
            Configuración
        </template>

        <template #content>
            <div class="grid grid-cols-4 gap-8">
                <div class="text-center bg-gray-100 py-4 rounded">
                    Actualizar bases legales

                    <PrimaryLink class="block mt-4 mx-auto w-1/2" :href="route('admin.settings.legal')">
                        Actualizar
                    </PrimaryLink>
                </div>
                <div class="text-center bg-gray-100 py-4 rounded">
                    Previsualizar emails

                    <PrimaryLink class="block mt-4 mx-auto w-1/2" :href="route('admin.settings.emails')">
                        Previsualizar
                    </PrimaryLink>
                </div>
            </div>
        </template>
    </Page>
</template>

<script setup>
import Page from "@/Partials/Admin/Page.vue";
import PrimaryButton from "@/Components/Admin/PrimaryButton.vue";
import PrimaryLink from "../../../Components/Admin/PrimaryLink.vue";
</script>
