<template>
  <div class="c-meme">
    <div class="c-meme__img">
      <img :src="image" alt="" />
    </div>
    <div class="c-meme__info">
      <h2 class="c-meme__info-heading">{{ meme.name }}</h2>
      <div class="c-meme-info__details">
        <span class="c-meme__info-author"
          >Added by <MemeTag :tagId="meme.userId" type="author"
        /></span>
        <ul class="c-meme__info-tag-list">
          <li
            class="c-meme-info-tag-list-item"
            v-for="language in meme.languageId"
            :key="language + meme.id"
          >
            <MemeTag
              :tagArr="$store.getters['getTagById'](language)"
              type="language"
            />
          </li>
          <li
            class="c-meme-info-tag-list-item"
            v-for="category in meme.categoryId"
            :key="category + meme.id"
          >
            <MemeTag
              :tagArr="$store.getters['getTagById'](category)"
              type="category"
            />
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import MemeTag from "@/components/MemeTag.vue";

export default {
  name: "Meme",
  props: {
    meme: {
      type: Object,
      required: true,
    },
  },
  components: {
    MemeTag,
  },
  computed: {
    image() {
      return require(`@/assets/memes/${this.meme.src}`);
    },
  },
};
</script>

<style lang="scss" scoped>
.c-meme {
  display: flex;
  flex-direction: column;

  @include respond("md") {
    flex-direction: row;
  }
}

.c-meme__img {
  flex: 0 0 60%;
  border: 20px solid $color-primary;
  border-bottom: 0;

  @include respond("md") {
    border: 20px solid $color-primary;
  }

  & > img {
    height: 100%;
    width: 100%;
  }
}

.c-meme__info {
  width: 100%;
}

.c-meme__info-heading {
  display: block;
  margin-bottom: spacer(3);
  padding: spacer(3);
  background-color: $color-primary;
  color: $color-white;
}

.c-meme-info__details {
  display: flex;

  @include respond("md") {
    display: block;
  }
}

.c-meme__info-author {
  flex-shrink: 0;
}

.c-meme__info-author,
.c-meme__info-tag-list {
  display: block;

  @include respond("md") {
    margin-left: spacer(3);
  }
}

.c-meme__info-tag-list {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
}
</style>
