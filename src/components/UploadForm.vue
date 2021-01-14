<template>
  <div class="c-upload-form">
    <div class="c-upload-form__container">
      <div class="c-upload-form__form-group">
        <!-- <label class="c-upload-form__label" for="meme-name">Name:</label>
        <input
          class="c-upload-form__input"
          type="text"
          id="meme-name"
          name="meme-name"
          v-model="memeName"
        /> -->
        <BaseInput
          v-model="memeName"
          type="text"
          id="meme-name"
          name="meme-name"
          label="Name"
        />
      </div>
      <div class="c-upload-form__form-group">
        <!-- <ul class="c-upload-form__tag-list"> -->
        <!-- <li v-for="tag in $store.state.tags" :key="`${tag.id}-tag`"> -->
        <!-- <input
              name="meme-tags"
              type="checkbox"
              v-model="selectedTags"
              :id="tag.id"
              :value="tag.id"
            /><label :for="tag.id">{{ tag.name }}</label> -->
        <BaseCheckboxGroup
          :items="langIdArr"
          v-model="selectedLangIds"
          name="meme-langs"
        />
        <BaseCheckboxGroup
          :items="catIdArr"
          v-model="selectedCatIds"
          name="meme-cats"
        />
        <!-- </li> -->
        <!-- </ul> -->
      </div>
      <div class="c-upload-form__form-group">
        <!-- <label class="c-upload-form__label" for="meme-hashtags"
          >Hashtags:</label
        >
        <textarea
          class="c-upload-form__input"
          id="meme-hashtags"
          v-model="memeHashtags"
        /> -->
        <BaseInput
          v-model="memeHashtags"
          id="meme-hashtags"
          name="meme-hashtags"
          label="Hashtags"
          textarea
        />
      </div>
      <button class="c-upload-form__button" @click="sendNewMeme">SAVE</button>
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
      selectedLangIds: [],
      selectedCatIds: [],
      dataToSend: {},
    };
  },
  computed: {
    hashtagsArr: function() {
      return this.memeHashtags.split(/[ ,;.#]+/);
    },
    langIdArr: function() {
      return this.$store.state.tags.filter((t) => t.id.includes("lang-"));
    },
    catIdArr: function() {
      return this.$store.state.tags.filter((t) => t.id.includes("cat-"));
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
        langId: this.selectedLangIds,
        catId: this.selectedCatIds,
        hashtags: this.hashtagsArr,
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

// ul.c-upload-form__tag-list {
//   list-style: none;
// }

// li {
//   display: inline;
// }
// .c-upload-form__label {
//   background-color: rgba($color-primary, 0.8);
//   color: $color-white;
// }

// .c-upload-form__input,
// .c-upload-form__label {
//   padding: spacer(2);
//   border: 0;
//   border-bottom: 1px solid $color-primary;
//   font-size: rem(14px);
// }

.c-upload-form__input,
textarea {
  padding: spacer(3);
  width: 100%;
  font-family: inherit;
  background-color: rgba($color-primary, 0.1);
}

.c-upload-form__button {
  padding: spacer(2) spacer(3);
  border: 1px solid $color-primary;
  background-color: $color-primary;
  color: $color-white;
  font-family: inherit;
  font-size: rem(18px);
  letter-spacing: 1px;
  cursor: pointer;
}
</style>
