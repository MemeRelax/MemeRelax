<template>
  <div class="c-upload-box">
    <div class="c-upload-box__container">upload</div>
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
</style>
