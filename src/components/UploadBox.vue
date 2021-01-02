<template>
  <div class="c-upload-box">
    <div class="c-upload-box__container">
      <h1 class="u-heading-h1">Upload your meme</h1>
      <form
        class="c-upload-box__form"
        :class="{ highlighted: highightedArea }"
        method="post"
        action=""
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
          />
          <label class="c-upload-box__label" for="file">
            <strong class="c-upload-box__label--link">Choose a file</strong>
            <span class="c-upload-box__dragndrop"> or drag it here</span>.
          </label>
        </div>
        <div class="c-upload-box__success">
          <img class="c-upload-box__success-image" :src="imageSrc" alt="" />
        </div>
        <div class="c-upload-box__uploading">Uploading…</div>
        <div class="c-upload-box__error">Error! <span></span>.</div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "UploadBox",
  data: function() {
    return {
      imageSrc: "",
      highightedArea: false,
      droppedFiles: false,
    };
  },
  methods: {
    onImagePick(e) {
      this.droppedFiles = e.target.files || e.dataTransfer.files;
      var fReader = new FileReader();
      fReader.readAsDataURL(this.droppedFiles[0]);
      const vm = this;
      fReader.onloadend = function(event) {
        vm.imageSrc = event.target.result;
      };
      console.log(this.droppedFiles);
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
  },
};
</script>

<style lang="scss" scoped>
.c-upload-box {
  @include pad-tb-spacer(4);
}

.c-upload-box__container {
  @extend .container;
}

.c-upload-box__form {
  min-height: rem(200px);
  padding: spacer(6);
  background-color: $color-primary-lightest;
  outline: 5px dashed $color-primary-light;
  outline-offset: -20px;
  transition: all 0.5s;

  &.highlighted {
    background-color: rgba($color-primary-lightest, 0.5);
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
}

.c-upload-box__input {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.c-upload-box__label {
  margin-bottom: spacer(3);
  cursor: pointer;

  &--link {
    position: relative;
    z-index: 1;
    &:hover,
    &:active {
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
</style>
