import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/panel.js',
                'resources/js/dashboard.js',
                'resources/js/informe.js',
            ],
            refresh: true,
        }),
    ],
});
