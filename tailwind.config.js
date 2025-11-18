/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      // Di sini kita akan menambahkan font kustom kita
      fontFamily: {
        'sans': ['Poppins', 'sans-serif'], // Font untuk teks biasa
        'display': ['Pirata One', 'serif'], // Font untuk judul
      },
      // Kita juga bisa menambahkan palet warna dari referensi
      colors: {
        'charcoal': '#111215',
        'eggshell': '#f2f7fc',
        'navy': '#234d7c',
        'brand-red': '#ed4723',
        'brand-blue': '#368ef3',
        'brand-pink': '#fbc3cd',
      }
    },
  },
  plugins: [],
}