import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { VitePWA } from 'vite-plugin-pwa';

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
        VitePWA({
            registerType: 'autoUpdate',
            injectRegister: 'auto',
            includeAssets: [
                'pwa/icon-192.png',
                'pwa/icon-512.png',
            ],
            manifest: {
                name: 'Lonri',
                short_name: 'Lonri',
                description: 'Lonri member and payments management app',
                start_url: '/',
                scope: '/',
                display: 'standalone',
                orientation: 'portrait',
                background_color: '#0f172a',
                theme_color: '#0284c7',
                lang: 'en',
                icons: [
                    {
                        src: '/pwa/icon-192.png',
                        sizes: '192x192',
                        type: 'image/png',
                        purpose: 'any',
                    },
                    {
                        src: '/pwa/icon-512.png',
                        sizes: '512x512',
                        type: 'image/png',
                        purpose: 'any',
                    },
                ],
            },
            workbox: {
                globPatterns: ['**/*.{js,css,html,ico,png,svg,woff2}'],
                navigateFallback: '/offline.html',
                cleanupOutdatedCaches: true,
            },
            devOptions: {
                enabled: true,
            },
        }),
    ],
});


