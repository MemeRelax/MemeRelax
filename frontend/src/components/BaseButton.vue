<template>
  <button><slot></slot></button>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
button {
  padding: spacer(2) spacer(3);
  border: 1px solid $color-primary;
  background-color: $color-primary;
  color: $color-white;
  font-family: inherit;
  font-size: rem(18px);
  letter-spacing: 1px;
  cursor: pointer;
}
</style>
