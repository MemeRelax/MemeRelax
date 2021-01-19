<template>
  <form class="c-upload-form" @change="onFormChange">
    <div class="c-upload-form__container">
      <div class="u-form-group">
        <BaseInput
          v-model="memeName"
          type="text"
          :id="`memename${index}`"
          name="meme-name"
          label="Name"
        />
      </div>
      <div class="u-form-group">
        <BaseCheckboxGroup
          :items="$store.getters['languageArray']"
          v-model="selectedLanguageIds"
          name="meme-languages"
          heading="Language"
        />
      </div>
      <div class="u-form-group">
        <BaseCheckboxGroup
          :items="$store.getters['categoryArray']"
          v-model="selectedCategoryIds"
          name="meme-categories"
          heading="Category"
        />
      </div>
      <div class="u-form-group">
        <BaseInput
          v-model="memeHashtags"
          id="meme-hashtags"
          name="meme-hashtags"
          label="Hashtags"
          textarea
        />
      </div>
    </div>
  </form>
</template>

<script>
export default {
  name: "UploadForm",
  data: function() {
    return {
      tags: [],
      memeName: "",
      memeHashtags: "",
      selectedLanguageIds: [],
      selectedCategoryIds: [],
    };
  },
  props: {
    index: {
      type: Number,
      required: true,
    },
  },
  computed: {
    hashtagsArray: function() {
      return this.memeHashtags.split(/[ ,;.#]+/);
    },
    dataToSend: function() {
      return {
        id: "22",
        src: this.$store.state.droppedFiles[this.index],
        name: this.memeName,
        userId: "11",
        languageId: this.selectedLanguageIds,
        categoryId: this.selectedCategoryIds,
        hashtags: this.hashtagsArray,
      };
    },
  },
  methods: {
    autoSelectTag: function() {},
  },
};
</script>

<style lang="scss" scoped>
.c-upload-form {
  @include pad-tb-spacer(5);
}

.c-upload-form__container {
  @extend .u-container;
}
</style>
