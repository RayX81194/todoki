    /** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./*.php",               // Root-level PHP files
        "./components/**/*.php", // PHP files in the components directory
        "./*.html",              // Root-level HTML files
        "./**/*.html",           // All HTML files in subdirectories
        "./**/*.js",             // All JavaScript files in subdirectories
      ],
    theme: {
      extend: {},
    },
    plugins: [],
  }