import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'
import react from '@vitejs/plugin-react' // 👈 این خط حیاتی است

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.jsx',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/login.css',
                'resources/css/register.css',
                'resources/css/verify.css',
                'resources/js/verify.js',
            ],
            refresh: true,
        }),
        react(),
        tailwindcss(),
    ],
})
