 <template>
    <GuestLayout title="No has ganado" menu>
        <div class="container mx-auto p-4 flex flex-col lg:flex-row justify-center items-center lg:items-start">
            <div class="mx-auto w-12/12 lg:w-7/12">
                <h4 class="text-center lg:text-left stroke-text smooth-16 text-yellow font-roboto font-extrabold uppercase rem:text-[28px] rem:leading-[32px] lg:rem:text-[41px] lg:rem:leading-[41px] rem:tracking-[0px]">ESTA VEZ NO HA HABIDO SUERTE</h4>
                <p class="text-center lg:text-left font-roboto rem:text-[18px] rem:leading-[25px] lg:rem:text-[21px] lg:rem:leading-[25px] uppercase font-medium mt-6">Lo sentimos, <span class="font-extrabold">tu compra no está premiada.</span> Pero no te preocupes ¡puedes volver a participar con otro producto Nutella®!</p>
                <div class="w-full mx-auto text-center md:text-left">
                    <p class="font-roboto rem:text-[18px] rem:leading-[25px] lg:rem:text-[21px] lg:rem:leading-[21px] uppercase font-extrabold mt-8 mb-4">¿Tienes otro código o ticket de compra?</p>
                    <PrimaryButton :href="route('home')" class="text-[22px] inline-block">Participa</PrimaryButton>
                </div>
             </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";

</script>
