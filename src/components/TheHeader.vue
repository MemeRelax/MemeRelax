<template>
  <div class="c-header">
    <div class="c-header__container">
      <div class="c-header__heading">Memes</div>
    </div>
  </div>
</template>

<script>
export default {
name: "TheHeader"
}
</script>

<style lang="scss" scoped>
.c-header {
  background-color: aquamarine;
}

.c-header__container {
  @extend .container;
}

.c-header__heading {
  font-family: $font-special;
}
</style>
