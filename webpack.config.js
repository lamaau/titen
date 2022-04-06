const path = require("path");

// https://stefanbauer.me/tips-and-tricks/autocompletion-for-webpack-path-aliases-in-phpstorm-when-using-laravel-mix
module.exports = {
  output: { chunkFilename: "js/[name].js?id=[chunkhash]" },
  resolve: {
    alias: {
      "~": path.resolve("./resources/js"),
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
};
