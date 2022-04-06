import axios from "axios";

const state = () => ({
  category: null,
});

const actions = {
  async setCategory(state, id) {
    const { data } = await axios.get(`/api/v1/category/${id}`);
    state.commit("setCategory", data.data);
  },
};

const mutations = {
  setCategory(state, payload) {
    state.category = payload;
  },
};

const getters = {
  getCategory(state) {
    return state.category;
  },
};

export default {
  namespaced: true,
  state,
  actions,
  mutations,
  getters,
};
