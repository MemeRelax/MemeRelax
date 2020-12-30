<template>
  <div class="c-upload-box">
    <div class="c-upload-box__container">
      <h1 class="heading-h1">Upload your meme</h1>
      <form
        class="c-upload-box__form"
        method="post"
        action=""
        enctype="multipart/form-data"
      >
        <div class="c-upload-box__input">
          <input
            class="c-upload-box__file"
            type="file"
            name="files[]"
            id="file"
            data-multiple-caption="{count} files selected"
            multiple
          />
          <label for="file"
            ><strong>Choose a file</strong
            ><span class="c-upload-box__dragndrop"> or drag it here</span
            >.</label
          >
          <button class="c-upload-box__button" type="submit">Upload</button>
        </div>
        <div class="c-upload-box__uploading">Uploading…</div>
        <div class="c-upload-box__success">Done!</div>
        <div class="c-upload-box__error">Error! <span></span>.</div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "UploadBox",
};
</script>

<style lang="scss" scoped>
.c-upload-box {
  @include pad-tb-spacer(4);
}

.c-upload-box__container {
  @extend .container;
}

.c-upload-box__dragndrop,
.c-upload-box__uploading,
.c-upload-box__success,
.c-upload-box__error {
  display: none;
}
</style>
