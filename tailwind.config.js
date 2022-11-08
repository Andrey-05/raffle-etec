/** @type {import('tailwindcss').Config} */

const defaultTheme = require("tailwindcss/defaultTheme")

module.exports = {
    content: ["./resources/views/**/*.blade.php", "./resources/js/**/*.vue"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Open Sans", ...defaultTheme.fontFamily.sans]
            }
        },
    },
    plugins: [],
};
