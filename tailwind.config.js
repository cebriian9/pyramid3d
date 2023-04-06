/** @type {import('tailwindcss').Config} */
module.exports = {
   content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
    },
    colors:{
      'primario':'#001d33',
      'secundario':{
        50:'#ff6f00',
        100:'#ff9a4d',
      },
      'info':{
        50:'#cce9ff',
        100:"#0091ff"
    },
      'claro':'#fff1e5',
      'beige':'#ffe2cc',
      'marroncillo':'#331600',
      'danger':'#dc3545'
    },
    extend: {},
  },
  plugins: [],
}

