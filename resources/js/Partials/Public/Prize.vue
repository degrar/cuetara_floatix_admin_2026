<template>
    <div class="relative nPattern w-full redPattern ">

            <div class="container mx-auto flex flex-row items-center justify-center py-[100px]">
                <div class="w-6/12">
                    <img src="../../../../resources/images/nutella/puedes-ganar.png" alt="Puedes Ganar" class="max-w-[360px] w-full mx-auto" />
                    <h1 class="font-nutella rem:text-[99px] rem:tracking-[0.15px] rem:leading-[99px] text-white uppercase text-center">2 jerséis</h1>
                    <h2 class="font-montserrat rem:text-[39px] rem:tracking-[0.15px] rem:leading-[40px] text-white uppercase font-bold text-center py-4" >navideños NUTELLA<sup>&reg;</sup></h2>
                    <div class="max-w-[440px] w-full mx-auto text-center">
                        <p class="font-montserrat rem:text-[25px] rem:leading-[28px] text-white font-bold">Uno para ti y otro para esa persona tan especial</p>
                        <p class="font-montserrat rem:text-[25px] rem:leading-[28px] text-white font-bold pt-4">¡Regalamos <span class="text-yellow">más de 1.000 jerséis!</span></p>
                    </div>
                    <div class="text-center pt-10">
                        <PrimaryButton scroll="#participa" class="inline-block">Participa</PrimaryButton>
                    </div>
                </div>

                <div class="w-6/12">
                    <img src="../../../../resources/images/nutella/jersey.png" alt="Jerseys" class="max-w-[600px] w-full mx-auto" />
                </div>
            </div>


    </div>
</template>
<script setup>

import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref, computed, onMounted, nextTick } from 'vue';

const show = ref(false);
const telescopioRef = ref(null);

function toggleDiv() {
    show.value = !show.value;

    if (show.value) {
        nextTick(() => {
            scrollToSpecs();
        });
    }
}

function scrollToSpecs() {

    if (telescopioRef.value) {
        const specsElement = telescopioRef.value.querySelector('#specs');
        console.log(specsElement);
        if (specsElement) {
            const headerHeight = document.querySelector('#nutella-header').offsetHeight;
            let nav = 0;
            if (window.innerWidth >= 1024) nav = document.querySelector('#duplex-header').offsetHeight;
            else  nav = document.querySelector('div.wrapper-mobile').offsetHeight;
            const offsetTop = specsElement.getBoundingClientRect().top + window.scrollY - (headerHeight + nav);
            window.scrollTo({ top: offsetTop, behavior: 'smooth' });
        }
    }
}

// Hacer scroll al div specs cuando se monta el componente
onMounted(() => {
    if (show.value) {
        nextTick(() => {
            scrollToSpecs();
        });
    }
});

const buttonText = computed(() => {
    return show.value ? 'Menos detalles' : 'Más detalles';
});

</script>

<style scoped>

#specs{
    div{
        div{
            @apply max-w-[400px] w-full mx-auto;
            ul{
                list-style-type: none;
                padding: 0;
                @apply marker:text-white list-outside list-disc ml-10 ;
                li{
                    @apply font-tekoRegular text-white text-[21px] rem:leading-[22px] rem:tracking-[-0.21px] lg:text-[30px] lg:leading-[31px] lg:tracking-[-0.3px] mb-[5px];
                }
            }
            h6{
                @apply font-tekoSemiBold text-blue text-[30px] leading-[31px] tracking-[-0.3px] mb-4 uppercase mt-8;
            }
        }
    }


}
</style>