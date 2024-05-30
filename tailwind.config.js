import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

const colors = require('tailwindcss/colors');
const convertpttorem = require('tailwindcss-convert-px-to-rem');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                roboto: ['Roboto', ...defaultTheme.fontFamily.sans],
                robotoBold: ['RobotoBold', ...defaultTheme.fontFamily.sans],
                tahoma: ['Tahoma', ...defaultTheme.fontFamily.sans],
                tahomaBold: ['TahomaBold', ...defaultTheme.fontFamily.sans],
                bemio: ['Bemio', ...defaultTheme.fontFamily.sans],
            },
            // backgroundImage: {
            //     'background-home': "url('/images/background.jpg')",
            // }
        },
        container: {
            screens: {
                lg: '1024px',
                xl: '1240px',
                '2xl': '1240px',
            },
        },colors: {
            ...colors,
            red: '#C82800',
            orange: '#E74115',
            brown: '#6B330F',
            yellow: '#F0B72B',
            grey: '#9D9D9D',
            error: '#F00',
        }
    },

    // plugins: [forms, typography, convertpttorem],
     plugins: [forms, typography, convertpttorem],
};
