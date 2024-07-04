<template>
    <div class="bg-nextEnd bg-cover bg-center bg-no-repeat min-h-[1400px] bg-yellow" >
        <div :style="{ paddingTop: headerHeight + 'px' }"></div>
        <div class="container mx-auto">
            <img src="../../../images/end.png" alt="home" class="max-w-[800px] w-full mx-auto pb-5"/>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const props =
    defineProps({
        end: {
            type: Boolean,
            default: false
        },
    });


const screenResolution = ref(window.screen.width);

const handleResize = () => {
    screenResolution.value = window.screen.width;
};

const headerHeight = ref(0);

const getHeaderHeight = () => {
    headerHeight.value = document.querySelector('#header').offsetHeight ;
};

onMounted(() => {
    getHeaderHeight();
    window.addEventListener('resize', handleResize);
    window.addEventListener('resize', getHeaderHeight);
});

onUnmounted(() => {
    window.removeEventListener('resize', getHeaderHeight);
    window.removeEventListener('resize', handleResize);
});

</script>