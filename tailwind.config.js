import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'sans': ['Poppins', 'sans-serif'], // Font untuk teks biasa
                'display': ['Pirata One', 'serif'], // Font untuk judul
            },
            colors: {
                'charcoal': '#111215',
                'eggshell': '#f2f7fc',
                'navy': '#234d7c',
                'brand-red': '#ed4723',
                'brand-blue': '#368ef3',
                'brand-pink': '#fbc3cd',
            }
        },
    },

    plugins: [forms],
};
