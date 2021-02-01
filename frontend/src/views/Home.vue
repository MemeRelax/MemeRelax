<template>
  <div class="v-home">
    <TheHeader />
    <main class="v-home__container">
      <TheMemesContainer />
      <TheFilter />
    </main>
    <TheFooter />
  </div>
</template>

<script>
import TheHeader from "@/components/TheHeader.vue";
import TheFooter from "@/components/TheFooter.vue";
import TheFilter from "@/components/TheFilter.vue";
import TheMemesContainer from "@/components/TheMemesContainer.vue";

export default {
  name: "Home",
  components: {
    TheHeader,
    TheFooter,
    TheFilter,
    TheMemesContainer,
  },
};
</script>

<style lang="scss" scoped>
.v-home {
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr auto;
}

.v-home__container {
  @extend .u-container-columns;
}
</style>
