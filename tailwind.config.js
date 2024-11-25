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

            },
        },
        container: {
            screens: {
                lg: '1024px',
                xl: '1240px',
                '2xl': '1240px',
            },
        },colors: {
            ...colors,
            'red': '#E1251B',
            'error': '#E1251B',
            'yellow': '#FEDA1C',

            // Admin
            duplex: '#f4375b',


        }
    },

    // plugins: [forms, typography, convertpttorem],
     plugins: [forms, typography, convertpttorem],
};
