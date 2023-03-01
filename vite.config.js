import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";
import viteExtend from "vite-plugin-vue-setup-extend";

export default defineConfig({
  plugins: [
    viteExtend(),
    laravel({
      input: "resources/js/app.ts",
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  resolve: {
    alias: {
      Modules: path.resolve(__dirname, "modules"),
    },
  },
});
