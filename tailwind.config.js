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
                hermes: ['Hermes', ...defaultTheme.fontFamily.sans],
                tekoMedium: ['TekoMedium', ...defaultTheme.fontFamily.sans],
                tekoSemiBold: ['TekoSemiBold', ...defaultTheme.fontFamily.sans],
                tekoRegular: ['TekoRegular', ...defaultTheme.fontFamily.sans],

                nutella: ['Nutella', ...defaultTheme.fontFamily.sans],
                montserrat: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            dropShadow: {
                'menu': '0px 2px 2px rgba(0, 0, 0, 0.25)',
            },
            boxShadow: {
                'menu': '0px 4px 4px 0px rgba(0, 0, 0, 0.25)',
                'customOrange': '0 4px 0 0 rgba(253, 178, 0, 1)',
            },
            backgroundImage: {
                'AdminBackground': "url('/resources/images/admin/background-image-admin.jpg')",

                'nPattern': "url('/resources/images/pattern/nPattern.png')",
                'nPatternFull': "url('/resources/images/pattern/nPatternFull.png')",
                'nPatternReverse': "url('/resources/images/pattern/nPatternReverse.jpg')",
                'redPattern': "url('/resources/images/pattern/redPattern.jpg')",
                'insidePattern': "url('/resources/images/pattern/simplePatternWhite.png')",
                'flowerPattern': "url('/resources/images/pattern/flower.png')",
                'nFlowerPattern': "url('/resources/images/pattern/nFlowerPattern.png')",
                'boteNutellaPattern': "url('/resources/images/pattern/boteNutellaPattern.png')",


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
            'grey': '#666',
            'softGrey': '#ccc',
            'brown': '#7D2A25',
            'blue': '#11368F',
            'orange': '#F39B00',

            // Admin
            duplex: '#f4375b',


        }
    },

    // plugins: [forms, typography, convertpttorem],
     plugins: [forms, typography, convertpttorem],
};
