import './bootstrap';
import '../css/app.scss';
import '../css/_admin.scss';
import "vue-toastification/dist/index.css";

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import Toast from "vue-toastification";
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import FloatingVue from 'floating-vue'
import 'floating-vue/dist/style.css'
import CookieConsentVue from "/resources/js/plugins/cookieconsent";


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Toast)
            .use(ZiggyVue)
            .use(FloatingVue)
            .use(CookieConsentVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
