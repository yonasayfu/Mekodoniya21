import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', ...defaultTheme.fontFamily.sans], // Add custom fonts
          },
          colors: {
            primary: '#4F46E5', // Add custom colors
            secondary: '#10B981',
            danger: '#EF4444',
          },
        },
      },

    plugins: [forms],
};

