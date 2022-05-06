// inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

// headlessui
import {
  MenuItem,
  MenuItems,
  MenuButton,
  Menu as MainMenu,
  Popover,
  PopoverButton,
  PopoverPanel,
} from "@headlessui/vue";

// apex chart
import VueApexCharts from "vue3-apexcharts";

// toast notification
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

// modal
import VueModal from "~/plugins/modal";

// quill editor
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

export default {
  install: (app, options) => {
    // inertia
    app.component("v-app-head", Head);
    app.component("v-app-link", Link);

    // headlessui
    app.component("v-main-menu", MainMenu);
    app.component("v-menu-item", MenuItem);
    app.component("v-menu-items", MenuItems);
    app.component("v-menu-button", MenuButton);
    // ...
    app.component("v-popover", Popover);
    app.component("v-popover-panel", PopoverPanel);
    app.component("v-popover-button", PopoverButton);

    // common
    app.component("v-icon", require("~/components/common/icon.vue").default);
    app.component("v-badge", require("~/components/common/badge.vue").default);
    app.component("v-modal", require("~/components/modal/modal.vue").default);
    app.component(
      "v-inertable",
      require("~/components/table/datatable.vue").default,
    );
    app.component(
      "v-nullable",
      require("~/components/common/not-available.vue").default,
    );
    app.component(
      "v-dropdown",
      require("~/components/menu/dropdown.vue").default,
    );

    // form
    app.component("v-quill-editor", QuillEditor);

    app.component(
      "v-form-container",
      require("~/components/form/form-container.vue").default,
    );
    app.component(
      "v-text",
      require("~/components/form/text-input.vue").default,
    );
    app.component(
      "v-select",
      require("~/components/form/select-input.vue").default,
    );
    app.component(
      "v-number",
      require("~/components/form/number-input.vue").default,
    );
    app.component(
      "v-textarea",
      require("~/components/form/textarea-input.vue").default,
    );
    app.component(
      "v-checkbox",
      require("~/components/form/checkbox-input.vue").default,
    );
    app.component(
      "v-flat-pickr",
      require("~/components/form/flat-pickr-input").default,
    );
    app.component(
      "v-multi-select",
      require("~/components/form/multi-select.vue").default,
    );
    app.component(
      "v-loading-button",
      require("~/components/form/loading-button.vue").default,
    );
    app.component(
      "v-loading-button2",
      require("~/components/form/loading-button2.vue").default,
    );
    app.component(
      "v-phone-number",
      require("~/components/form/phone-number.vue").default,
    );

    // card
    app.component(
      "v-simple-card",
      require("~/components/card-simple.vue").default,
    );
    app.component(
      "v-simple-card-stats",
      require("~/components/card-simple-stats.vue").default,
    );

    // alert
    app.component(
      "v-simple-alert",
      require("~/components/alert/simple-alert.vue").default,
    );

    // apex charts
    app.component("v-apexchart", VueApexCharts);

    // toast
    app.use(VueToast, {
      position: "top-right",
    });

    app.use(VueModal);
  },
};
