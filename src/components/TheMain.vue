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
import MemeService from "@/services/MemeService.js";

export default {
  name: "TheMain",
  components: {
    Meme,
  },
  data: function() {
    return {
      memes: [],
    };
  },
  created: function fetchMemes() {
    MemeService.getMemes()
      .then((r) => {
        this.memes = r.data;
      })
      .catch((e) => console.log(e));
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
