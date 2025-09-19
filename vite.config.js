import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/login.css',
                'resources/css/register.css',
                'resources/css/verify.css',
                'resources/js/verify.js', // اینجا اصلاح شد (قبلا css بود!)
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0', // دسترسی از شبکه
        port: 5173,
        hmr: {
            host: '192.168.67.203', // اینو با IP سیستم خودت جایگزین کن
        },
    },
})
