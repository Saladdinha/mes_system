import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
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
                content: 'Quicksand',
                title: 'Roboto',
            },
            colors: {
                primarylight: "#3084f2",
                primarydark: "#145f82",
                primarydark_opacity_25: "#145f8240",
                primarylight_opacity_25: "#3084f240",
                secondary: "#1c779e",
                neutralblack: "#1e1e1e",
                neutralwhite: "#f2f2f2",
                contrastelight: "#e3c100",
                contrastedark: "#eac62f",
            },
            spacing: {
                '65': '17rem',
                '99': "27rem"
            },
            height: {
                '92-1': "92.1vh",
                '100vh': '100vh'
            },
            width: {
                '1.8/4': "48%"
            },
            transitionProperty: {
                width: "width"
            }
        },
    },

    plugins: [forms],
};
