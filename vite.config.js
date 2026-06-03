import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/login.css',
                'resources/js/login.js',
                'resources/css/dashboard.css',
                'resources/js/dashboard.js',
                'resources/css/kasir.css',
                'resources/js/kasir.js',
                'resources/css/status-meja.css',
                'resources/js/status-meja.js',
                'resources/css/manager.css',
                'resources/js/manager-dashboard.js',
                'resources/js/manager-kategori.js',
                'resources/js/manager-menu.js',
                'resources/js/manager-meja.js',
                'resources/js/manager-user.js',
                'resources/js/manager-transaksi.js',
                'resources/js/manager-laporan.js',
                'resources/js/manager-detail-laporan.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
