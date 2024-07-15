<template>
    <Page title="Configuración">
        <template #title>
            Emails
        </template>

        <template #content>
            <h3 class="mb-8 text-center bg-gray-200 w-fit mx-auto px-8 py-3 rounded-xl">
                Previsualización de los emails <img class="inline h-8" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEHUlEQVR4nO2bWagXVRzHPze1LLcWS3O3hYyK3NBUFFFDC7UiiiJNogV66rHXHsU3H3pQEUURjcQNF1SEsqIoKlqvJtU1bXUpc71uVwZm4CJz5v+//zsz53fmfj9w4P8w/7N9zpw553dmQAghhBBCCCGEEEIIIUQ1aFPCUh94r4ASEtJmeCB4r4AS2UJEudS8Q0S5SIgxJMQYEhKakCVAN9+17AJ0i/u6rmXvh8AA3zWuMHcAezq6DzkCTPRd8woyBvil0Y3hBeA13y2oEAuAs3ns1JcBN/puTcB0BxY3Gjp513HhJ8Ag3y0LkEFx37XV2depO/WXHLfWP8AMv+0LiinAHyn9eB54taP7kNGOh88l4G0/7QuKN4DWlP77DZjQ6MYwWp7tdtxu64Bbym1jEPQEVjr67APgruuu75CQZAPzDnAl5dqvgXvKaWcQDAU+T+mnq8DS+OFOZ4UkzAP+S7n+BDC7uDYGw3Tg75T+OQ08l/G/hoVEPAD84BgB0bLuBroeTfEz9XJKv/wEPFzj/50SEtEH2OiYI7cB/eg69Abed/TFduDWOvLotJBao+Ig8BDV537g+xxmi1yEJMyJnyHX5/E/8CzVZS7wb0q7TwFPdTCvXIVEDAO+yBgpVQrlN8UzQ9qK8xvg3gbyzF1IsvZe5ZhLdwG3Ez59gS2ONq4HejWYbyFC2u9OL6bkeRgYT7g8CvxcUNSiUCERU4E/HfGbVwiPF4EzKe05BszMIf/ChUQMBj7NCOX3IOyQ+ZfA8JzKKUVIxE1xuCCtQR8BA7FLf2Cfo+5rgJtzLKs0IQkLgXMp5RwFJmGPcUCL4/T09QLKK11IxFjgV0cj38IOL2cMnscKKtOLkGQa2FvSNNDI9LrcUbf9BU+v3oQQbxIXx5vGtAflCMrH9wLEq5CEFzKWkrMoj2kZS/RFJdXBhJCIUUBzSvmX481WFKYoEtcm9hDwCOVhRkgSjtjsmC42dCIcUSvMs9pR5k7gNsrFlJBaAbvm+E7Ki/uAb40dsJkTkvBkRkj76RzyfwI46TgqeAZ/mBWSjODvch7BWXfgAeBB/GJaSHIs+p5jjt9R57Fo++PmTY68tho5bjYvpJ5VUK0XB5IXMn70uIqrnJBkn/CX49Wa53Ez3/HK0nHgcWwRlJCIIcBnde6ksyIBXwEjsUdwQpJY04oaX3tlfZW01vBrr0EKSXjT8QJziyNk3hr/xzJBCyE+mz/suBPap9+BydgneCERd2ac6EXpY+BuwqASQrLOvEP7/K4yQmj3tdfR+Kvh6HdoVE5I6EiIMSTEGBJiDAkxhoQYQ0KMISHGkBBjSIgxJMQYEmIMCTGGhBhDQowhIcaQEGNISGhClPDaBxKArT7wXgElJKTN8EAQQgghhBBCCCGEEEIIQehcA+fQ76nR3elUAAAAAElFTkSuQmCC">
            </h3>

            <div v-for="(email, title) in emails" class="my-8">
                <div>
                    <h4 class="text-xl mb-2 text-center uppercase bg-green-200 hover:bg-green-100 px-4 py-2 w-fit mx-auto rounded cursor-pointer"  @click="$event.target.parentElement.nextSibling.classList.toggle('hidden')">{{ title }} &DownArrow;</h4>
                </div>
                <div v-html="email" class="hidden mt-8 bg-gray-300">
                </div>
            </div>
        </template>
    </Page>
</template>

<script setup>
import Page from "@/Partials/Admin/Page.vue";

defineProps({
    emails: {
        type: Object,
        required: true
    }
})
</script>
