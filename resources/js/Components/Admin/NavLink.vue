<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'flex transition text-charm text-xl border-l-4 px-6 rounded border-[#FC6680]'
        : 'flex transition text-police text-xl focus:text-charm hover:text-charm px-6 rounded';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
