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
        primary: '#1BB4D8',
        secondary: '#90E0EF',
        dark: '#222651',
        light: '#F5F7FA',
      },
      gradientColorStops: {
        'primary-start': '#1BB4D8',
        'primary-end': '#90E0EF',
      },
    },
  },
  plugins: [],
}
