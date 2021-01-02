<template>
  <div class="c-meme-tag">
    {{ tagArr }}
  </div>
</template>

<script>
export default {
  name: "MemeTag",
  data() {
    return {
      tag: [],
    };
  },
  props: {
    tagArr: {
      type: Object,
    },
    tagId: {
      type: String,
    },
    type: {
      type: String,
      required: true,
    },
  },
  // created: function fetchTags() {
  //   if (this.type === "author") {
  //     return;
  //   } else {
  //     this.tag = this.tagArr;
  //   }
  // },
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
