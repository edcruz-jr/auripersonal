import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    neon: '#d4ff00',
                    darkest: '#0F1D26',  // O tom mais escuro, ótimo para rodapés ou textos principais
                    dark: '#162C40',     // Azul marinho profundo, excelente para fundos de seções e navegação
                    primary: '#254559',  // Cor principal, boa para botões de destaque ou headers
                    accent: '#54778C',   // Tom mais suave, perfeito para bordas, ícones ou botões secundários
                    light: '#F2F2F2',
                }
            }
        },
    },

    plugins: [forms],
};
