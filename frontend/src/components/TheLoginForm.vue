<template>
  <div class="c-login-form">
    <div class="c-login-form__container">
      <div class="u-form-group">
        <BaseInput
          v-model="login"
          type="text"
          id="login-input"
          name="login-input"
          label="Login / email"
        />
      </div>
      <div class="u-form-group">
        <BaseInput
          v-model="password"
          type="password"
          id="password-input"
          name="password-input"
          label="Password"
        />
      </div>
      <div class="u-form-group">
        <BaseButton>Log in</BaseButton>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      login: "",
      password: "",
    };
  },
};
</script>

<style lang="scss" scoped>
.c-login-form {
  @include pad-tb-spacer(4);
  height: 100%;
}

.c-login-form__container {
  @extend .u-container;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 60%;
  max-width: rem(300px);
}
</style>
