/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#87A2FF',      // Primary color
        secondary: '#C4D7FF',    // Secondary color
        accent: '#FFD7C4',       // Accent color
        background: '#FFF4B5',   // Background color
      },
    },
  },
  plugins: [],
}

