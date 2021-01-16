<template>
  <div class="v-sign-up">
    <TheHeader />
    <div class="v-sign-up__container">
      <TheRegistrationForm />
    </div>
    <TheFooter />
  </div>
</template>

<script>
import TheHeader from "@/components/TheHeader.vue";
import TheFooter from "@/components/TheFooter.vue";
import TheRegistrationForm from "@/components/TheRegistrationForm.vue";

export default {
  name: "Login",
  components: {
    TheHeader,
    TheFooter,
    TheRegistrationForm,
  },
};
</script>

<style lang="scss" scoped>
.v-sign-up {
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr auto;
}

.v-sign-up__container {
  @extend .u-container-columns;
}
</style>
