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
