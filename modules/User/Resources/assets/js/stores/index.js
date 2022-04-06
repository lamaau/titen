import { createStore } from "vuex";

const postStores = createStore({
  state: {
    users: [],
  },
  getters: {
    getUsers() {
      return state.users;
    },
  },
});

export default postStores;
