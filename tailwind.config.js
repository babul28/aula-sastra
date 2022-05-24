const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");
const colors = require("tailwindcss/colors");
const Color = require("color");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./app/**/*.php",
        "./resources/views/**/*.blade.php",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    customForms: (theme) => ({
        default: {
            "input, textarea": {
                "&::placeholder": {
                    color: theme("colors.gray.400"),
                },
            },
        },
    }),

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/line-clamp"),
        plugin(({ addUtilities, e, theme, variants }) => {
            const newUtilities = {};

            const { inherit, ...colors } = theme("colors");

            Object.entries(colors).map(([name, value]) => {
                if (name === "transparent" || name === "current") return;
                const color = value[300] ? value[300] : value;
                const hsla = Color(color).alpha(0.45).hsl().string();

                newUtilities[`.shadow-outline-${name}`] = {
                    "box-shadow": `0 0 0 3px ${hsla}`,
                };
            });

            addUtilities(newUtilities, variants("boxShadow"));
        }),
    ],
};
