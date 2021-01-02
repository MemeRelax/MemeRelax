import { createStore } from "vuex";
import MemeService from "@/services/MemeService.js";

export default createStore({
  state: {
    loadingStatus: "notLoading",
    tags: [],
  },
  mutations: {
    SET_LOADING_STATUS(state, status) {
      state.loadingStatus = status;
    },
    SET_TAGS(state, tags) {
      state.tags = tags;
    },
  },
  actions: {
    fetchTags(context) {
      context.commit("SET_LOADING_STATUS", "loading");
      MemeService.getTags()
        .then((r) => {
          context.commit("SET_TAGS", r.data);
          context.commit("SET_LOADING_STATUS", "notLoading");
        })
        .catch((e) => console.log(e));
    },
  },
  getters: {
    getTagById: (state) => (id) => state.tags.find((el) => el.id === id),
  },
});
