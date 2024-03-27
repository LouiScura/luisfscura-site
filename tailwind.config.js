import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Albert', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'primary': '#28293B',
            'custom-orange': '#E56823',
            'custom-black': '#0C0C0C',
            'body-bg': '#0F1419',
            'custom-grey': '#F5F5F5',
            'custom-border': '#3E4144'
        }
    },

    plugins: [forms],
};
