 <template>
    <GuestLayout title="No has ganado" menu>

        <whitePatternInside />
        <div class="bg-whitePattern py-[50px]">
            <div class="container mx-auto px-[15px] py-5 pb-[100px] lg:py-10 flex flex-col-reverse lg:flex-row justify-center items-center lg:items-start">
                <div class="mx-auto w-5/12">
                    <img src="../../../../images/nutella/lost.png" alt="Nutella" class="max-w-[484px] w-full mx-auto"/>
                </div>
                <div class="mx-auto w-7/12">
                    <h4 class="stroke-text smooth-16 text-yellow font-montserrat font-extrabold uppercase rem:text-[41px] rem:leading-[41px] rem:tracking-[0px]">ESTA VEZ NO HA HABIDO SUERTE</h4>

                        <p class="font-montserrat rem:text-[21px] rem:leading-[21px] uppercase font-medium mt-6">Lo sentimos, <span class="font-extrabold">tu compra no está premiada.</span> Pero no te preocupes ¡puedes volver a participar con otro producto Nutella®!</p>
                        <div class="w-full mx-auto text-center md:text-left">
                            <p class="font-montserrat rem:text-[21px] rem:leading-[21px] uppercase font-extrabold mt-8 mb-4">¿Tienes otro código o ticket de compra?</p>
                            <PrimaryButton :href="route('home')" class="text-[22px] inline-block">Participa</PrimaryButton>
                        </div>

                 </div>
            </div>
        </div>
        <whitePatternInsideDown />

    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import whitePatternInside from "@/Components/inside/whitePatternInside.vue";
import whitePatternInsideDown from "@/Components/inside/whitePatternInsideDown.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

</script>
