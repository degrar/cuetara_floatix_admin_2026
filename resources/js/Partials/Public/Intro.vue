<template>
    <div class="bg-home bg-cover bg-center bg-no-repeat min-h-[980px]r bg-yellow" >
        <div :style="{ paddingTop: headerHeight + 'px' }"></div>
        <div class="container mx-auto">
            <img src="../../../../resources/images/claim.png" alt="home" class="max-w-[800px] w-full mx-auto pb-5"/>
        </div>

        <div class="container mx-auto py-[50px] pb-[100px]">
            <div class="text-center mb-[100px]">
                <PrimaryButton scroll="#participa" class="text-[25px] py-[20px] px-[35px]">¡Participa ya!</PrimaryButton>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props =
    defineProps({
        end: {
            type: Boolean,
            default: false
        },
    });


const screenResolution = ref(window.screen.width);
const imageToShow = ref('');

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
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

onUnmounted(() => {
    window.removeEventListener('resize', getHeaderHeight);
    window.removeEventListener('resize', handleResize);
});

</script>

<style scoped>

</style>

