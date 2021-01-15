<template>
  <div class="c-meme-tag" :class="type">
    {{ tagId || tagArr.name }}
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
  line-height: 1;
}

.language {
  background-color: rgba($color-primary, 0.3);
}

.category {
  background-color: rgba($color-secondary, 0.3);
}
</style>
