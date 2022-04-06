import { createStore } from "vuex";
import tag from "./modules/tag";
import category from "./modules/category";

export default createStore({
  modules: {
    tag: tag,
    category: category,
  },
});
