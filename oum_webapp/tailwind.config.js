import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                customColor: '#A60303',
                customColor2: '#590202',
                customColor3: '#00020D',
                customColor4: '#EBF2EE',
                customColor5: '#BF0404',
                customColor6: '#FFFAFA',
                customColor8: '#FFFFFF',

            },
        },
    },

    plugins: [forms],
};
