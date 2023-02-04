/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./dist/**/*.{html,php,js}', './node_modules/tw-elements/dist/js/**/*.js'],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('tw-elements/dist/plugin'),
  ],
}
