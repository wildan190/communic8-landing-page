import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import taildwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        taildwindcss,
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
