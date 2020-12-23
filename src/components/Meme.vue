<template>
  <div class="c-meme">
    <div class="c-meme__img">
IMG
    </div>
    <div class="c-meme__content">
CONTENT
    </div>
  </div>
</template>

<script>
export default {
  name: "Meme"

}
</script>

<style lang="scss" scoped>
.c-meme {
  display: flex;
  border: $border-thin;
}

.c-meme__content {
  padding: spacer(3);
}

</style>