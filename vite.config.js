import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        https: true, // Use this for development HTTPS
    },
    build: {
        // Adjust if needed
        assetsDir: 'build/assets',
        assetsInlineLimit: 0,
        // Ensure the base URL is set to HTTPS
        base: process.env.APP_URL ? new URL(process.env.APP_URL).origin + '/' : '/',
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});


