<template>
  <div class="c-memes-container">
    <main class="c-memes-container__container">
      <ul v-if="memes.length" class="c-memes-container__list">
        <li
          class="c-memes-container__list-item"
          v-for="meme in memes"
          :key="meme.id"
        >
          <Meme :meme="meme" />
        </li>
      </ul>
      <div v-else>Nothing to show</div>
    </main>
  </div>
</template>

<script>
import Meme from "@/components/Meme.vue";

export default {
  name: "TheMemesContainer",
  components: {
    Meme,
  },
  computed: {
    memes: function() {
      return this.$store.state.filteredMemes;
    },
  },
  created() {
    this.$store.dispatch("fetchMemes");
  },
};
</script>

<style lang="scss" scoped>
.c-memes-container {
  @include pad-tb-spacer(4);
}

.c-memes-container__container {
  @extend .container;
}

.c-memes-container__list {
  list-style: none;
}

.c-memes-container__list-item:not(:last-child) {
  margin-bottom: spacer(4);
}
</style>
