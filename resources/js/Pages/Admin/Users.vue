<template>
    <Page title="Participaciones" :pagination-links="$page.props.items.links">
        <template #title>
            Usuarios
        </template>

        <template #content>
            <div>
                Mostrando {{ items.data.length }} de {{ items?.total }}
            </div>

            <UserList :data="items.data" :header="tableHeader" />
        </template>
    </Page>
</template>

<script setup>
import Page from "@/Partials/Admin/Page.vue";
import UserList from "@/Partials/Admin/Users/UserList.vue";

defineProps({
    items: Object,
    tableHeader: Array
});
</script>
