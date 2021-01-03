<template>
  <div class="c-upload-form">
    <div class="c-upload-form__container">
      <div class="c-upload-form__form-group">
        <label class="c-upload-form__label" for="meme-name">Name:</label>
        <input
          class="c-upload-form__input"
          type="text"
          id="meme-name"
          name="meme-name"
          v-model="memeName"
        />
      </div>
      <div class="c-upload-form__form-group">
        <ul class="c-upload-form__tag-list">
          <li v-for="tag in $store.state.tags" :key="`${tag.id}-tag`">
            <input
              name="meme-tags"
              type="checkbox"
              v-model="selectedTags"
              :id="tag.id"
              :value="tag.id"
            /><label :for="tag.id">{{ tag.name }}</label>
          </li>
        </ul>
      </div>
      <div class="c-upload-form__form-group">
        <label class="c-upload-form__label" for="meme-hashtags"
          >Hashtags:</label
        >
        <textarea
          class="c-upload-form__input"
          id="meme-hashtags"
          v-model="memeHashtags"
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
      selectedTags: [],
      dataToSend: {},
    };
  },
  computed: {
    hashtagsArr: function() {
      return this.memeHashtags.split(/[ ,;.#]+/);
    },
    langIdArr: function() {
      return this.selectedTags.filter((t) => t.includes("lang-"));
    },
    catIdArr: function() {
      return this.selectedTags.filter((t) => t.includes("cat-"));
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
        langId: this.langIdArr,
        catId: this.catIdArr,
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

ul.c-upload-form__tag-list {
  list-style: none;
}
ul.c-upload-form__tag-list li {
  display: inline;
}
ul.c-upload-form__tag-list li label {
  display: inline-block;
  border: 1px solid rgba($color-primary, 0.3);
  color: rgba($color-primary, 0.6);
  font-size: rem(14px);
  white-space: nowrap;
  margin: 4px;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  transition: all 0.2s;
}

ul.c-upload-form__tag-list li label {
  padding: spacer(2) spacer(3);
  cursor: pointer;
}

ul.c-upload-form__tag-list li input[type="checkbox"]:checked + label {
  border: 1px solid $color-primary;
  background-color: $color-primary;
  color: $color-secondary;
  transition: all 0.2s;
}

ul.c-upload-form__tag-list li input[type="checkbox"] {
  display: absolute;
}
ul.c-upload-form__tag-list li input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
ul.c-upload-form__tag-list li input[type="checkbox"]:focus + label {
  border: 1px solid $color-secondary;
}

.c-upload-form__label {
  background-color: rgba($color-primary, 0.8);
  color: $color-white;
}

.c-upload-form__input,
.c-upload-form__label {
  padding: spacer(2);
  border: 0;
  border-bottom: 1px solid $color-primary;
  font-size: rem(14px);
}

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
