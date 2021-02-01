<template>
  <div class="c-upload-box">
    <div class="c-upload-box__container">
      <h1 class="u-heading-h1">Upload your meme</h1>
      <form
        v-if="droppedFiles.length === 0"
        class="c-upload-box__upload-form"
        :class="{ highlighted: highightedArea }"
        method="post"
        enctype="multipart/form-data"
        @dragenter="preventDefaults($event), highlightArea($event)"
        @dragover="preventDefaults($event), highlightArea($event)"
        @dragleave="preventDefaults($event), removeHighlightArea($event)"
        @drop="
          preventDefaults($event),
            removeHighlightArea($event),
            onImagePick($event)
        "
      >
        <div class="c-upload-box__input">
          <input
            class="c-upload-box__inputfile"
            type="file"
            name="file"
            id="file"
            accept="image/*"
            @change="onImagePick"
            multiple
          />
          <label class="c-upload-box__label" for="file">
            <strong class="c-upload-box__label--link">Choose files</strong>
            <span class="c-upload-box__dragndrop">&nbsp;or drag them here</span>
          </label>
        </div>
        <div class="c-upload-box__uploading">Uploading…</div>
        <div class="c-upload-box__error">
          Error!
        </div>
      </form>
      <Form
        v-if="droppedFiles.length > 0"
        class="c-upload-box__form"
        @submit="handleSubmit"
      >
        <div
          v-for="(file, index) in droppedFiles"
          :key="file.name"
          class="c-upload-box__columns"
        >
          <UploadPreview :file="file" :index="index" />
          <UploadForm :index="index" />
        </div>
        <div class="c-upload-box__form-actions">
          <BaseButton>Save</BaseButton>
          <button class="u-link-button " @click.prevent="handleCancel">
            Cancel
          </button>
        </div>
      </Form>
    </div>
  </div>
</template>

<script>
import { Form } from "vee-validate";
import UploadPreview from "@/components/UploadPreview.vue";
import UploadForm from "@/components/UploadForm.vue";

export default {
  name: "UploadBox",
  components: { UploadPreview, UploadForm, Form },
  data: function() {
    return {
      highightedArea: false,
      droppedFiles: [],
    };
  },
  methods: {
    onImagePick(e) {
      this.droppedFiles = e.target.files || e.dataTransfer.files;
      this.$store.commit("SET_DROPPED_FILES", this.droppedFiles);
      // here start uploading files to server while user is filling form
    },
    preventDefaults(e) {
      e.preventDefault();
      e.stopPropagation();
    },
    highlightArea() {
      this.highightedArea = true;
    },
    removeHighlightArea() {
      this.highightedArea = false;
    },
    handleSubmit() {
      console.log(this.$store.state.filledUploadForms);
      // here save form on the server
      // empty filledUploadForms state
    },
    handleCancel() {
      this.droppedFiles = [];
      this.$store.commit("SET_DROPPED_FILES", this.droppedFiles);
      this.$store.commit("SET_FILLED_UPLOAD_FORMS", []);
      //also remove already loaded files on the server
    },
  },
};
</script>

<style lang="scss" scoped>
.c-upload-box {
  @include pad-tb-spacer(4);
  height: 100%;
}

.c-upload-box__container {
  @extend .u-container;
  height: 100%;
}

.c-upload-box__upload-form {
  position: relative;
  height: 50%;
  padding: spacer(6);
  background-color: rgba($color-primary, 0.03);
  outline: 5px dashed rgba($color-primary, 0.5);
  outline-offset: -20px;
  transition: all 0.5s;

  &.highlighted {
    background-color: rgba($color-primary, 0.07);
    outline: 8px dashed $color-primary;
    outline-offset: -30px;
  }
}

.c-upload-box__inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;

  &:focus ~ .c-upload-box__label {
    @include focusOutline;
  }
}

.c-upload-box__input {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.c-upload-box__label {
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  font-size: rem(20px);
  cursor: pointer;

  &:hover,
  &:active {
    .c-upload-box__label--link {
      position: relative;
      z-index: 1;

      &::before {
        content: "";
        position: absolute;
        display: inline-block;
        background-color: rgba($color-secondary, 0.3);
        width: 100%;
        height: 5px;
        bottom: 0;
        left: 0;
      }
    }
  }
}

.c-upload-box__uploading,
.c-upload-box__error {
  display: none;
}

.c-upload-box__success {
  display: flex;
  justify-content: center;
}

.c-upload-box__success-image {
  margin-top: spacer(2);
  max-width: rem(400px);
}

.c-upload-box__columns {
  display: grid;
  column-gap: spacer(4);
  background-color: $color-white;

  @include respond("lg") {
    grid-template-columns: 1fr minmax(rem(300px), 1fr);
  }
}

.c-upload-box__form-actions {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 50%;
}

.u-link-button {
  margin-left: spacer(4);
}
</style>
