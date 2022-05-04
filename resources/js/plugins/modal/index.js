import { h, render } from "vue";
import Modal from "~/components/modal/modal.vue";

let currentModalComponent = null;

const useModal = (app, options) => {
  const component = (props, child) => {
    const node = h(Modal, props, child);

    node.appContext = app._context;

    render(node, document.body);

    currentModalComponent = node.component;
  };

  return {
    open(props) {
      const mergedProps = Object.assign(props, {
        type: "default",
      });

      const childComponent = () => h(mergedProps.component, mergedProps);

      component(mergedProps, childComponent);

      currentModalComponent.exposed.openModal();
    },
    destroy(props) {
      const mergedProps = Object.assign(props, {
        type: "destroy",
      });

      component(mergedProps);

      currentModalComponent.exposed.openModal();
    },
    close() {
      currentModalComponent.exposed.closeModal();
    },
  };
};

export default {
  install: (app, options) => {
    const instance = useModal(app, options);

    app.config.globalProperties.$modal = instance;
    app.provide("$modal", instance);
  },
};
