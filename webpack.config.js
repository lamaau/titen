const path = require("path");
const resolve = (dir) => path.resolve(__dirname, dir);

// https://stefanbauer.me/tips-and-tricks/autocompletion-for-webpack-path-aliases-in-phpstorm-when-using-laravel-mix
module.exports = {
  output: { chunkFilename: "js/[name].js?id=[chunkhash]" },
  resolve: {
    alias: {
      "~": resolve("modules/Core/Resources/assets/js"),
      Kamen: resolve("modules/KamenTheme/Resources/assets/js"),
    },
    fallback: {
      fs: require.resolve("path-browserify"),
      path: require.resolve("path-browserify"),
    },
    extensions: [".js", ".vue", ".json"],
  },
  devServer: {
    allowedHosts: "all",
  },
  // show error for stats children warning
  // stats: {
  //   children: true,
  // },
};
