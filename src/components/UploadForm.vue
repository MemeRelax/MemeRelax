<template>
  <div class="c-upload-form">
    <div class="c-upload-form__container">
      <div class="c-upload-form__form-group">
        <BaseInput
          v-model="memeName"
          type="text"
          id="meme-name"
          name="meme-name"
          label="Name"
        />
      </div>
      <div class="c-upload-form__form-group">
        <BaseCheckboxGroup
          :items="languageIdArray"
          v-model="selectedLanguageIds"
          name="meme-langs"
        />
        <BaseCheckboxGroup
          :items="categoryIdArray"
          v-model="selectedCategoryIds"
          name="meme-cats"
        />
      </div>
      <div class="c-upload-form__form-group">
        <BaseInput
          v-model="memeHashtags"
          id="meme-hashtags"
          name="meme-hashtags"
          label="Hashtags"
          textarea
        />
      </div>
      <BaseButton @click="sendNewMeme">Save</BaseButton>
    </div>
  </div>
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
      dataToSend: {},
    };
  },
  computed: {
    hashtagsArray: function() {
      return this.memeHashtags.split(/[ ,;.#]+/);
    },
    languageIdArray: function() {
      return this.$store.state.tags.filter((t) => t.id.includes("lang-"));
    },
    categoryIdArray: function() {
      return this.$store.state.tags.filter((t) => t.id.includes("category-"));
    },
  },
  methods: {
    autoSelectTag: function() {},
    sendNewMeme: function() {
      this.dataToSend = {
        id: "22",
        src: this.$store.state.droppedFiles,
        name: this.memeName,
        userId: "11",
        languageId: this.selectedLanguageIds,
        categoryId: this.selectedCategoryIds,
        hashtags: this.hashtagsArray,
      };
    },
  },
};
</script>

<style lang="scss" scoped>
.c-upload-form {
  @include pad-tb-spacer(4);
  padding-top: rem(65px);
}

.c-upload-form__container {
  @extend .container;
}

.c-upload-form__form-group {
  display: flex;
  flex-wrap: wrap;
  margin-bottom: spacer(4);
}
</style>
