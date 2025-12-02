/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // INI WAJIB ADA AGAR LIGHT/DARK MODE JALAN
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", "sans-serif"],
            },
            colors: {
                primary: "#2563EB",
                secondary: "#0F172A",
            },
        },
    },
    plugins: [],
};
