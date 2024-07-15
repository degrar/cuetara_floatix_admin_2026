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
            },
            dropShadow: {
                'menu': '0px 2px 2px rgba(0, 0, 0, 0.25)',
            },
            boxShadow: {
                'menu': '0px 4px 4px 0px rgba(0, 0, 0, 0.25)',
            },
            backgroundImage: {
                'home': "url('/resources/images/desktop.jpg')",
                'nextEnd': "url('/resources/images/nextEnd.png')",
                'inside': "url('/resources/images/insideHeader.jpg')",
                'curveOrange': "url('/resources/images/curve-orange.png')",
                'curveYellow': "url('/resources/images/curve-yellow.png')",
                'curveFooter': "url('/resources/images/curve-white.png')",
                'AdminBackground': "url('/resources/images/admin/background-image-admin.jpg')",
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
            red: '#C82800',

            'error': '#FF0202',
            'brown': '#7D2A25',
            'blue': '#11368F',
            'yellow': '#FEE900',
            'grey': '#919090',
            'orange': '#F39B00',

            // Admin
            duplex: '#f4375b',


        }
    },

    // plugins: [forms, typography, convertpttorem],
     plugins: [forms, typography, convertpttorem],
};
