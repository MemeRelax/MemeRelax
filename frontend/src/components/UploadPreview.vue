<template>
  <div class="c-upload-preview">
    <div class="c-upload-preview__image">
      <img :src="imageSrc" alt="" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imageSrc: null,
    };
  },
  props: {
    file: {
      type: Object,
      required: true,
    },
    index: {
      type: [String, Number],
      required: true,
    },
  },
  created() {
    let fReader = new FileReader();
    fReader.readAsDataURL(this.file);
    const vm = this;
    fReader.onloadend = function(event) {
      vm.imageSrc = event.target.result;
    };
  },
};
</script>

<style lang="scss" scoped>
.c-upload-preview {
  @include pad-tb-spacer(5);
  max-width: rem(450px);
  margin: 0 auto;

  @include respond("lg") {
    display: flex;
    justify-content: center;
    width: 100%;
  }
}

.c-upload-preview__image {
  margin: 0 auto;
  width: 90%;

  img {
    width: 100%;
    border: 20px solid $color-primary;
  }
}
</style>
