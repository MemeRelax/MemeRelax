<template>
  <div class="c-filter">
    <div class="c-filter__container">
        filter
    </div>
  </div>
</template>

<script>
export default {
name: "TheFilter"
}
</script>

<style lang="scss" scoped>
.c-filter {
  background-color: yellowgreen;
}

.c-filter__container {
  @extend .container;
}
</style>