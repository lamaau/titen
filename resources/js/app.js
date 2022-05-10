// vue inertia core
import { createApp, h } from "vue";
import { InertiaProgress } from "@inertiajs/progress";
import { createInertiaApp } from "@inertiajs/inertia-vue3";

// core
import codegoen from "~/codegoen";
import helper from "~/utils/helper";
import defaultLayout from "~/layouts/default.vue";

// laravel
import stores from "./stores";
import { excepts } from "./utils/pages";

InertiaProgress.init({
  showSpinner: true,
});

let currentActiveModule = null;

createInertiaApp({
  resolve: async (name) => {
    let page;
    let parts = name.split("::");

    if (parts.length > 1) {
      const [modul, paths] = parts;
      const moduleFileName = paths.split(".").join("/");

      page = await import(
        `../../modules/${modul}/Resources/assets/js/pages/${moduleFileName}.vue`
      );

      if (page.default.layout == undefined && !excepts.includes(name)) {
        page.default.layout = defaultLayout;
      }

      currentActiveModule = modul;
    } else {
      page = await import(`./pages/${name}.vue`);

      if (page.default.layout == undefined && !excepts.includes(name)) {
        page.default.layout = defaultLayout;
      }
    }

    return await page;
  },
  title: (title) => `${title} - Laravel Inertia Vue Starter`,
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) }).use(plugin);

    if (currentActiveModule) {
      const modulePlugins =
        require(`../../modules/${currentActiveModule}/Resources/assets/js/app.js`).default;

      app.use({ ...modulePlugins, ...stores });
    }

    app.config.productionTip = false;

    // helper
    app.config.globalProperties.$helper = helper;

    // zigy
    app.config.globalProperties.$route = route

    // global component
    app.use(codegoen);

    app.mount(el);
    return app;
  },
});
