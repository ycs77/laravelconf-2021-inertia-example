const { fontFamily } = require('tailwindcss/defaultTheme')

module.exports = {
  mode: 'jit',
  purge: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  darkMode: false,
  theme: {
    extend: {
      colors: {
        primary: '#9553e9',
      },
      fontFamily: {
        sans: ['Noto Sans TC', ...fontFamily.sans],
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
