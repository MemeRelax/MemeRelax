<template>
  <div class="c-filter">
    <div class="c-filter__container">
      <BaseCheckboxGroup
        :items="$store.getters['languageArray']"
        v-model="selectedLanguageFilters"
        name="meme-languagess"
      />
      <BaseCheckboxGroup
        :items="$store.getters['categoryArray']"
        v-model="selectedCategoryFilters"
        name="meme-categoriess"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "TheFilter",
  data() {
    return {
      selectedLanguageFilters: [],
      selectedCategoryFilters: [],
    };
  },
  watch: {
    selectedLanguageFilters: function() {
      this.filter();
    },
    selectedCategoryFilters: function() {
      this.filter();
    },
  },
  methods: {
    filter: function() {
      let result = [];
      this.$store.state.memes.forEach((meme) => {
        let memeTagsArray = [...meme.languageId, ...meme.categoryId];
        let selectedFiltersArray = [
          ...this.selectedLanguageFilters,
          ...this.selectedCategoryFilters,
        ];
        if (selectedFiltersArray.every((v) => memeTagsArray.includes(v))) {
          result.push(meme);
        }
      });
      this.$store.commit("SET_FILTERED_MEMES", result);
    },
  },
};
</script>

<style lang="scss" scoped>
.c-filter {
  @include pad-tb-spacer(4);
}

.c-filter__container {
  @extend .container;
}
</style>
