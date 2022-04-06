import useStores from "./stores";

export default {
  install: (app, options) => {
    app.use(useStores);
  },
};
