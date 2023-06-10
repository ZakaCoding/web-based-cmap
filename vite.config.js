import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const path = require('path');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/cmap.js', // Open CMAP
                'resources/js/assignment.js', // Assignment cmap
                'resources/js/concept.js', // Load concept
                'resources/js/pdf.js',
                'resources/js/gojs.js',
            ],
            refresh: true,
        }),
    ],
});
