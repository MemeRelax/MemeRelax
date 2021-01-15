import { createStore } from "vuex";
import MemeService from "@/services/MemeService.js";

export default createStore({
  state: {
    memesLoadingStatus: "notLoading",
    memes: [],
    tagsLoadingStatus: "notLoading",
    tags: [],
    droppedFiles: {},
    // languageFilters: [],
    // categoryFilters: [],
    filteredMemes: [],
  },
  mutations: {
    SET_TAGS_LOADING_STATUS(state, status) {
      state.tagsLoadingStatus = status;
    },
    SET_MEMES_LOADING_STATUS(state, status) {
      state.memesLoadingStatus = status;
    },
    SET_MEMES(state, memes) {
      state.memes = memes;
    },
    SET_TAGS(state, tags) {
      state.tags = tags;
    },
    SET_DROPPED_FILES(state, file) {
      state.droppedFiles = file;
    },
    // SET_LANGUAGE_FILTERS(state, languageFilters) {
    //   state.languageFilters = languageFilters;
    // },
    // SET_CATEGORY_FILTERS(state, categoryFilters) {
    //   state.categoryFilters = categoryFilters;
    // },
    SET_FILTERED_MEMES(state, filteredMemes) {
      state.filteredMemes = filteredMemes;
    },
  },
  actions: {
    fetchTags(context) {
      context.commit("SET_TAGS_LOADING_STATUS", "loading");
      MemeService.getTags()
        .then((r) => {
          context.commit("SET_TAGS", r.data);
          context.commit("SET_TAGS_LOADING_STATUS", "notLoading");
        })
        .catch((e) => console.log(e));
    },
    fetchMemes(context) {
      context.commit("SET_MEMES_LOADING_STATUS", "loading");
      MemeService.getMemes()
        .then((r) => {
          context.commit("SET_MEMES", r.data);
          context.commit("SET_FILTERED_MEMES", r.data);
          context.commit("SET_MEMES_LOADING_STATUS", "notLoading");
        })
        .catch((e) => console.log(e));
    },
  },
  getters: {
    getTagById: (state) => (id) => state.tags.find((el) => el.id === id),
    languageArray: (state) => state.tags.filter((t) => t.type === "language"),
    categoryArray: (state) => state.tags.filter((t) => t.type === "category"),
  },
});
