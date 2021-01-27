<template>
  <div class="v-error-page">
    <TheHeader />
    <div class="v-error-page__container">
      NOT FOUND
    </div>
    <TheFooter />
  </div>
</template>

<script>
import TheHeader from "@/components/TheHeader.vue";
import TheFooter from "@/components/TheFooter.vue";

export default {
  name: "ErrorPage",
  components: {
    TheHeader,
    TheFooter,
  },
};
</script>

<style lang="scss" scoped>
.v-error-page {
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr auto;
}

.v-error-page__container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  font-size: rem(30px);
}
</style>
