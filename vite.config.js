import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        minify: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/admin/app.css',
                'resources/css/admin/auth.css',
                'resources/js/admin/app.js',
                'resources/js/admin/dashboard.js',

                'resources/css/frontend/common.css',
                'resources/css/frontend/app.css',
                'resources/css/frontend/base.css',
                'resources/js/frontend/common.js',
                'resources/js/frontend/app.js',
            ],
            refresh: true,
        }),
    ],
});
