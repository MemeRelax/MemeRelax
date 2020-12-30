<template>
  <div class="c-meme-tag">
    {{ tag }}
  </div>
</template>

<script>
export default {
  name: "MemeTag",
  props: {
    tag: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.c-meme-tag {
  margin: spacer(1) spacer(1);
  padding: spacer(2) spacer(3);
  background-color: aquamarine;
  line-height: 1;
}
</style>
