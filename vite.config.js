import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        // Bind explicitly to localhost to avoid invalid [::] URLs
        host: '127.0.0.1',
        port: 5173,
        origin: 'http://127.0.0.1:5173',
        hmr: {
            host: '127.0.0.1',
            port: 5173,
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
