<template>
  <div class="c-filter">
    <div class="c-filter__container">
      <div class="u-form-group">
        <BaseInput
          v-model="filterText"
          type="text"
          :id="`filter-text`"
          :name="`filter-text`"
          label="Filter by text content"
        />
      </div>
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
      <div class="u-form-group">
        <button class="u-link-button" @click.prevent="handleReset">
          Reset
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TheFilter",
  data() {
    return {
      filterText: "",
      selectedLanguageFilters: [],
      selectedCategoryFilters: [],
    };
  },
  watch: {
    selectedLanguageFilters: function() {
      this.filter(this.$store.state.memes);
    },
    selectedCategoryFilters: function() {
      this.filter(this.$store.state.memes);
    },
    filterText: function() {
      this.filter(this.$store.state.memes);
    },
  },
  methods: {
    filter: function(memes) {
      let filteredMemes = [];

      memes.forEach((meme) => {
        let memeHasTags = true;
        let memeHasText = true;

        if (this.filterText !== "") {
          let memeText = [...meme.hashtags, meme.name]
            .join(" ")
            .replace(/[-,;.#]+/g, "")
            .toLowerCase();

          memeHasText = memeText.includes(this.filterText.toLowerCase());
        }

        if (
          this.selectedLanguageFilters.length > 0 ||
          this.selectedCategoryFilters.length > 0
        ) {
          let memeTagsArray = [...meme.languageId, ...meme.categoryId];
          let selectedFiltersArray = [
            ...this.selectedLanguageFilters,
            ...this.selectedCategoryFilters,
          ];
          memeHasTags = selectedFiltersArray.every((v) =>
            memeTagsArray.includes(v)
          );
        }

        if (memeHasTags && memeHasText) {
          filteredMemes.push(meme);
        }
      });

      this.$store.commit("SET_FILTERED_MEMES", filteredMemes);
    },
    handleReset: function() {
      //here reseting
    },
  },
};
</script>

<style lang="scss" scoped>
.c-filter {
  @include pad-tb-spacer(5);
  grid-row: 1/2;
  padding-bottom: 0;

  @include respond("lg") {
    @include pad-tb-spacer(5);
    grid-column: 2/3;
  }
}

.c-filter__container {
  @extend .u-container;

  @include respond("lg") {
    position: fixed; //desktop
  }
}
</style>
