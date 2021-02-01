<template>
  <div class="v-login">
    <TheHeader />
    <main class="v-login__container">
      <TheLoginForm />
    </main>
    <TheFooter />
  </div>
</template>

<script>
import TheHeader from "@/components/TheHeader.vue";
import TheFooter from "@/components/TheFooter.vue";
import TheLoginForm from "@/components/TheLoginForm.vue";

export default {
  name: "Login",
  components: {
    TheHeader,
    TheFooter,
    TheLoginForm,
  },
};
</script>

<style lang="scss" scoped>
.v-login {
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr auto;
}

.v-login__container {
  @extend .u-container-columns;
}
</style>
