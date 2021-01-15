<template>
  <div class="c-filter">
    <div class="c-filter__container">
      <div class="u-form-group">
        <BaseCheckboxGroup
          :items="$store.getters['languageArray']"
          v-model="selectedLanguageFilters"
          name="meme-languages"
          heading="Language"
        />
      </div>
      <div class="u-form-group">
        <BaseCheckboxGroup
          :items="$store.getters['categoryArray']"
          v-model="selectedCategoryFilters"
          name="meme-categories"
          heading="Category"
        />
      </div>
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
  @include pad-tb-spacer(5);
  grid-row: 1/2;
  padding-bottom: 0;
  background-color: $color-white;

  @include respond("lg") {
    @include pad-tb-spacer(5);
    grid-column: 2/3;
  }
}

.c-filter__container {
  @extend .container;

  @include respond("lg") {
    position: fixed; //desktop
  }
}
</style>
