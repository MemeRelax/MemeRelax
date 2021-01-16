<template>
  <div class="c-footer">
    <div class="c-footer__container">
      No rights reserved :(
    </div>
  </div>
</template>

<script>
export default {
  name: "TheFooter",
};
</script>

<style lang="scss" scoped>
.c-footer {
  @include pad-tb-spacer(4);
  color: $color-white;
  background-color: $color-primary;
}

.c-footer__container {
  @extend .u-container;
}
</style>
