import "../css/app.css";
import "../css/font.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

import Theme from "./theme";
import AuthenticatedLayout from "./theme/layouts/VAuthenticated.vue";

const appName =
  window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: async (name) => await resolvePageComponent(name),
  setup({ el, App, props, plugin }) {
    let m: Array<[]> = import.meta.globEager(
      "../../modules/**/Resources/assets/js/app.ts",
    );

    const app = createApp({ render: () => h(App, props) });

    Object.entries(m).forEach(([path, m]: any) => {
      if (Object.values(m).length) {
        app.use(m.default);
      }
    });

    app.use(plugin);
    app.use(Theme);
    app.use(ZiggyVue, Ziggy);

    return app.mount(el);
  },
  progress: {
    color: "#4B5563",
  },
});

async function resolvePageComponent(name: string) {
  // Check if the name is a module
  let isModule = name.split("::");

  if (isModule.length > 1) {
    // Import pages from the modules folder
    let pages = import.meta.glob(
      "../../modules/**/Resources/assets/js/pages/**/*.vue",
    );

    // Sort and replace the wrong slash and dot with the correct slash
    const path = Object.keys(pages)
      .sort((a, b) => a.length - b.length)
      .find((path) =>
        path.endsWith(
          `${isModule[1].replaceAll("\\", "/").replaceAll(".", "/")}.vue`,
        ),
      );

    // Throw an error if the page is not found
    if (!path) {
      throw new Error(`Page not found: ${isModule[1]}`);
    }

    // Return the page
    const page: any =
      typeof pages[path] === "function" ? await pages[path]() : pages[path];

    if (page.default.layout === undefined) {
      page.default.layout = AuthenticatedLayout;
    }

    return page;
  } else {
    // Import pages from the core application folder since it's not a module
    let pages = import.meta.glob("./pages/**/*.vue");

    // Sort and replace the dot with the correct slash
    const path = Object.keys(pages)
      .sort((a, b) => a.length - b.length)
      .find((path) => path.endsWith(`${name.replaceAll(".", "/")}.vue`));

    // Throw an error if the page is not found
    if (!path) {
      throw new Error(`Page not found: ${name}`);
    }

    // Return the page
    const page: any =
      typeof pages[path] === "function" ? await pages[path]() : pages[path];

    // set default layout here.

    return page;
  }
}
