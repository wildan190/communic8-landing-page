import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/web/**/*.blade.php',
        './resources/views/layouts/*.blade.php',
        './resources/js/**/*.js',
    ],

    safelist: [
        // 👇 kelas background & gradient saat hover
        'group-hover:bg-gradient-to-r',
        'group-hover:from-amber-200',
        'group-hover:via-orange-400',
        'group-hover:to-orange-700',

        // 👇 kalau nanti pakai warna lain
        'group-hover:bg-orange-500',
        'group-hover:bg-orange-600',
        'group-hover:bg-orange-700',

        // 👇 untuk debugging / fallback warna solid
        'hover:bg-orange-500',
        'hover:bg-orange-600',
        'hover:bg-orange-700',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
