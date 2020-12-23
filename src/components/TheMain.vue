<template>
  <div class="c-main">
    <div class="c-main__container">
      main
    </div>
  </div>
</template>

<script>
export default {
name: "TheMain"
}
</script>

<style lang="scss" scoped>
.c-main {
  background-color: royalblue;
}

.c-main__container {
  @extend .container;
}
</style>