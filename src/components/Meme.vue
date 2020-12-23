<template>
  <div class="c-meme">
    <div class="c-meme__img">
      <img :src="meme.src" alt="" />
    </div>
    <div class="c-meme__info">
      <h2 class="c-meme__info-heading">{{ meme.name }}</h2>
      <span class="c-meme__info-author">Added by {{ meme.userId }}</span>
      <ul class="c-meme__info-tag-list">
        <li
          class="c-meme-info-tag-list-item"
          v-for="language in meme.language"
          :key="language + meme.id"
        >
          {{ language }}
        </li>
        <li
          class="c-meme-info-tag-list-item"
          v-for="tag in meme.tags"
          :key="tag + meme.id"
        >
          {{ tag }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "Meme",
  props: {
    meme: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.c-meme {
  display: flex;
  border: $border-thin;
}

.c-meme__img {
  flex: 0 1 60%;

  & > img {
    width: 100%;
  }
}

.c-meme__info {
  padding: spacer(3);
}
</style>
