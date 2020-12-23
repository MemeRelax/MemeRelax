<template>
  <div class="c-main">
    <div class="c-main__container">
      <Meme />
    </div>
  </div>
</template>

<script>
import Meme from "@/components/Meme.vue";

export default {
  name: "TheMain",
  components: { 
    Meme
    },
}
</script>

<style lang="scss" scoped>
.c-main {
  @include pad-tb-spacer(3);
}

.c-main__container {
  @extend .container;
}
</style>