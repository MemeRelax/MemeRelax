<template>
  <div class="c-upload-form">
    <div class="c-upload-form__container">upload form</div>
  </div>
</template>

<script>
export default {
  name: "UploadForm",
};
</script>

<style lang="scss" scoped>
.c-upload-form {
  @include pad-tb-spacer(4);
}

.c-upload-form__container {
  @extend .container;
}
</style>
