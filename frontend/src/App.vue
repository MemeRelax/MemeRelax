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
}
</style>
