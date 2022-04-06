import axios from "axios";

const state = () => ({
  items: [],
});

const actions = {
  async setItems(state, id) {
    // const { data } = await axios.get(`/api/v1/logistics/purchase/${id}`);

    // state.commit("setItems", data.data);
  },
};

const mutations = {
//   setItems(state, payload) {
//     state.items = payload;
//   },
};

const getters = {
//   getItems(state) {
//     return state.items;
//   },
};

export default {
  namespaced: true,
  state,
  actions,
  mutations,
  getters,
};
