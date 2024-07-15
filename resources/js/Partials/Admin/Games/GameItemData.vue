<template>
    <div class="py-4 px-4 border-b last:border-none block">
        <div>
<!--            <table class="table-auto">-->
<!--                <thead>-->
<!--                    <tr>-->
<!--                        <th v-for="(name, key) in keys" :key="key">{{ name }}</th>-->
<!--                    </tr>-->
<!--                </thead>-->
<!--            </table>-->

            <table class="table-auto w-full text-center bg-gray-100 rounded-2xl">
                <thead>
                    <tr>
                        <th class="py-2">ID</th>
                        <th>ID Usuario</th>
                        <th>Fecha nacimiento</th>
                        <th>Fecha creación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="py-2">{{ game.id }}</td>
                        <td>{{ game.user.id }}</td>
                        <td>{{ userBirthdate }}</td>
                        <td>{{ game.user.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-8">
            <SecondaryButton @click="$emit('close')">
                Cerrar
            </SecondaryButton>
        </div>
    </div>
</template>

<script setup>
import SecondaryButton from "@/Components/Admin/SecondaryButton.vue";
import {computed} from "vue";

const props = defineProps({
    game: Object
});

const userBirthdate = computed(() => {
   return new Date(props.game.user.birthdate).toLocaleDateString('es-ES', {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'});
});

const keys = [
    '',
];
</script>

<style scoped>
.field {
    @apply flex items-center;
}
</style>
