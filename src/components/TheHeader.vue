<template>
  <div class="c-header">
    <div class="c-header__container">
      <div class="c-header__heading">Memes</div>
      <div class="c-header__access">Log in | Sign in</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TheHeader",
};
</script>

<style lang="scss" scoped>
.c-header {
  @include pad-tb-spacer(4);
  background-color: $color-primary;
}

.c-header__container {
  @extend .container;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.c-header__heading {
  font-family: $font-special;
  font-size: rem(38px);
  color: $color-secondary;
}

.c-header__access {
  color: $color-white;
}
</style>
