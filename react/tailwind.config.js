/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./index.html",
        "./src/**/*.{js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {
            colors: {
                'surface': '#FFFFFF',
                'surface-dark': '#141414',
                'background': '#F8F8F8',
                'background-dark': '#000000',
                'on-primary': '#FFFFFF',
                'on-primary-dark': '#141414',
                "primary": {
                    50: "#F9F1F5",
                    100: "#F1DFE7",
                    200: "#E4C3D3",
                    300: "#D6A4BB",
                    400: "#C784A4",
                    500: "#BA678E",
                    600: "#9E4870",
                    700: "#773655",
                    800: "#512539",
                    900: "#27121B",
                    950: "#150A0F"
                },
                "secondary": {
                    50: "#F7E9E9",
                    100: "#F0D6D7",
                    200: "#DFAAAB",
                    300: "#CF8182",
                    400: "#BF5556",
                    500: "#9F3C3D",
                    600: "#7E3031",
                    700: "#602425",
                    800: "#3F1818",
                    900: "#210D0D",
                    950: "#0F0606"
                }
            },
            container: {
                center: true,
                padding: '1rem',
                screens: {
                    'xl': '1024px',
                    '2xl': '1024px',
                },
            },
        },
    },
    plugins: [],
}
