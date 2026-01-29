import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/livewire/flux-pro/stubs/**/*.blade.php',
        './vendor/livewire/flux/stubs/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'midnight-navy': '#0f172a',
                'electric-blue': '#1e40af',
                'electric-blue-light': '#3b82f6',
                'teal': '#14b8a6',
                'teal-light': '#2dd4bf',
                'slate-50': '#f8fafc',
                'slate-100': '#f1f5f9',
                'slate-200': '#e2e8f0',
                'slate-300': '#cbd5e1',
                'slate-400': '#94a3b8',
                'slate-500': '#64748b',
                'slate-600': '#475569',
                'slate-700': '#334155',
                'slate-800': '#1e293b',
                'amber-500': '#f59e0b',
                'amber-600': '#d97706',
            },
        },
    },

    plugins: [],
};