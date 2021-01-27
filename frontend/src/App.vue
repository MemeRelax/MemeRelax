<template>
  <router-view />
</template>

<script>
export default {
  created() {
    this.$store.dispatch("fetchTags");
  },
};
</script>

<style lang="scss">
body {
  font-family: $font-main;
  font-weight: 300;
  color: $color-dark;
  background-color: $color-white;
}

a[href],
area[href],
input:not([disabled]),
select:not([disabled]),
textarea:not([disabled]),
button:not([disabled]),
iframe,
[tabindex],
[contentEditable="true"] {
  &:not([tabindex="-1"]) {
    &:focus:not(:link:active) {
      @include focusOutline;
    }
  }
}
</style>
