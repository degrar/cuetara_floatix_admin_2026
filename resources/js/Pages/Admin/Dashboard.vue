<template>
    <AppLayout title="Dashboard">
        <div>
            <SectionTitle>
                <template #title>
                    Dashboard
                </template>
            </SectionTitle>

            <div class="bg-snow min-h-[50vh] px-2 py-4 rounded-3xl">

                <h4 class="text-xl font-medium mb-2">Campaña</h4>

                <div class="border rounded-xl border-dark shadow-sm p-6 bg-white">
                    <div class="inline-flex items-center">
                        <span class="text-black mr-2"><strong>Inicio de la campaña: </strong></span>
                        <span class="text-gray-600">{{ formatDate($page.props.start_date) }} a las {{ formatHours($page.props.start_date) }} - <span class="text-black">Check página</span> <a class="underline" target="_blank" :href="route('proximamente')">Próximamente</a></span>
                    </div>
                    <br>
                    <div class="inline-flex items-center">
                        <span class="text-black mr-2"><strong>Finalización de la campaña: </strong></span>
                        <span class="text-gray-600">{{ formatDate($page.props.end_date) }} a las {{ formatHours($page.props.end_date) }} - <span class="text-black">Check página</span> <a class="underline" target="_blank" :href="route('promo-finalizada')">Promo Finalizada</a></span>
                    </div>
                    <br>
                    <div class="inline-flex items-center">
                        <span class="text-black mr-2"><strong>Timezone: </strong></span>
                        <span class="text-gray-600">{{ $page.props.timezone }} </span>
                    </div>
                    <br>
                    <br>
                    <div class="inline-flex items-center">
                        <span class="text-black mr-2"><strong>Límite participaciones diarias: </strong></span>
                        <span class="text-gray-600">{{ $page.props.attempts_day }} </span>
                    </div>
                    <br>
                    <div class="inline-flex items-center">
                        <span class="text-black mr-2"><strong>Límite participaciones totales: </strong></span>
                        <span class="text-gray-600">{{ $page.props.attempts_total }} </span>
                    </div>

                </div>

                <hr class="my-4">

                <h4 class="text-xl font-medium mb-2">Resumen</h4>
                <div class="md:grid grid-cols-4 mt-4 gap-5 font-poppins">
                    <div class="border-2 rounded-xl p-4">
                        <div class="flex">
                            <div class="mr-4 bg-[#90caf9] bg-opacity-50 flex justify-center items-center px-3 py-3 rounded-xl">
                                <img class="h-[32px]" src="data:image/png;base64,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">
                            </div>
                            <div>
                                <div class="text-3xl">
                                    {{ $page.props.stats.games }}
                                </div>
                                <div class="text-gray-400 text-sm">
                                    Participaciones
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-2 rounded-xl p-4">
                        <div class="flex">
                            <div class="mr-4 bg-[#a5d6a7] bg-opacity-50 flex justify-center items-center px-3 py-3 rounded-xl">
                                <img class="h-[32px]" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAECklEQVR4nO2ZW08TQRSAmxh98hU7pSgqyKWAIUKMl7jbgvVCgQANYryCCqRioqIQgaIGEAQDVEXuFyndVtEHE4zRqFGjqNFgDEpfDIm++Rc0McfM0k632wUK3V2s6UlOpp1u55yvcy7TXYUiJCEJiR+SshwhqkaJ6Aklon8hFQ0S62+linoZFqaLUgQqGo1mBVJR72RwGnyVehEwAEK0eWmcpwHvdsAASkR/IosiqhyHk0JiQRyIgBfjxjwOJ4UMgsQEEFpsFEaX2absZsbp+M44HSC2Io5Nz7z9mWgALucFjTfcbYN8Uxls2p4H62N3gXp1GsQmZkDKDiMYTWVQPdAE1klmEQAOEA2Acdp/8I22PuqEHRkH/ErOhJQsKL9Rt5QA3gYvWVsgMkq/4CqTXVQK1kmb5AB/XIv9EQK4ONwC4RFaYlC9Wge5xSaov9MKfe9vsw52vu5n3x86Xw7R8Xu8HDQcPiE1ADXmaipjfIBbr/rYOHcbS0rNhrbHnXPG99CnEcgpNnk5ebr9knQACkX+MqVSl4BHPkBWUQkxFJ9sgJ63g35XmrzSk+S7cRsNXoktMoCv4MVuPu8BdYSOGLoy2u5lrOyqGbboC2BttJ4dtdmHICIyDQ6eO8N+PvzZBjFJGeT7FZ318gKU1lURI3T2QS9DmYWeneErLqvu6wqrzpP5nOOl8gJgp4ViuKq3cd7q47628b6FzCVvy5UGICyCjkaIOodHLgCu5W4jlqfdxAi3F+SWmKD/wzA7CjnV+26IzEXF7ZasjE67FpvmAqxZl06MDE5YiRFumewen0lqPAo5ZftqJ3MqtVbeRsYFwKVxLoCuNwNeTrmbl3XSJpgbsgBoNnlC6PqzHsEQwvV+4OOwT90vvnyBhT5+sZLMpdJGeQHoTE8Sn7Vc9iRxf5Nfxwi+HjNXyguAf0X3vC7nsF9llH+MQC7FfYLbyHA48cNKdAAcNu4zkCpcCw33vBvZqZZa2KovgHUb9LB11372PXayyFzBhgvOoVTaCMdqK32O17jZcZueJABYDUeKF32UWIwqxAboeNEH62N2k88TU7Lg2sOO4AFgnA6o5R2n8evMoyVgHmqGrtcDMPLF/m8DME4H6+x8f2jwwY8f08wsiqHxPzw+vGQAWC1PuiA978icEDhx/QFIc62DR9kA3Nr84Cb7S2/W5UNM4l4SXgvZAZVa63O8kA1ADEUcmyEA9D/tgFK+2+sgCcBSKBPMAFt27hMZwHV7XeocYKTqxBqNZiWeCy4ARP0kSaykK/AzgmADqJE79tWzdO0AnlDS43JDrBE4Ny0SYAZilYqqlqsPqMXdAV9hnPZvQZMDQsI4mZNBDYCF+XqnyDZlH2emHNOyqNNuZQ3/b/IX6SYREZMerhIAAAAASUVORK5CYII=">
                            </div>
                            <div>
                                <div class="text-3xl">
                                    {{ $page.props.stats.users }}
                                </div>
                                <div class="text-gray-400 text-sm">
                                    Usuarios
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!--                <h4 class="text-xl font-semibold font-poppins text-police mt-12">Ultimas participaciones</h4>-->

            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {usePage} from "@inertiajs/vue3";
import {useToast} from "vue-toastification";
import Banner from "@/Components/Admin/Banner.vue";
import SectionTitle from "@/Components/Admin/SectionTitle.vue";
import dayjs from 'dayjs';

if (usePage().props.recent_login)
{
    useToast().success(`Bienvenid@! 👋😄`);
}

function formatDate (dateString)  {
    const date = dayjs(dateString);
    return date.format('DD-MM-YYYY');
}

function formatHours (dateString)  {
    const date = dayjs(dateString);
    return date.format('HH:mm:ss');
}
</script>
