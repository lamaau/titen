module.exports = {
  content: [
    // prettier-ignore
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.blade.php",
    "./modules/**/*.js",
    "./modules/**/*.vue",
  ],
  darkMode: "class",
  theme: {
    extend: {
      maxHeight: {
        0: "0",
        xl: "36rem",
      },
      fontFamily: {
        sans: ["Poppins", "sans-serif"],
      },
    },
  },
  plugins: [
    require("tailwindcss"),
    require("autoprefixer"),
    require("postcss-import"),
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/line-clamp"),
    require("@tailwindcss/typography"),
  ],
};
