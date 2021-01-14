<template>
  <div class="c-filter">
    <div class="c-filter__container">
      <BaseCheckboxGroup
        :items="$store.getters['languageArray']"
        v-model="languageFilter"
        name="meme-languagess"
      />
      <BaseCheckboxGroup
        :items="$store.getters['categoryArray']"
        v-model="categoryFilter"
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
      languageFilter: [],
      categoryFilter: [],
    };
  },
  // watch: {
  //   languageFilter: function(languageFilters) {
  //     let result = [];
  //     this.$store.state.filteredMemes.forEach((meme) => {
  //       let arr1 = meme.languageId;
  //       let arr2 = languageFilters;
  //       if (arr2.every((v) => arr1.includes(v))) {
  //         result.push(meme);
  //       }
  //     });
  //     this.$store.commit("SET_FILTERED_MEMES", result);
  //     console.log(result);
  //   },
  //   categoryFilter: function(categoryFilters) {
  //     let result = [];
  //     this.$store.state.filteredMemes.forEach((meme) => {
  //       let arr1 = meme.languageId;
  //       let arr2 = categoryFilters;
  //       if (arr2.every((v) => arr1.includes(v))) {
  //         result.push(meme);
  //         this.$store.commit("SET_FILTERED_MEMES", meme);
  //       }
  //     });
  //     this.$store.commit("SET_FILTERED_MEMES", result);
  //     console.log(result);
  //   },
  // },
  // watch: {
  //   languageFilter: function(array) {
  //     this.$store.commit("SET_LANGUAGE_FILTERS", array);
  //   },
  //   categoryFilter: function(array) {
  //     this.$store.commit("SET_CATEGORY_FILTERS", array);
  //   },
  // },
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
