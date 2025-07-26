import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/admin.css',
                'resources/css/frontend.css',
                'resources/js/app.js',
                'resources/js/admin.js',
                'resources/js/instructor.js',
                'resources/js/student.js',
                'resources/js/frontend.js',
            ],
            refresh: true,
        }),
    ],
});
