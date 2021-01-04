<template>
  <div class="c-main">
    <main class="c-main__container">
      <ul class="c-main__list">
        <li class="c-main__list-item" v-for="meme in memes" :key="meme.id">
          <Meme :meme="meme" />
        </li>
      </ul>
    </main>
  </div>
</template>

<script>
import Meme from "@/components/Meme.vue";

export default {
  name: "TheMain",
  components: {
    Meme,
  },
  computed: {
    memes: function() {
      return this.$store.state.memes;
    },
  },
  created() {
    this.$store.dispatch("fetchMemes");
  },
};
</script>

<style lang="scss" scoped>
.c-main {
  @include pad-tb-spacer(4);
}

.c-main__container {
  @extend .container;
}

.c-main__list {
  list-style: none;
}

.c-main__list-item:not(:last-child) {
  margin-bottom: spacer(4);
}
</style>
