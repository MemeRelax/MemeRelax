<template>
  <div class="c-header">
    <div class="c-header__container">
      <router-link
        to="/"
        @mouseover="headingHover = true"
        @mouseleave="headingHover = false"
        class="c-header__main-heading"
        :class="{ active: headingHover }"
        >Memerelax</router-link
      >
      <div class="c-header__access">
        <router-link to="/upload" class="c-header__link">Upload</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TheHeader",
  data() {
    return {
      headingHover: false,
    };
  },
};
</script>

<style lang="scss" scoped>
.c-header {
  @include pad-tb-spacer(2);
  background-color: $color-primary;
}

.c-header__container {
  @extend .container;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.c-header__main-heading {
  font-family: $font-special;
  font-size: rem(60px);
  color: $color-secondary;
  text-decoration: none;
  &.active {
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    background-image: url("http://nothing-mundane.com/wp-content/uploads/2014/03/shibe_doge_wallpaper.png");
    background-size: cover;
    -webkit-text-fill-color: transparent;
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: $color-secondary;
  }
}

.c-header__access {
  color: $color-white;
}

.c-header__link {
  font-size: rem(20px);
  &:link,
  &:visited {
    color: $color-white;
  }
  &:hover,
  &:active {
    color: $color-secondary;
  }
}
</style>
