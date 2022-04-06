import axios from "axios";

const state = () => ({
  tag: null,
});

const actions = {
  async setTag(state, id) {
    const { data } = await axios.get(`/api/v1/tag/${id}`);
    state.commit("setTag", data.data);
  },
};

const mutations = {
  setTag(state, payload) {
    state.tag = payload;
  },
};

const getters = {
  getTag(state) {
    return state.tag;
  },
};

export default {
  namespaced: true,
  state,
  actions,
  mutations,
  getters,
};
