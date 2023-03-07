// inertia
import { Link, Head } from "@inertiajs/vue3";

// packages
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import Draggable from "zhyswan-vuedraggable";

// custom packages
import Toast from "./packages/toast/index";

export default {
  install(app: any, config: any): void {
    app.use(Toast);

    app.component("v-app-link", Link);
    app.component("v-app-head", Head);

    app.component("v-date-picker", Datepicker);
    app.component("v-draggable", Draggable);

    Object.entries(import.meta.glob("./**/*.vue", { eager: true })).forEach(
      ([path, m]) => {
        if (!path.startsWith("./packages")) {
          app.component(`${m.default.name}`, m.default);
        }
      },
    );
  },
};
