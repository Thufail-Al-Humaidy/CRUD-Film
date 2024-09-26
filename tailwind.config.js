/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/**/*.{html,js,php}',  // Memantau file di dalam src
    './*.php',  // Memantau file PHP di root directory
    './**/*.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
