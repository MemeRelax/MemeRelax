<template>
  <div class="c-meme-tag">
    {{ tag }}
  </div>
</template>

<script>
export default {
  name: "MemeTag",
  data() {
    return {
      tag: "",
    };
  },
  props: {
    tagId: {
      type: String,
    },
    type: {
      type: String,
      required: true,
    },
  },
  created: function fetchTags() {
    if (this.type === "author") {
      this.tag = this.tagId;
    } else {
      this.tag = this.tagId;
    }
  },
};
</script>

<style lang="scss" scoped>
.c-meme-tag {
  display: inline-block;
  margin: spacer(1) spacer(1);
  padding: spacer(2) spacer(3);
  background-color: aquamarine;
  line-height: 1;
}
</style>
