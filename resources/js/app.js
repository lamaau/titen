import { createApp, h } from "vue";
import stores from "~/stores";
import helper from "~/utils/helper";
import { excepts } from "~/utils/pages";
import defaultLayout from "~/layouts/default.vue";
import { InertiaProgress } from "@inertiajs/progress";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import registerGlobalComponent from "~/registerGlobalComponent";

InertiaProgress.init({
  showSpinner: true,
});

createInertiaApp({
  resolve: async (name) => {
    // using asyncronus dynamic import
    const page = await import(`./pages/${name}.vue`);

    if (page.layout === undefined && !excepts.includes(name)) {
      page.default.layout = defaultLayout;
    }

    return await page;
  },
  title: (title) => `${title} - Laravel Inertia Vue Starter`,
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) }).use(plugin);

    app.config.productionTip = false;

    // helper
    app.config.globalProperties.$helper = helper;

    // global component
    app.use(registerGlobalComponent);

    // vuex stores
    app.use(stores);

    app.mount(el);
    return app;
  },
});
