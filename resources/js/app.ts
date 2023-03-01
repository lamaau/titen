import "../css/app.css";
import "../css/font.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

const appName =
  window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => resolvePageComponent(name),
  setup({ el, App, props, plugin }) {
    let m: Array<[]> = import.meta.globEager(
      "../../modules/**/Resources/assets/js/app.ts",
    );

    const app = createApp({ render: () => h(App, props) });

    if (Object.values(m).length) {
      Object.entries(m).forEach(([path, m]: any) => {
        app.use(m.default);
      });
    }

    app.use(plugin);
    app.use(ZiggyVue, Ziggy);

    return app.mount(el);
  },
  progress: {
    color: "#4B5563",
  },
});

function resolvePageComponent(name) {
  // Check if the name is a module
  let isModule = name.split("::");

  if (isModule.length > 1) {
    // Import pages from the modules folder
    let pages = import.meta.glob(
      "../../modules/**/Resources/assets/js/pages/*.vue",
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
    return typeof pages[path] === "function" ? pages[path]() : pages[path];
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
    return typeof pages[path] === "function" ? pages[path]() : pages[path];
  }
}
