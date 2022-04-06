import postStores from "./stores";

export default {
  install: (app, options) => {
    app.use(postStores);
  },
};
