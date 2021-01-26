<template>
  <div class="b-button">
    <button><slot></slot></button>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.b-button {
  display: flex;
  align-items: center;
  justify-content: center;
}

button {
  padding: spacer(3) spacer(4);
  border: 2px solid $color-primary;
  border-radius: 50px;
  background-color: $color-secondary;
  color: $color-primary;
  font-family: inherit;
  font-size: rem(20px);
  letter-spacing: 2px;
  text-transform: uppercase;
  cursor: pointer;
}
</style>
